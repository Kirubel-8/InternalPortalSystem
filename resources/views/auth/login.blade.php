@extends('auth.layouts.app')

@section('content')
<style>
/* Modern Gradient Background */
.login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
}

.login-card-wrapper {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
}

.card {
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    border: none;
    overflow: hidden;
}

/* Logo Styling - Professional & Beautiful */
.logo-wrapper {
    text-align: center;
    padding: 30px 0 20px;
}

.logo-circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    box-shadow: 0 8px 20px rgba(102,126,234,0.3);
}

.logo-circle i {
    font-size: 40px;
    color: white;
}

.logo-title {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin: 0;
}

.logo-subtitle {
    font-size: 12px;
    color: #666;
    margin-top: 5px;
}

/* Form Styling */
.form-control-user {
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 14px;
    border: 2px solid #e9ecef;
    transition: all 0.3s;
}

.form-control-user:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
}

.btn-user {
    border-radius: 12px;
    padding: 12px;
    font-weight: 600;
    transition: all 0.3s;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
}

.btn-user:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102,126,234,0.4);
    color: #f3f2f2;
}

.btn {
    color: #f3f2f2;
}

.password-wrapper {
    position: relative;
}

.password-wrapper .toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #999;
    background: transparent;
    border: none;
    padding: 0;
}

.password-wrapper .toggle-password:hover {
    color: #667eea;
}

.text-gray-900 {
    color: #333;
    font-weight: 700;
}

.small {
    color: #c4c3c3;
}

.small:hover {
    color: #667eea;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.alert {
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 20px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-warning {
    background: #fff3cd;
    color: #856404;
    border-left: 4px solid #ffc107;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}

.verification-section {
    background: #f8f9fc;
    border-radius: 12px;
    padding: 15px;
    margin-top: 20px;
    border-left: 4px solid #ff9800;
}

.verification-title {
    font-weight: 600;
    color: #ff9800;
    margin-bottom: 8px;
    font-size: 14px;
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
    box-shadow: 0 4px 12px rgba(255,152,0,0.3);
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

/* Responsive */
@media (max-width: 768px) {
    .logo-circle {
        width: 60px;
        height: 60px;
    }
    
    .logo-circle i {
        font-size: 30px;
    }
    
    .logo-title {
        font-size: 18px;
    }
    
    .form-control-user {
        padding: 10px 14px;
    }
}
</style>

<div class="login-container">
    <div class="login-card-wrapper">
        <div class="card">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block" style="background: linear-gradient(135deg, #667eea, #764ba2); padding: 40px;">
                        <div class="text-center text-white">
                            <div class="mb-4">
                                <!-- <i class="fas fa-brain" style="font-size: 60px; opacity: 0.9;"></i> -->
                                <!-- <i class="fas fa-microchip" style="font-size: 60px; opacity: 0.9;"></i> -->
                                <!-- <i class="fas fa-share-alt" style="font-size: 60px; opacity: 0.9;"></i> -->

                                <div style="position: relative; display: inline-block;">
                                    <i class="fas fa-microchip" style="font-size: 50px; opacity: 0.9;"></i>
                                    <i class="fas fa-cogs" style="font-size: 25px; opacity: 0.7; position: absolute; bottom: -5px; right: -10px;"></i>
                                </div>
                            </div>
                            <h3 class="mb-3">Welcome Back!</h3>
                            <p class="opacity-75">Access your account to manage the Ethiopian AI Institute internal systems.</p>
                            <div class="mt-5 pt-3">
                                <div class="d-flex justify-content-center gap-3">
                                    <div class="text-center">
                                        <i class="fas fa-shield-alt fa-2x mb-2"></i>
                                        <p class="small color mb-0">Secure Access</p>
                                    </div>
                                    <div class="text-center ml-4">
                                        <i class="fas fa-clock fa-2x mb-2"></i>
                                        <p class="small mb-0">24/7</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4 p-md-5">
                            <div class="text-center mb-4">
                                <div class="logo-wrapper d-block d-lg-none">
                                    <div class="logo-circle">
                                        <i class="fas fa-brain"></i>
                                    </div>
                                </div>
                                <h1 class="h4 text-gray-900 mb-2">Sign In</h1>
                                <p class="text-muted small">Enter your credentials to access your account</p>
                            </div>
                            
                            @if(session('status'))
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
                                </div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('warning') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                                </div>
                            @endif

                            @if($errors->has('email') && str_contains($errors->first('email'), 'not verified'))
                                <div class="verification-section">
                                    <div class="verification-title">
                                        <i class="fas fa-envelope"></i> Email Not Verified
                                    </div>
                                    <p class="text-muted small">Your email address has not been verified yet.</p>
                                    <form action="{{ route('verification.resend') }}" method="POST" id="resendVerificationForm">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ old('email') }}">
                                        <button type="submit" class="btn-resend">
                                            <i class="fas fa-paper-plane"></i> Resend Verification Email
                                        </button>
                                    </form>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold small">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold small">Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="password" id="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                                        <button type="button" class="toggle-password" data-target="password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="remember">Remember Me</label>
                                        </div>
                                        <a class="small text-decoration-none" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-user w-100">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                                </button>
                            </form>
                            
                            <div class="text-center mt-4">
                                <p class="text-muted small mb-0">Don't have an account? 
                                    <a class="fw-semibold text-decoration-none" href="{{ route('register') }}">Create an account</a>
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
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
        const targetId = this.dataset.target;
        const input = document.getElementById(targetId);
        const icon = this.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});
</script>
@endsection