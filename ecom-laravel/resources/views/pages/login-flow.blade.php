@extends('layouts.app')

@section('title', 'Login')

@section('content')
<!-- Custom Login Flow Styling -->
<style>
    .login-page-bg {
        background-color: #f3f4f6;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }
    
    .login-wrapper-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 1050px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        display: flex;
        flex-direction: column;
    }

    /* Mockup dark blue header bar from the reference image */
    .login-flow-title-bar {
        background-color: #0b3c5d;
        color: #fff;
        padding: 14px 28px;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .login-split-container {
        display: flex;
        flex-direction: row;
        min-height: 580px;
    }

    /* Left panel: Custom generated image banner */
    .login-image-panel {
        width: 50%;
        background-color: #38bdf8;
        background-image: url('assets/login_hero.png');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    /* Right panel: Active state form */
    .login-form-panel {
        width: 50%;
        padding: 50px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        background: #fff;
    }

    /* State Form Animations */
    .auth-state-wrapper {
        animation: stateFadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: center;
    }

    @keyframes stateFadeIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .auth-state-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .auth-state-subtitle {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 30px;
    }

    .form-group-custom {
        margin-bottom: 20px;
        position: relative;
    }

    .form-label-custom {
        font-size: 0.8rem;
        font-weight: 700;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }

    .form-input-custom {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 0.95rem;
        outline: none;
        transition: all 0.25s ease;
        background-color: #f9fafb;
    }

    .form-input-custom:focus {
        border-color: #6A0DAD;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05);
    }

    /* Checkbox & Forgot row */
    .login-options-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        font-size: 0.88rem;
    }

    .checkbox-label-custom {
        color: #4b5563;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        user-select: none;
    }

    .checkbox-input-custom {
        accent-color: #6A0DAD;
        width: 16px;
        height: 16px;
    }

    .forgot-link-custom {
        color: #6A0DAD;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-link-custom:hover {
        color: #4B097A;
    }

    .btn-auth-submit {
        background-color: #6A0DAD;
        color: #fff;
        border: none;
        padding: 14px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1rem;
        width: 100%;
        transition: all 0.25s ease;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.15);
    }

    .btn-auth-submit:hover {
        background-color: #4B097A;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(106, 13, 173, 0.2);
    }

    /* Social Login dividers */
    .social-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 24px 0;
        color: #9ca3af;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .social-divider::before,
    .social-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e5e7eb;
    }

    .social-divider:not(:empty)::before {
        margin-right: .75em;
    }

    .social-divider:not(:empty)::after {
        margin-left: .75em;
    }

    .social-buttons-row {
        display: flex;
        gap: 16px;
    }

    .btn-social-custom {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 1.5px solid #e5e7eb;
        background: #fff;
        color: #374151;
        padding: 11px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.88rem;
        transition: all 0.25s ease;
        cursor: pointer;
    }

    .btn-social-custom:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        transform: translateY(-1px);
    }

    .btn-social-custom i {
        font-size: 1.15rem;
    }

    .social-google i {
        color: #ea4335;
    }

    .social-facebook i {
        color: #1877f2;
    }

    .auth-bottom-switch {
        text-align: center;
        margin-top: 30px;
        font-size: 0.88rem;
        color: #6b7280;
    }

    .auth-bottom-switch a {
        color: #6A0DAD;
        font-weight: 700;
        text-decoration: none;
    }

    .auth-bottom-switch a:hover {
        text-decoration: underline;
    }

    /* OTP Inputs Group */
    .otp-digits-row {
        display: flex;
        gap: 14px;
        justify-content: center;
        margin-bottom: 24px;
    }

    .otp-digit-input {
        width: 56px;
        height: 56px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        text-align: center;
        font-size: 1.5rem;
        font-weight: 800;
        color: #111827;
        background-color: #f9fafb;
        outline: none;
        transition: all 0.25s ease;
    }

    .otp-digit-input:focus {
        border-color: #6A0DAD;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05);
    }

    /* ======== Verification Result Screens ======== */
    .verify-result-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 20px;
        min-height: 360px;
    }

    .verify-icon-circle {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 28px;
        position: relative;
        animation: iconPopIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    .verify-icon-circle.success {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        box-shadow: 0 8px 32px rgba(16, 185, 129, 0.25);
    }

    .verify-icon-circle.fail {
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        box-shadow: 0 8px 32px rgba(239, 68, 68, 0.25);
    }

    .verify-icon-circle i {
        font-size: 3rem;
    }

    .verify-icon-circle.success i {
        color: #059669;
    }

    .verify-icon-circle.fail i {
        color: #dc2626;
    }

    /* Pulsing ring behind icon */
    .verify-icon-circle::before {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        opacity: 0;
        animation: pulseRing 1.8s ease-out 0.4s infinite;
    }

    .verify-icon-circle.success::before {
        border: 2.5px solid rgba(16, 185, 129, 0.3);
    }

    .verify-icon-circle.fail::before {
        border: 2.5px solid rgba(239, 68, 68, 0.3);
    }

    @keyframes iconPopIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        60% {
            transform: scale(1.1);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes pulseRing {
        0% {
            opacity: 0.6;
            transform: scale(1);
        }
        100% {
            opacity: 0;
            transform: scale(1.45);
        }
    }

    .verify-result-title {
        font-size: 1.65rem;
        font-weight: 800;
        margin-bottom: 10px;
        letter-spacing: -0.3px;
    }

    .verify-result-title.success {
        color: #059669;
    }

    .verify-result-title.fail {
        color: #dc2626;
    }

    .verify-result-subtitle {
        color: #6b7280;
        font-size: 0.92rem;
        max-width: 340px;
        line-height: 1.6;
        margin-bottom: 32px;
    }

    .btn-result-action {
        padding: 13px 40px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-result-action.success {
        background-color: #059669;
        color: #fff;
        box-shadow: 0 4px 14px rgba(5, 150, 105, 0.25);
    }

    .btn-result-action.success:hover {
        background-color: #047857;
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(5, 150, 105, 0.3);
    }

    .btn-result-action.fail {
        background-color: #6A0DAD;
        color: #fff;
        box-shadow: 0 4px 14px rgba(106, 13, 173, 0.2);
    }

    .btn-result-action.fail:hover {
        background-color: #4B097A;
        transform: translateY(-1px);
    }

    /* Registration step progress indicator */
    .reg-step-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0;
        margin-bottom: 32px;
    }

    .reg-step-dot {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 2.5px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        font-weight: 700;
        color: #9ca3af;
        background: #fff;
        transition: all 0.35s ease;
        position: relative;
        z-index: 2;
    }

    .reg-step-dot.active {
        border-color: #6A0DAD;
        color: #fff;
        background: #6A0DAD;
        box-shadow: 0 3px 10px rgba(106, 13, 173, 0.25);
    }

    .reg-step-dot.completed {
        border-color: #059669;
        color: #fff;
        background: #059669;
        box-shadow: 0 3px 10px rgba(5, 150, 105, 0.2);
    }

    .reg-step-line {
        width: 60px;
        height: 2.5px;
        background: #e5e7eb;
        transition: background 0.35s ease;
    }

    .reg-step-line.completed {
        background: #059669;
    }

    /* Toast styling */
    .auth-toast-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1080;
    }

    .auth-toast {
        background: #fff;
        border-left: 4px solid #6A0DAD;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
        padding: 16px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.95rem;
        animation: toastSlideIn 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 400px;
    }

    /* Mobile Adaptations */
    @media (max-width: 991.98px) {
        .login-wrapper-card {
            max-width: 500px;
        }
        
        .login-split-container {
            min-height: auto;
        }

        .login-image-panel {
            display: none;
        }

        .login-form-panel {
            width: 100%;
            padding: 40px 30px;
        }

        .reg-step-line {
            width: 40px;
        }
    }

    @media (max-width: 575.98px) {
        .login-page-bg {
            padding: 20px 0;
            background-color: #fff;
        }

        .login-wrapper-card {
            border: none;
            box-shadow: none;
        }

        .login-flow-title-bar {
            padding: 14px 20px;
            font-size: 1rem;
        }

        .login-form-panel {
            padding: 30px 20px;
        }

        .auth-state-title {
            font-size: 1.5rem;
        }

        .verify-icon-circle {
            width: 90px;
            height: 90px;
        }

        .verify-icon-circle i {
            font-size: 2.4rem;
        }

        .verify-result-title {
            font-size: 1.35rem;
        }

        .reg-step-dot {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }

        .reg-step-line {
            width: 30px;
        }
    }
</style>

<div class="login-page-bg">
    <div class="container d-flex justify-content-center">
        <div class="login-wrapper-card">
            <!-- Reference Header title bar -->
            <div class="login-flow-title-bar" id="loginTitleBar">Customer Login</div>

            <!-- Responsive Split Wrapper -->
            <div class="login-split-container">
                <!-- Left panel: Banner image -->
                <div class="login-image-panel"></div>

                <!-- Right panel: Active state form -->
                <div class="login-form-panel" id="authFormPanel">
                    
                    <!-- ============================================
                         1. LOGIN STATE
                         ============================================ -->
                    <div class="auth-state-wrapper" id="state-login">
                        <h2 class="auth-state-title">Login to continue</h2>
                        <p class="auth-state-subtitle">Welcome back! Please login to your account.</p>
                        
                        <form id="loginForm" onsubmit="handleAuthSubmit(event, 'login')">
                            <div class="form-group-custom">
                                <label class="form-label-custom">Email Address / Mobile Number</label>
                                <input type="text" class="form-input-custom" placeholder="name@domain.com" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Password</label>
                                <input type="password" class="form-input-custom" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                            </div>
                            
                            <div class="login-options-row">
                                <label class="checkbox-label-custom">
                                    <input type="checkbox" class="checkbox-input-custom"> Remember me
                                </label>
                                <a href="javascript:void(0)" onclick="switchState('forgot')" class="forgot-link-custom">Forgot Password?</a>
                            </div>

                            <button type="submit" class="btn-auth-submit" id="btnLoginSubmit">Login</button>
                        </form>

                        <div class="social-divider">Or Continue with</div>
                        
                        <div class="social-buttons-row">
                            <button class="btn-social-custom social-google" onclick="simulateSocialLogin('Google')">
                                <i class="bi bi-google"></i> Google
                            </button>
                            <button class="btn-social-custom social-facebook" onclick="simulateSocialLogin('Facebook')">
                                <i class="bi bi-facebook"></i> Facebook
                            </button>
                        </div>

                        <p class="auth-bottom-switch">Don't have an account? <a href="javascript:void(0)" onclick="switchState('register')">Sign Up</a></p>
                    </div>

                    <!-- ============================================
                         2. REGISTER STATE — Create Account
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-register">
                        <!-- Step Indicator -->
                        <div class="reg-step-indicator">
                            <div class="reg-step-dot active" id="regStep1">1</div>
                            <div class="reg-step-line" id="regLine1"></div>
                            <div class="reg-step-dot" id="regStep2">2</div>
                            <div class="reg-step-line" id="regLine2"></div>
                            <div class="reg-step-dot" id="regStep3">3</div>
                        </div>

                        <h2 class="auth-state-title">Create Account</h2>
                        <p class="auth-state-subtitle">Sign up to start shopping premium collections.</p>
                        
                        <form id="registerForm" onsubmit="handleAuthSubmit(event, 'register')">
                            <div class="form-group-custom">
                                <label class="form-label-custom">Full Name</label>
                                <input type="text" class="form-input-custom" placeholder="e.g. Navneet Kumar" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Email Address</label>
                                <input type="email" class="form-input-custom" placeholder="name@domain.com" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Mobile Number</label>
                                <input type="tel" class="form-input-custom" placeholder="e.g. +91 99999 88888" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Password</label>
                                <input type="password" class="form-input-custom" placeholder="Create secure password" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Confirm Password</label>
                                <input type="password" class="form-input-custom" placeholder="Confirm your password" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="checkbox-label-custom">
                                    <input type="checkbox" class="checkbox-input-custom" required> I agree to the Terms &amp; Conditions
                                </label>
                            </div>

                            <button type="submit" class="btn-auth-submit" id="btnRegisterSubmit">Create Account</button>
                        </form>

                        <p class="auth-bottom-switch">Already have an account? <a href="javascript:void(0)" onclick="switchState('login')">Login</a></p>
                    </div>

                    <!-- ============================================
                         2b. REGISTER — OTP Verification
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-register-verify">
                        <!-- Step Indicator -->
                        <div class="reg-step-indicator">
                            <div class="reg-step-dot completed" id="regStep1v"><i class="bi bi-check-lg" style="font-size:0.85rem;"></i></div>
                            <div class="reg-step-line completed" id="regLine1v"></div>
                            <div class="reg-step-dot active" id="regStep2v">2</div>
                            <div class="reg-step-line" id="regLine2v"></div>
                            <div class="reg-step-dot" id="regStep3v">3</div>
                        </div>

                        <h2 class="auth-state-title">Verification</h2>
                        <p class="auth-state-subtitle">We've sent a 4-digit verification code to your registered email &amp; mobile number. Enter it below to verify your account.</p>
                        
                        <form id="registerVerifyForm" onsubmit="handleAuthSubmit(event, 'register-verify')">
                            <div class="otp-digits-row">
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                            </div>

                            <button type="submit" class="btn-auth-submit mb-3" id="btnRegVerifySubmit">Verify OTP</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="small text-muted mb-0">Didn't receive the code? <a href="javascript:void(0)" onclick="resendOTP()" class="forgot-link-custom">Resend Code</a></p>
                        </div>
                    </div>

                    <!-- ============================================
                         2c. REGISTER — Verification Successful
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-register-success">
                        <!-- Step Indicator -->
                        <div class="reg-step-indicator">
                            <div class="reg-step-dot completed"><i class="bi bi-check-lg" style="font-size:0.85rem;"></i></div>
                            <div class="reg-step-line completed"></div>
                            <div class="reg-step-dot completed"><i class="bi bi-check-lg" style="font-size:0.85rem;"></i></div>
                            <div class="reg-step-line completed"></div>
                            <div class="reg-step-dot completed"><i class="bi bi-check-lg" style="font-size:0.85rem;"></i></div>
                        </div>

                        <div class="verify-result-wrapper">
                            <div class="verify-icon-circle success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <h3 class="verify-result-title success">Verification Successful!</h3>
                            <p class="verify-result-subtitle">Your account has been created and verified successfully. Welcome to Axvero — start exploring premium fashion collections now.</p>
                            <button class="btn-result-action success" onclick="window.location.href='{{ url('/') }}'">
                                <i class="bi bi-bag-check"></i> Start Shopping
                            </button>
                        </div>
                    </div>

                    <!-- ============================================
                         2d. REGISTER — Verification Failed
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-register-fail">
                        <!-- Step Indicator -->
                        <div class="reg-step-indicator">
                            <div class="reg-step-dot completed"><i class="bi bi-check-lg" style="font-size:0.85rem;"></i></div>
                            <div class="reg-step-line completed"></div>
                            <div class="reg-step-dot" style="border-color:#dc2626;color:#dc2626;">2</div>
                            <div class="reg-step-line"></div>
                            <div class="reg-step-dot">3</div>
                        </div>

                        <div class="verify-result-wrapper">
                            <div class="verify-icon-circle fail">
                                <i class="bi bi-x-lg"></i>
                            </div>
                            <h3 class="verify-result-title fail">Verification Failed</h3>
                            <p class="verify-result-subtitle">The verification code you entered is incorrect or has expired. Please try again or request a new code.</p>
                            <button class="btn-result-action fail" onclick="switchState('register-verify')">
                                <i class="bi bi-arrow-repeat"></i> Try Again
                            </button>
                        </div>
                    </div>

                    <!-- ============================================
                         3. FORGOT PASSWORD STATE
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-forgot">
                        <h2 class="auth-state-title">Forgot Your Password?</h2>
                        <p class="auth-state-subtitle">Enter your registered email address or mobile number. We will send you a verification code to reset your password.</p>
                        
                        <form id="forgotForm" onsubmit="handleAuthSubmit(event, 'forgot')">
                            <div class="form-group-custom mb-4">
                                <label class="form-label-custom">Email / Mobile Number</label>
                                <input type="text" class="form-input-custom" placeholder="name@domain.com or +91..." required>
                            </div>

                            <button type="submit" class="btn-auth-submit mb-3" id="btnForgotSubmit">Send OTP</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="javascript:void(0)" onclick="switchState('login')" class="forgot-link-custom"><i class="bi bi-arrow-left me-1"></i> Back to Login</a>
                        </div>
                    </div>

                    <!-- ============================================
                         4. OTP VERIFICATION STATE
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-verify">
                        <h2 class="auth-state-title">Verify Your Account</h2>
                        <p class="auth-state-subtitle">We have sent a verification code to your email/mobile. Enter it below.</p>
                        
                        <form id="verifyForm" onsubmit="handleAuthSubmit(event, 'verify')">
                            <!-- OTP Input Fields -->
                            <div class="otp-digits-row">
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="otp-digit-input" oninput="handleDigitInput(this)" onkeydown="handleDigitDelete(this, event)" required>
                            </div>

                            <button type="submit" class="btn-auth-submit mb-3" id="btnVerifySubmit">Verify OTP</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="small text-muted mb-0">Didn't receive the code? <a href="javascript:void(0)" onclick="resendOTP()" class="forgot-link-custom">Resend Code</a></p>
                        </div>
                    </div>

                    <!-- ============================================
                         5. RESET PASSWORD STATE
                         ============================================ -->
                    <div class="auth-state-wrapper d-none" id="state-reset">
                        <h2 class="auth-state-title">Re-enter Password</h2>
                        <p class="auth-state-subtitle">Create a new secure password for your account.</p>
                        
                        <form id="resetForm" onsubmit="handleAuthSubmit(event, 'reset')">
                            <div class="form-group-custom">
                                <label class="form-label-custom">New Password</label>
                                <input type="password" class="form-input-custom" placeholder="New secure password" required>
                            </div>
                            <div class="form-group-custom mb-4">
                                <label class="form-label-custom">Confirm Password</label>
                                <input type="password" class="form-input-custom" placeholder="Confirm new password" required>
                            </div>

                            <button type="submit" class="btn-auth-submit" id="btnResetSubmit">Reset Password</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
     AUTH TOAST NOTIFICATION CONTAINER
     ============================================ -->
<div class="auth-toast-container" id="authToastContainer"></div>

<!-- ============================================
     JAVASCRIPT TRANSITIONS & LOGIC
     ============================================ -->
<script>
    // 1. Switch States
    function switchState(stateName) {
        // Hide all screens
        document.querySelectorAll('.auth-state-wrapper').forEach(wrapper => {
            wrapper.classList.add('d-none');
        });

        // Show target screen
        const target = document.getElementById(`state-${stateName}`);
        if (target) {
            target.classList.remove('d-none');
        }

        // Dynamically update the dark blue title bar text
        const titleBar = document.getElementById("loginTitleBar");
        if (titleBar) {
            const regStates = ['register', 'register-verify', 'register-success', 'register-fail'];
            if (regStates.includes(stateName)) {
                titleBar.textContent = "Customer Registration";
            } else {
                titleBar.textContent = "Customer Login";
            }
        }

        // Focus first input of active state
        if (target) {
            setTimeout(() => {
                const activeInput = target.querySelector('input:not([readonly])');
                if (activeInput) activeInput.focus();
            }, 100);
        }
    }

    // 2. Initial State check via URL action parameter
    document.addEventListener("DOMContentLoaded", () => {
        const urlParams = new URLSearchParams(window.location.search);
        const action = urlParams.get('action');

        if (action === 'register') {
            switchState('register');
        } else {
            switchState('login');
        }
    });

    // 3. Digit Shift logic for OTP Verification
    function handleDigitInput(inputElement) {
        // Filter out non-numeric entries
        inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
        
        // Auto shift focus to next element if digit is filled
        if (inputElement.value.length === 1) {
            const next = inputElement.nextElementSibling;
            if (next && next.classList.contains('otp-digit-input')) {
                next.focus();
            }
        }
    }

    function handleDigitDelete(inputElement, event) {
        if (event.key === 'Backspace' && inputElement.value.length === 0) {
            const prev = inputElement.previousElementSibling;
            if (prev && prev.classList.contains('otp-digit-input')) {
                prev.focus();
            }
        }
    }

    // 4. Resend OTP simulation
    function resendOTP() {
        showAuthToast("✨ OTP verification code resent to your email & mobile number.", "info");
    }

    // 5. Simulate Social Authentication login
    function simulateSocialLogin(provider) {
        showAuthToast(`🔒 Connecting with ${provider} secure login portal...`, "info");
        setTimeout(() => {
            showAuthToast(`🎉 Success! Logged in securely using your ${provider} credentials. Redirection started...`, "success");
            setTimeout(() => {
                window.location.href = "{{ url('/') }}";
            }, 1500);
        }, 1200);
    }

    // 6. Main Form Submission simulation handler
    function handleAuthSubmit(e, actionType) {
        e.preventDefault();

        let submitBtn;
        let loadingText;
        let successMessage;
        let nextState = null;

        if (actionType === 'login') {
            submitBtn = document.getElementById("btnLoginSubmit");
            loadingText = "Logging in...";
            successMessage = "🎉 Login successful! Welcome back to Axvero.";
            nextState = "redirect";
        } else if (actionType === 'register') {
            submitBtn = document.getElementById("btnRegisterSubmit");
            loadingText = "Creating account...";
            successMessage = "✨ Account created! Please verify your email & mobile.";
            nextState = "register-verify";
        } else if (actionType === 'register-verify') {
            submitBtn = document.getElementById("btnRegVerifySubmit");
            loadingText = "Verifying...";
            // Simulate: 85% chance success, 15% chance fail for demo
            const isSuccess = Math.random() > 0.15;
            if (isSuccess) {
                successMessage = "✅ Verification successful! Your account is now active.";
                nextState = "register-success";
            } else {
                successMessage = "❌ Verification failed. The code is incorrect or expired.";
                nextState = "register-fail";
            }
        } else if (actionType === 'forgot') {
            submitBtn = document.getElementById("btnForgotSubmit");
            loadingText = "Sending Code...";
            successMessage = "✨ Verification code OTP sent successfully to your account.";
            nextState = "verify";
        } else if (actionType === 'verify') {
            submitBtn = document.getElementById("btnVerifySubmit");
            loadingText = "Verifying...";
            successMessage = "✔️ Code verified successfully. Please set a new password.";
            nextState = "reset";
        } else if (actionType === 'reset') {
            submitBtn = document.getElementById("btnResetSubmit");
            loadingText = "Resetting Password...";
            successMessage = "🔒 Password reset successful! Please login with your new credentials.";
            nextState = "login";
        }

        if (!submitBtn) return;

        // Apply loading spinner UI
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> ${loadingText}`;

        setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            
            showAuthToast(successMessage, actionType === 'register-verify' && nextState === 'register-fail' ? "error" : "success");

            setTimeout(() => {
                if (nextState === 'redirect') {
                    try {
                        localStorage.setItem('isLoggedIn', 'true');
                        localStorage.setItem('userName', 'Navneet Kumar');
                    } catch(e) {}
                    window.location.href = "{{ url('/') }}";
                } else if (nextState) {
                    switchState(nextState);
                }
            }, 800);
        }, 1200);
    }

    // 7. Custom Toast notifications
    function showAuthToast(message, type = 'success') {
        const container = document.getElementById("authToastContainer");
        const toast = document.createElement("div");
        toast.className = "auth-toast";
        
        let icon = '<i class="bi bi-lock-fill text-purple"></i>';
        if (type === 'success') {
            icon = '<i class="bi bi-check-circle-fill text-success" style="font-size: 1.3rem;"></i>';
        } else if (type === 'info') {
            icon = '<i class="bi bi-info-circle-fill text-primary" style="font-size: 1.3rem;"></i>';
        }

        toast.innerHTML = `
            ${icon}
            <div>${message}</div>
        `;
        container.appendChild(toast);

        // Slide away and delete
        setTimeout(() => {
            toast.style.animation = "toastSlideIn 0.3s reverse forwards";
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4000);
    }
</script>
@endsection
