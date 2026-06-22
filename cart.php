<?php include 'includes/header.php'; ?>

<!-- Cart Page Styles -->
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

    /* ========== CART PAGE LAYOUT ========== */
    .cart-page-section {
        padding: 40px 0 80px;
        background: #f9fafb;
        min-height: 60vh;
    }
    .cart-page-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }
    .cart-page-subtitle {
        font-size: 0.9rem;
        color: var(--clr-text-light);
        margin-bottom: 32px;
    }
    .cart-layout {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 32px;
        align-items: start;
    }

    /* ========== CART ITEMS ========== */
    .cart-items-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .cart-item-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 20px 24px;
        display: flex;
        gap: 20px;
        align-items: flex-start;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .cart-item-card:hover {
        box-shadow: var(--shadow-md);
        border-color: rgba(106, 13, 173, 0.15);
    }
    .cart-item-card.removing {
        opacity: 0;
        transform: translateX(-40px);
        max-height: 0;
        padding-top: 0;
        padding-bottom: 0;
        margin-bottom: -16px;
        border-color: transparent;
    }
    .cart-item-img {
        width: 110px;
        height: 130px;
        border-radius: var(--radius-sm);
        overflow: hidden;
        flex-shrink: 0;
        background: var(--clr-gray);
    }
    .cart-item-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .cart-item-card:hover .cart-item-img img {
        transform: scale(1.05);
    }
    .cart-item-details {
        flex: 1;
        min-width: 0;
    }
    .cart-item-brand {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: var(--clr-primary);
        font-weight: 700;
        margin-bottom: 4px;
    }
    .cart-item-name {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--clr-text);
        margin-bottom: 6px;
        line-height: 1.3;
    }
    .cart-item-meta {
        display: flex;
        gap: 16px;
        margin-bottom: 14px;
        font-size: 0.82rem;
        color: var(--clr-text-light);
    }
    .cart-item-meta span {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .cart-item-meta .meta-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        border: 1.5px solid #d1d5db;
        display: inline-block;
    }
    .cart-item-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    /* Quantity Stepper */
    .qty-stepper {
        display: inline-flex;
        align-items: center;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        overflow: hidden;
        background: #fff;
    }
    .qty-stepper button {
        width: 36px;
        height: 36px;
        border: none;
        background: transparent;
        font-size: 1rem;
        color: var(--clr-text);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .qty-stepper button:hover {
        background: var(--clr-primary);
        color: #fff;
    }
    .qty-stepper button:disabled {
        opacity: 0.35;
        cursor: not-allowed;
    }
    .qty-stepper button:disabled:hover {
        background: transparent;
        color: var(--clr-text);
    }
    .qty-stepper .qty-value {
        width: 40px;
        text-align: center;
        font-weight: 700;
        font-size: 0.95rem;
        color: var(--clr-text);
        border-left: 1.5px solid var(--clr-border);
        border-right: 1.5px solid var(--clr-border);
        height: 36px;
        line-height: 36px;
        user-select: none;
    }

    .cart-item-price {
        text-align: right;
    }
    .cart-item-price .price-current {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--clr-text);
    }
    .cart-item-price .price-original {
        font-size: 0.82rem;
        color: #9ca3af;
        text-decoration: line-through;
        margin-left: 6px;
    }
    .cart-item-price .price-saved {
        display: block;
        font-size: 0.75rem;
        color: #059669;
        font-weight: 600;
        margin-top: 2px;
    }

    /* Remove Button */
    .cart-item-remove {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1.5px solid #fee2e2;
        background: #fff;
        color: #ef4444;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.85rem;
        transition: all 0.25s;
        opacity: 0;
    }
    .cart-item-card:hover .cart-item-remove {
        opacity: 1;
    }
    .cart-item-remove:hover {
        background: #fef2f2;
        border-color: #fca5a5;
        transform: scale(1.1);
    }

    /* ========== COUPON ========== */
    .cart-coupon-row {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .cart-coupon-row i {
        font-size: 1.4rem;
        color: var(--clr-primary);
    }
    .cart-coupon-row input {
        flex: 1;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        padding: 10px 16px;
        font-size: 0.9rem;
        font-family: var(--ff-primary);
        outline: none;
        transition: border-color 0.2s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .cart-coupon-row input:focus {
        border-color: var(--clr-primary-light);
    }
    .cart-coupon-row input::placeholder {
        text-transform: none;
        letter-spacing: 0;
    }
    .btn-apply-coupon {
        padding: 10px 24px;
        background: var(--clr-primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-weight: 700;
        font-size: 0.88rem;
        cursor: pointer;
        transition: all 0.25s;
        font-family: var(--ff-primary);
        white-space: nowrap;
    }
    .btn-apply-coupon:hover {
        background: var(--clr-primary-dark);
        transform: translateY(-1px);
    }
    .coupon-success-msg {
        display: none;
        align-items: center;
        gap: 6px;
        font-size: 0.82rem;
        color: #059669;
        font-weight: 600;
        margin-top: 10px;
    }
    .coupon-success-msg.show { display: flex; }
    .coupon-success-msg i { font-size: 1rem; }

    /* ========== ORDER SUMMARY ========== */
    .order-summary-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 28px;
        position: sticky;
        top: 100px;
    }
    .order-summary-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 24px;
        padding-bottom: 14px;
        border-bottom: 1.5px solid var(--clr-border);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .order-summary-title i { color: var(--clr-primary); }
    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        font-size: 0.9rem;
    }
    .summary-row .label { color: var(--clr-text-light); }
    .summary-row .value { font-weight: 600; color: var(--clr-text); }
    .summary-row .value.text-green { color: #059669; }
    .summary-row .value.text-red { color: #ef4444; }
    .summary-divider {
        height: 1px;
        background: var(--clr-border);
        margin: 12px 0;
    }
    .summary-total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0 4px;
    }
    .summary-total-row .label {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--clr-text);
    }
    .summary-total-row .value {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--clr-primary);
    }
    .summary-savings-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #ecfdf5;
        color: #059669;
        padding: 10px 16px;
        border-radius: var(--radius-sm);
        font-size: 0.82rem;
        font-weight: 700;
        margin: 16px 0;
    }
    .summary-savings-badge i { font-size: 1rem; }
    .btn-checkout {
        width: 100%;
        padding: 15px;
        background: var(--clr-primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        font-family: var(--ff-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 4px 16px rgba(106, 13, 173, 0.2);
        letter-spacing: 0.3px;
    }
    .btn-checkout:hover {
        background: var(--clr-primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(106, 13, 173, 0.3);
    }
    .btn-continue-shopping {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        width: 100%;
        padding: 12px;
        background: transparent;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        color: var(--clr-text-light);
        font-size: 0.88rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s;
        font-family: var(--ff-primary);
        margin-top: 10px;
        text-decoration: none;
    }
    .btn-continue-shopping:hover {
        border-color: var(--clr-primary);
        color: var(--clr-primary);
    }
    .summary-secure-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-size: 0.78rem;
        color: #9ca3af;
        margin-top: 16px;
    }
    .summary-secure-note i { font-size: 0.9rem; color: #059669; }

    /* ========== EMPTY CART ========== */
    .empty-cart-wrapper {
        text-align: center;
        padding: 80px 20px;
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
    }
    .empty-cart-icon {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f3e8ff, #ede9fe);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 28px;
        animation: emptyCartBounce 2s ease-in-out infinite;
    }
    @keyframes emptyCartBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .empty-cart-icon i {
        font-size: 3rem;
        color: var(--clr-primary);
    }
    .empty-cart-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 10px;
    }
    .empty-cart-desc {
        font-size: 0.92rem;
        color: var(--clr-text-light);
        max-width: 400px;
        margin: 0 auto 28px;
        line-height: 1.6;
    }
    .btn-shop-now {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 36px;
        background: var(--clr-primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        font-family: var(--ff-primary);
        box-shadow: 0 4px 16px rgba(106, 13, 173, 0.2);
    }
    .btn-shop-now:hover {
        background: var(--clr-primary-dark);
        transform: translateY(-2px);
        color: #fff;
        box-shadow: 0 8px 24px rgba(106, 13, 173, 0.3);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .cart-layout {
            grid-template-columns: 1fr;
        }
        .order-summary-card {
            position: static;
        }
    }
    @media (max-width: 575.98px) {
        .cart-page-section { padding: 24px 0 60px; }
        .cart-page-title { font-size: 1.4rem; }
        .cart-item-card {
            flex-direction: column;
            align-items: stretch;
            padding: 16px;
        }
        .cart-item-img {
            width: 100%;
            height: 180px;
        }
        .cart-item-bottom {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        .cart-item-price { text-align: left; }
        .cart-item-remove { opacity: 1; }
        .cart-coupon-row {
            flex-direction: column;
            align-items: stretch;
        }
        .cart-coupon-row i { display: none; }
    }
</style>

<!-- Breadcrumb -->
<nav class="axv-breadcrumb">
    <div class="container">
        <ul class="axv-breadcrumb-list">
            <li><a href="index.php"><i class="bi bi-house-door"></i> Home</a></li>
            <li class="bc-sep"><i class="bi bi-chevron-right"></i></li>
            <li class="active">Shopping Cart</li>
        </ul>
    </div>
</nav>

<!-- Cart Page -->
<section class="cart-page-section">
    <div class="container">
        <h1 class="cart-page-title">Shopping Cart</h1>
        <p class="cart-page-subtitle" id="cartCountText">You have <strong>3 items</strong> in your cart</p>

        <!-- Cart with items -->
        <div class="cart-layout" id="cartFilledState">
            <!-- LEFT: Cart Items -->
            <div>
                <div class="cart-items-container" id="cartItemsContainer">
                    <!-- Item 1 -->
                    <div class="cart-item-card" data-item-id="1" data-price="1299" data-original="2599" data-qty="1">
                        <button class="cart-item-remove" onclick="removeCartItem(this)" aria-label="Remove item">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <div class="cart-item-img">
                            <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=300&h=360&fit=crop&q=80" alt="Premium Linen Shirt" loading="lazy">
                        </div>
                        <div class="cart-item-details">
                            <div class="cart-item-brand">Woodland</div>
                            <h3 class="cart-item-name">Premium Linen Casual Shirt</h3>
                            <div class="cart-item-meta">
                                <span>Size: <strong>M</strong></span>
                                <span><span class="meta-dot" style="background:#3b82f6;border-color:#3b82f6;"></span> Blue</span>
                            </div>
                            <div class="cart-item-bottom">
                                <div class="qty-stepper">
                                    <button onclick="changeQty(this, -1)" disabled><i class="bi bi-dash"></i></button>
                                    <span class="qty-value">1</span>
                                    <button onclick="changeQty(this, 1)"><i class="bi bi-plus"></i></button>
                                </div>
                                <div class="cart-item-price">
                                    <span class="price-current">₹1,299</span>
                                    <span class="price-original">₹2,599</span>
                                    <span class="price-saved">You save ₹1,300</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="cart-item-card" data-item-id="2" data-price="3499" data-original="6999" data-qty="1">
                        <button class="cart-item-remove" onclick="removeCartItem(this)" aria-label="Remove item">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <div class="cart-item-img">
                            <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=300&h=360&fit=crop&q=80" alt="Running Sport Shoes" loading="lazy">
                        </div>
                        <div class="cart-item-details">
                            <div class="cart-item-brand">Nike</div>
                            <h3 class="cart-item-name">Air Zoom Running Sport Shoes</h3>
                            <div class="cart-item-meta">
                                <span>Size: <strong>UK 9</strong></span>
                                <span><span class="meta-dot" style="background:#1f2937;border-color:#1f2937;"></span> Black</span>
                            </div>
                            <div class="cart-item-bottom">
                                <div class="qty-stepper">
                                    <button onclick="changeQty(this, -1)" disabled><i class="bi bi-dash"></i></button>
                                    <span class="qty-value">1</span>
                                    <button onclick="changeQty(this, 1)"><i class="bi bi-plus"></i></button>
                                </div>
                                <div class="cart-item-price">
                                    <span class="price-current">₹3,499</span>
                                    <span class="price-original">₹6,999</span>
                                    <span class="price-saved">You save ₹3,500</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="cart-item-card" data-item-id="3" data-price="2199" data-original="4399" data-qty="1">
                        <button class="cart-item-remove" onclick="removeCartItem(this)" aria-label="Remove item">
                            <i class="bi bi-x-lg"></i>
                        </button>
                        <div class="cart-item-img">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300&h=360&fit=crop&q=80" alt="Leather Crossbody Bag" loading="lazy">
                        </div>
                        <div class="cart-item-details">
                            <div class="cart-item-brand">Baggit</div>
                            <h3 class="cart-item-name">Premium Leather Crossbody Bag</h3>
                            <div class="cart-item-meta">
                                <span>Style: <strong>Crossbody</strong></span>
                                <span><span class="meta-dot" style="background:#92400e;border-color:#92400e;"></span> Tan</span>
                            </div>
                            <div class="cart-item-bottom">
                                <div class="qty-stepper">
                                    <button onclick="changeQty(this, -1)" disabled><i class="bi bi-dash"></i></button>
                                    <span class="qty-value">1</span>
                                    <button onclick="changeQty(this, 1)"><i class="bi bi-plus"></i></button>
                                </div>
                                <div class="cart-item-price">
                                    <span class="price-current">₹2,199</span>
                                    <span class="price-original">₹4,399</span>
                                    <span class="price-saved">You save ₹2,200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coupon Code -->
                <div class="cart-coupon-row mt-3">
                    <i class="bi bi-ticket-perforated"></i>
                    <input type="text" id="couponInput" placeholder="Enter coupon code">
                    <button class="btn-apply-coupon" onclick="applyCoupon()">Apply</button>
                </div>
                <div class="coupon-success-msg" id="couponSuccess">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Coupon <strong id="couponCodeDisplay"></strong> applied — ₹500 off!</span>
                </div>
            </div>

            <!-- RIGHT: Order Summary -->
            <div>
                <div class="order-summary-card">
                    <h2 class="order-summary-title"><i class="bi bi-receipt"></i> Order Summary</h2>
                    <div class="summary-row">
                        <span class="label">Subtotal (<span id="summaryItemCount">3</span> items)</span>
                        <span class="value" id="summarySubtotal">₹6,997</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Shipping</span>
                        <span class="value text-green" id="summaryShipping">FREE</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Tax (GST 18%)</span>
                        <span class="value" id="summaryTax">₹1,259</span>
                    </div>
                    <div class="summary-row" id="discountRow" style="display:none;">
                        <span class="label">Coupon Discount</span>
                        <span class="value text-green" id="summaryDiscount">-₹500</span>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-total-row">
                        <span class="label">Total</span>
                        <span class="value" id="summaryTotal">₹8,256</span>
                    </div>
                    <div class="summary-savings-badge">
                        <i class="bi bi-tag-fill"></i>
                        <span>You're saving <strong id="summarySavings">₹7,000</strong> on this order!</span>
                    </div>
                    <a href="checkout.php" class="btn-checkout" id="btnCheckout">
                        <i class="bi bi-lock-fill"></i> Proceed to Checkout
                    </a>
                    <a href="index.php" class="btn-continue-shopping">
                        <i class="bi bi-arrow-left"></i> Continue Shopping
                    </a>
                    <div class="summary-secure-note">
                        <i class="bi bi-shield-check"></i> 100% Secure Checkout · SSL Encrypted
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty Cart State (hidden by default) -->
        <div class="empty-cart-wrapper d-none" id="cartEmptyState">
            <div class="empty-cart-icon">
                <i class="bi bi-cart-x"></i>
            </div>
            <h2 class="empty-cart-title">Your Cart is Empty</h2>
            <p class="empty-cart-desc">Looks like you haven't added anything to your cart yet. Explore our collections and discover premium fashion essentials.</p>
            <a href="index.php" class="btn-shop-now">
                <i class="bi bi-bag-check"></i> Start Shopping
            </a>
        </div>
    </div>
</section>

<script>
    // ===== Cart Logic =====
    let couponApplied = false;
    let couponDiscount = 0;

    function formatCurrency(num) {
        return '₹' + num.toLocaleString('en-IN');
    }

    function saveCartToLocalStorage() {
        const items = document.querySelectorAll('.cart-item-card:not(.removing)');
        const cartList = [];
        items.forEach(card => {
            const id = card.dataset.itemId;
            const price = parseInt(card.dataset.price);
            const original = parseInt(card.dataset.original);
            const qty = parseInt(card.dataset.qty);
            const img = card.querySelector('.cart-item-img img').src;
            const name = card.querySelector('.cart-item-name').textContent;
            const brand = card.querySelector('.cart-item-brand').textContent;
            const metaSpans = card.querySelectorAll('.cart-item-meta span');
            let size = "";
            let color = "";
            let style = "";
            if (metaSpans.length > 0) {
                const text = metaSpans[0].textContent;
                if (text.includes("Size:")) {
                    const sizeStrong = metaSpans[0].querySelector('strong');
                    if (sizeStrong) size = sizeStrong.textContent;
                } else if (text.includes("Style:")) {
                    const styleStrong = metaSpans[0].querySelector('strong');
                    if (styleStrong) style = styleStrong.textContent;
                }
            }
            if (metaSpans.length > 1) {
                color = metaSpans[1].textContent.trim();
            }
            cartList.push({ id, brand, name, price, original, qty, img, size, color, style });
        });
        localStorage.setItem('axv_cart', JSON.stringify(cartList));
        
        // Update header badges
        const totalQty = cartList.reduce((acc, curr) => acc + curr.qty, 0);
        const desktopCountEl = document.getElementById('desktopCartCount');
        const mobileCountEl = document.getElementById('mobileCartCount');
        if (desktopCountEl) desktopCountEl.textContent = totalQty;
        if (mobileCountEl) mobileCountEl.textContent = totalQty;
    }

    function loadCartFromLocalStorage() {
        let cartItems = [];
        try {
            const localCart = localStorage.getItem('axv_cart');
            if (localCart) {
                cartItems = JSON.parse(localCart);
            }
        } catch(e) {}

        if (!localStorage.getItem('axv_cart')) {
            // first time load - keep default items and write to storage
            saveCartToLocalStorage();
            return;
        }

        if (cartItems.length === 0) {
            document.getElementById('cartFilledState').classList.add('d-none');
            document.getElementById('cartEmptyState').classList.remove('d-none');
            return;
        }

        const container = document.getElementById('cartItemsContainer');
        container.innerHTML = '';

        cartItems.forEach(item => {
            const card = document.createElement('div');
            card.className = 'cart-item-card';
            card.dataset.itemId = item.id;
            card.dataset.price = item.price;
            card.dataset.original = item.original || (item.price * 2);
            card.dataset.qty = item.qty;

            const isMinusDisabled = item.qty <= 1 ? 'disabled' : '';
            const isPlusDisabled = item.qty >= 10 ? 'disabled' : '';
            const savings = (item.original || (item.price * 2)) - item.price;
            
            let metaHtml = '';
            if (item.size) {
                metaHtml = `<span>Size: <strong>${item.size}</strong></span>`;
            } else if (item.style) {
                metaHtml = `<span>Style: <strong>${item.style}</strong></span>`;
            }
            metaHtml += `<span><span class="meta-dot" style="background:#3b82f6;border-color:#3b82f6;"></span> ${item.color || 'Default'}</span>`;

            card.innerHTML = `
                <button class="cart-item-remove" onclick="removeCartItem(this)" aria-label="Remove item">
                    <i class="bi bi-x-lg"></i>
                </button>
                <div class="cart-item-img">
                    <img src="${item.img}" alt="${item.name}" loading="lazy">
                </div>
                <div class="cart-item-details">
                    <div class="cart-item-brand">${item.brand}</div>
                    <h3 class="cart-item-name">${item.name}</h3>
                    <div class="cart-item-meta">
                        ${metaHtml}
                    </div>
                    <div class="cart-item-bottom">
                        <div class="qty-stepper">
                            <button onclick="changeQty(this, -1)" ${isMinusDisabled}><i class="bi bi-dash"></i></button>
                            <span class="qty-value">${item.qty}</span>
                            <button onclick="changeQty(this, 1)" ${isPlusDisabled}><i class="bi bi-plus"></i></button>
                        </div>
                        <div class="cart-item-price">
                            <span class="price-current">${formatCurrency(item.price * item.qty)}</span>
                            <span class="price-original">${formatCurrency((item.original || (item.price * 2)) * item.qty)}</span>
                            <span class="price-saved">You save ${formatCurrency(savings * item.qty)}</span>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(card);
        });
    }

    function recalcSummary() {
        const items = document.querySelectorAll('.cart-item-card:not(.removing)');
        let subtotal = 0;
        let totalOriginal = 0;
        let itemCount = 0;

        items.forEach(card => {
            const price = parseInt(card.dataset.price);
            const original = parseInt(card.dataset.original);
            const qty = parseInt(card.dataset.qty);
            subtotal += price * qty;
            totalOriginal += original * qty;
            itemCount += qty;
        });

        const tax = Math.round(subtotal * 0.18);
        const shipping = subtotal > 999 ? 0 : 99;
        const discount = couponApplied ? couponDiscount : 0;
        const total = subtotal + tax + shipping - discount;
        const savings = totalOriginal - subtotal + discount;

        document.getElementById('summaryItemCount').textContent = itemCount;
        document.getElementById('summarySubtotal').textContent = formatCurrency(subtotal);
        document.getElementById('summaryShipping').textContent = shipping === 0 ? 'FREE' : formatCurrency(shipping);
        document.getElementById('summaryShipping').className = shipping === 0 ? 'value text-green' : 'value';
        document.getElementById('summaryTax').textContent = formatCurrency(tax);
        document.getElementById('summaryTotal').textContent = formatCurrency(total);
        document.getElementById('summarySavings').textContent = formatCurrency(savings);
        document.getElementById('cartCountText').innerHTML = 'You have <strong>' + items.length + ' item' + (items.length !== 1 ? 's' : '') + '</strong> in your cart';

        if (items.length === 0) {
            document.getElementById('cartFilledState').classList.add('d-none');
            document.getElementById('cartEmptyState').classList.remove('d-none');
        }

        saveCartToLocalStorage();
    }

    function changeQty(btn, delta) {
        const stepper = btn.closest('.qty-stepper');
        const valueEl = stepper.querySelector('.qty-value');
        const card = btn.closest('.cart-item-card');
        let qty = parseInt(valueEl.textContent);
        qty = Math.max(1, Math.min(10, qty + delta));
        valueEl.textContent = qty;
        card.dataset.qty = qty;

        // Update disable states
        const minusBtn = stepper.querySelector('button:first-child');
        const plusBtn = stepper.querySelector('button:last-child');
        minusBtn.disabled = qty <= 1;
        plusBtn.disabled = qty >= 10;

        // Update line price
        const price = parseInt(card.dataset.price);
        const original = parseInt(card.dataset.original);
        const priceEl = card.querySelector('.price-current');
        const origEl = card.querySelector('.price-original');
        const savedEl = card.querySelector('.price-saved');
        priceEl.textContent = formatCurrency(price * qty);
        origEl.textContent = formatCurrency(original * qty);
        savedEl.textContent = 'You save ' + formatCurrency((original - price) * qty);

        recalcSummary();
    }

    function removeCartItem(btn) {
        const card = btn.closest('.cart-item-card');
        card.classList.add('removing');
        setTimeout(() => {
            card.remove();
            recalcSummary();
            if (typeof showToast === 'function') {
                showToast('Item removed from cart');
            }
        }, 400);
    }

    function applyCoupon() {
        const input = document.getElementById('couponInput');
        const code = input.value.trim().toUpperCase();
        if (!code) return;

        // Demo: accept any code
        couponApplied = true;
        couponDiscount = 500;
        localStorage.setItem('axv_coupon_applied', 'true');
        document.getElementById('couponCodeDisplay').textContent = code;
        document.getElementById('couponSuccess').classList.add('show');
        document.getElementById('discountRow').style.display = 'flex';
        input.disabled = true;
        input.style.opacity = '0.5';

        recalcSummary();
        if (typeof showToast === 'function') {
            showToast('Coupon applied successfully!');
        }
    }

    // Initialize
    loadCartFromLocalStorage();
    recalcSummary();
</script>

<?php include 'includes/footer.php'; ?>
