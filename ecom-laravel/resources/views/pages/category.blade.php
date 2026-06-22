@extends('layouts.app')

@section('title', 'Category - {{ $category }}')

@section('content')
<!-- ============================================
     BREADCRUMB
     ============================================ -->
<div class="category-breadcrumb py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-family: var(--ff-primary); font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-muted">{{ $category }}</a></li>
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">Shirts</li>
            </ol>
        </nav>
    </div>
</div>

<!-- ============================================
     CATEGORY HERO SECTION
     ============================================ -->
<section class="category-hero-fullscreen">
    <!-- Background Image -->
    <div class="category-hero-bg-wrapper">
        <img src="assets/model.png" alt="Fashion Model Background" class="category-hero-bg-img" />
        <div class="category-hero-bg-overlay"></div>
    </div>
    
    <div class="container position-relative z-3">
        <div class="row align-items-center min-vh-80 py-5">
            <!-- Left Text Column -->
            <div class="col-lg-7 text-white mb-5 mb-lg-0 text-start">
                <span class="category-hero-subtitle">MADE IN INDIA, DEDICATED TO INDIA</span>
                <h1 class="category-hero-main-title mt-2 mb-4">
                    DISCOVER THE ART OF<br>DRESSING UP
                </h1>
            </div>
            
            <!-- Right Alternating Product Cards Column -->
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-4 align-items-center align-items-lg-end">
                    <!-- Alternating Card 1: Image Left, Text Right -->
                    <div class="category-product-row-card">
                        <div class="row g-0 align-items-stretch w-100 h-100">
                            <div class="col-5">
                                <div class="category-product-card-img-box">
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=200&h=200&fit=crop&q=80" alt="Cotton Cable Knit Polo" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="category-product-card-body text-start">
                                    <h4 class="category-product-card-title">Product Name in Here</h4>
                                    <p class="category-product-card-price">INR 300.000</p>
                                    <a href="#" class="category-product-card-link">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alternating Card 2: Text Left, Image Right -->
                    <div class="category-product-row-card">
                        <div class="row g-0 align-items-stretch w-100 h-100">
                            <div class="col-7">
                                <div class="category-product-card-body text-start">
                                    <h4 class="category-product-card-title">Product Name in Here</h4>
                                    <p class="category-product-card-price">INR 300.000</p>
                                    <a href="#" class="category-product-card-link">SHOP NOW</a>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="category-product-card-img-box">
                                    <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=200&h=200&fit=crop&q=80" alt="Loose Fit Cotton Tee" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chevron Down Icon at the very bottom -->
    <div class="category-hero-scroll-down">
        <i class="bi bi-chevron-down text-white fs-3"></i>
    </div>
</section>

<!-- ============================================
     LATEST COLLECTION
     ============================================ -->
<section id="latest-collection" class="collection-picks py-5 reveal">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title h3 mb-0" style="text-transform: lowercase; font-family: var(--ff-primary); font-weight: 700; letter-spacing: -0.5px;">latest collection</h2>
            <a href="#" class="text-purple fw-semibold">View All</a>
        </div>
        <div class="collection-grid">
            <!-- 1. Brown Shirt -->
            <div class="collection-item collection-item-sm">
                <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop&q=80" alt="Brown Textured Shirt" />
                <div class="collection-label">Brown Shirt</div>
            </div>
            <!-- 2. Patterned Trousers -->
            <div class="collection-item collection-item-lg">
                <img src="https://images.unsplash.com/photo-1509551388413-e18d0ac5d495?w=600&h=800&fit=crop&q=80" alt="Patterned Trousers" />
                <div class="collection-label">Patterned Trousers</div>
            </div>
            <!-- 3. Blue Jeans -->
            <div class="collection-item collection-item-lg">
                <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=600&h=800&fit=crop&q=80" alt="Light Blue Jeans" />
                <div class="collection-label">Light Blue Jeans</div>
            </div>
            <!-- 4. Black T-Shirt -->
            <div class="collection-item collection-item-sm">
                <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=600&h=800&fit=crop&q=80" alt="Black Patterned Tee" />
                <div class="collection-label">Black Patterned Tee</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     BROWSE BY DRESS STYLE
     ============================================ -->
<section class="py-5 reveal">
    <div class="container">
        <div class="dress-style">
            <h2 class="text-center mb-5" style="font-family: var(--ff-primary); font-weight: 800; letter-spacing: 1px;">BROWSE BY DRESS STYLE</h2>
            <div class="style-grid">
                <!-- 1. Casual -->
                <div class="style-card style-card-wide">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&h=400&fit=crop&q=80" alt="Casual" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Casual</span>
                </div>
                <!-- 2. Formal -->
                <div class="style-card style-card-wide">
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=600&h=400&fit=crop&q=80" alt="Formal" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Formal</span>
                </div>
                <!-- 3. Partywear -->
                <div class="style-card">
                    <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=400&h=400&fit=crop&q=80" alt="Partywear" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Partywear</span>
                </div>
                <!-- 4. Ethnic wear -->
                <div class="style-card style-card-wide">
                    <img src="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=600&h=400&fit=crop&q=80" alt="Ethnic wear" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Ethnic wear</span>
                </div>
                <!-- 5. Activewear -->
                <div class="style-card">
                    <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=400&h=400&fit=crop&q=80" alt="Activewear" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Activewear</span>
                </div>
                <!-- 6. Rainwear -->
                <div class="style-card style-card-wide">
                    <img src="https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?w=600&h=400&fit=crop&q=80" alt="Rainwear" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Rainwear</span>
                </div>
                <!-- 7. Mens -->
                <div class="style-card style-card-wide">
                    <img src="https://images.unsplash.com/photo-1488161628813-04466f872be2?w=600&h=400&fit=crop&q=80" alt="Mens" />
                    <div class="style-overlay"></div>
                    <span class="style-label">Mens</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NEW THIS WEEK
     ============================================ -->
<section class="products-section new-this-week py-5 reveal">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <h2 class="must-have-section-title" style="text-transform: uppercase;">New This Week</h2>
            </div>
            <div class="d-flex gap-2">
                <button class="must-have-nav-btn prev" data-carousel-prev="#newWeekCarousel">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="must-have-nav-btn next" data-carousel-next="#newWeekCarousel">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div id="newWeekCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <!-- Product 1 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist wishlist-btn" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=500&h=660&fit=crop&q=80" alt="Cotton Flannel Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton Flannel Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 2 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist wishlist-btn" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=500&h=660&fit=crop&q=80" alt="Cotton Flannel Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton Flannel Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 3 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist wishlist-btn" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=500&h=660&fit=crop&q=80" alt="Cotton Flannel Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton Flannel Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 4 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist wishlist-btn" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=500&h=660&fit=crop&q=80" alt="Cotton Flannel Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton Flannel Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     BEST OUTFIT FOR YOUR HAPPINESS
     ============================================ -->
<section class="best-outfit py-5 reveal">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: var(--ff-primary); font-weight: 800; letter-spacing: 1px;">BEST OUTFIT FOR YOUR HAPPINESS</h2>
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-6 col-md-3">
                <div class="outfit-card flex-column">
                    <div class="outfit-card-img" style="flex: 0 0 auto; height: 320px; width: 100%;">
                        <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?w=500&h=660&fit=crop&q=80" alt="Outfit 1" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="outfit-card-body p-3">
                        <span class="badge-tag btn btn-axvero btn-axvero-primary py-1 px-2" style="font-size: 0.75rem;">New</span>
                        <h4 class="mb-1" style="font-size: 0.95rem;">Loose Fit Cotton Tee</h4>
                        <p class="mb-2 text-muted" style="font-size: 0.8rem;">Modern Style</p>
                        <div class="price mb-0" style="font-size: 1.1rem; font-weight: 700; color: var(--clr-primary);">Rs 800</div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-6 col-md-3">
                <div class="outfit-card flex-column">
                    <div class="outfit-card-img" style="flex: 0 0 auto; height: 320px; width: 100%;">
                        <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=500&h=660&fit=crop&q=80" alt="Outfit 2" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="outfit-card-body p-3">
                        <span class="badge-tag btn btn-axvero btn-axvero-primary py-1 px-2" style="font-size: 0.75rem;">New</span>
                        <h4 class="mb-1" style="font-size: 0.95rem;">Cotton Cable Knit Polo</h4>
                        <p class="mb-2 text-muted" style="font-size: 0.8rem;">Casual Trend</p>
                        <div class="price mb-0" style="font-size: 1.1rem; font-weight: 700; color: var(--clr-primary);">Rs 999</div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-6 col-md-3">
                <div class="outfit-card flex-column">
                    <div class="outfit-card-img" style="flex: 0 0 auto; height: 320px; width: 100%;">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=500&h=660&fit=crop&q=80" alt="Outfit 3" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="outfit-card-body p-3">
                        <span class="badge-tag btn btn-axvero btn-axvero-primary py-1 px-2" style="font-size: 0.75rem;">New</span>
                        <h4 class="mb-1" style="font-size: 0.95rem;">Linen Long-Sleeve Shirt</h4>
                        <p class="mb-2 text-muted" style="font-size: 0.8rem;">Elegant Classic</p>
                        <div class="price mb-0" style="font-size: 1.1rem; font-weight: 700; color: var(--clr-primary);">Rs 1200</div>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-6 col-md-3">
                <div class="outfit-card flex-column">
                    <div class="outfit-card-img" style="flex: 0 0 auto; height: 320px; width: 100%;">
                        <img src="https://images.unsplash.com/photo-1488161628813-04466f872be2?w=500&h=660&fit=crop&q=80" alt="Outfit 4" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="outfit-card-body p-3">
                        <span class="badge-tag btn btn-axvero btn-axvero-primary py-1 px-2" style="font-size: 0.75rem;">New</span>
                        <h4 class="mb-1" style="font-size: 0.95rem;">Textured Patterned Tee</h4>
                        <p class="mb-2 text-muted" style="font-size: 0.8rem;">Urban Edge</p>
                        <div class="price mb-0" style="font-size: 1.1rem; font-weight: 700; color: var(--clr-primary);">Rs 599</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     PAYDAY SALE NOW
     ============================================ -->
<section class="py-5 reveal">
    <div class="container">
        <div class="row g-0 rounded-4 overflow-hidden" style="background: #e2e2e2; min-height: 400px; box-shadow: var(--shadow-md);">
            <div class="col-md-6 position-relative d-none d-md-block">
                <!-- Use a stylish image of two models representing modern casual wear -->
                <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=800&h=600&fit=crop&q=80" alt="Payday Sale Models" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center p-5 text-dark" style="background: #f1f1f1;">
                <span class="text-uppercase fw-bold text-muted mb-2" style="font-size: 0.9rem; letter-spacing: 2px;">Limited Offer</span>
                <h2 class="display-5 fw-bold mb-3" style="line-height: 1.1; letter-spacing: -1px; font-family: var(--ff-primary);">PAYDAY<br>SALE NOW</h2>
                <p class="mb-4 text-muted" style="font-size: 1.05rem;">Spend minimum Rs 1500 & get 30% off on all new arrivals and selected items.</p>
                <div>
                    <a href="#" class="btn btn-axvero btn-axvero-primary px-5 py-3 fw-semibold">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     VIDEO PRESENTATION / HIGHLIGHT
     ============================================ -->
<section class="video-section my-5 reveal">
    <div class="video-bg">
        <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1600&h=900&fit=crop&q=80" alt="Video Background" />
    </div>
    <div class="video-overlay"></div>
    <div class="video-content">
        <button class="video-play-btn" aria-label="Play video">
            <i class="bi bi-play-fill"></i>
        </button>
        <h3>Our Featured Collections</h3>
        <p>Watch the season campaign presentation</p>
    </div>
</section>

<!-- ============================================
     OUR FEATURED COLLECTIONS
     ============================================ -->
<section class="featured-collections py-5 reveal">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: var(--ff-primary); font-weight: 800; letter-spacing: 1px;">Our Featured Collections</h2>
        <div class="featured-collection-grid">
            <!-- 1. Dark Textured Tee -->
            <div class="collection-card feat-col-item-sm">
                <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=500&h=660&fit=crop&q=80" alt="Collection 1" />
                <div class="collection-card-overlay"></div>
                <div class="collection-card-body">
                    <h5>Dark Textured Tee</h5>
                    <p>New Season</p>
                </div>
            </div>
            <!-- 2. Plaid Shirt & Jeans (TALL) -->
            <div class="collection-card feat-col-item-tall">
                <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500&h=860&fit=crop&q=80" alt="Collection 2" />
                <div class="collection-card-overlay"></div>
                <div class="collection-card-body">
                    <h5>Classic Plaid & Jeans</h5>
                    <p>Essential Fit</p>
                </div>
            </div>
            <!-- 3. Blue Tee -->
            <div class="collection-card feat-col-item-sm">
                <img src="https://images.unsplash.com/photo-1581655353564-df123a1eb820?w=500&h=660&fit=crop&q=80" alt="Collection 3" />
                <div class="collection-card-overlay"></div>
                <div class="collection-card-body">
                    <h5>Classic Blue Tee</h5>
                    <p>Sportswear</p>
                </div>
            </div>
            <!-- 4. White Pants & Shoes -->
            <div class="collection-card feat-col-item-sm">
                <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=500&h=660&fit=crop&q=80" alt="Collection 4" />
                <div class="collection-card-overlay"></div>
                <div class="collection-card-body">
                    <h5>Minimalist White Outfit</h5>
                    <p>Summer Style</p>
                </div>
            </div>
            <!-- 5. Flannel Shirt -->
            <div class="collection-card feat-col-item-sm">
                <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=500&h=660&fit=crop&q=80" alt="Collection 5" />
                <div class="collection-card-overlay"></div>
                <div class="collection-card-body">
                    <h5>Vintage Flannel Shirt</h5>
                    <p>Retro Vibes</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
