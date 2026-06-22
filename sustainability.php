<?php 
include 'includes/header.php'; 
?>

<!-- ============================================
     BREADCRUMB
     ============================================ -->
<div class="category-breadcrumb py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-family: var(--ff-primary); font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">Sustainability</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Custom Page Styling -->
<style>
    .sus-hero {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #1f3c2b 0%, #112a1c 60%, #081710 100%);
        color: #fff;
        overflow: hidden;
        text-align: center;
    }
    .sus-hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.08;
        background-image: radial-gradient(circle at 2px 2px, #fff 1px, transparent 0);
        background-size: 24px 24px;
        pointer-events: none;
    }
    .sus-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
        color: #8ce09e;
    }
    .sus-hero-desc {
        font-size: 1.15rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
        font-weight: 300;
    }
    .counter-sec {
        background: #f8faf9;
        border-bottom: 1px solid var(--clr-border);
    }
    .counter-card {
        padding: 30px;
        border-radius: var(--radius-md);
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        text-align: center;
        box-shadow: var(--shadow-sm);
        height: 100%;
        transition: var(--transition);
    }
    .counter-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: #8ce09e;
    }
    .counter-val {
        font-size: 2.8rem;
        font-weight: 800;
        color: #112a1c;
        font-family: var(--ff-primary);
        line-height: 1.1;
        margin-bottom: 10px;
    }
    .counter-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--clr-text-light);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .pillar-card {
        padding: 40px 30px;
        border-radius: var(--radius-lg);
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        height: 100%;
        transition: var(--transition);
    }
    .pillar-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: #1f3c2b;
    }
    .pillar-icon-box {
        font-size: 2.5rem;
        color: #2e7d32;
        margin-bottom: 20px;
    }
    .recycle-box {
        background: linear-gradient(135deg, #f0f7f3 0%, #e3f2e8 100%);
        border-radius: var(--radius-lg);
        border: 1px solid #c2e2cc;
        overflow: hidden;
    }
    .recycle-form-card {
        background: var(--clr-white);
        border-radius: var(--radius-md);
        border: 1px solid #c2e2cc;
        padding: 30px;
        box-shadow: var(--shadow-sm);
    }
    .recycle-success-card {
        background: linear-gradient(135deg, #112a1c 0%, #1f3c2b 100%);
        color: #fff;
        border-radius: var(--radius-md);
        padding: 40px;
        text-align: center;
        box-shadow: var(--shadow-lg);
        display: none;
        animation: scaleUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    @keyframes scaleUp {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    .coupon-badge {
        font-size: 1.8rem;
        font-weight: 800;
        letter-spacing: 2px;
        background: rgba(255, 255, 255, 0.15);
        border: 2px dashed rgba(255, 255, 255, 0.4);
        padding: 10px 24px;
        border-radius: 4px;
        display: inline-block;
        margin: 20px 0;
        color: #8ce09e;
    }
    .form-select-custom {
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        padding: 12px 18px;
        font-size: 0.95rem;
        transition: var(--transition-fast);
        outline: none;
    }
    .form-select-custom:focus {
        border-color: #8ce09e;
        box-shadow: 0 4px 12px rgba(31, 60, 43, 0.06);
    }

    /* Success label download button representation */
    .btn-cert-download {
        background: #8ce09e;
        color: #112a1c;
        font-weight: 700;
        border: none;
        padding: 12px 30px;
        border-radius: var(--radius-pill);
        transition: var(--transition-fast);
    }
    .btn-cert-download:hover {
        background: #fff;
        color: #112a1c;
        transform: translateY(-2px);
    }

    /* Toast */
    .sus-toast-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1080;
    }
    .sus-toast {
        background: #fff;
        border-left: 4px solid #2e7d32;
        box-shadow: var(--shadow-lg);
        border-radius: var(--radius-sm);
        padding: 16px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.95rem;
        animation: toastSlideIn 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 400px;
    }
</style>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="sus-hero">
    <div class="sus-hero-pattern"></div>
    <div class="container position-relative">
        <h1 class="sus-hero-title">Fashion with Purpose</h1>
        <p class="sus-hero-desc">We make clothing with an unwavering focus on carbon offsets, ethical workspace wages, organic inputs, and circular apparel lifespans.</p>
    </div>
</section>

<!-- ============================================
     LIVE TIMING STATS
     ============================================ -->
<section class="py-5 counter-sec">
    <div class="container">
        <div class="row g-4">
            <!-- Counter 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="counter-card">
                    <div class="counter-val" id="waterCounter">1,245,670</div>
                    <div class="counter-label">Liters of Water Saved</div>
                </div>
            </div>
            <!-- Counter 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="counter-card">
                    <div class="counter-val" id="bottlesCounter">842,120</div>
                    <div class="counter-label">Plastic Bottles Recycled</div>
                </div>
            </div>
            <!-- Counter 3 -->
            <div class="col-lg-4 col-md-12">
                <div class="counter-card">
                    <div class="counter-val" id="treesCounter">45,900</div>
                    <div class="counter-label">Trees Planted Globally</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SUSTAINABILITY PILLARS
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-success fw-bold uppercase letter-spacing-1 mb-2 d-inline-block" style="color: #2e7d32 !important;">OUR PILLARS</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">How We Achieve Green Retail</h2>
            <p class="text-muted">By auditing our supply routes, building circular collection bins, and using clean fibers, we're forging sustainable fashion.</p>
        </div>

        <div class="row g-4">
            <!-- Pillar 1 -->
            <div class="col-lg-4">
                <div class="pillar-card">
                    <div class="pillar-icon-box"><i class="bi bi-tree"></i></div>
                    <h3 class="h5 fw-bold mb-3">100% GOTS Cotton</h3>
                    <p class="text-muted mb-0">Organic farming excludes chemical toxins, consumes 85% less water, and safeguards soil biology. All our basics use global organic standards.</p>
                </div>
            </div>
            <!-- Pillar 2 -->
            <div class="col-lg-4">
                <div class="pillar-card">
                    <div class="pillar-icon-box"><i class="bi bi-people"></i></div>
                    <h3 class="h5 fw-bold mb-3">Fair Wage Factories</h3>
                    <p class="text-muted mb-0">We choose artisans who operate under strict labor guidelines, clean working environments, and fair union-approved wages.</p>
                </div>
            </div>
            <!-- Pillar 3 -->
            <div class="col-lg-4">
                <div class="pillar-card">
                    <div class="pillar-icon-box"><i class="bi bi-box-seam"></i></div>
                    <h3 class="h5 fw-bold mb-3">Zero-Waste Logistics</h3>
                    <p class="text-muted mb-0">All domestic orders are packed in cornstarch envelopes that dissolve safely within compost systems inside 180 days.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     INTERACTIVE APPAREL RECYCLING PROGRAM
     ============================================ -->
<section class="py-5 bg-light border-top">
    <div class="container py-4">
        <div class="recycle-box p-4 p-md-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="text-success fw-bold uppercase letter-spacing-1 mb-2 d-inline-block" style="color: #2e7d32 !important;">CIRCULAR INITIATIVE</span>
                    <h2 class="h2 fw-bold mb-3" style="color: #112a1c;">Axvero Recycle &amp; Reward</h2>
                    <p class="text-muted mb-4">Send us your pre-loved, worn-out garments of any brand. We break them down to reconstruct raw recycled fibers. In exchange, we'll send you an instant 15% discount coupon for your next purchase and schedule a free courier pick-up!</p>
                    
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            <div>
                                <h4 class="h6 fw-bold mb-1">Free Doorstep Pickup</h4>
                                <p class="small text-muted mb-0">We send a courier to collect your parcel directly from your home.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            <div>
                                <h4 class="h6 fw-bold mb-1">15% Reward Coupon</h4>
                                <p class="small text-muted mb-0">Redeemable on any active, non-sale item inside the catalog.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Form Container -->
                    <div class="recycle-form-card" id="recycleFormCard">
                        <h3 class="h5 fw-bold mb-4" style="color: var(--clr-dark);">Schedule a Collection</h3>
                        <form id="recycleForm" onsubmit="handleRecycleSubmit(event)">
                            <div class="mb-3">
                                <label for="recycleName" class="form-label fw-semibold text-muted small">Full Name *</label>
                                <input type="text" id="recycleName" class="form-control form-control-custom" placeholder="e.g. Navneet Kumar" required>
                            </div>
                            <div class="mb-3">
                                <label for="recycleEmail" class="form-label fw-semibold text-muted small">Email Address *</label>
                                <input type="email" id="recycleEmail" class="form-control form-control-custom" placeholder="name@domain.com" required>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <label for="recycleCategory" class="form-label fw-semibold text-muted small">Primary Apparel *</label>
                                    <select id="recycleCategory" class="form-select form-select-custom w-100" required>
                                        <option value="Denim / Jeans">Denim / Jeans</option>
                                        <option value="T-Shirts & Tops">T-Shirts & Tops</option>
                                        <option value="Jackets & Coats">Outerwear</option>
                                        <option value="Shoes & Sneakers">Footwear</option>
                                        <option value="Mixed Knits">Mixed Knits</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="recycleQty" class="form-label fw-semibold text-muted small">Approx. Quantity (pcs) *</label>
                                    <select id="recycleQty" class="form-select form-select-custom w-100" required>
                                        <option value="1 - 3 pieces">1 - 3 pieces</option>
                                        <option value="4 - 7 pieces">4 - 7 pieces</option>
                                        <option value="8+ pieces">8+ pieces</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" id="recycleSubmitBtn" class="btn w-100 py-3 fw-bold" style="background: #112a1c; color:#fff; border:none; border-radius: var(--radius-sm); transition: var(--transition-fast);">
                                Generate Pickup Label
                            </button>
                        </form>
                    </div>

                    <!-- Recycle Success state -->
                    <div class="recycle-success-card" id="recycleSuccessCard">
                        <i class="bi bi-gift-fill text-success mb-3" style="font-size: 3rem; color: #8ce09e !important;"></i>
                        <h3 class="h4 fw-bold mb-2">Label Generated!</h3>
                        <p class="small opacity-75">Your scheduled collection reference label has been sent to your email. Please pack your garments and await dispatch instructions.</p>
                        
                        <div class="coupon-badge" id="couponCode">AXGREEN15</div>
                        <p class="small opacity-75 mb-4">Use the code above during checkout for <strong>15% OFF</strong> on your next purchase.</p>
                        
                        <button class="btn btn-cert-download" onclick="resetRecycleForm()">Schedule Another Parcel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TOAST NOTIFICATION AREA
     ============================================ -->
<div class="sus-toast-container" id="susToastContainer"></div>

<!-- ============================================
     JAVASCRIPT LOGIC
     ============================================ -->
<script>
    // 1. Live ticking counters data and logic
    let waterSaved = 1245670;
    let bottlesRecycled = 842120;
    let treesPlanted = 45900;

    function formatNumber(num) {
        return new Intl.NumberFormat('en-IN').format(num);
    }

    function initTickingStats() {
        const waterEl = document.getElementById("waterCounter");
        const bottlesEl = document.getElementById("bottlesCounter");
        const treesEl = document.getElementById("treesCounter");

        // Liters of water ticker (adds 2-5 liters every second)
        setInterval(() => {
            waterSaved += Math.floor(Math.random() * 4) + 2;
            waterEl.textContent = formatNumber(waterSaved);
        }, 1200);

        // Bottles ticker (adds 1-3 bottles every second)
        setInterval(() => {
            bottlesRecycled += Math.floor(Math.random() * 3) + 1;
            bottlesEl.textContent = formatNumber(bottlesRecycled);
        }, 1500);

        // Trees ticker (adds 1 tree every 6 seconds)
        setInterval(() => {
            treesPlanted += 1;
            treesEl.textContent = formatNumber(treesPlanted);
        }, 6000);
    }

    document.addEventListener("DOMContentLoaded", () => {
        initTickingStats();
    });

    // 2. Interactive circular recycling form submission
    function handleRecycleSubmit(e) {
        e.preventDefault();

        const submitBtn = document.getElementById("recycleSubmitBtn");
        const formCard = document.getElementById("recycleFormCard");
        const successCard = document.getElementById("recycleSuccessCard");
        const applicantName = document.getElementById("recycleName").value;

        // Visual loading spinner
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Scheduling Pickup...`;

        setTimeout(() => {
            // Swap screens
            formCard.style.display = "none";
            successCard.style.display = "block";

            // Reset submit button state
            submitBtn.disabled = false;
            submitBtn.innerHTML = `Generate Pickup Label`;

            // Display Toast notification
            showSustainabilityToast(`🌿 Courier scheduled! Coupon code email sent successfully to ${applicantName}.`);
        }, 1500);
    }

    // 3. Reset form view
    function resetRecycleForm() {
        document.getElementById("recycleForm").reset();
        document.getElementById("recycleSuccessCard").style.display = "none";
        document.getElementById("recycleFormCard").style.display = "block";
    }

    // 4. Custom Sustainability Toast Alert
    function showSustainabilityToast(message) {
        const container = document.getElementById("susToastContainer");
        const toast = document.createElement("div");
        toast.className = "sus-toast";
        toast.innerHTML = `
            <i class="bi bi-recycle text-success" style="font-size: 1.4rem;"></i>
            <div>${message}</div>
        `;
        container.appendChild(toast);

        // Slide away and delete
        setTimeout(() => {
            toast.style.animation = "toastSlideIn 0.3s reverse forwards";
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4500);
    }
</script>

<?php 
include 'includes/footer.php'; 
?>
