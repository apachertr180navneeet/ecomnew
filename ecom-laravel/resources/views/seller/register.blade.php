@extends('layouts.app')

@section('title', 'Axvero — Seller Registration')

@push('styles')
<style>
    .seller-page-bg {
        background-color: #f3f4f6;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }
    .seller-wrapper-card {
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
    .seller-title-bar {
        background-color: #0b3c5d;
        color: #fff;
        padding: 14px 28px;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .seller-split-container {
        display: flex;
        flex-direction: row;
        min-height: 580px;
    }
    .seller-image-panel {
        width: 50%;
        background-color: #6A0DAD;
        background-image: linear-gradient(135deg, #6A0DAD 0%, #A855F0 100%);
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
        text-align: center;
        color: #fff;
    }
    .seller-image-panel .seller-badge-icon { font-size: 4rem; margin-bottom: 24px; opacity: 0.9; }
    .seller-image-panel h2 { font-size: 1.8rem; font-weight: 800; margin-bottom: 12px; letter-spacing: -0.5px; }
    .seller-image-panel p { font-size: 0.95rem; opacity: 0.85; max-width: 320px; line-height: 1.7; }
    .seller-image-panel .seller-benefits { margin-top: 32px; text-align: left; width: 100%; max-width: 320px; }
    .seller-image-panel .seller-benefits li {
        display: flex; align-items: center; gap: 10px; padding: 8px 0;
        font-size: 0.88rem; opacity: 0.9; border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .seller-image-panel .seller-benefits li i { font-size: 1.1rem; flex-shrink: 0; }
    .seller-form-panel {
        width: 50%;
        padding: 50px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        background: #fff;
    }
    .seller-state-wrapper {
        animation: stateFadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    @keyframes stateFadeIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .seller-state-title { font-size: 1.7rem; font-weight: 800; color: #111827; margin-bottom: 6px; letter-spacing: -0.5px; }
    .seller-state-subtitle { font-size: 0.9rem; color: #6b7280; margin-bottom: 28px; }
    .form-group-custom { margin-bottom: 18px; position: relative; }
    .form-label-custom { font-size: 0.8rem; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; display: block; }
    .form-input-custom {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e5e7eb; border-radius: 8px;
        font-size: 0.95rem; outline: none; transition: all 0.25s ease; background-color: #f9fafb; font-family: var(--ff-primary);
    }
    .form-input-custom:focus { border-color: #6A0DAD; background-color: #fff; box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05); }
    .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .form-select-custom {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e5e7eb; border-radius: 8px;
        font-size: 0.95rem; outline: none; transition: all 0.25s ease; background-color: #f9fafb;
        font-family: var(--ff-primary); appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat; background-position: right 14px center; cursor: pointer;
    }
    .form-select-custom:focus { border-color: #6A0DAD; background-color: #fff; box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05); }
    .form-textarea-custom {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e5e7eb; border-radius: 8px;
        font-size: 0.95rem; outline: none; transition: all 0.25s ease; background-color: #f9fafb;
        font-family: var(--ff-primary); resize: vertical; min-height: 80px;
    }
    .form-textarea-custom:focus { border-color: #6A0DAD; background-color: #fff; box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05); }
    .btn-seller-submit {
        background-color: #6A0DAD; color: #fff; border: none; padding: 14px; border-radius: 8px;
        font-weight: 700; font-size: 1rem; width: 100%; transition: all 0.25s ease; cursor: pointer;
        font-family: var(--ff-primary); box-shadow: 0 4px 12px rgba(106, 13, 173, 0.15);
    }
    .btn-seller-submit:hover { background-color: #4B097A; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(106, 13, 173, 0.2); }
    .seller-step-indicator { display: flex; align-items: center; justify-content: center; gap: 0; margin-bottom: 28px; }
    .seller-step-dot {
        width: 34px; height: 34px; border-radius: 50%; border: 2.5px solid #e5e7eb;
        display: flex; align-items: center; justify-content: center; font-size: 0.78rem;
        font-weight: 700; color: #9ca3af; background: #fff; transition: all 0.35s ease; position: relative; z-index: 2;
    }
    .seller-step-dot.active { border-color: #6A0DAD; color: #fff; background: #6A0DAD; box-shadow: 0 3px 10px rgba(106, 13, 173, 0.25); }
    .seller-step-dot.completed { border-color: #059669; color: #fff; background: #059669; box-shadow: 0 3px 10px rgba(5, 150, 105, 0.2); }
    .seller-step-line { width: 60px; height: 2.5px; background: #e5e7eb; transition: background 0.35s ease; }
    .seller-step-line.completed { background: #059669; }
    .checkbox-label-custom { color: #4b5563; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; user-select: none; font-size: 0.88rem; }
    .checkbox-input-custom { accent-color: #6A0DAD; width: 16px; height: 16px; }
    .seller-bottom-link { text-align: center; margin-top: 24px; font-size: 0.88rem; color: #6b7280; }
    .seller-bottom-link a { color: #6A0DAD; font-weight: 700; text-decoration: none; }
    .seller-bottom-link a:hover { text-decoration: underline; }
    .verify-result-wrapper { display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 30px 10px; min-height: 320px; }
    .verify-icon-circle { width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 24px; animation: iconPopIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
    .verify-icon-circle.success { background: linear-gradient(135deg, #d1fae5, #a7f3d0); box-shadow: 0 8px 32px rgba(16, 185, 129, 0.25); }
    .verify-icon-circle i { font-size: 2.8rem; }
    .verify-icon-circle.success i { color: #059669; }
    @keyframes iconPopIn { 0% { opacity: 0; transform: scale(0.3); } 60% { transform: scale(1.1); } 100% { opacity: 1; transform: scale(1); } }
    .verify-result-title { font-size: 1.5rem; font-weight: 800; margin-bottom: 10px; }
    .verify-result-title.success { color: #059669; }
    .verify-result-subtitle { color: #6b7280; font-size: 0.9rem; max-width: 380px; line-height: 1.6; margin-bottom: 28px; }
    .btn-result-action { padding: 13px 40px; border-radius: 8px; font-weight: 700; font-size: 0.95rem; border: none; cursor: pointer; transition: all 0.25s ease; display: inline-flex; align-items: center; gap: 8px; font-family: var(--ff-primary); }
    .btn-result-action.success { background-color: #059669; color: #fff; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.25); }
    .btn-result-action.success:hover { background-color: #047857; transform: translateY(-1px); }
    @media (max-width: 991.98px) {
        .seller-wrapper-card { max-width: 500px; }
        .seller-split-container { min-height: auto; }
        .seller-image-panel { display: none; }
        .seller-form-panel { width: 100%; padding: 40px 30px; }
        .seller-step-line { width: 40px; }
    }
    @media (max-width: 575.98px) {
        .seller-page-bg { padding: 20px 0; background-color: #fff; }
        .seller-wrapper-card { border: none; box-shadow: none; }
        .seller-title-bar { padding: 14px 20px; font-size: 1rem; }
        .seller-form-panel { padding: 30px 20px; }
        .seller-state-title { font-size: 1.4rem; }
        .form-row-2 { grid-template-columns: 1fr; }
        .seller-step-dot { width: 28px; height: 28px; font-size: 0.7rem; }
        .seller-step-line { width: 30px; }
    }
</style>
@endpush

@section('content')
<div class="seller-page-bg">
    <div class="container d-flex justify-content-center">
        <div class="seller-wrapper-card">
            <div class="seller-title-bar" id="sellerTitleBar">Seller Registration</div>

            <div class="seller-split-container">
                <div class="seller-image-panel">
                    <div class="seller-badge-icon">&#x1F6CD;</div>
                    <h2>Start Selling on Axvero</h2>
                    <p>Join thousands of sellers and reach millions of fashion-forward customers across India.</p>
                    <ul class="seller-benefits">
                        <li><i class="bi bi-graph-up-arrow"></i> Reach 50M+ active buyers</li>
                        <li><i class="bi bi-percent"></i> Zero listing fee &amp; low commission</li>
                        <li><i class="bi bi-truck"></i> Easy shipping &amp; fulfillment support</li>
                        <li><i class="bi bi-shield-check"></i> Secure payments &amp; timely settlements</li>
                        <li><i class="bi bi-bar-chart"></i> Seller dashboard &amp; insights</li>
                    </ul>
                </div>

                <div class="seller-form-panel" id="sellerFormPanel">
                    <div class="seller-state-wrapper" id="seller-state-step1">
                        <div class="seller-step-indicator">
                            <div class="seller-step-dot active" id="sStep1">1</div>
                            <div class="seller-step-line" id="sLine1"></div>
                            <div class="seller-step-dot" id="sStep2">2</div>
                            <div class="seller-step-line" id="sLine2"></div>
                            <div class="seller-step-dot" id="sStep3">3</div>
                            <div class="seller-step-line" id="sLine3"></div>
                            <div class="seller-step-dot" id="sStep4">4</div>
                        </div>
                        <h2 class="seller-state-title">Business Information</h2>
                        <p class="seller-state-subtitle">Tell us about your business to get started.</p>
                        <form id="sellerFormStep1" onsubmit="sellerNextStep(event, 2)">
                            <div class="form-group-custom">
                                <label class="form-label-custom">Business / Brand Name</label>
                                <input type="text" class="form-input-custom" placeholder="e.g. Axvero Fashions" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Business Type</label>
                                <select class="form-select-custom" required>
                                    <option value="">Select business type</option>
                                    <option>Individual / Sole Proprietor</option>
                                    <option>Partnership</option>
                                    <option>Private Limited (Pvt. Ltd.)</option>
                                    <option>Limited Liability Partnership (LLP)</option>
                                    <option>Public Limited</option>
                                </select>
                            </div>
                            <div class="form-row-2">
                                <div class="form-group-custom">
                                    <label class="form-label-custom">GSTIN (Optional)</label>
                                    <input type="text" class="form-input-custom" placeholder="22AAAAA0000A1Z5">
                                </div>
                                <div class="form-group-custom">
                                    <label class="form-label-custom">PAN Number</label>
                                    <input type="text" class="form-input-custom" placeholder="AAAAA0000A" required>
                                </div>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Business Address</label>
                                <textarea class="form-textarea-custom" placeholder="Full business address with pincode" required></textarea>
                            </div>
                            <button type="submit" class="btn-seller-submit">Next Step <i class="bi bi-arrow-right ms-1"></i></button>
                        </form>
                    </div>

                    <div class="seller-state-wrapper d-none" id="seller-state-step2">
                        <div class="seller-step-indicator">
                            <div class="seller-step-dot completed" id="sStep1v"><i class="bi bi-check-lg" style="font-size:0.85rem;"></i></div>
                            <div class="seller-step-line completed" id="sLine1v"></div>
                            <div class="seller-step-dot active" id="sStep2v">2</div>
                            <div class="seller-step-line" id="sLine2v"></div>
                            <div class="seller-step-dot" id="sStep3v">3</div>
                            <div class="seller-step-line" id="sLine3v"></div>
                            <div class="seller-step-dot" id="sStep4v">4</div>
                        </div>
                        <h2 class="seller-state-title">Owner / Contact Details</h2>
                        <p class="seller-state-subtitle">Who should we contact about your seller account?</p>
                        <form id="sellerFormStep2" onsubmit="sellerNextStep(event, 3)">
                            <div class="form-row-2">
                                <div class="form-group-custom">
                                    <label class="form-label-custom">First Name</label>
                                    <input type="text" class="form-input-custom" placeholder="First name" required>
                                </div>
                                <div class="form-group-custom">
                                    <label class="form-label-custom">Last Name</label>
                                    <input type="text" class="form-input-custom" placeholder="Last name" required>
                                </div>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Email Address</label>
                                <input type="email" class="form-input-custom" placeholder="owner@business.com" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Mobile Number</label>
                                <input type="tel" class="form-input-custom" placeholder="+91 99999 88888" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Category You'll Sell</label>
                                <select class="form-select-custom" required>
                                    <option value="">Select primary category</option>
                                    <option>Westernwear</option>
                                    <option>Indianwear</option>
                                    <option>Mens</option>
                                    <option>Women</option>
                                    <option>Kids</option>
                                    <option>Footwear</option>
                                    <option>Bags & Accessories</option>
                                    <option>Home Decor</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-seller-submit">Next Step <i class="bi bi-arrow-right ms-1"></i></button>
                        </form>
                        <div class="seller-bottom-link">
                            <a href="javascript:void(0)" onclick="sellerGoStep(1)"><i class="bi bi-arrow-left me-1"></i> Back to Business Info</a>
                        </div>
                    </div>

                    <div class="seller-state-wrapper d-none" id="seller-state-step3">
                        <div class="seller-step-indicator">
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed" id="sLine2vv"></div>
                            <div class="seller-step-dot active" id="sStep3vv">3</div>
                            <div class="seller-step-line" id="sLine3vv"></div>
                            <div class="seller-step-dot" id="sStep4vv">4</div>
                        </div>
                        <h2 class="seller-state-title">Store Setup</h2>
                        <p class="seller-state-subtitle">Set up your online store identity.</p>
                        <form id="sellerFormStep3" onsubmit="sellerNextStep(event, 4)">
                            <div class="form-group-custom">
                                <label class="form-label-custom">Store Name</label>
                                <input type="text" class="form-input-custom" placeholder="Your store name on Axvero" required>
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">Store Tagline</label>
                                <input type="text" class="form-input-custom" placeholder="Short tagline for your store">
                            </div>
                            <div class="form-group-custom">
                                <label class="form-label-custom">About Your Store</label>
                                <textarea class="form-textarea-custom" placeholder="Tell customers about your brand and products" rows="3"></textarea>
                            </div>
                            <div class="form-group-custom">
                                <label class="checkbox-label-custom">
                                    <input type="checkbox" class="checkbox-input-custom" required>
                                    I agree to the <a href="#" style="color:#6A0DAD;font-weight:600;">Seller Terms &amp; Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn-seller-submit">Next Step <i class="bi bi-arrow-right ms-1"></i></button>
                        </form>
                        <div class="seller-bottom-link">
                            <a href="javascript:void(0)" onclick="sellerGoStep(2)"><i class="bi bi-arrow-left me-1"></i> Back to Owner Details</a>
                        </div>
                    </div>

                    <div class="seller-state-wrapper d-none" id="seller-state-step4">
                        <div class="seller-step-indicator">
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot active">4</div>
                        </div>
                        <h2 class="seller-state-title">Verify Your Account</h2>
                        <p class="seller-state-subtitle">We've sent a 4-digit verification code to your email &amp; mobile. Enter it below.</p>
                        <form id="sellerVerifyForm" onsubmit="sellerVerifyOTP(event)">
                            <div style="display:flex;gap:14px;justify-content:center;margin-bottom:24px;">
                                <input type="text" maxlength="1" class="form-input-custom seller-otp-input" style="width:56px;height:56px;text-align:center;font-size:1.5rem;font-weight:800;" oninput="sellerDigitInput(this)" onkeydown="sellerDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="form-input-custom seller-otp-input" style="width:56px;height:56px;text-align:center;font-size:1.5rem;font-weight:800;" oninput="sellerDigitInput(this)" onkeydown="sellerDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="form-input-custom seller-otp-input" style="width:56px;height:56px;text-align:center;font-size:1.5rem;font-weight:800;" oninput="sellerDigitInput(this)" onkeydown="sellerDigitDelete(this, event)" required>
                                <input type="text" maxlength="1" class="form-input-custom seller-otp-input" style="width:56px;height:56px;text-align:center;font-size:1.5rem;font-weight:800;" oninput="sellerDigitInput(this)" onkeydown="sellerDigitDelete(this, event)" required>
                            </div>
                            <button type="submit" class="btn-seller-submit mb-3">Verify OTP</button>
                        </form>
                        <div class="text-center mt-2">
                            <p class="small text-muted mb-0">Didn't receive the code? <a href="javascript:void(0)" onclick="sellerResendOTP()" style="color:#6A0DAD;font-weight:600;">Resend Code</a></p>
                        </div>
                        <div class="seller-bottom-link">
                            <a href="javascript:void(0)" onclick="sellerGoStep(3)"><i class="bi bi-arrow-left me-1"></i> Back to Store Setup</a>
                        </div>
                    </div>

                    <div class="seller-state-wrapper d-none" id="seller-state-success">
                        <div class="seller-step-indicator">
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                            <div class="seller-step-line completed"></div>
                            <div class="seller-step-dot completed"><i class="bi bi-check-lg"></i></div>
                        </div>
                        <div class="verify-result-wrapper">
                            <div class="verify-icon-circle success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <h3 class="verify-result-title success">Application Submitted!</h3>
                            <p class="verify-result-subtitle">Thank you for registering as a seller. Our team will review your application and get back to you within 24-48 hours. You'll receive a confirmation email once approved.</p>
                            <button class="btn-result-action success" onclick="window.location.href='{{ url("/") }}'">
                                <i class="bi bi-house-door"></i> Go to Home
                            </button>
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
    let sellerCurrentStep = 1;
    function sellerNextStep(e, next) { e.preventDefault(); sellerGoStep(next); }
    function sellerGoStep(step) {
        document.querySelectorAll('.seller-state-wrapper').forEach(w => w.classList.add('d-none'));
        const suffix = step === 5 ? 'success' : 'step' + step;
        const target = document.getElementById('seller-state-' + suffix);
        if (target) target.classList.remove('d-none');
        sellerCurrentStep = step;
        const titleBar = document.getElementById('sellerTitleBar');
        const labels = { 1: 'Business Information', 2: 'Owner Details', 3: 'Store Setup', 4: 'Verify Account', 5: 'Application Submitted' };
        if (titleBar) titleBar.textContent = 'Seller Registration — ' + (labels[step] || '');
    }
    function sellerVerifyOTP(e) {
        e.preventDefault();
        if (Math.random() > 0.15) { sellerGoStep(5); } else { alert('Invalid OTP. Please try again.'); }
    }
    function sellerDigitInput(el) {
        el.value = el.value.replace(/[^0-9]/g, '');
        if (el.value.length === 1) { const next = el.nextElementSibling; if (next && next.classList.contains('seller-otp-input')) next.focus(); }
    }
    function sellerDigitDelete(el, e) {
        if (e.key === 'Backspace' && el.value.length === 0) { const prev = el.previousElementSibling; if (prev && prev.classList.contains('seller-otp-input')) prev.focus(); }
    }
    function sellerResendOTP() { alert('A new OTP has been sent to your registered email & mobile.'); }
</script>
@endpush
