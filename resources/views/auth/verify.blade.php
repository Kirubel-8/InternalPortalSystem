@extends('auth.layouts.app')

@section('content')
<style>
.verify-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
}

.verify-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    max-width: 550px;
    width: 100%;
    padding: 40px;
    text-align: center;
    animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.verify-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.verify-icon i {
    font-size: 40px;
    color: white;
}

.verify-title {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
}

.verify-message {
    color: #666;
    line-height: 1.6;
    margin-bottom: 10px;
}

.verify-email {
    background: #f0f2f5;
    padding: 10px;
    border-radius: 8px;
    font-weight: 600;
    color: #4e73df;
    margin: 15px 0;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
}

.btn-resend {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 10px;
    width: 100%;
}

.btn-resend:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(102,126,234,0.3);
}

.btn-resend:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.btn-login {
    background: transparent;
    color: #4e73df;
    border: 2px solid #4e73df;
    padding: 10px 25px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 20px;
    text-decoration: none;
    display: inline-block;
    width: 100%;
}

.btn-login:hover {
    background: #4e73df;
    color: white;
    text-decoration: none;
}

.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 20px;
}

.alert-danger {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 20px;
}

.spinner {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    border-top-color: white;
    animation: spin 0.6s linear infinite;
    margin-right: 8px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.hidden {
    display: none;
}
</style>

<div class="verify-container">
    <div class="verify-card">
        <div class="verify-icon">
            <i class="fas fa-envelope"></i>
        </div>
        
        <h2 class="verify-title">Verify Your Email Address</h2>
        
        @if(session('resent'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> A fresh verification link has been sent to your email address.
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <i class="fas fa-exclamation-circle"></i> {{ $error }}<br>
                @endforeach
            </div>
        @endif
        
        <p class="verify-message">
            Thank you for registering! Please verify your email address to complete your registration.
        </p>
        
        @if(session('email'))
            <div class="verify-email">
                <i class="fas fa-envelope"></i> {{ session('email') }}
            </div>
        @endif
        
        <p class="verify-message">
            Didn't receive the verification email? Enter your email below to resend.
        </p>
        
        <form action="{{ route('verification.resend') }}" method="POST" id="resendForm">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" 
                       placeholder="Enter your email address" 
                       value="{{ old('email', session('email')) }}" required>
            </div>
            <button type="submit" class="btn-resend" id="resendBtn">
                <i class="fas fa-paper-plane"></i> Resend Verification Link
            </button>
        </form>
        
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn-login">
                <i class="fas fa-arrow-left"></i> Back to Login
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('resendForm').addEventListener('submit', function(e) {
    var btn = document.getElementById('resendBtn');
    var email = document.getElementById('email').value;
    
    if (!email) {
        e.preventDefault();
        alert('Please enter your email address');
        return false;
    }
    
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span> Sending...';
});
</script>
@endsection