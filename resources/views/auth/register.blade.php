@extends('auth.layouts.app')

@section('content')
<style>
    .bg-register-image {
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

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }

    .password-strength {
        margin-top: 5px;
        font-size: 12px;
    }

    .strength-indicator {
        display: inline-block;
        width: 100%;
        height: 4px;
        border-radius: 2px;
        background-color: #e3e6f0;
        margin-top: 5px;
    }

    .strength-indicator.weak {
        background-color: #dc3545;
    }

    .strength-indicator.fair {
        background-color: #ffc107;
    }

    .strength-indicator.strong {
        background-color: #28a745;
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
    .register-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .register-card-wrapper {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }
</style>

<div class="register-container">
    <div class="register-card-wrapper">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Create Account</h1>
                                <p class="text-muted mb-4">Fill in the information below to create your account</p>
                            </div>
                            
                            <form method="POST" action="{{ route('register') }}" novalidate>
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label fw-semibold">Full Name</label>
                                    <input id="name" type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" 
                                    placeholder="Enter your full name"
                                    required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input id="email" type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" 
                                    placeholder="Enter your email address"
                                    required autocomplete="email">

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
                                        placeholder="Create a strong password"
                                        required autocomplete="new-password">
                                        <button type="button" class="toggle-password" data-target="password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>

                                    <div class="password-strength">
                                        <small class="text-muted">
                                            Password must contain at least 8 characters, with uppercase, lowercase, number, and special character (@$!%*?&)
                                        </small>
                                    </div>
                                    <div class="strength-indicator" id="strengthIndicator"></div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="password-confirm" class="form-label fw-semibold">Confirm Password</label>
                                    <div class="password-wrapper">
                                        <input id="password-confirm" type="password"
                                        class="form-control form-control-user"
                                        name="password_confirmation" 
                                        placeholder="Confirm your password"
                                        required autocomplete="new-password">
                                        <button type="button" class="toggle-password" data-target="password-confirm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block w-100">
                                    <i class="fas fa-user-plus mr-2"></i> Create Account
                                </button>
                                
                                <hr class="my-3">
                            </form>
                            
                            <div class="text-center">
                                <p class="text-muted">Already have an account? 
                                    <a class="small fw-semibold text-decoration-none" href="{{ route('login') }}">
                                        Login here
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
            if (strength < 3) {
                strengthIndicator.classList.add('weak');
            } else if (strength < 4) {
                strengthIndicator.classList.add('fair');
            } else {
                strengthIndicator.classList.add('strong');
            }
        });
    }

    // Password visibility toggle
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
@endsection