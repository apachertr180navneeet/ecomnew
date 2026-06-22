@extends('layouts.app')

@section('title', 'Axvero — Seller Login')

@push('styles')
<style>
    .seller-login-bg {
        background-color: #f3f4f6;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }
    .seller-login-card {
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
    .seller-login-title-bar {
        background-color: #0b3c5d;
        color: #fff;
        padding: 14px 28px;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .seller-login-split {
        display: flex;
        flex-direction: row;
        min-height: 580px;
    }
    .seller-login-left {
        width: 50%;
        background: linear-gradient(135deg, #1a1a2e 0%, #2d2d44 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
        text-align: center;
        color: #fff;
    }
    .seller-login-left .seller-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.9;
    }
    .seller-login-left h2 {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }
    .seller-login-left p {
        font-size: 0.95rem;
        opacity: 0.8;
        max-width: 320px;
        line-height: 1.7;
    }
    .seller-login-left .seller-quick-links {
        margin-top: 32px;
        width: 100%;
        max-width: 280px;
    }
    .seller-login-left .seller-quick-links a {
        display: block;
        color: rgba(255,255,255,0.75);
        text-decoration: none;
        padding: 10px 0;
        font-size: 0.88rem;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        transition: color 0.2s;
    }
    .seller-login-left .seller-quick-links a:hover { color: #fff; }
    .seller-login-left .seller-quick-links a i { margin-right: 10px; font-size: 1rem; }
    .seller-login-right {
        width: 50%;
        padding: 50px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }
    .seller-login-form-wrap {
        animation: fadeIn 0.4s ease forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .seller-login-title {
        font-size: 1.7rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }
    .seller-login-subtitle {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 28px;
    }
    .form-group { margin-bottom: 20px; position: relative; }
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
    .seller-login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        font-size: 0.88rem;
    }
    .checkbox-label {
        color: #4b5563;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        user-select: none;
    }
    .checkbox-input { accent-color: #6A0DAD; width: 16px; height: 16px; }
    .forgot-link { color: #6A0DAD; font-weight: 600; text-decoration: none; }
    .forgot-link:hover { color: #4B097A; }
    .btn-seller-login {
        background-color: #1a1a2e;
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
        box-shadow: 0 4px 12px rgba(26, 26, 46, 0.2);
    }
    .btn-seller-login:hover {
        background-color: #2d2d44;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(26, 26, 46, 0.3);
    }
    .seller-login-footer {
        text-align: center;
        margin-top: 28px;
        font-size: 0.88rem;
        color: #6b7280;
    }
    .seller-login-footer a { color: #6A0DAD; font-weight: 700; text-decoration: none; }
    .seller-login-footer a:hover { text-decoration: underline; }
    @media (max-width: 991.98px) {
        .seller-login-card { max-width: 500px; }
        .seller-login-split { min-height: auto; }
        .seller-login-left { display: none; }
        .seller-login-right { width: 100%; padding: 40px 30px; }
    }
    @media (max-width: 575.98px) {
        .seller-login-bg { padding: 20px 0; background-color: #fff; }
        .seller-login-card { border: none; box-shadow: none; }
        .seller-login-title-bar { padding: 14px 20px; font-size: 1rem; }
        .seller-login-right { padding: 30px 20px; }
        .seller-login-title { font-size: 1.4rem; }
    }
</style>
@endpush

@section('content')
<div class="seller-login-bg">
    <div class="container d-flex justify-content-center">
        <div class="seller-login-card">
            <div class="seller-login-title-bar">Seller Login</div>
            <div class="seller-login-split">
                <div class="seller-login-left">
                    <div class="seller-icon">&#x1F6CD;</div>
                    <h2>Seller Dashboard</h2>
                    <p>Manage your store, track orders, and grow your business on Axvero.</p>
                    <div class="seller-quick-links">
                        <a href="{{ url('/seller/register') }}"><i class="bi bi-person-plus"></i> New? Register as a Seller</a>
                        <a href="#"><i class="bi bi-question-circle"></i> Seller Help Center</a>
                        <a href="#"><i class="bi bi-bar-chart"></i> Become a Top Seller</a>
                    </div>
                </div>
                <div class="seller-login-right">
                    <div class="seller-login-form-wrap">
                        <h2 class="seller-login-title">Seller Login</h2>
                        <p class="seller-login-subtitle">Sign in to your seller account to manage your store.</p>
                        <form id="sellerLoginForm" onsubmit="handleSellerLogin(event)">
                            <div class="form-group">
                                <label class="form-label">Email / Mobile Number</label>
                                <input type="text" class="form-input" placeholder="seller@business.com" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-input" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                            </div>
                            <div class="seller-login-options">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-input"> Remember me
                                </label>
                                <a href="{{ url('/seller/forgot-password') }}" class="forgot-link">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn-seller-login" id="sellerLoginBtn">Sign In</button>
                        </form>
                        <p class="seller-login-footer">
                            Don't have a seller account? <a href="{{ url('/seller/register') }}">Register Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function handleSellerLogin(e) {
        e.preventDefault();
        const btn = document.getElementById('sellerLoginBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Signing in...';
        setTimeout(() => {
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('userName', 'Seller Account');
            window.location.href = '{{ url("/seller/dashboard") }}';
        }, 1200);
    }
</script>
@endpush
