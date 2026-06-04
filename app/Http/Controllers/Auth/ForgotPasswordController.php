<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('throttle:23,10');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'We cannot find a user with that email address.'
        ]);

        // Generate raw token BEFORE sending
        $rawToken = Str::random(60);
        
        // Store hashed token in database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => bcrypt($rawToken),
                'created_at' => now()
            ]
        );

        // Generate the exact same link that will be sent to email
        $resetLink = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(config('auth.passwords.users.expire', 60)),
            [
                'token' => $rawToken,  // Use RAW token, not hashed
                'email' => $request->email
            ]
        );

        // Log the exact reset link
        Log::info('=========================================');
        Log::info('PASSWORD RESET REQUEST FOR: ' . $request->email);
        Log::info('EXACT RESET LINK (SAME AS EMAIL):');
        Log::info($resetLink);
        Log::info('=========================================');
        
        session()->flash('reset_link', $resetLink);

        // Manually send the reset notification
        $user = \App\Models\User::where('email', $request->email)->first();
        $user->sendPasswordResetNotification($rawToken);

        return back()->with([
            'status' => 'We have emailed your password reset link!',
            'reset_link' => $resetLink
        ]);
    }
}