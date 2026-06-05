@extends('auth.layouts.app')

@section('content')
<style>
/* Modern Gradient Background */
.register-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
}

.register-card-wrapper {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

.card {
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    border: none;
    overflow: hidden;
}

/* Logo Styling */
.logo-wrapper {
    text-align: center;
    padding: 20px 0;
}

.logo-circle {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
    box-shadow: 0 8px 20px rgba(102,126,234,0.3);
}

.logo-circle i {
    font-size: 32px;
    color: white;
}

.logo-title {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin: 0;
}

.logo-subtitle {
    font-size: 11px;
    color: #666;
    margin-top: 4px;
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

.password-strength {
    margin-top: 8px;
}

.strength-indicator {
    height: 4px;
    border-radius: 2px;
    transition: all 0.3s;
    margin-top: 5px;
}

.strength-indicator.weak { background-color: #dc3545; width: 25%; }
.strength-indicator.fair { background-color: #ffc107; width: 50%; }
.strength-indicator.strong { background-color: #28a745; width: 100%; }

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.text-gray-900 {
    color: #333;
    font-weight: 700;
}

/* Left Side Features */
.features-list {
    margin-top: 30px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
    padding: 10px;
    background: rgba(255,255,255,0.1);
    border-radius: 12px;
    transition: all 0.3s;
}

.feature-item:hover {
    background: rgba(255,255,255,0.2);
    transform: translateX(5px);
}

.feature-icon {
    width: 45px;
    height: 45px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-icon i {
    font-size: 22px;
    color: white;
}

.feature-text {
    flex: 1;
}

.feature-text h4 {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 4px 0;
    color: white;
}

.feature-text p {
    font-size: 12px;
    margin: 0;
    color: rgba(255,255,255,0.7);
}

/* Responsive */
@media (max-width: 768px) {
    .logo-circle {
        width: 55px;
        height: 55px;
    }
    
    .logo-circle i {
        font-size: 26px;
    }
    
    .form-control-user {
        padding: 10px 14px;
    }
    
    .features-list {
        margin-top: 20px;
    }
    
    .feature-item {
        margin-bottom: 15px;
        padding: 8px;
    }
}
</style>

<div class="register-container">
    <div class="register-card-wrapper">
        <div class="card">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block" style="background: linear-gradient(135deg, #667eea, #764ba2); padding: 40px;">
                        <div class="text-center text-white mb-4">
                            <i class="fas fa-brain" style="font-size: 50px; opacity: 0.9;"></i>
                            <h3 class="mt-3 mb-2">Ethiopian AI Institute</h3>
                            <p class="opacity-75 small">Internal Portal System Management</p>
                        </div>
                        
                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-server"></i>
                                </div>
                                <div class="feature-text">
                                    <h4>Manage Internal Systems</h4>
                                    <p>Add and manage internal systems that will be displayed on the public website for employees to access</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="feature-text">
                                    <h4>Post Announcements</h4>
                                    <p>Create and manage announcements for institute employees to keep everyone informed</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="feature-text">
                                    <h4>Real-time Updates</h4>
                                    <p>Instantly publish updates that become visible to employees immediately</p>
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
                                <h1 class="h4 text-gray-900 mb-2">Create Account</h1>
                                <p class="text-muted small">Fill in your details to get started</p>
                            </div>
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold small">Full Name</label>
                                    <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold small">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="name@example.com" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold small">Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="password" id="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Create a strong password" required>
                                        <button type="button" class="toggle-password" data-target="password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="password-strength">
                                        <small class="text-muted">Password must be at least 8 characters with uppercase, lowercase, number & special character</small>
                                        <div class="strength-indicator" id="strengthIndicator"></div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold small">Confirm Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-user" placeholder="Confirm your password" required>
                                        <button type="button" class="toggle-password" data-target="password-confirm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-user w-100">
                                    <i class="fas fa-user-plus mr-2"></i> Create Account
                                </button>
                            </form>
                            
                            <div class="text-center mt-4">
                                <p class="text-muted small mb-0">Already have an account? 
                                    <a class="fw-semibold text-decoration-none" href="{{ route('login') }}">Sign in here</a>
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
// Password strength indicator
const passwordInput = document.getElementById('password');
const strengthIndicator = document.getElementById('strengthIndicator');

if (passwordInput) {
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[@$!%*?&]/.test(password)) strength++;
        
        strengthIndicator.className = 'strength-indicator';
        if (strength < 3) strengthIndicator.classList.add('weak');
        else if (strength < 4) strengthIndicator.classList.add('fair');
        else strengthIndicator.classList.add('strong');
    });
}

// Password visibility toggle
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