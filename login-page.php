<?php include 'includes/header.php'; ?>

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
    .login-title-bar {
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
    .login-image-panel {
        width: 50%;
        background-color: #38bdf8;
        background-image: url('assets/login_hero.png');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .login-form-panel {
        width: 50%;
        padding: 50px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }
    .login-form-inner {
        animation: fadeIn 0.4s ease forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .login-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }
    .login-subtitle {
        font-size: 0.9rem;
        color: #6b7280;
        margin-bottom: 30px;
    }
    .form-group {
        margin-bottom: 20px;
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
    .login-options {
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
    .checkbox-input {
        accent-color: #6A0DAD;
        width: 16px;
        height: 16px;
    }
    .forgot-link {
        color: #6A0DAD;
        font-weight: 600;
        text-decoration: none;
    }
    .forgot-link:hover { color: #4B097A; }
    .btn-login {
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
    }
    .btn-login:hover {
        background-color: #4B097A;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(106, 13, 173, 0.2);
    }
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
    .social-divider:not(:empty)::before { margin-right: .75em; }
    .social-divider:not(:empty)::after { margin-left: .75em; }
    .social-buttons {
        display: flex;
        gap: 16px;
    }
    .btn-social {
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
        font-family: var(--ff-primary);
    }
    .btn-social:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        transform: translateY(-1px);
    }
    .btn-social i { font-size: 1.15rem; }
    .social-google i { color: #ea4335; }
    .social-facebook i { color: #1877f2; }
    .login-footer {
        text-align: center;
        margin-top: 28px;
        font-size: 0.88rem;
        color: #6b7280;
    }
    .login-footer a {
        color: #6A0DAD;
        font-weight: 700;
        text-decoration: none;
    }
    .login-footer a:hover { text-decoration: underline; }
    .error-msg {
        color: #dc2626;
        font-size: 0.82rem;
        margin-top: 4px;
        display: none;
    }
    @media (max-width: 991.98px) {
        .login-wrapper-card { max-width: 500px; }
        .login-split-container { min-height: auto; }
        .login-image-panel { display: none; }
        .login-form-panel { width: 100%; padding: 40px 30px; }
    }
    @media (max-width: 575.98px) {
        .login-page-bg { padding: 20px 0; background-color: #fff; }
        .login-wrapper-card { border: none; box-shadow: none; }
        .login-title-bar { padding: 14px 20px; font-size: 1rem; }
        .login-form-panel { padding: 30px 20px; }
        .login-title { font-size: 1.5rem; }
    }
</style>

<div class="login-page-bg">
    <div class="container d-flex justify-content-center">
        <div class="login-wrapper-card">
            <div class="login-title-bar">Customer Login</div>
            <div class="login-split-container">
                <div class="login-image-panel"></div>
                <div class="login-form-panel">
                    <div class="login-form-inner">
                        <h2 class="login-title">Login to continue</h2>
                        <p class="login-subtitle">Welcome back! Please login to your account.</p>

                        <form id="loginForm" onsubmit="handleLogin(event)">
                            <div class="form-group">
                                <label class="form-label">Email / Mobile Number</label>
                                <input type="text" class="form-input" id="loginEmail" placeholder="name@domain.com" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-input" id="loginPassword" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                            </div>
                            <div class="login-options">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-input"> Remember me
                                </label>
                                <a href="login.php?action=forgot" class="forgot-link">Forgot Password?</a>
                            </div>
                            <div class="error-msg" id="loginError">Invalid email or password. Please try again.</div>
                            <button type="submit" class="btn-login" id="loginBtn">Login</button>
                        </form>

                        <div class="social-divider">Or Continue with</div>

                        <div class="social-buttons">
                            <button class="btn-social social-google" onclick="socialLogin('Google')">
                                <i class="bi bi-google"></i> Google
                            </button>
                            <button class="btn-social social-facebook" onclick="socialLogin('Facebook')">
                                <i class="bi bi-facebook"></i> Facebook
                            </button>
                        </div>

                        <p class="login-footer">
                            Don't have an account? <a href="register-page.php">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleLogin(e) {
        e.preventDefault();
        const btn = document.getElementById('loginBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Logging in...';
        setTimeout(() => {
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('userName', 'Navneet Kumar');
            window.location.href = 'index.php';
        }, 1200);
    }

    function socialLogin(provider) {
        const btn = document.getElementById('loginBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Connecting...';
        setTimeout(() => {
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('userName', 'Navneet Kumar');
            window.location.href = 'index.php';
        }, 1500);
    }
</script>

<?php include 'includes/footer.php'; ?>
