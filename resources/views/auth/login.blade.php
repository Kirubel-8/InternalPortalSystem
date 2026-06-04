@extends('auth.layouts.app')

@section('content')
<style>
.bg-login-image {
    /* background: url('admin/logo/EAIIlogo.jpg') no-repeat center center; */
    background: url('{{ asset("admin/logo/EAIIlogo.jpg") }}') no-repeat center center;
    background-size: 70%;
}

.form-control-user {
    border-radius: 10px;
    padding: 15px;
    font-size: 14px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-control-user:focus {
    border-color: #4e73df;
    box-shadow: 0 0 10px rgba(78, 115, 223, 0.3);
}

.btn-user {
    border-radius: 10px;
    padding: 12px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-user:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.card {
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.text-gray-900 {
    font-weight: 700;
    letter-spacing: -0.5px;
}

.small {
    color: #6e707e;
}

.small:hover {
    color: #4e73df;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

/* Password wrapper styles */
.password-wrapper {
    position: relative;
}

.password-wrapper .toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
    z-index: 10;
    background: transparent;
    border: none;
    padding: 0;
}

.password-wrapper .toggle-password:hover {
    color: #4e73df;
}

/* Center the card vertically and horizontally */
.login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.login-card-wrapper {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

/* Alert styles */
.alert-warning {
    background-color: #fff3cd;
    border-color: #ffeeba;
    color: #856404;
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 20px;
}

.alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 20px;
}

.btn-resend {
    background: linear-gradient(135deg, #ff9800, #f57c00);
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 10px;
}

.btn-resend:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 152, 0, 0.3);
}

.btn-resend:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.spinner {
    display: inline-block;
    width: 14px;
    height: 14px;
    border: 2px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    border-top-color: white;
    animation: spin 0.6s linear infinite;
    margin-right: 8px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.verification-section {
    background: #f8f9fc;
    border-radius: 10px;
    padding: 15px;
    margin-top: 15px;
    border-left: 4px solid #ff9800;
}

.verification-title {
    font-weight: 600;
    color: #ff9800;
    margin-bottom: 10px;
    font-size: 14px;
}
</style>

<div class="login-container">
    <div class="login-card-wrapper">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                <p class="text-muted mb-4">Sign in to your account</p>
                            </div>
                            
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('status') }}
                                </div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> {{ session('warning') }}
                                </div>
                            @endif

                            @if(session('info'))
                                <div class="alert alert-success" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('info') }}
                                </div>
                            @endif

                            <!-- @if(session('resent'))
                                <div class="alert alert-success" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('resent') }}
                                </div>
                            @endif -->

                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                                </div>
                            @endif

                            <!-- Show verification section if there's an unverified email error -->
                            @if($errors->has('email') && str_contains($errors->first('email'), 'not verified'))
                                <div class="verification-section">
                                    <div class="verification-title">
                                        <i class="fas fa-envelope"></i> Email Not Verified
                                    </div>
                                    <p class="text-muted small">Your email address has not been verified yet.</p>
                                    <form action="{{ route('verification.resend') }}" method="POST" id="resendVerificationForm">
                                        @csrf
                                        <input type="hidden" name="email" id="unverified_email" value="{{ old('email') }}">
                                        <button type="submit" class="btn-resend" id="resendBtn">
                                            <i class="fas fa-paper-plane"></i> Resend Verification Email
                                        </button>
                                    </form>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}" novalidate>
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input id="email" type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" 
                                    placeholder="Enter your email address"
                                    required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <div class="password-wrapper">
                                        <input id="password" type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror" 
                                        name="password" 
                                        placeholder="Enter your password"
                                        required autocomplete="current-password">
                                        <button type="button" class="toggle-password" data-target="password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-4">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block w-100">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                                </button>
                                
                                <hr class="my-3">
                            </form>
                            
                            <div class="text-center">
                                <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                    <i class="fas fa-key mr-1"></i> Forgot Password?
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <p class="text-muted">Don't have an account? 
                                    <a class="small fw-semibold text-decoration-none" href="{{ route('register') }}">
                                        Create one here
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const passwordInput = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });

    // Resend verification form handler
    const resendForm = document.getElementById('resendVerificationForm');
    if (resendForm) {
        resendForm.addEventListener('submit', function(e) {
            const btn = document.getElementById('resendBtn');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner"></span> Sending...';
        });
    }
});
</script>
@endsection