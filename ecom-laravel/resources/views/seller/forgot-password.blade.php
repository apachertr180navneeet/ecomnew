@extends('layouts.app')

@section('title', 'Axvero — Forgot Password')

@push('styles')
<style>
    .fp-bg { background-color: #f3f4f6; min-height: 80vh; display: flex; align-items: center; justify-content: center; padding: 40px 0; }
    .fp-card { background: #fff; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); width: 100%; max-width: 1050px; overflow: hidden; border: 1px solid #e5e7eb; display: flex; flex-direction: column; }
    .fp-title-bar { background-color: #0b3c5d; color: #fff; padding: 14px 28px; font-size: 1.15rem; font-weight: 700; letter-spacing: 0.5px; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .fp-split { display: flex; flex-direction: row; min-height: 580px; }
    .fp-left { width: 50%; background: linear-gradient(135deg, #1a1a2e 0%, #2d2d44 100%); display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 40px; text-align: center; color: #fff; }
    .fp-left .fp-icon { font-size: 4rem; margin-bottom: 20px; opacity: 0.9; }
    .fp-left h2 { font-size: 1.8rem; font-weight: 800; margin-bottom: 12px; letter-spacing: -0.5px; }
    .fp-left p { font-size: 0.95rem; opacity: 0.8; max-width: 320px; line-height: 1.7; }
    .fp-left .fp-steps { margin-top: 32px; width: 100%; max-width: 280px; text-align: left; }
    .fp-left .fp-steps li { display: flex; align-items: center; gap: 12px; padding: 10px 0; font-size: 0.88rem; opacity: 0.75; border-bottom: 1px solid rgba(255,255,255,0.08); }
    .fp-left .fp-steps li.active { opacity: 1; }
    .fp-left .fp-steps li i { font-size: 1.1rem; flex-shrink: 0; width: 20px; text-align: center; }
    .fp-right { width: 50%; padding: 50px 60px; display: flex; flex-direction: column; justify-content: center; background: #fff; }
    .fp-state { animation: fpFadeIn 0.4s ease forwards; }
    @@keyframes fpFadeIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .fp-title { font-size: 1.7rem; font-weight: 800; color: #111827; margin-bottom: 6px; letter-spacing: -0.5px; }
    .fp-subtitle { font-size: 0.9rem; color: #6b7280; margin-bottom: 28px; }
    .form-group { margin-bottom: 20px; }
    .form-label { font-size: 0.8rem; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; display: block; }
    .form-input { width: 100%; padding: 12px 16px; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; outline: none; transition: all 0.25s ease; background-color: #f9fafb; font-family: var(--ff-primary); }
    .form-input:focus { border-color: #6A0DAD; background-color: #fff; box-shadow: 0 4px 12px rgba(106,13,173,0.05); }
    .fp-btn { background-color: #1a1a2e; color: #fff; border: none; padding: 14px; border-radius: 8px; font-weight: 700; font-size: 1rem; width: 100%; transition: all 0.25s ease; cursor: pointer; font-family: var(--ff-primary); box-shadow: 0 4px 12px rgba(26,26,46,0.2); }
    .fp-btn:hover { background-color: #2d2d44; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(26,26,46,0.3); }
    .fp-back { text-align: center; margin-top: 24px; font-size: 0.88rem; color: #6b7280; }
    .fp-back a { color: #6A0DAD; font-weight: 700; text-decoration: none; }
    .fp-back a:hover { text-decoration: underline; }
    .otp-row { display: flex; gap: 14px; justify-content: center; margin-bottom: 24px; }
    .otp-input { width: 56px; height: 56px; text-align: center; font-size: 1.5rem; font-weight: 800; }
    .verify-result { display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 40px 20px; min-height: 360px; }
    .verify-icon { width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 24px; animation: popIn 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; }
    .verify-icon.success { background: linear-gradient(135deg,#d1fae5,#a7f3d0); box-shadow: 0 8px 32px rgba(16,185,129,0.25); }
    .verify-icon i { font-size: 2.8rem; }
    .verify-icon.success i { color: #059669; }
    @@keyframes popIn { 0% { opacity: 0; transform: scale(0.3); } 60% { transform: scale(1.1); } 100% { opacity: 1; transform: scale(1); } }
    .verify-title { font-size: 1.5rem; font-weight: 800; margin-bottom: 10px; }
    .verify-title.success { color: #059669; }
    .verify-desc { color: #6b7280; font-size: 0.9rem; max-width: 380px; line-height: 1.6; margin-bottom: 28px; }
    .fp-btn-success { padding: 13px 40px; border-radius: 8px; font-weight: 700; font-size: 0.95rem; border: none; cursor: pointer; transition: all 0.25s ease; font-family: var(--ff-primary); background-color: #059669; color: #fff; box-shadow: 0 4px 14px rgba(5,150,105,0.25); }
    .fp-btn-success:hover { background-color: #047857; transform: translateY(-1px); }
    @@media (max-width: 991.98px) { .fp-card { max-width: 500px; } .fp-split { min-height: auto; } .fp-left { display: none; } .fp-right { width: 100%; padding: 40px 30px; } }
    @@media (max-width: 575.98px) { .fp-bg { padding: 20px 0; background-color: #fff; } .fp-card { border: none; box-shadow: none; } .fp-title-bar { padding: 14px 20px; font-size: 1rem; } .fp-right { padding: 30px 20px; } .fp-title { font-size: 1.4rem; } }
</style>
@endpush

@section('content')
<div class="fp-bg">
    <div class="container d-flex justify-content-center">
        <div class="fp-card">
            <div class="fp-title-bar" id="fpTitleBar">Forgot Password</div>
            <div class="fp-split">
                <div class="fp-left">
                    <div class="fp-icon">&#x1F512;</div>
                    <h2>Reset Your Password</h2>
                    <p>Follow the steps below to securely reset your seller account password.</p>
                    <ul class="fp-steps" id="fpStepList">
                        <li id="fpStep1Text"><i class="bi bi-envelope"></i> Enter your email / mobile</li>
                        <li id="fpStep2Text"><i class="bi bi-shield-check"></i> Verify OTP code</li>
                        <li id="fpStep3Text"><i class="bi bi-key"></i> Set new password</li>
                    </ul>
                </div>
                <div class="fp-right" id="fpRightPanel">

                    <div class="fp-state" id="fp-step1">
                        <h2 class="fp-title">Forgot Your Password?</h2>
                        <p class="fp-subtitle">Enter your registered email address or mobile number. We'll send you a verification code.</p>
                        <form onsubmit="fpGoStep(2); return false;">
                            <div class="form-group">
                                <label class="form-label">Email / Mobile Number</label>
                                <input type="text" class="form-input" placeholder="seller@business.com" required>
                            </div>
                            <button type="submit" class="fp-btn" id="fpBtn1">Send OTP</button>
                        </form>
                        <div class="fp-back"><a href="{{ url('/seller/login') }}"><i class="bi bi-arrow-left me-1"></i> Back to Login</a></div>
                    </div>

                    <div class="fp-state d-none" id="fp-step2">
                        <h2 class="fp-title">Verify Your Account</h2>
                        <p class="fp-subtitle">We've sent a 4-digit verification code to your email/mobile. Enter it below.</p>
                        <form onsubmit="fpGoStep(3); return false;">
                            <div class="otp-row">
                                <input type="text" maxlength="1" class="form-input otp-input" oninput="fpOtpInput(this)" onkeydown="fpOtpDel(this, event)" required>
                                <input type="text" maxlength="1" class="form-input otp-input" oninput="fpOtpInput(this)" onkeydown="fpOtpDel(this, event)" required>
                                <input type="text" maxlength="1" class="form-input otp-input" oninput="fpOtpInput(this)" onkeydown="fpOtpDel(this, event)" required>
                                <input type="text" maxlength="1" class="form-input otp-input" oninput="fpOtpInput(this)" onkeydown="fpOtpDel(this, event)" required>
                            </div>
                            <button type="submit" class="fp-btn" id="fpBtn2">Verify OTP</button>
                        </form>
                        <div class="text-center mt-2">
                            <p class="small text-muted">Didn't receive? <a href="javascript:void(0)" onclick="alert('OTP resent!')" style="color:#6A0DAD;font-weight:600;">Resend Code</a></p>
                        </div>
                        <div class="fp-back"><a href="javascript:void(0)" onclick="fpGoStep(1)"><i class="bi bi-arrow-left me-1"></i> Back</a></div>
                    </div>

                    <div class="fp-state d-none" id="fp-step3">
                        <h2 class="fp-title">Set New Password</h2>
                        <p class="fp-subtitle">Create a strong password for your seller account.</p>
                        <form onsubmit="fpGoStep(4); return false;">
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-input" placeholder="At least 8 characters" required minlength="8">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-input" placeholder="Re-enter new password" required minlength="8">
                            </div>
                            <button type="submit" class="fp-btn" id="fpBtn3">Reset Password</button>
                        </form>
                        <div class="fp-back"><a href="javascript:void(0)" onclick="fpGoStep(2)"><i class="bi bi-arrow-left me-1"></i> Back</a></div>
                    </div>

                    <div class="fp-state d-none" id="fp-step4">
                        <div class="verify-result">
                            <div class="verify-icon success"><i class="bi bi-check-lg"></i></div>
                            <h3 class="verify-title success">Password Reset Successfully!</h3>
                            <p class="verify-desc">Your seller account password has been updated. Please login with your new credentials.</p>
                            <button class="fp-btn-success" onclick="window.location.href='{{ url("/seller/login") }}'"><i class="bi bi-box-arrow-in-right me-2"></i>Go to Login</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function fpGoStep(step) {
        document.querySelectorAll('.fp-state').forEach(el => el.classList.add('d-none'));
        const target = document.getElementById('fp-step' + step);
        if (target) target.classList.remove('d-none');

        [1,2,3].forEach(i => {
            const li = document.getElementById('fpStep' + i + 'Text');
            if (li) li.classList.toggle('active', i < step);
        });

        const titleBar = document.getElementById('fpTitleBar');
        const labels = {1:'Forgot Password', 2:'Verify OTP', 3:'Set New Password', 4:'Password Reset Successful'};
        if (titleBar) titleBar.textContent = labels[step] || '';
    }

    function fpOtpInput(el) {
        el.value = el.value.replace(/[^0-9]/g, '');
        if (el.value.length === 1) {
            const next = el.nextElementSibling;
            if (next && next.classList.contains('otp-input')) next.focus();
        }
    }

    function fpOtpDel(el, e) {
        if (e.key === 'Backspace' && el.value.length === 0) {
            const prev = el.previousElementSibling;
            if (prev && prev.classList.contains('otp-input')) prev.focus();
        }
    }
</script>
@endpush