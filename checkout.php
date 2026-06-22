<?php include 'includes/header.php'; ?>

<!-- Checkout Page Styles -->
<style>
    /* ========== BREADCRUMB ========== */
    .axv-breadcrumb {
        padding: 18px 0;
        background: #f9fafb;
        border-bottom: 1px solid var(--clr-border);
    }
    .axv-breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 8px;
        list-style: none;
        margin: 0;
        padding: 0;
        font-size: 0.85rem;
    }
    .axv-breadcrumb-list li a {
        color: var(--clr-text-light);
        text-decoration: none;
        transition: color 0.2s;
    }
    .axv-breadcrumb-list li a:hover { color: var(--clr-primary); }
    .axv-breadcrumb-list li.active { color: var(--clr-text); font-weight: 600; }
    .axv-breadcrumb-list .bc-sep { color: #cbd5e1; font-size: 0.7rem; }

    /* ========== CHECKOUT LAYOUT ========== */
    .checkout-page-section {
        padding: 40px 0 80px;
        background: #f9fafb;
        min-height: 75vh;
    }
    .checkout-layout {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 32px;
        align-items: start;
    }
    .checkout-main-content {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 32px;
    }

    /* ========== PROGRESS STEPPER ========== */
    .checkout-stepper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        position: relative;
        padding: 0 10px;
    }
    .checkout-stepper::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--clr-border);
        z-index: 1;
        transition: all 0.4s ease;
    }
    .stepper-progress-bar {
        position: absolute;
        top: 20px;
        left: 0;
        height: 3px;
        background: var(--clr-primary);
        z-index: 2;
        width: 0%;
        transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .step-item {
        position: relative;
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        flex: 1;
    }
    .step-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid var(--clr-border);
        color: var(--clr-text-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .step-label {
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--clr-text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: color 0.35s;
    }
    .step-item.active .step-icon {
        border-color: var(--clr-primary);
        background: var(--clr-primary);
        color: #fff;
        box-shadow: 0 0 0 4px rgba(106, 13, 173, 0.15);
    }
    .step-item.active .step-label {
        color: var(--clr-primary);
        font-weight: 700;
    }
    .step-item.completed .step-icon {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.08);
        color: var(--clr-primary);
    }
    .step-item.completed .step-label {
        color: var(--clr-primary);
    }

    /* ========== STEPS SECTIONS ========== */
    .checkout-step-panel {
        display: none;
        animation: stepPanelFade 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    .checkout-step-panel.active {
        display: block;
    }
    @keyframes stepPanelFade {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .step-panel-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .step-panel-title i { color: var(--clr-primary); }

    /* ========== ADDRESS CARD SELECT ========== */
    .address-select-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }
    .address-select-card {
        border: 2px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 18px;
        cursor: pointer;
        position: relative;
        transition: all 0.25s;
        background: #fff;
    }
    .address-select-card:hover {
        border-color: var(--clr-primary-light);
        box-shadow: var(--shadow-sm);
    }
    .address-select-card.selected {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.02);
    }
    .address-select-card .select-indicator {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        border: 2px solid var(--clr-border);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .address-select-card.selected .select-indicator {
        border-color: var(--clr-primary);
        background: var(--clr-primary);
    }
    .address-select-card.selected .select-indicator::after {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #fff;
    }
    .address-select-card .address-badge {
        display: inline-block;
        padding: 2px 8px;
        font-size: 0.68rem;
        font-weight: 700;
        border-radius: var(--radius-pill);
        background: var(--clr-gray);
        color: var(--clr-text-light);
        margin-bottom: 10px;
    }
    .address-select-card.selected .address-badge {
        background: rgba(106, 13, 173, 0.08);
        color: var(--clr-primary);
    }
    .address-select-card .address-name {
        font-weight: 700;
        font-size: 0.88rem;
        color: var(--clr-text);
        margin-bottom: 4px;
    }
    .address-select-card .address-details {
        font-size: 0.8rem;
        color: var(--clr-text-light);
        line-height: 1.5;
        margin-bottom: 6px;
    }
    .address-select-card .address-phone {
        font-size: 0.78rem;
        color: var(--clr-text-light);
    }

    /* Add new address option */
    .add-new-address-toggle {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--clr-primary);
        font-weight: 700;
        font-size: 0.88rem;
        cursor: pointer;
        transition: all 0.2s;
        margin-bottom: 24px;
        border: none;
        background: transparent;
        padding: 0;
    }
    .add-new-address-toggle:hover {
        color: var(--clr-primary-dark);
        text-decoration: underline;
    }

    /* Address Form */
    .address-form-box {
        background: #f9fafb;
        border-radius: var(--radius-md);
        border: 1px dashed var(--clr-border);
        padding: 24px;
        display: none;
        margin-bottom: 24px;
    }
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }
    .form-full-width {
        grid-column: span 2;
    }
    .checkout-form-group {
        margin-bottom: 14px;
    }
    .checkout-form-label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--clr-text-light);
        margin-bottom: 6px;
        display: block;
        letter-spacing: 0.5px;
    }
    .checkout-form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        font-size: 0.88rem;
        outline: none;
        transition: all 0.2s;
        font-family: var(--ff-primary);
        background: #fff;
    }
    .checkout-form-input:focus {
        border-color: var(--clr-primary-light);
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05);
    }

    /* ========== PAYMENT OPTIONS ========== */
    .payment-options-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 28px;
    }
    .payment-option-item {
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 16px 20px;
        cursor: pointer;
        transition: all 0.25s;
        background: #fff;
    }
    .payment-option-item:hover {
        border-color: var(--clr-primary-light);
    }
    .payment-option-item.selected {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.02);
    }
    .payment-option-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .payment-option-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .payment-radio {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        border: 2px solid var(--clr-border);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.2s;
    }
    .payment-option-item.selected .payment-radio {
        border-color: var(--clr-primary);
        background: var(--clr-primary);
    }
    .payment-option-item.selected .payment-radio::after {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #fff;
    }
    .payment-option-title {
        font-weight: 700;
        font-size: 0.95rem;
        color: var(--clr-text);
    }
    .payment-option-icons {
        display: flex;
        gap: 6px;
        color: var(--clr-text-light);
        font-size: 1.25rem;
    }
    .payment-option-details {
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid var(--clr-border);
        display: none;
    }
    .payment-option-item.selected .payment-option-details {
        display: block;
        animation: detailsExpand 0.3s ease-out forwards;
    }
    @keyframes detailsExpand {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* CARD PREVIEW ANIMATION */
    .card-preview-container {
        perspective: 1000px;
        margin-bottom: 24px;
        display: flex;
        justify-content: center;
    }
    .credit-card-mock {
        width: 320px;
        height: 180px;
        position: relative;
        transform-style: preserve-3d;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: var(--radius-md);
        box-shadow: 0 10px 24px rgba(106, 13, 173, 0.25);
    }
    .credit-card-mock.flipped {
        transform: rotateY(180deg);
    }
    .card-front, .card-back {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        backface-visibility: hidden;
        border-radius: var(--radius-md);
        padding: 22px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: #fff;
        background: linear-gradient(135deg, #6A0DAD 0%, #4B097A 100%);
        overflow: hidden;
    }
    .card-front::before, .card-back::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        z-index: 1;
    }
    .card-front::after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: -20px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
        z-index: 1;
    }
    .card-front > *, .card-back > * {
        z-index: 2;
        position: relative;
    }
    .card-chip {
        width: 40px;
        height: 30px;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        border-radius: 6px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.15);
    }
    .card-chip::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    }
    .card-logo {
        font-weight: 800;
        font-style: italic;
        font-size: 1.15rem;
        letter-spacing: 0.5px;
    }
    .card-number-display {
        font-family: 'Courier New', Courier, monospace;
        font-size: 1.25rem;
        letter-spacing: 2px;
        word-spacing: 4px;
        margin: 18px 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    .card-meta-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .card-holder-label, .card-expiry-label {
        font-size: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        opacity: 0.7;
        margin-bottom: 2px;
    }
    .card-holder-val, .card-expiry-val {
        font-size: 0.82rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        max-width: 180px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-back {
        transform: rotateY(180deg);
        background: linear-gradient(135deg, #4B097A 0%, #290445 100%);
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    .card-black-strip {
        height: 38px;
        background: #000;
        width: 100%;
        margin-top: 20px;
    }
    .card-signature-box {
        margin: 18px 22px;
        background: rgba(255,255,255,0.15);
        height: 38px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 12px;
    }
    .card-signature-box::before {
        content: 'XXXX XXXX XXXX';
        color: rgba(255,255,255,0.4);
        font-family: 'Courier New', Courier, monospace;
        font-size: 0.75rem;
        margin-right: auto;
        margin-left: 10px;
    }
    .cvv-val-display {
        color: #000;
        background: #fff;
        padding: 3px 10px;
        font-weight: 700;
        font-size: 0.85rem;
        border-radius: 2px;
        letter-spacing: 1px;
    }
    .card-back-branding {
        padding: 0 22px 22px;
        font-size: 0.65rem;
        opacity: 0.6;
        line-height: 1.4;
        margin-top: auto;
    }

    /* ========== STEP 3 REVIEW STYLING ========== */
    .review-summary-block {
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 20px;
        margin-bottom: 20px;
        background: #f9fafb;
    }
    .review-block-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
        padding-bottom: 10px;
        border-bottom: 1.5px solid var(--clr-border);
    }
    .review-block-title {
        font-size: 0.95rem;
        font-weight: 800;
        color: var(--clr-text);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .review-block-title i { color: var(--clr-primary); }
    .review-edit-btn {
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--clr-primary);
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
    }
    .review-edit-btn:hover {
        color: var(--clr-primary-dark);
        text-decoration: underline;
    }
    .review-info-text {
        font-size: 0.85rem;
        color: var(--clr-text);
        line-height: 1.6;
    }

    /* ========== BUTTON CONTROLS ========== */
    .checkout-btn-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 32px;
        border-top: 1.5px solid var(--clr-border);
        padding-top: 24px;
    }
    .btn-checkout-prev {
        padding: 11px 24px;
        background: transparent;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        color: var(--clr-text-light);
        font-weight: 700;
        font-size: 0.88rem;
        cursor: pointer;
        transition: all 0.25s;
        font-family: var(--ff-primary);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-checkout-prev:hover {
        border-color: var(--clr-primary);
        color: var(--clr-primary);
    }
    .btn-checkout-next {
        padding: 12px 32px;
        background: var(--clr-primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.25s;
        font-family: var(--ff-primary);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 14px rgba(106, 13, 173, 0.2);
    }
    .btn-checkout-next:hover {
        background: var(--clr-primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(106, 13, 173, 0.28);
    }

    /* ========== RIGHT SIDEBAR SUMMARY ========== */
    .checkout-summary-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 24px;
        position: sticky;
        top: 100px;
    }
    .checkout-summary-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1.5px solid var(--clr-border);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .checkout-summary-title i { color: var(--clr-primary); }
    .checkout-items-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
        max-height: 220px;
        overflow-y: auto;
        margin-bottom: 20px;
        padding-right: 4px;
    }
    /* Custom scrollbar */
    .checkout-items-list::-webkit-scrollbar { width: 5px; }
    .checkout-items-list::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
    .checkout-items-list::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    
    .checkout-item-small {
        display: flex;
        gap: 12px;
        align-items: center;
    }
    .checkout-item-small-img {
        width: 48px;
        height: 58px;
        border-radius: 4px;
        overflow: hidden;
        background: var(--clr-gray);
        flex-shrink: 0;
    }
    .checkout-item-small-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .checkout-item-small-info {
        flex: 1;
        min-width: 0;
    }
    .checkout-item-small-name {
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--clr-text);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 2px;
    }
    .checkout-item-small-meta {
        font-size: 0.72rem;
        color: var(--clr-text-light);
    }
    .checkout-item-small-price {
        font-size: 0.82rem;
        font-weight: 800;
        color: var(--clr-text);
        text-align: right;
        flex-shrink: 0;
    }

    .summary-divider {
        height: 1px;
        background: var(--clr-border);
        margin: 12px 0;
    }
    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 6px 0;
        font-size: 0.84rem;
    }
    .summary-row .label { color: var(--clr-text-light); }
    .summary-row .value { font-weight: 600; color: var(--clr-text); }
    .summary-row .value.text-green { color: #059669; }
    .summary-total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0 2px;
    }
    .summary-total-row .label { font-size: 0.95rem; font-weight: 800; color: var(--clr-text); }
    .summary-total-row .value { font-size: 1.15rem; font-weight: 800; color: var(--clr-primary); }

    /* ========== STEP 4 SUCCESS STYLING ========== */
    .success-wrapper {
        text-align: center;
        padding: 40px 10px;
    }
    
    /* SUCCESS CIRCLE CHECKMARK */
    .success-checkmark-wrapper {
        width: 100px;
        height: 100px;
        margin: 0 auto 30px;
    }
    .success-checkmark {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #059669;
        stroke-miterlimit: 10;
        box-shadow: inset 0px 0px 0px #059669;
        animation: fillCheckmark .4s ease-in-out .4s forwards, scaleCheckmark .3s ease-in-out .9s forwards;
    }
    .success-checkmark-circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #059669;
        fill: none;
        animation: strokeCircle .6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }
    .success-checkmark-check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke: #fff;
        fill: none;
        animation: strokeCheck .3s cubic-bezier(0.65, 0, 0.45, 1) .8s forwards;
    }
    @keyframes strokeCircle {
        100% { stroke-dashoffset: 0; }
    }
    @keyframes strokeCheck {
        100% { stroke-dashoffset: 0; }
    }
    @keyframes fillCheckmark {
        100% { box-shadow: inset 0px 0px 0px 60px #059669; }
    }
    @keyframes scaleCheckmark {
        0%, 100% { transform: none; }
        50% { transform: scale3d(1.1, 1.1, 1); }
    }

    .success-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }
    .success-desc {
        font-size: 0.92rem;
        color: var(--clr-text-light);
        max-width: 480px;
        margin: 0 auto 32px;
        line-height: 1.6;
    }
    .success-details-card {
        background: #f9fafb;
        border-radius: var(--radius-md);
        border: 1.5px solid var(--clr-border);
        padding: 24px;
        max-width: 480px;
        margin: 0 auto 36px;
        text-align: left;
    }
    .success-detail-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 0.88rem;
        border-bottom: 1px dashed var(--clr-border);
    }
    .success-detail-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .success-detail-row .label { color: var(--clr-text-light); }
    .success-detail-row .value { font-weight: 700; color: var(--clr-text); }
    
    .success-actions {
        display: flex;
        justify-content: center;
        gap: 16px;
    }
    .btn-success-action {
        padding: 12px 28px;
        border-radius: var(--radius-sm);
        font-size: 0.88rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s;
        text-decoration: none;
        font-family: var(--ff-primary);
    }
    .btn-success-action.primary {
        background: var(--clr-primary);
        color: #fff;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.2);
    }
    .btn-success-action.primary:hover {
        background: var(--clr-primary-dark);
        transform: translateY(-1px);
        color: #fff;
    }
    .btn-success-action.secondary {
        background: transparent;
        border: 1.5px solid var(--clr-border);
        color: var(--clr-text-light);
    }
    .btn-success-action.secondary:hover {
        border-color: var(--clr-primary);
        color: var(--clr-primary);
    }

    /* Confetti Canvas overlay */
    #confettiCanvas {
        position: fixed;
        top: 0; left: 0;
        width: 100vw; height: 100vh;
        pointer-events: none;
        z-index: 9999;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .checkout-layout {
            grid-template-columns: 1fr;
        }
        .checkout-summary-card {
            position: static;
        }
    }
    @media (max-width: 575.98px) {
        .checkout-page-section { padding: 20px 0 60px; }
        .checkout-main-content { padding: 20px; }
        .form-grid { grid-template-columns: 1fr; }
        .form-full-width { grid-column: span 1; }
        .success-actions { flex-direction: column; gap: 10px; }
        .btn-success-action { text-align: center; }
        .step-label { display: none; }
        .checkout-stepper::before, .stepper-progress-bar { top: 21px; }
    }
</style>

<!-- Confetti Canvas -->
<canvas id="confettiCanvas"></canvas>

<!-- Breadcrumb -->
<nav class="axv-breadcrumb">
    <div class="container">
        <ul class="axv-breadcrumb-list">
            <li><a href="index.php"><i class="bi bi-house-door"></i> Home</a></li>
            <li class="bc-sep"><i class="bi bi-chevron-right"></i></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li class="bc-sep"><i class="bi bi-chevron-right"></i></li>
            <li class="active">Checkout</li>
        </ul>
    </div>
</nav>

<!-- Checkout Section -->
<section class="checkout-page-section">
    <div class="container">
        <div class="checkout-layout" id="checkoutPageLayout">
            
            <!-- LEFT: Checkout Steps -->
            <div class="checkout-main-content">
                <!-- Stepper Progress Tracker -->
                <div class="checkout-stepper">
                    <div class="stepper-progress-bar" id="stepperProgressBar"></div>
                    
                    <div class="step-item active" id="step-node-1">
                        <div class="step-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="step-label">Shipping</div>
                    </div>
                    <div class="step-item" id="step-node-2">
                        <div class="step-icon"><i class="bi bi-credit-card-2-front-fill"></i></div>
                        <div class="step-label">Payment</div>
                    </div>
                    <div class="step-item" id="step-node-3">
                        <div class="step-icon"><i class="bi bi-check-circle-fill"></i></div>
                        <div class="step-label">Review</div>
                    </div>
                </div>

                <form id="checkoutMultiStepForm" onsubmit="event.preventDefault();">
                    
                    <!-- ============================================
                         STEP 1: SHIPPING ADDRESS
                         ============================================ -->
                    <div class="checkout-step-panel active" id="panel-step-1">
                        <h2 class="step-panel-title"><i class="bi bi-geo-alt"></i> Select Delivery Address</h2>
                        
                        <div class="address-select-grid" id="checkoutSavedAddresses">
                            <!-- Address 1 (Home) -->
                            <div class="address-select-card selected" onclick="selectCheckoutAddress(this)" data-address-type="Home" data-name="Navneet Kumar" data-text="123 Fashion Avenue, Sector 44, Gurugram, Haryana — 122001" data-phone="+91 99999 88888">
                                <div class="select-indicator"></div>
                                <span class="address-badge">Home (Default)</span>
                                <div class="address-name">Navneet Kumar</div>
                                <div class="address-details">
                                    123 Fashion Avenue, Sector 44<br>
                                    Gurugram, Haryana — 122001
                                </div>
                                <div class="address-phone">+91 99999 88888</div>
                            </div>
                            
                            <!-- Address 2 (Office) -->
                            <div class="address-select-card" onclick="selectCheckoutAddress(this)" data-address-type="Office" data-name="Navneet Kumar" data-text="Tower B, 5th Floor, Cyber Hub, DLF Cyber City, Gurugram — 122002" data-phone="+91 99999 77777">
                                <div class="select-indicator"></div>
                                <span class="address-badge">Office</span>
                                <div class="address-name">Navneet Kumar</div>
                                <div class="address-details">
                                    Tower B, DLF Cyber Hub<br>
                                    DLF Cyber City, Gurugram — 122002
                                </div>
                                <div class="address-phone">+91 99999 77777</div>
                            </div>
                        </div>

                        <button type="button" class="add-new-address-toggle" onclick="toggleAddNewAddressForm()">
                            <i class="bi bi-plus-lg"></i> Add A New Shipping Address
                        </button>

                        <!-- Hidden New Address Form -->
                        <div class="address-form-box" id="newAddressFormBox">
                            <h3 class="panel-title mb-3" style="font-size: 1.1rem;"><i class="bi bi-house-add"></i> New Shipping Address</h3>
                            <div class="form-grid">
                                <div class="checkout-form-group">
                                    <label class="checkout-form-label">Full Name</label>
                                    <input type="text" class="checkout-form-input" id="newAddressName" placeholder="Enter recipient full name">
                                </div>
                                <div class="checkout-form-group">
                                    <label class="checkout-form-label">Phone Number</label>
                                    <input type="tel" class="checkout-form-input" id="newAddressPhone" placeholder="10-digit mobile number">
                                </div>
                                <div class="checkout-form-group form-full-width">
                                    <label class="checkout-form-label">Address Line 1 (House No, Building, Street)</label>
                                    <input type="text" class="checkout-form-input" id="newAddressLine1" placeholder="Flat, House no., Building, Company, Apartment">
                                </div>
                                <div class="checkout-form-group form-full-width">
                                    <label class="checkout-form-label">Address Line 2 (Area, Colony, Landmark)</label>
                                    <input type="text" class="checkout-form-input" id="newAddressLine2" placeholder="Area, Street, Sector, Village, Landmark">
                                </div>
                                <div class="checkout-form-group">
                                    <label class="checkout-form-label">City</label>
                                    <input type="text" class="checkout-form-input" id="newAddressCity" placeholder="City">
                                </div>
                                <div class="checkout-form-group">
                                    <label class="checkout-form-label">State</label>
                                    <input type="text" class="checkout-form-input" id="newAddressState" placeholder="State">
                                </div>
                                <div class="checkout-form-group">
                                    <label class="checkout-form-label">PIN Code (6 digits)</label>
                                    <input type="text" class="checkout-form-input" id="newAddressPin" placeholder="6-digit PIN code">
                                </div>
                                <div class="checkout-form-group">
                                    <label class="checkout-form-label">Address Type</label>
                                    <select class="checkout-form-input" id="newAddressType" style="cursor:pointer;">
                                        <option value="Home">Home (7 AM - 9 PM delivery)</option>
                                        <option value="Office">Office (9 AM - 6 PM delivery)</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn-checkout-next py-2 px-4 mt-2" onclick="saveNewAddress()">
                                <i class="bi bi-check2 me-1"></i> Save Address
                            </button>
                        </div>

                        <!-- Delivery Estimate Info -->
                        <div class="alert alert-info border-0 rounded-3 d-flex align-items-center gap-3 py-3" style="background:#eff6ff; color:#1e40af;">
                            <i class="bi bi-truck fs-4 text-primary"></i>
                            <div>
                                <h4 class="alert-heading mb-0 fw-bold" style="font-size:0.88rem;">Free Guaranteed Express Delivery</h4>
                                <p class="mb-0" style="font-size:0.8rem;opacity:0.9;">Estimated delivery: <strong id="deliveryEstimateDate">Wednesday, 24th June</strong></p>
                            </div>
                        </div>

                        <!-- Button control -->
                        <div class="checkout-btn-controls">
                            <div></div>
                            <button type="button" class="btn-checkout-next" onclick="goToStep(2)">
                                Continue to Payment <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ============================================
                         STEP 2: PAYMENT METHOD
                         ============================================ -->
                    <div class="checkout-step-panel" id="panel-step-2">
                        <h2 class="step-panel-title"><i class="bi bi-credit-card-2-front"></i> Choose Payment Method</h2>

                        <div class="payment-options-list">
                            <!-- Option 1: Credit / Debit Card -->
                            <div class="payment-option-item selected" onclick="selectPaymentOption('card')">
                                <div class="payment-option-header">
                                    <div class="payment-option-left">
                                        <div class="payment-radio"></div>
                                        <span class="payment-option-title"><i class="bi bi-credit-card me-2"></i> Credit or Debit Card</span>
                                    </div>
                                    <div class="payment-option-icons">
                                        <i class="bi bi-credit-card-2-back"></i>
                                    </div>
                                </div>
                                <div class="payment-option-details" id="pay-details-card">
                                    <!-- Interactive Card Preview -->
                                    <div class="card-preview-container">
                                        <div class="credit-card-mock" id="creditCardMock">
                                            <div class="card-front">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="card-chip"></div>
                                                    <div class="card-logo" id="cardLogoDisplay">VISA</div>
                                                </div>
                                                <div class="card-number-display" id="cardNumberDisplay">•••• •••• •••• ••••</div>
                                                <div class="card-meta-row">
                                                    <div>
                                                        <div class="card-holder-label">Card Holder</div>
                                                        <div class="card-holder-val" id="cardHolderDisplay">Your Name</div>
                                                    </div>
                                                    <div>
                                                        <div class="card-expiry-label">Expires</div>
                                                        <div class="card-expiry-val" id="cardExpiryDisplay">MM/YY</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-back">
                                                <div class="card-black-strip"></div>
                                                <div class="card-signature-box">
                                                    <span class="cvv-val-display" id="cardCvvDisplay">•••</span>
                                                </div>
                                                <div class="card-back-branding">
                                                    This card is secure. SSL Encrypted simulation for demo purpose only. Authorized signature required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card inputs -->
                                    <div class="form-grid">
                                        <div class="checkout-form-group form-full-width">
                                            <label class="checkout-form-label">Card Number</label>
                                            <input type="text" class="checkout-form-input" id="cardNumInput" placeholder="4000 1234 5678 9010" maxlength="19" oninput="updateCardNumber(this)" onfocus="flipCard(false)">
                                        </div>
                                        <div class="checkout-form-group form-full-width">
                                            <label class="checkout-form-label">Cardholder Name</label>
                                            <input type="text" class="checkout-form-input" id="cardNameInput" placeholder="Name on the card" oninput="updateCardName(this)" onfocus="flipCard(false)">
                                        </div>
                                        <div class="checkout-form-group">
                                            <label class="checkout-form-label">Expiry Date</label>
                                            <input type="text" class="checkout-form-input" id="cardExpiryInput" placeholder="MM/YY" maxlength="5" oninput="updateCardExpiry(this)" onfocus="flipCard(false)">
                                        </div>
                                        <div class="checkout-form-group">
                                            <label class="checkout-form-label">CVV</label>
                                            <input type="password" class="checkout-form-input" id="cardCvvInput" placeholder="123" maxlength="3" oninput="updateCardCvv(this)" onfocus="flipCard(true)" onblur="flipCard(false)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Option 2: UPI -->
                            <div class="payment-option-item" onclick="selectPaymentOption('upi')">
                                <div class="payment-option-header">
                                    <div class="payment-option-left">
                                        <div class="payment-radio"></div>
                                        <span class="payment-option-title"><i class="bi bi-phone me-2"></i> UPI (Google Pay, PhonePe, Paytm)</span>
                                    </div>
                                    <div class="payment-option-icons">
                                        <i class="bi bi-qr-code-scan"></i>
                                    </div>
                                </div>
                                <div class="payment-option-details" id="pay-details-upi">
                                    <div class="checkout-form-group">
                                        <label class="checkout-form-label">Enter UPI ID</label>
                                        <div class="d-flex gap-2">
                                            <input type="text" class="checkout-form-input" id="upiIdInput" placeholder="username@upi" style="flex:1;">
                                            <button type="button" class="btn-checkout-next py-1 px-3" onclick="verifyUpi()" style="font-size:0.8rem;">Verify</button>
                                        </div>
                                        <span class="text-success fw-bold mt-1" id="upiVerifyMsg" style="display:none; font-size:0.75rem;"><i class="bi bi-check-circle-fill"></i> UPI ID Verified</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Option 3: Net Banking -->
                            <div class="payment-option-item" onclick="selectPaymentOption('net')">
                                <div class="payment-option-header">
                                    <div class="payment-option-left">
                                        <div class="payment-radio"></div>
                                        <span class="payment-option-title"><i class="bi bi-bank me-2"></i> Net Banking</span>
                                    </div>
                                    <div class="payment-option-icons">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>
                                <div class="payment-option-details" id="pay-details-net">
                                    <div class="checkout-form-group">
                                        <label class="checkout-form-label">Select Your Bank</label>
                                        <select class="checkout-form-input" id="bankSelect" style="cursor:pointer;">
                                            <option>State Bank of India (SBI)</option>
                                            <option>HDFC Bank</option>
                                            <option>ICICI Bank</option>
                                            <option>Axis Bank</option>
                                            <option>Kotak Mahindra Bank</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Option 4: Cash on Delivery -->
                            <div class="payment-option-item" onclick="selectPaymentOption('cod')">
                                <div class="payment-option-header">
                                    <div class="payment-option-left">
                                        <div class="payment-radio"></div>
                                        <span class="payment-option-title"><i class="bi bi-wallet2 me-2"></i> Cash on Delivery (COD)</span>
                                    </div>
                                    <div class="payment-option-icons">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>
                                </div>
                                <div class="payment-option-details" id="pay-details-cod">
                                    <p class="mb-0 text-muted" style="font-size:0.84rem;">Pay in cash or digital scan upon delivery. An additional COD fee of ₹49 is waived for your account!</p>
                                </div>
                            </div>
                        </div>

                        <!-- Button controls -->
                        <div class="checkout-btn-controls">
                            <button type="button" class="btn-checkout-prev" onclick="goToStep(1)">
                                <i class="bi bi-arrow-left"></i> Back to Shipping
                            </button>
                            <button type="button" class="btn-checkout-next" onclick="goToStep(3)">
                                Review Order <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ============================================
                         STEP 3: ORDER REVIEW
                         ============================================ -->
                    <div class="checkout-step-panel" id="panel-step-3">
                        <h2 class="step-panel-title"><i class="bi bi-bag-check"></i> Review & Place Order</h2>

                        <!-- Block 1: Shipping summary -->
                        <div class="review-summary-block">
                            <div class="review-block-header">
                                <span class="review-block-title"><i class="bi bi-geo-alt"></i> Shipping Address</span>
                                <button type="button" class="review-edit-btn" onclick="goToStep(1)">Edit</button>
                            </div>
                            <div class="review-info-text" id="reviewShippingText">
                                <!-- Filled by JS -->
                                Navneet Kumar<br>
                                123 Fashion Avenue, Sector 44, Gurugram, Haryana — 122001
                            </div>
                        </div>

                        <!-- Block 2: Payment summary -->
                        <div class="review-summary-block">
                            <div class="review-block-header">
                                <span class="review-block-title"><i class="bi bi-credit-card"></i> Payment Method</span>
                                <button type="button" class="review-edit-btn" onclick="goToStep(2)">Edit</button>
                            </div>
                            <div class="review-info-text" id="reviewPaymentText">
                                <!-- Filled by JS -->
                                Credit Card ending in 9010
                            </div>
                        </div>

                        <!-- Block 3: Verification statement -->
                        <p class="text-muted" style="font-size:0.78rem; line-height:1.5;">
                            By clicking "Place Order", you agree to Axvero's terms of service and privacy policy. We will send you an order receipt, tracking details, and estimated delivery dates to your registered email and mobile.
                        </p>

                        <!-- Button controls -->
                        <div class="checkout-btn-controls">
                            <button type="button" class="btn-checkout-prev" onclick="goToStep(2)">
                                <i class="bi bi-arrow-left"></i> Back to Payment
                            </button>
                            <button type="button" class="btn-checkout-next" onclick="placeOrder()" id="btnPlaceOrder">
                                Place Order <i class="bi bi-check2"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- RIGHT: Persistent Summary Sidebar -->
            <div id="checkoutSummarySidebar">
                <div class="checkout-summary-card">
                    <h2 class="checkout-summary-title"><i class="bi bi-receipt"></i> Order Summary</h2>
                    
                    <!-- Items checklist -->
                    <div class="checkout-items-list" id="checkoutItemsList">
                        <!-- Loaded by JS -->
                        <div class="checkout-item-small">
                            <div class="checkout-item-small-img">
                                <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=100&h=120&fit=crop&q=80" alt="Item">
                            </div>
                            <div class="checkout-item-small-info">
                                <div class="checkout-item-small-name">Premium Linen Casual Shirt</div>
                                <div class="checkout-item-small-meta">Qty: 1 · Size: M</div>
                            </div>
                            <div class="checkout-item-small-price">₹1,299</div>
                        </div>
                    </div>

                    <div class="summary-row">
                        <span class="label">Subtotal</span>
                        <span class="value" id="sideSubtotal">₹6,997</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Shipping</span>
                        <span class="value text-green" id="sideShipping">FREE</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Tax (GST 18%)</span>
                        <span class="value" id="sideTax">₹1,259</span>
                    </div>
                    <div class="summary-row" id="sideDiscountRow" style="display:none;">
                        <span class="label">Promo Code Discount</span>
                        <span class="value text-green" id="sideDiscount">-₹500</span>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-total-row">
                        <span class="label">Total to Pay</span>
                        <span class="value" id="sideTotal">₹8,256</span>
                    </div>
                    
                    <div class="alert alert-success border-0 rounded-3 mt-3 py-2 text-center" style="background:#ecfdf5; color:#065f46; font-size:0.78rem; font-weight:700;">
                        <i class="bi bi-shield-check"></i> SSL Secure Server checkout
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================
             STEP 4: ORDER CONFIRMATION (FULL WIDTH SUCCESS PAGE)
             ============================================ -->
        <div class="d-none" id="orderSuccessState">
            <div class="checkout-main-content py-5">
                <div class="success-wrapper">
                    <!-- Animated Checkmark -->
                    <div class="success-checkmark-wrapper">
                        <svg class="success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="success-checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="success-checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>

                    <h1 class="success-title">Order Placed Successfully!</h1>
                    <p class="success-desc">Thank you for shopping with Axvero. Your payment has been processed, and your order is being prepared for dispatch.</p>

                    <!-- Order Details box -->
                    <div class="success-details-card">
                        <div class="success-detail-row">
                            <span class="label">Order Number</span>
                            <span class="value" id="successOrderNo">#AXV-2026-89472</span>
                        </div>
                        <div class="success-detail-row">
                            <span class="label">Estimated Delivery</span>
                            <span class="value" id="successEstDelivery">Wednesday, 24th June</span>
                        </div>
                        <div class="success-detail-row">
                            <span class="label">Delivery Address</span>
                            <span class="value" id="successAddress" style="text-align: right; max-width: 240px; font-weight: 500;">Navneet Kumar, Gurugram</span>
                        </div>
                        <div class="success-detail-row">
                            <span class="label">Total Charged</span>
                            <span class="value" id="successTotalPaid" style="color:var(--clr-primary);">₹8,256</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="success-actions">
                        <a href="account.php" class="btn-success-action primary">
                            <i class="bi bi-box-seam me-1"></i> Track Order Status
                        </a>
                        <a href="index.php" class="btn-success-action secondary">
                            <i class="bi bi-bag-check me-1"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Canvas Confetti CDN -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

<script>
    // ===== Checkout Data =====
    let currentStep = 1;
    let selectedAddressInfo = {
        name: "Navneet Kumar",
        details: "123 Fashion Avenue, Sector 44, Gurugram, Haryana — 122001",
        phone: "+91 99999 88888"
    };
    let selectedPaymentMethod = "card";
    
    // Sample cart data for fallback if localStorage is empty
    const defaultCart = [
        { id: 1, brand: "Woodland", name: "Premium Linen Casual Shirt", price: 1299, size: "M", color: "Blue", qty: 1, img: "https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=100&h=120&fit=crop&q=80" },
        { id: 2, brand: "Nike", name: "Air Zoom Running Sport Shoes", price: 3499, size: "UK 9", color: "Black", qty: 1, img: "https://images.unsplash.com/photo-1549298916-b41d501d3772?w=100&h=120&fit=crop&q=80" },
        { id: 3, brand: "Baggit", name: "Premium Leather Crossbody Bag", price: 2199, style: "Crossbody", color: "Tan", qty: 1, img: "https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=100&h=120&fit=crop&q=80" }
    ];

    // ===== Initialize View =====
    document.addEventListener("DOMContentLoaded", function() {
        // Set delivery date estimate dynamically (current date + 2 days)
        const estDate = new Date();
        estDate.setDate(estDate.getDate() + 2);
        const options = { weekday: 'long', day: 'numeric', month: 'long' };
        const dateStr = estDate.toLocaleDateString('en-IN', options);
        document.getElementById('deliveryEstimateDate').textContent = dateStr;
        document.getElementById('successEstDelivery').textContent = dateStr;

        loadOrderSummary();
        updateStepperUI();
    });

    // ===== Load Order Data from localStorage / default =====
    function loadOrderSummary() {
        let cartItems = [];
        try {
            // Attempt to get items from localStorage if saved by cart
            const localCart = localStorage.getItem('axv_cart');
            if (localCart) {
                cartItems = JSON.parse(localCart);
            }
        } catch(e) {}

        if (cartItems.length === 0) {
            cartItems = defaultCart;
        }

        // Render summary items
        const listEl = document.getElementById('checkoutItemsList');
        listEl.innerHTML = '';
        
        let subtotal = 0;
        cartItems.forEach(item => {
            subtotal += item.price * (item.qty || 1);
            
            const row = document.createElement('div');
            row.className = 'checkout-item-small';
            
            const meta = item.size ? `Qty: ${item.qty} · Size: ${item.size}` : `Qty: ${item.qty}`;
            
            row.innerHTML = `
                <div class="checkout-item-small-img">
                    <img src="${item.img}" alt="${item.name}">
                </div>
                <div class="checkout-item-small-info">
                    <div class="checkout-item-small-name">${item.name}</div>
                    <div class="checkout-item-small-meta">${meta}</div>
                </div>
                <div class="checkout-item-small-price">₹${(item.price * item.qty).toLocaleString('en-IN')}</div>
            `;
            listEl.appendChild(row);
        });

        // Totals calculation
        const tax = Math.round(subtotal * 0.18);
        const shipping = subtotal > 999 ? 0 : 99;
        
        // Coupon code integration (checking if cart applied it)
        let discount = 0;
        try {
            const hasPromo = localStorage.getItem('axv_coupon_applied') === 'true';
            if (hasPromo) {
                discount = 500; // standard mock coupon
                document.getElementById('sideDiscountRow').style.display = 'flex';
                document.getElementById('sideDiscount').textContent = `-₹500`;
            }
        } catch(e) {}

        const total = subtotal + tax + shipping - discount;

        document.getElementById('sideSubtotal').textContent = `₹${subtotal.toLocaleString('en-IN')}`;
        document.getElementById('sideShipping').textContent = shipping === 0 ? 'FREE' : `₹${shipping}`;
        document.getElementById('sideShipping').className = shipping === 0 ? 'value text-green' : 'value';
        document.getElementById('sideTax').textContent = `₹${tax.toLocaleString('en-IN')}`;
        document.getElementById('sideTotal').textContent = `₹${total.toLocaleString('en-IN')}`;
        document.getElementById('successTotalPaid').textContent = `₹${total.toLocaleString('en-IN')}`;
    }

    // ===== Address Selection & Forms =====
    function selectCheckoutAddress(card) {
        document.querySelectorAll('#checkoutSavedAddresses .address-select-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        
        selectedAddressInfo.name = card.dataset.name;
        selectedAddressInfo.details = card.dataset.text;
        selectedAddressInfo.phone = card.dataset.phone;
        
        // Hide add form if active
        document.getElementById('newAddressFormBox').style.display = 'none';
    }

    function toggleAddNewAddressForm() {
        const box = document.getElementById('newAddressFormBox');
        if (box.style.display === 'block') {
            box.style.display = 'none';
        } else {
            box.style.display = 'block';
            box.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }

    function saveNewAddress() {
        const name = document.getElementById('newAddressName').value.trim();
        const phone = document.getElementById('newAddressPhone').value.trim();
        const l1 = document.getElementById('newAddressLine1').value.trim();
        const l2 = document.getElementById('newAddressLine2').value.trim();
        const city = document.getElementById('newAddressCity').value.trim();
        const state = document.getElementById('newAddressState').value.trim();
        const pin = document.getElementById('newAddressPin').value.trim();
        const type = document.getElementById('newAddressType').value;

        if (!name || !phone || !l1 || !city || !state || !pin) {
            if (typeof showToast === 'function') {
                showToast('Please fill in all required address fields');
            } else {
                alert('Please fill in all required fields');
            }
            return;
        }

        const addressText = `${l1}, ${l2 ? l2 + ', ' : ''}${city}, ${state} — ${pin}`;
        
        // Create new address card element
        const grid = document.getElementById('checkoutSavedAddresses');
        const card = document.createElement('div');
        card.className = 'address-select-card';
        card.onclick = function() { selectCheckoutAddress(this); };
        card.dataset.addressType = type;
        card.dataset.name = name;
        card.dataset.text = addressText;
        card.dataset.phone = phone;

        card.innerHTML = `
            <div class="select-indicator"></div>
            <span class="address-badge">${type}</span>
            <div class="address-name">${name}</div>
            <div class="address-details">${l1}<br>${city}, ${state} — ${pin}</div>
            <div class="address-phone">${phone}</div>
        `;

        grid.appendChild(card);
        selectCheckoutAddress(card);
        
        // Reset form
        document.getElementById('newAddressName').value = '';
        document.getElementById('newAddressPhone').value = '';
        document.getElementById('newAddressLine1').value = '';
        document.getElementById('newAddressLine2').value = '';
        document.getElementById('newAddressCity').value = '';
        document.getElementById('newAddressState').value = '';
        document.getElementById('newAddressPin').value = '';
        
        document.getElementById('newAddressFormBox').style.display = 'none';
        if (typeof showToast === 'function') {
            showToast('New shipping address saved!');
        }
    }

    // ===== Payment Option Tab Logic =====
    function selectPaymentOption(type) {
        document.querySelectorAll('.payment-option-item').forEach(el => el.classList.remove('selected'));
        
        let selectedItem;
        if (type === 'card') {
            selectedItem = document.querySelector('[onclick="selectPaymentOption(\'card\')"]');
            selectedPaymentMethod = "card";
        } else if (type === 'upi') {
            selectedItem = document.querySelector('[onclick="selectPaymentOption(\'upi\')"]');
            selectedPaymentMethod = "upi";
        } else if (type === 'net') {
            selectedItem = document.querySelector('[onclick="selectPaymentOption(\'net\')"]');
            selectedPaymentMethod = "net";
        } else if (type === 'cod') {
            selectedItem = document.querySelector('[onclick="selectPaymentOption(\'cod\')"]');
            selectedPaymentMethod = "cod";
        }
        
        if (selectedItem) {
            selectedItem.classList.add('selected');
        }
    }

    // ===== Credit Card Animation & Display Handlers =====
    function flipCard(flip) {
        const card = document.getElementById('creditCardMock');
        if (flip) {
            card.classList.add('flipped');
        } else {
            card.classList.remove('flipped');
        }
    }

    function updateCardNumber(input) {
        let value = input.value.replace(/\D/g, '');
        // format with spaces
        let formatted = '';
        for(let i=0; i<value.length; i++) {
            if(i > 0 && i % 4 === 0) formatted += ' ';
            formatted += value[i];
        }
        input.value = formatted;

        const display = document.getElementById('cardNumberDisplay');
        if (formatted.length > 0) {
            display.textContent = formatted + '•••• •••• •••• ••••'.slice(formatted.length);
        } else {
            display.textContent = '•••• •••• •••• ••••';
        }

        // Change card type logo
        const logo = document.getElementById('cardLogoDisplay');
        if (value.startsWith('4')) {
            logo.textContent = 'VISA';
        } else if (value.startsWith('5')) {
            logo.textContent = 'Mastercard';
        } else if (value.startsWith('3')) {
            logo.textContent = 'Amex';
        } else {
            logo.textContent = 'Card';
        }
    }

    function updateCardName(input) {
        const display = document.getElementById('cardHolderDisplay');
        display.textContent = input.value.trim().toUpperCase() || "YOUR NAME";
    }

    function updateCardExpiry(input) {
        let val = input.value.replace(/\D/g, '');
        if (val.length > 2) {
            val = val.slice(0, 2) + '/' + val.slice(2);
        }
        input.value = val;
        
        const display = document.getElementById('cardExpiryDisplay');
        display.textContent = val || "MM/YY";
    }

    function updateCardCvv(input) {
        let val = input.value.replace(/\D/g, '');
        input.value = val;
        
        const display = document.getElementById('cardCvvDisplay');
        display.textContent = val ? '•'.repeat(val.length) : '•••';
    }

    function verifyUpi() {
        const val = document.getElementById('upiIdInput').value.trim();
        if (val.includes('@')) {
            document.getElementById('upiVerifyMsg').style.display = 'block';
            if (typeof showToast === 'function') showToast('UPI ID verified successfully!');
        } else {
            alert('Please enter a valid UPI ID (e.g. name@bank)');
        }
    }

    // ===== Steps Navigation =====
    function goToStep(step) {
        if (step > currentStep) {
            // Validation before proceeding
            if (currentStep === 1) {
                if (!selectedAddressInfo.name || !selectedAddressInfo.details) {
                    alert('Please select or add a delivery address');
                    return;
                }
            }
            if (currentStep === 2) {
                if (selectedPaymentMethod === 'card') {
                    const num = document.getElementById('cardNumInput').value;
                    const expiry = document.getElementById('cardExpiryInput').value;
                    const cvv = document.getElementById('cardCvvInput').value;
                    if (num.length < 15 || expiry.length < 5 || cvv.length < 3) {
                        alert('Please fill out card payment details correctly');
                        return;
                    }
                } else if (selectedPaymentMethod === 'upi') {
                    const upi = document.getElementById('upiIdInput').value;
                    if (!upi.includes('@')) {
                        alert('Please enter and verify a valid UPI ID');
                        return;
                    }
                }
            }
        }

        currentStep = step;

        // Hide all panels
        document.querySelectorAll('.checkout-step-panel').forEach(p => p.classList.remove('active'));
        
        // Show target panel
        const targetPanel = document.getElementById('panel-step-' + step);
        if (targetPanel) {
            targetPanel.classList.add('active');
        }

        // Build reviews dynamically when entering step 3
        if (step === 3) {
            document.getElementById('reviewShippingText').innerHTML = `
                <strong>${selectedAddressInfo.name}</strong><br>
                ${selectedAddressInfo.details}<br>
                Phone: ${selectedAddressInfo.phone}
            `;

            let payText = '';
            if (selectedPaymentMethod === 'card') {
                const cardNum = document.getElementById('cardNumInput').value;
                const last4 = cardNum.slice(-4);
                payText = `Credit Card ending in <strong>${last4 || '4010'}</strong>`;
            } else if (selectedPaymentMethod === 'upi') {
                const upi = document.getElementById('upiIdInput').value;
                payText = `UPI ID: <strong>${upi}</strong>`;
            } else if (selectedPaymentMethod === 'net') {
                const bank = document.getElementById('bankSelect').value;
                payText = `Net Banking: <strong>${bank}</strong>`;
            } else {
                payText = `<strong>Cash on Delivery (COD)</strong>`;
            }
            document.getElementById('reviewPaymentText').innerHTML = payText;
        }

        updateStepperUI();
        window.scrollTo({ top: 120, behavior: 'smooth' });
    }

    function updateStepperUI() {
        const nodes = [
            document.getElementById('step-node-1'),
            document.getElementById('step-node-2'),
            document.getElementById('step-node-3')
        ];

        nodes.forEach((node, idx) => {
            const stepNum = idx + 1;
            node.classList.remove('active', 'completed');
            if (stepNum === currentStep) {
                node.classList.add('active');
            } else if (stepNum < currentStep) {
                node.classList.add('completed');
            }
        });

        // Update progress bar length
        const progressEl = document.getElementById('stepperProgressBar');
        if (currentStep === 1) progressEl.style.width = '0%';
        else if (currentStep === 2) progressEl.style.width = '50%';
        else if (currentStep === 3) progressEl.style.width = '100%';
    }

    // ===== Place Order Action =====
    function placeOrder() {
        const placeBtn = document.getElementById('btnPlaceOrder');
        const origText = placeBtn.innerHTML;
        placeBtn.disabled = true;
        placeBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Placing Order...`;

        setTimeout(() => {
            // Success state transition
            document.getElementById('checkoutPageLayout').classList.add('d-none');
            document.getElementById('orderSuccessState').classList.remove('d-none');
            
            // Set details
            const orderNum = 'AXV-2026-' + Math.floor(10000 + Math.random() * 90000);
            document.getElementById('successOrderNo').textContent = '#' + orderNum;
            document.getElementById('successAddress').innerHTML = `${selectedAddressInfo.name}, ${selectedAddressInfo.details.split(',')[1] || 'Gurugram'}`;

            // Reset cart in local storage
            try {
                localStorage.removeItem('axv_cart');
                localStorage.removeItem('axv_coupon_applied');
            } catch(e) {}

            // Fire confetti
            fireConfetti();
            
            // Sync header badge count
            const desktopBadge = document.querySelector('.nav-cart-custom span');
            const mobileBadge = document.querySelector('.mobile-cart-badge');
            if (desktopBadge) desktopBadge.textContent = '0';
            if (mobileBadge) mobileBadge.textContent = '0';

            window.scrollTo({ top: 120, behavior: 'smooth' });
        }, 1800);
    }

    // ===== Confetti Simulation =====
    function fireConfetti() {
        if (typeof confetti === 'function') {
            // Real Canvas Confetti from library
            const duration = 4 * 1000;
            const end = Date.now() + duration;

            (function frame() {
                confetti({
                    particleCount: 3,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    colors: ['#6A0DAD', '#A855F0', '#059669', '#3b82f6']
                });
                confetti({
                    particleCount: 3,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    colors: ['#6A0DAD', '#A855F0', '#059669', '#3b82f6']
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            }());
        } else {
            // Fallback confetti in canvas
            const canvas = document.getElementById('confettiCanvas');
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            let particles = [];
            const colors = ['#6A0DAD', '#A855F0', '#059669', '#3b82f6', '#f59e0b'];

            for (let i = 0; i < 150; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height - canvas.height,
                    r: Math.random() * 6 + 4,
                    d: Math.random() * canvas.height,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    tilt: Math.random() * 10 - 5,
                    tiltAngleIncremental: Math.random() * 0.07 + 0.02,
                    tiltAngle: 0
                });
            }

            function draw() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                particles.forEach((p, index) => {
                    p.tiltAngle += p.tiltAngleIncremental;
                    p.y += (Math.cos(p.d) + 3 + p.r / 2) / 2;
                    p.x += Math.sin(p.tiltAngle);
                    p.tilt = Math.sin(p.tiltAngle - index / 3) * 15;

                    ctx.beginPath();
                    ctx.lineWidth = p.r;
                    ctx.strokeStyle = p.color;
                    ctx.moveTo(p.x + p.tilt + p.r / 2, p.y);
                    ctx.lineTo(p.x + p.tilt, p.y + p.tilt + p.r / 2);
                    ctx.stroke();
                });

                let active = false;
                particles.forEach(p => {
                    if (p.y < canvas.height) active = true;
                });

                if (active) {
                    requestAnimationFrame(draw);
                } else {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }
            }
            draw();
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
