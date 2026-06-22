@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
    .reg-page-bg {
        background-color: #f3f4f6;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }
    .reg-wrapper-card {
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
    .reg-title-bar {
        background-color: #0b3c5d;
        color: #fff;
        padding: 14px 28px;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .reg-split-container {
        display: flex;
        flex-direction: row;
        min-height: 580px;
    }
    .reg-image-panel {
        width: 50%;
        background: linear-gradient(135deg, #6A0DAD, #A855F0);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
        text-align: center;
        color: #fff;
    }
    .reg-image-panel .reg-icon {
        font-size: 4rem;
        margin-bottom: 20px;
    }
    .reg-image-panel h2 {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 12px;
    }
    .reg-image-panel p {
        font-size: 0.95rem;
        opacity: 0.85;
        max-width: 320px;
        line-height: 1.7;
    }
    .reg-form-panel {
        width: 50%;
        padding: 50px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }
    .reg-form-inner {
        animation: fadeIn 0.4s ease forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .reg-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }
    .reg-subtitle {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 28px;
    }
    .form-group {
        margin-bottom: 18px;
    }
    .form-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }
    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 0.95rem;
        outline: none;
        transition: all 0.25s ease;
        background-color: #f9fafb;
        font-family: var(--ff-primary);
    }
    .form-input:focus {
        border-color: #6A0DAD;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05);
    }
    .form-row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }
    .btn-reg {
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
        font-family: var(--ff-primary);
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.15);
        margin-top: 4px;
    }
    .btn-reg:hover {
        background-color: #4B097A;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(106, 13, 173, 0.2);
    }
    .checkbox-label {
        color: #4b5563;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        user-select: none;
        font-size: 0.88rem;
    }
    .checkbox-input {
        accent-color: #6A0DAD;
        width: 16px;
        height: 16px;
    }
    .reg-footer {
        text-align: center;
        margin-top: 24px;
        font-size: 0.88rem;
        color: #6b7280;
    }
    .reg-footer a {
        color: #6A0DAD;
        font-weight: 700;
        text-decoration: none;
    }
    .reg-footer a:hover { text-decoration: underline; }
    @media (max-width: 991.98px) {
        .reg-wrapper-card { max-width: 500px; }
        .reg-split-container { min-height: auto; }
        .reg-image-panel { display: none; }
        .reg-form-panel { width: 100%; padding: 40px 30px; }
    }
    @media (max-width: 575.98px) {
        .reg-page-bg { padding: 20px 0; background-color: #fff; }
        .reg-wrapper-card { border: none; box-shadow: none; }
        .reg-title-bar { padding: 14px 20px; font-size: 1rem; }
        .reg-form-panel { padding: 30px 20px; }
        .reg-title { font-size: 1.5rem; }
        .form-row-2 { grid-template-columns: 1fr; }
    }
</style>

<div class="reg-page-bg">
    <div class="container d-flex justify-content-center">
        <div class="reg-wrapper-card">
            <div class="reg-title-bar">Customer Registration</div>
            <div class="reg-split-container">
                <div class="reg-image-panel">
                    <div class="reg-icon">&#x1F9CD;</div>
                    <h2>Join Axvero</h2>
                    <p>Create your account and start exploring premium fashion collections curated just for you.</p>
                </div>
                <div class="reg-form-panel">
                    <div class="reg-form-inner">
                        <h2 class="reg-title">Create Account</h2>
                        <p class="reg-subtitle">Sign up to start shopping premium collections.</p>

                        <form id="registerForm" onsubmit="handleRegister(event)">
                            <div class="form-row-2">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-input" placeholder="First name" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-input" placeholder="Last name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-input" placeholder="name@domain.com" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mobile Number</label>
                                <input type="tel" class="form-input" placeholder="+91 99999 88888" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-input" placeholder="Create secure password" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-input" placeholder="Confirm your password" required>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-input" required>
                                    I agree to the <a href="#" style="color:#6A0DAD;font-weight:600;">Terms &amp; Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn-reg" id="regBtn">Create Account</button>
                        </form>

                        <p class="reg-footer">
                            Already have an account? <a href="{{ url('/login') }}">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleRegister(e) {
        e.preventDefault();
        const btn = document.getElementById('regBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Creating account...';
        setTimeout(() => {
            btn.disabled = false;
            btn.textContent = 'Create Account';
            window.location.href = '{{ url('/login') }}';
        }, 1500);
    }
</script>
@endsection
