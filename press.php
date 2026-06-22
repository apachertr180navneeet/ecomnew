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
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">Press Room</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Custom Page Styling -->
<style>
    .press-hero {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #1a1a2e 0%, #4B097A 50%, #6A0DAD 100%);
        color: #fff;
        overflow: hidden;
        text-align: center;
    }
    .press-hero-pattern {
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
    .press-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    .press-hero-desc {
        font-size: 1.15rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
        font-weight: 300;
    }
    .media-kit-box {
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-lg);
        padding: 40px 30px;
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        transition: var(--transition);
    }
    .media-kit-box:hover {
        border-color: var(--clr-primary-light);
        box-shadow: var(--shadow-md);
    }
    .press-filter-row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 40px;
    }
    .press-filter-pill {
        border: 1.5px solid var(--clr-border);
        background: var(--clr-white);
        padding: 10px 24px;
        font-size: 0.88rem;
        font-weight: 600;
        border-radius: var(--radius-pill);
        cursor: pointer;
        transition: var(--transition-fast);
        color: var(--clr-text-light);
    }
    .press-filter-pill:hover,
    .press-filter-pill.active {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.04);
        color: var(--clr-primary);
    }
    .press-release-card {
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .press-release-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--clr-primary-light);
    }
    .press-card-category {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--clr-primary-light);
        letter-spacing: 1px;
        margin-bottom: 8px;
    }
    .press-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--clr-dark);
        margin-bottom: 12px;
        line-height: 1.4;
    }
    .press-card-meta {
        font-size: 0.82rem;
        color: var(--clr-text-light);
        margin-bottom: 15px;
        display: flex;
        gap: 12px;
    }
    .press-card-desc {
        font-size: 0.92rem;
        color: var(--clr-text-light);
        margin-bottom: 20px;
        line-height: 1.6;
    }
    .press-card-link {
        font-weight: 600;
        color: var(--clr-primary);
        font-size: 0.9rem;
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: var(--transition-fast);
    }
    .press-release-card:hover .press-card-link {
        color: var(--clr-primary-dark);
        gap: 10px;
    }
    .press-quote-card {
        background: #f8fafc;
        border-left: 4px solid var(--clr-primary);
        padding: 30px;
        border-radius: 0 var(--radius-md) var(--radius-md) 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 20px;
    }
    .press-quote-text {
        font-style: italic;
        font-size: 1.05rem;
        color: var(--clr-dark);
        line-height: 1.7;
    }
    .press-quote-author {
        font-weight: 800;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--clr-primary);
    }

    /* Toast */
    .press-toast-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1080;
    }
    .press-toast {
        background: #fff;
        border-left: 4px solid var(--clr-primary);
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

    @media (max-width: 767.98px) {
        .press-hero-title {
            font-size: 2.5rem;
        }
        .media-kit-box {
            flex-direction: column;
            text-align: center;
        }
        .media-kit-box button {
            width: 100%;
        }
    }
</style>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="press-hero">
    <div class="press-hero-pattern"></div>
    <div class="container position-relative">
        <h1 class="press-hero-title">Press Room</h1>
        <p class="press-hero-desc">Access our latest announcements, media kit materials, and read curated features from global design journals.</p>
    </div>
</section>

<!-- ============================================
     MEDIA KIT DOWNLOAD
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container py-2">
        <div class="media-kit-box">
            <div>
                <h2 class="h4 fw-bold mb-2" style="color: var(--clr-dark);">Download Brand Assets Kit</h2>
                <p class="text-muted mb-0 small">Includes scalable vector logos, color guidelines, typeface packets, and high-resolution executive portrait folders.</p>
            </div>
            <button class="btn py-3 px-4 fw-bold text-nowrap" style="background: var(--clr-primary); color: #fff; border:none; border-radius: var(--radius-pill); transition: var(--transition-fast);" onclick="triggerMediaDownload()">
                <i class="bi bi-download me-2"></i> Get Media Kit (14 MB)
            </button>
        </div>
    </div>
</section>

<!-- ============================================
     PRESS RELEASES
     ============================================ -->
<section class="py-5 bg-light border-top border-bottom">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">ANNOUNCEMENTS</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">Press Releases</h2>
            <p class="text-muted">Stay up to date with corporate announcements, fashion launch timelines, and environmental audits.</p>
        </div>

        <!-- Filter pills -->
        <div class="press-filter-row">
            <button class="press-filter-pill active" onclick="filterPress('All', this)">All Feeds</button>
            <button class="press-filter-pill" onclick="filterPress('Product Launch', this)">Product Launches</button>
            <button class="press-filter-pill" onclick="filterPress('Sustainability', this)">Sustainability</button>
            <button class="press-filter-pill" onclick="filterPress('Financial', this)">Financial</button>
        </div>

        <!-- Press Cards Grid -->
        <div class="row g-4 justify-content-center">
            <!-- Release 1 -->
            <div class="col-lg-4 col-md-6 press-card-wrapper" data-category="Sustainability">
                <div class="press-release-card">
                    <span class="press-card-category">Sustainability</span>
                    <h3 class="press-card-title">Axvero Debuts Circular Fashion Recycling Platform</h3>
                    <div class="press-card-meta">
                        <span>June 18, 2026</span>
                        <span>&bull;</span>
                        <span>3 min read</span>
                    </div>
                    <p class="press-card-desc">Axvero today launched its omnichannel garment intake and fiber circularity program to reduce clothing landfills and reward consumer recycling.</p>
                    <a href="#" class="press-card-link" onclick="readFullRelease('Garment Recycling Launch', event)">Read Full Story <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Release 2 -->
            <div class="col-lg-4 col-md-6 press-card-wrapper" data-category="Financial">
                <div class="press-release-card">
                    <span class="press-card-category">Financial</span>
                    <h3 class="press-card-title">Axvero Secures Series A Funding to Expand Omnichannel</h3>
                    <div class="press-card-meta">
                        <span>April 05, 2026</span>
                        <span>&bull;</span>
                        <span>4 min read</span>
                    </div>
                    <p class="press-card-desc">Axvero announced a successful raising of $8M in Series A funding to scale physical experience stores across Mumbai, Delhi, and Bengaluru.</p>
                    <a href="#" class="press-card-link" onclick="readFullRelease('Series A Funding', event)">Read Full Story <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Release 3 -->
            <div class="col-lg-4 col-md-6 press-card-wrapper" data-category="Product Launch">
                <div class="press-release-card">
                    <span class="press-card-category">Product Launch</span>
                    <h3 class="press-card-title">Exclusive Luxury Streetwear Capsule with Vikram Malhotra</h3>
                    <div class="press-card-meta">
                        <span>February 12, 2026</span>
                        <span>&bull;</span>
                        <span>3 min read</span>
                    </div>
                    <p class="press-card-desc">Unveiling our premium summer resort outerwear capsule, featuring raw-woven linen bombers and heavyweight brushed terry hoodies.</p>
                    <a href="#" class="press-card-link" onclick="readFullRelease('Vikram Malhotra Capsule', event)">Read Full Story <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Release 4 -->
            <div class="col-lg-4 col-md-6 press-card-wrapper" data-category="Sustainability">
                <div class="press-release-card">
                    <span class="press-card-category">Sustainability</span>
                    <h3 class="press-card-title">Axvero Achieves 100% GOTS Organic Cotton Milestone</h3>
                    <div class="press-card-meta">
                        <span>November 20, 2025</span>
                        <span>&bull;</span>
                        <span>5 min read</span>
                    </div>
                    <p class="press-card-desc">Our audited cotton farms successfully transition to 100% GOTS-certified organic cotton yarns, saving 140+ tonnes of carbon logs.</p>
                    <a href="#" class="press-card-link" onclick="readFullRelease('GOTS Cotton Transition', event)">Read Full Story <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <!-- Empty State -->
            <div id="noPressMsg" class="text-center py-5" style="display: none;">
                <i class="bi bi-newspaper text-muted" style="font-size: 3rem;"></i>
                <h4 class="mt-3 fw-bold text-dark">No press releases found</h4>
                <p class="text-muted small">Try selecting another news category tag.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MEDIA FEATURES WALL
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">IN THE MEDIA</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">Featured Quotes</h2>
            <p class="text-muted">What global fashion critics and technology publications say about our products.</p>
        </div>

        <div class="row g-4">
            <!-- Quote 1 -->
            <div class="col-lg-4">
                <div class="press-quote-card">
                    <div class="press-quote-text">"Axvero blends rebellious, premium streetwear cuts with meticulous tailoring lines. A highly unique label worth checking out."</div>
                    <div class="press-quote-author">GQ Magazine</div>
                </div>
            </div>
            <!-- Quote 2 -->
            <div class="col-lg-4">
                <div class="press-quote-card">
                    <div class="press-quote-text">"An absolute masterclass in conscious, high-quality, everyday staples design. They show that sustainability can look extremely premium."</div>
                    <div class="press-quote-author">Vogue India</div>
                </div>
            </div>
            <!-- Quote 3 -->
            <div class="col-lg-4">
                <div class="press-quote-card">
                    <div class="press-quote-text">"Disrupting traditional retail markups and fast fashion cycles with an experiential, highly transparent omnichannel playbook."</div>
                    <div class="press-quote-author">Forbes</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TOAST NOTIFICATION AREA
     ============================================ -->
<div class="press-toast-container" id="pressToastContainer"></div>

<!-- ============================================
     JAVASCRIPT LOGIC
     ============================================ -->
<script>
    let activeCategory = 'All';

    // 1. Filter news feeds
    function filterPress(category, buttonElement) {
        activeCategory = category;

        // Toggle active button style
        document.querySelectorAll(".press-filter-pill").forEach(pill => pill.classList.remove("active"));
        buttonElement.classList.add("active");

        const cards = document.querySelectorAll(".press-card-wrapper");
        const msg = document.getElementById("noPressMsg");
        let visibleCount = 0;

        cards.forEach(card => {
            const cat = card.getAttribute("data-category");
            if (activeCategory === 'All' || cat === activeCategory) {
                card.style.display = "block";
                visibleCount++;
            } else {
                card.style.display = "none";
            }
        });

        // Toggle empty state message
        if (visibleCount === 0) {
            msg.style.display = "block";
        } else {
            msg.style.display = "none";
        }
    }

    // 2. Simulate Media kit download
    function triggerMediaDownload() {
        showPressToast(`📥 Preparing assets... Axvero_MediaKit_2026.zip download initiated!`);
    }

    // 3. Simulate release read details
    function readFullRelease(title, e) {
        e.preventDefault();
        showPressToast(`📄 Loading official PDF document for <strong>"${title}"</strong>...`);
    }

    // 4. Custom Press Toast Alert
    function showPressToast(message) {
        const container = document.getElementById("pressToastContainer");
        const toast = document.createElement("div");
        toast.className = "press-toast";
        toast.innerHTML = `
            <i class="bi bi-megaphone text-purple" style="font-size: 1.4rem; color: var(--clr-primary) !important;"></i>
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
