@extends('auth.layouts.app')

@section('content')
<style>
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
    border: none;
}

.text-gray-900 {
    font-weight: 700;
    letter-spacing: -0.5px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    border-radius: 10px;
    padding: 12px;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    border-radius: 10px;
    padding: 12px;
}

/* Center the card vertically and horizontally */
.forgot-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.forgot-card-wrapper {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.btn-block {
    width: 100%;
}

hr {
    margin: 20px 0;
}

.text-muted {
    color: #6c757d !important;
}

.small {
    font-size: 13px;
}

.fw-semibold {
    font-weight: 600;
}
</style>

<div class="forgot-container">
    <div class="forgot-card-wrapper">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Password?</h1>
                    <p class="text-muted">Enter your email address and we'll send you a link to reset your password.</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
                    </div>
                @endif

                {{--@if(session('reset_link'))
                    <div class="alert alert-info" style="background: #e3f2fd; border-color: #2196f3; color: #0c5460;">
                        <strong><i class="fas fa-link"></i> Reset Link (for testing):</strong><br>
                        <a href="{{ session('reset_link') }}" target="_blank" style="word-break: break-all; color: #0c5460;">
                            {{ session('reset_link') }}
                        </a>
                        <br><small>This link is also logged in storage/logs/laravel.log</small>
                    </div>
                @endif
                --}}

                @error('email')
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                    </div>
                @enderror

                <form method="POST" action="{{ route('password.email') }}" id="resetForm">
                    @csrf
                    
                    <div class="form-group mb-4">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input id="email" type="email"
                            class="form-control form-control-user @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" 
                            placeholder="Enter your registered email address"
                            required autocomplete="email" autofocus>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block" id="submitBtn">
                        <i class="fas fa-paper-plane mr-2"></i> Send Password Reset Link
                    </button>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <a class="small text-decoration-none" href="{{ route('login') }}">
                            <i class="fas fa-arrow-left mr-1"></i> Back to Login
                        </a>
                    </div>
                    
                    <div class="text-center mt-3">
                        <p class="text-muted small mb-0">Don't have an account? 
                            <a class="fw-semibold text-decoration-none" href="{{ route('register') }}">
                                Create an account
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('resetForm').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value.trim();
    const submitBtn = document.getElementById('submitBtn');
    
    if (!email) {
        e.preventDefault();
        alert('Please enter your email address');
        return false;
    }
    
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        e.preventDefault();
        alert('Please enter a valid email address');
        return false;
    }
    
    // Show loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending Reset Link...';
});
</script>
@endsection