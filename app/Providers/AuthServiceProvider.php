<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Customize email verification URL to use APP_URL
        VerifyEmail::createUrlUsing(function ($notifiable) {
            // Get the auth secret from env
            $authSecret = env('AUTH_SECRET', 'admin-panel');
            
            // Generate the verification URL using APP_URL
            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
            
            // Replace localhost with actual domain if in production
            if (env('APP_ENV') === 'production') {
                $appUrl = env('APP_URL');
                $verificationUrl = str_replace('http://localhost:8000', $appUrl, $verificationUrl);
                $verificationUrl = str_replace('http://localhost', $appUrl, $verificationUrl);
            }
            
            return $verificationUrl;
        });

        // Customize the email verification email content
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Your Email Address - ' . config('app.name'))
                ->greeting('Hello ' . $notifiable->name . '!')
                ->line('Thank you for registering with ' . config('app.name') . '.')
                ->line('Please click the button below to verify your email address.')
                ->action('Verify Email Address', $url)
                ->line('This verification link will expire in 60 minutes.')
                ->line('If you did not create an account, no further action is required.')
                ->salutation('Best regards,<br>' . config('app.name') . ' Team');
        });
    }
}