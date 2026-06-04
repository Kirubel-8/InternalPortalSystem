<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     */
    public function show(Request $request)
    {
        // Get email from session if available
        $email = session('email');
        
        return view('auth.verify')->with('email', $email);
    }

    /**
     * Mark the authenticated user's email address as verified.
     */
    public function verify(Request $request)
    {
        // Find user by id
        $user = User::find($request->route('id'));
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid verification link. User not found.');
        }

        // Check if email is already verified
        if ($user->hasVerifiedEmail()) {
            Auth::login($user);
            return redirect()->route('posts.index')->with('success', 'Your email is already verified! Welcome back.');
        }

        // Verify the hash matches
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'Invalid verification link.');
        }

        // Mark email as verified
        if ($user->markEmailAsVerified()) {
            // Activate the user after email verification
            $user->update(['is_active' => true]);
            event(new Verified($user));
        }

        // Log the user in after verification
        Auth::login($user);

        return redirect()->route('posts.index')->with('success', 'Email verified successfully! Welcome to your dashboard.');
    }

    /**
     * Resend the email verification notification.
     * This now works without requiring login
     */
    public function resend(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'No user found with this email address.'
        ]);

        $user = User::where('email', $request->email)->first();

        // Check if already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('success', 'Your email is already verified. Please login.');
        }

        // Send verification email
        $user->sendEmailVerificationNotification();

        // Redirect back to login with success message
        return redirect()->route('login')->with('resent', true)->with('info', 'A new verification link has been sent to your email ' . $user->email);
    }
}