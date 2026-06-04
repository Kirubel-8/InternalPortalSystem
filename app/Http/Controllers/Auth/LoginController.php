<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    // I added to redirect to a different route after login.
    protected function redirectTo()
    {
        return route('posts.index');
    }

    /**
     * Alternative: Override the authenticated method
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('posts.index');
    }

    /**
     * Override to check if user is verified and active
     */
    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        // Check if user exists
        if (!$user) {
            return false;
        }
        
        // Check if email is verified
        if (!$user->hasVerifiedEmail()) {
            return false;
        }
        
        // Check if user is active
        if (!$user->is_active) {
            return false;
        }
        
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Custom failed login response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if ($user && !$user->hasVerifiedEmail()) {
            throw ValidationException::withMessages([
                $this->username() => 'Your email address is not verified. Please check your email for the verification link.',
            ]);
        }
        
        if ($user && !$user->is_active) {
            throw ValidationException::withMessages([
                $this->username() => 'Your account has been deactivated. Please contact the administrator.',
            ]);
        }
        
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

     /**
     * Override logout to redirect to login with prefix
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


   
}
