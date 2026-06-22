@extends('layouts.app')

@section('home_active', 'active')
@section('nav_home', 'active')

@section('title', 'Axvero — Premium Fashion &amp; Lifestyle')

@section('content')

<!-- ============================================
HERO SECTION
============================================ -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center hero-content">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="hero-badge"><i class="bi bi-stars"></i> New Season 2026</div>
                <h1 class="hero-title">New <span>Fashion</span></h1>
                <p class="hero-desc">
                    Discover the latest trends and elevate your wardrobe with our curated collection of premium fashion
                    essentials.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#" class="btn btn-axvero btn-axvero-primary btn-lg px-5">
                        <i class="bi bi-bag-check me-2"></i>Shop Now
                    </a>
                    <a href="#" class="btn btn-axvero btn-axvero-outline btn-lg px-4">
                        Explore <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <h3>12K+</h3>
                        <p>Products</p>
                    </div>
                    <div class="hero-stat">
                        <h3>50K+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="hero-stat">
                        <h3>200+</h3>
                        <p>Brands</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-image-col">
                <!-- Floating Card 1 -->
                <div class="floating-card floating-card-1">
                    <img
                        src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=100&h=100&fit=crop&q=80"
                        alt="Product"
                        class="floating-card-img"
                        loading="lazy"
                    />
                    <div class="floating-card-info">
                        <h6>Bomber Jacket</h6>
                        <p class="price-tag">$89.00</p>
                    </div>
                </div>

                <img
                    src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?w=800&h=1000&fit=crop&q=80"
                    alt="Fashion Model in Blue Dress"
                    class="hero-model-img"
                    loading="eager"
                />

                <!-- Floating Card 2 -->
                <div class="floating-card floating-card-2">
                    <img
                        src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=100&h=100&fit=crop&q=80"
                        alt="Product"
                        class="floating-card-img"
                        loading="lazy"
                    />
                    <div class="floating-card-info">
                        <h6>Running Shoes</h6>
                        <p class="price-tag">$129.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
PREMIUM CATEGORIES SHOWCASE
============================================ -->
<section class="home-premium-categories reveal">
    <div class="container-fluid px-3 px-lg-5">
        <div class="categories-flex-row">
            <!-- 1. WESTERNWEAR -->
            <div class="category-flex-item">
                <a href="category.php?category=Westernwear" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&h=800&fit=crop&q=80"
                            alt="Westernwear"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Westernwear</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- 2. INDIANWEAR -->
            <div class="category-flex-item">
                <a href="category.php?category=Indianwear" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=600&h=800&fit=crop&q=80"
                            alt="Indianwear"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Indianwear</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- 3. MENS -->
            <div class="category-flex-item">
                <a href="category.php?category=Mens" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1488161628813-04466f872be2?w=600&h=800&fit=crop&q=80"
                            alt="Mens"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Mens</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- 4. KIDS -->
            <div class="category-flex-item">
                <a href="category.php?category=Kids" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1519457431-44ccd64a579b?w=600&h=800&fit=crop&q=80"
                            alt="Kids"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Kids</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- 5. WOMEN -->
            <div class="category-flex-item">
                <a href="category.php?category=Women" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1509631179647-0177331693ae?w=600&h=800&fit=crop&q=80"
                            alt="Women"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Women</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- 6. FOOTWEAR -->
            <div class="category-flex-item">
                <a href="category.php?category=Footwear" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=600&h=800&fit=crop&q=80"
                            alt="Footwear"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Footwear</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- 7. BAGS -->
            <div class="category-flex-item">
                <a href="category.php?category=Bags" class="d-block text-decoration-none">
                    <div class="premium-cat-card">
                        <img
                            src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=600&h=800&fit=crop&q=80"
                            alt="Bags"
                            loading="lazy"
                        />
                        <div class="premium-cat-overlay">
                            <h3 class="premium-cat-title">Bags</h3>
                            <span class="premium-cat-btn d-inline-block">Shop Now</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
SPRING MUST-HAVES
============================================ -->
<section class="products-section must-haves-section reveal">
    <div class="container-fluid px-3 px-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <h2 class="must-have-section-title">THE SPRING MUST-HAVES</h2>
                <a href="#" class="must-have-view-all">View All</a>
            </div>
            <div class="d-flex gap-2">
                <button class="must-have-nav-btn prev" data-carousel-prev="#springCarousel">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="must-have-nav-btn next" data-carousel-next="#springCarousel">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div id="springCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <!-- Product 1 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
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
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
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
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
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
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
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
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <!-- Product 5 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 6 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 7 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
                                    <p class="must-have-brand">Regular Woodland</p>
                                    <div class="must-have-price-box">
                                        <span class="price-current">Rs 800</span>
                                        <span class="price-old">Rs 1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 8 -->
                        <div class="col-6 col-lg-3">
                            <div class="must-have-card">
                                <div class="must-have-img-wrapper">
                                    <button class="must-have-wishlist" aria-label="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=500&h=660&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                                </div>
                                <div class="must-have-info">
                                    <span class="must-have-tag">Just In</span>
                                    <h3 class="must-have-title"><a href="#">Cotton cable Shirt</a></h3>
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
LATEST COLLECTION BANNER
============================================ -->
<section class="latest-banner-deck reveal">
    <div class="container d-flex flex-column align-items-center">
        <div class="deck-container">
            <!-- Back Card 1 -->
            <div class="deck-card card-back-1"></div>
            <!-- Back Card 2 -->
            <div class="deck-card card-back-2"></div>
            <!-- Front Card -->
            <div class="deck-card card-front">
                <div class="deck-card-content">
                    <div class="deck-product-img">
                        <!-- Zip-up blue hoodie Unsplash image -->
                        <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=500&h=660&fit=crop&q=80" alt="Skyline Tee" />
                    </div>
                    <div class="deck-product-details">
                        <h3 class="deck-product-title">"Skyline Tee</h3>
                        <p class="deck-product-desc">Unwind in style with Lazy Head T-shirts – comfort meets cool.</p>
                        <div class="deck-product-price">₹1999</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="deck-bottom-wrapper">
            <h2 class="deck-giant-text">LATEST</h2>
            <a href="#" class="deck-btn-getnow">Get Now</a>
        </div>
    </div>
</section>

<!-- ============================================
NEW COLLECTION PRODUCTS
============================================ -->
<section class="new-collection-custom-section reveal">
    <div class="container-fluid px-3 px-lg-5">
        <div class="new-col-header">
            <div class="new-col-header-left">
                <h2 class="new-col-section-title">New Collection</h2>
            </div>
            <div class="new-col-header-right">
                <a href="#" class="new-col-all-collections-btn">All Collections</a>
            </div>
        </div>
        <div class="new-col-grid">
            <!-- Card 1 (Light Grey) -->
            <div class="new-col-card bg-light-grey">
                <div class="new-col-card-inner">
                    <span class="new-col-discount-badge discount-blue">-10%</span>
                    <div class="new-col-img-box">
                        <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=500&h=660&fit=crop&q=80" alt="Boxy Tropical Floral Shirt" />
                    </div>
                    <div class="new-col-info-box">
                        <div class="new-col-text-side">
                            <h3 class="new-col-title">Boxy Tropical Floral Shirt</h3>
                            <div class="new-col-price-rating">
                                <div class="new-col-price">
                                    <span class="curr-price">$ 25.99</span>
                                    <span class="orig-price">$ 45.99</span>
                                </div>
                                <div class="new-col-rating">
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot">★</span>
                                </div>
                            </div>
                        </div>
                        <button class="new-col-plus-btn" aria-label="Add to Cart">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 (Solid Red) -->
            <div class="new-col-card bg-red">
                <div class="new-col-card-inner">
                    <span class="new-col-discount-badge discount-white">-10%</span>
                    <div class="new-col-img-box">
                        <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=500&h=660&fit=crop&q=80" alt="Siped Flip Top" />
                    </div>
                    <div class="new-col-info-box">
                        <div class="new-col-text-side">
                            <h3 class="new-col-title">Siped Flip Top</h3>
                            <div class="new-col-price-rating">
                                <div class="new-col-price">
                                    <span class="curr-price">$ 17.99</span>
                                    <span class="orig-price">$ 45.99</span>
                                </div>
                                <div class="new-col-rating">
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot">★</span>
                                </div>
                            </div>
                        </div>
                        <button class="new-col-plus-btn" aria-label="Add to Cart">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3 (Dark Grey) -->
            <div class="new-col-card bg-dark-grey">
                <div class="new-col-card-inner">
                    <span class="new-col-discount-badge discount-white">-10%</span>
                    <div class="new-col-img-box">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=500&h=660&fit=crop&q=80" alt="Loose Fit Sweatshirt" />
                    </div>
                    <div class="new-col-info-box">
                        <div class="new-col-text-side">
                            <h3 class="new-col-title">Loose Fit Sweatshirt</h3>
                            <div class="new-col-price-rating">
                                <div class="new-col-price">
                                    <span class="curr-price">$ 109.99</span>
                                    <span class="orig-price">$ 289.99</span>
                                </div>
                                <div class="new-col-rating">
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot filled">★</span>
                                    <span class="rating-dot">★</span>
                                </div>
                            </div>
                        </div>
                        <button class="new-col-plus-btn" aria-label="Add to Cart">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
50% OFF OFFER BANNER
============================================ -->
<section class="offer-banner-custom reveal">
    <div class="container-fluid px-3 px-lg-5">
        <div class="offer-layout-row">
            <!-- Left side 2 cutout images -->
            <div class="offer-images-left-side">
                <div class="offer-img-float">
                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=360&h=420&fit=crop&q=80" alt="Purple Top" loading="lazy" />
                </div>
                <div class="offer-img-float">
                    <img src="https://images.unsplash.com/photo-1501908731398-29119d8549a1?w=360&h=420&fit=crop&q=80" alt="Black Strappy Top" loading="lazy" />
                </div>
            </div>
            <!-- Center content -->
            <div class="offer-center-side">
                <h2 class="offer-center-title">Get 50% Off</h2>
                <p class="offer-center-subtitle">
                    for all new product purchases<br>
                    min. purchase Rp. 350.000
                </p>
                <a href="#" class="offer-center-btn">SHOP NOW</a>
            </div>
            <!-- Right side 3 cutout images -->
            <div class="offer-images-right-side">
                <div class="offer-img-float">
                    <img src="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=360&h=420&fit=crop&q=80" alt="Black Skirt" loading="lazy" />
                </div>
                <div class="offer-img-float">
                    <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=360&h=420&fit=crop&q=80" alt="White Skirt" loading="lazy" />
                </div>
                <div class="offer-img-float">
                    <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=360&h=420&fit=crop&q=80" alt="Olive Skirt" loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
PRODUCT HIGHLIGHTS (Model Collage)
============================================ -->
<section class="highlights-custom-section reveal">
    <div class="container-fluid px-3 px-lg-5">
        <div class="highlights-custom-header">
            <span class="highlights-sparkle">✳</span>
            <h2 class="highlights-custom-title">Product Highlights</h2>
            <p class="highlights-custom-subtitle">Discover the perfect outfit that speaks to your unique style.</p>
        </div>
        <div class="highlights-arch-row">
            <!-- Arch 1 (Tan/Brown) -->
            <div class="arch-card arch-card-1">
                <img src="https://images.unsplash.com/photo-1549064492-c7e3b7db0fa2?w=400&h=600&fit=crop&q=80" alt="Style highlight 1" loading="lazy" />
            </div>
            <!-- Arch 2 (Red) -->
            <div class="arch-card arch-card-2">
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=400&h=600&fit=crop&q=80" alt="Style highlight 2" loading="lazy" />
            </div>
            <!-- Arch 3 (Navy) -->
            <div class="arch-card arch-card-3">
                <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?w=400&h=600&fit=crop&q=80" alt="Style highlight 3" loading="lazy" />
            </div>
            <!-- Arch 4 (Grey) -->
            <div class="arch-card arch-card-4">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=600&fit=crop&q=80" alt="Style highlight 4" loading="lazy" />
            </div>
            <!-- Arch 5 (Maroon) -->
            <div class="arch-card arch-card-5">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=400&h=600&fit=crop&q=80" alt="Style highlight 5" loading="lazy" />
            </div>
        </div>
    </div>
</section>

<!-- ============================================
TRENDING NOW
============================================ -->
<!-- ============================================
TRENDING NOW
============================================ -->
<section class="trending-section reveal">
    <div class="container-fluid px-4 px-md-5">
        <!-- New Custom Header matching mockup -->
        <div class="trending-custom-header">
            <div class="trending-title-area">
                <h2 class="trending-title-main">Trending Now</h2>
                <a href="#" class="trending-view-all">View All</a>
            </div>
            <div class="trending-nav-arrows">
                <button class="trending-nav-arrow prev" id="trendingPrevBtn" aria-label="Previous">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="trending-nav-arrow next" id="trendingNextBtn" aria-label="Next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="trending-layout-container">
            <!-- Left Sidebar Category Tabs -->
            <div class="trending-sidebar-tabs">
                <button class="trending-tab-btn active" data-category="men">Men</button>
                <button class="trending-tab-btn" data-category="women">Women</button>
            </div>

            <!-- Right Slider Area -->
            <div class="trending-slider-wrapper">
                <div class="trending-products-track" id="trendingProductsTrack">
                    <!-- Men's Products (Shown by default) -->
                    <!-- Card 1 -->
                    <div class="trending-product-card men-item">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=600&h=450&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Cotton cable Shirt</h3>
                        <p class="trending-card-desc">You work hard, your clothes should represent that</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                    <!-- Card 2 -->
                    <div class="trending-product-card men-item">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?w=600&h=450&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Cotton cable Shirt</h3>
                        <p class="trending-card-desc">You work hard, your clothes should represent that</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                    <!-- Card 3 -->
                    <div class="trending-product-card men-item">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=600&h=450&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Cotton cable Shirt</h3>
                        <p class="trending-card-desc">You work hard, your clothes should represent that</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                    <!-- Card 4 -->
                    <div class="trending-product-card men-item">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?w=600&h=450&fit=crop&q=80" alt="Cotton cable Shirt" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Cotton cable Shirt</h3>
                        <p class="trending-card-desc">You work hard, your clothes should represent that</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>

                    <!-- Women's Products (Hidden by default or managed via JS) -->
                    <!-- Card 1 -->
                    <div class="trending-product-card women-item" style="display: none;">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&h=450&fit=crop&q=80" alt="Linen Summer Dress" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Linen Summer Dress</h3>
                        <p class="trending-card-desc">Light, breathable, and designed for effortless warm-weather style</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                    <!-- Card 2 -->
                    <div class="trending-product-card women-item" style="display: none;">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&h=450&fit=crop&q=80" alt="Knit Crop Top" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Knit Crop Top</h3>
                        <p class="trending-card-desc">Comfort meets elegance with our premium textured knit essentials</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                    <!-- Card 3 -->
                    <div class="trending-product-card women-item" style="display: none;">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?w=600&h=450&fit=crop&q=80" alt="Casual Linen Set" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Casual Linen Set</h3>
                        <p class="trending-card-desc">Embrace natural fabrics designed to move gracefully with you</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                    <!-- Card 4 -->
                    <div class="trending-product-card women-item" style="display: none;">
                        <div class="trending-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=600&h=450&fit=crop&q=80" alt="Classic Denim Jacket" loading="lazy" />
                        </div>
                        <h3 class="trending-card-title">Classic Denim Jacket</h3>
                        <p class="trending-card-desc">A timeless layering piece crafted from organic vintage cotton</p>
                        <a href="#" class="trending-card-shop-now">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
CATEGORIES (PLANTS)
============================================ -->
<section class="plants-categories-section reveal">
    <div class="container-fluid px-0">
        <div class="plants-categories-header text-center">
            <h2 class="plants-categories-title">CATEGORIES</h2>
            <p class="plants-categories-subtitle">Find what you are looking for</p>
        </div>
        
        <div class="plants-categories-body">
            <div class="container">
                <div class="row align-items-end justify-content-center g-4">
                    <!-- Left: Natural Plants -->
                    <div class="col-md-4">
                        <div class="plant-category-card side-card text-center">
                            <div class="plant-card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1545241047-6083a3684587?w=500&h=750&fit=crop&q=80" alt="Natural Plants" loading="lazy" />
                            </div>
                            <h3 class="plant-card-title">Natural Plants</h3>
                        </div>
                    </div>
                    
                    <!-- Center: Plant Accessories -->
                    <div class="col-md-4">
                        <div class="plant-category-card center-card text-center">
                            <div class="plant-card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1533090161767-e6ffed986c88?w=500&h=650&fit=crop&q=80" alt="Plant Accessories" loading="lazy" />
                            </div>
                            <h3 class="plant-card-title">Plant Accessories</h3>
                            <p class="plant-card-desc">Horem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-plant-explore">Explore <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <!-- Right: Artificial Plants -->
                    <div class="col-md-4">
                        <div class="plant-category-card side-card text-center">
                            <div class="plant-card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1500964757637-c85e8a162699?w=500&h=750&fit=crop&q=80" alt="Artificial Plants" loading="lazy" />
                            </div>
                            <h3 class="plant-card-title">Artificial Plants</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
HOME DECOR SECTION
============================================ -->
<section class="decor-custom-section reveal">
    <div class="container-fluid px-4 px-md-5">
        <!-- Header -->
        <div class="decor-custom-header">
            <h2 class="decor-custom-title">
                <span class="decor-sparkle">&#10059;</span> Home Decor
            </h2>
            <a href="#" class="decor-all-collections-btn">All Collections</a>
        </div>
        
        <!-- Products Grid Container with Light Grey background -->
        <div class="decor-products-bg">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-6 col-md-3">
                    <div class="decor-product-card-custom">
                        <div class="decor-img-container">
                            <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=500&h=600&fit=crop&q=80" alt="The Dandy chair" loading="lazy" />
                        </div>
                        <h4 class="decor-product-title-custom">The Dandy chair</h4>
                        <p class="decor-product-price-custom">Rs 2250</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-6 col-md-3">
                    <div class="decor-product-card-custom">
                        <div class="decor-img-container">
                            <img src="https://images.unsplash.com/photo-1612196808214-b8e1d6145a8c?w=500&h=600&fit=crop&q=80" alt="Rustic Vase Set" loading="lazy" />
                        </div>
                        <h4 class="decor-product-title-custom">Rustic Vase Set</h4>
                        <p class="decor-product-price-custom">£155</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-6 col-md-3">
                    <div class="decor-product-card-custom">
                        <div class="decor-img-container">
                            <img src="https://images.unsplash.com/photo-1578500494198-246f612d3b3d?w=500&h=600&fit=crop&q=80" alt="The Silky Vase" loading="lazy" />
                        </div>
                        <h4 class="decor-product-title-custom">The Silky Vase</h4>
                        <p class="decor-product-price-custom">£125</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-6 col-md-3">
                    <div class="decor-product-card-custom">
                        <div class="decor-img-container">
                            <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=500&h=600&fit=crop&q=80" alt="The Lucy Lamp" loading="lazy" />
                        </div>
                        <h4 class="decor-product-title-custom">The Lucy Lamp</h4>
                        <p class="decor-product-price-custom">£399</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
DECOR STORY BANNER (2 Columns)
============================================ -->
<section class="decor-story-section reveal">
    <div class="container-fluid px-4 px-md-5">
        <div class="row g-4 align-items-stretch">
            <!-- Left Card: Purple Brand Block -->
            <div class="col-lg-6">
                <div class="decor-story-text-card">
                    <div class="decor-story-content">
                        <h3 class="decor-story-title">It started with a small idea</h3>
                        <p class="decor-story-desc">
                            A global brand with local beginnings, our story began in a small studio in South London in early 2014.
                        </p>
                    </div>
                    <a href="#" class="decor-story-btn">View collection</a>
                </div>
            </div>
            
            <!-- Right Card: Interior Image -->
            <div class="col-lg-6">
                <div class="decor-story-img-card">
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1000&h=700&fit=crop&q=80" alt="Interior showroom" loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
FEATURED FOOTWEAR
============================================ -->
<section class="footwear-custom-section reveal">
    <div class="container-fluid px-4 px-md-5">
        <!-- New Custom Header matching mockup -->
        <div class="footwear-custom-header">
            <div class="footwear-title-area">
                <h2 class="footwear-title-main">Featured Footwear</h2>
                <a href="#" class="footwear-view-all">View All</a>
            </div>
            <div class="footwear-nav-arrows">
                <button class="footwear-nav-arrow prev" id="footwearPrevBtn" aria-label="Previous">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="footwear-nav-arrow next" id="footwearNextBtn" aria-label="Next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="footwear-layout-container">
            <!-- Left Sidebar Category Tabs -->
            <div class="footwear-sidebar-tabs">
                <button class="footwear-tab-btn active" data-footwear-category="men">Men</button>
                <button class="footwear-tab-btn" data-footwear-category="women">Women</button>
            </div>

            <!-- Right Slider Area -->
            <div class="footwear-slider-wrapper">
                <div class="footwear-products-track" id="footwearProductsTrack">
                    <!-- Men's Footwear (Shown by default) -->
                    <!-- Card 1 -->
                    <div class="footwear-product-card footwear-men-item">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1597045566677-8cf032ed6634?w=600&h=600&fit=crop&q=80" alt="Running shoes for men" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for men</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="footwear-product-card footwear-men-item">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=600&h=600&fit=crop&q=80" alt="Running shoes for men" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for men</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="footwear-product-card footwear-men-item">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=600&fit=crop&q=80" alt="Running shoes for men" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for men</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="footwear-product-card footwear-men-item">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&h=600&fit=crop&q=80" alt="Running shoes for men" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for men</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="footwear-product-card footwear-men-item">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&h=600&fit=crop&q=80" alt="Running shoes for men" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for men</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>

                    <!-- Women's Footwear (Hidden by default) -->
                    <!-- Card 1 -->
                    <div class="footwear-product-card footwear-women-item" style="display: none;">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&h=600&fit=crop&q=80" alt="Women's Pastel Sneakers" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for women</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="footwear-product-card footwear-women-item" style="display: none;">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1554735490-5974588cbc4f?w=600&h=600&fit=crop&q=80" alt="Women's Sport Trainers" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for women</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="footwear-product-card footwear-women-item" style="display: none;">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&h=600&fit=crop&q=80" alt="Women's Pastel Sneakers" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for women</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="footwear-product-card footwear-women-item" style="display: none;">
                        <div class="footwear-card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1554735490-5974588cbc4f?w=600&h=600&fit=crop&q=80" alt="Women's Sport Trainers" loading="lazy" />
                        </div>
                        <div class="footwear-card-details">
                            <h3 class="footwear-card-title">Running shoes for women</h3>
                            <span class="footwear-card-price">Rs 2299</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
SPECIAL OFFERS BANNER
============================================ -->
<section class="special-offers-custom-section reveal">
    <div class="container">
        <div class="special-offers-banner-wrapper">
            <!-- 3-Color background partition overlay -->
            <div class="special-offers-bg-partition">
                <div class="bg-part-blue"></div>
                <div class="bg-part-cream"></div>
                <div class="bg-part-pink"></div>
            </div>

            <!-- Foreground Content & Floating Items -->
            <div class="special-offers-content-container">
                <!-- Left floating item: Beige heels on white square card + badge -->
                <div class="floating-item-left">
                    <div class="shoe-card-white">
                        <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=300&h=300&fit=crop&q=80" alt="Beige Heels" loading="lazy" />
                    </div>
                    <div class="pill-badge-yellow">75% Off Soon</div>
                </div>

                <!-- Center Text & Large Red Heel overlay -->
                <div class="center-text-group">
                    <span class="coming-soon-tag">COMING SOON</span>
                    <h2 class="special-offers-main-heading">Special Offers</h2>
                    <!-- Main large red shoe floating in absolute center -->
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=600&fit=crop&q=80" alt="Red High Heel" class="floating-red-heel" loading="lazy" />
                </div>

                <!-- Right floating item: Pink handbag + badge -->
                <div class="floating-item-right">
                    <div class="pill-badge-yellow">75% Off Soon</div>
                    <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=320&h=320&fit=crop&q=80" alt="Pink Handbag" class="floating-pink-handbag" loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
FASHION CAMPAIGN / NEWSLETTER
============================================ -->
<!-- ============================================
FASHION CAMPAIGN / NEWSLETTER
============================================ -->
<section class="campaign-custom-section reveal">
    <div class="campaign-custom-container">
        <!-- Small top-left label -->
        <span class="campaign-top-label">SUMMER OUTER WEEK</span>
        
        <!-- Interactive numbers and lines background -->
        <div class="campaign-line-deco">
            <span class="deco-num left-num">10.8</span>
            <div class="deco-line"></div>
            <span class="deco-num right-num">10.8</span>
        </div>

        <!-- Big 70% Backdrop -->
        <div class="campaign-backdrop-text">70%</div>

        <!-- Overlay Text & Model Wrapper -->
        <div class="campaign-body-wrapper">
            <!-- Model cutout overlay -->
            <div class="campaign-model-cutout">
                <img src="https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop&q=80" alt="Summer Outerwear Model" loading="lazy" />
            </div>

            <!-- Main big heading -->
            <div class="campaign-heading-group">
                <span class="heading-sub">Summer</span>
                <h2 class="heading-main">OUTER<br>WEEK</h2>
            </div>
        </div>

        <!-- Shop Online button at bottom right -->
        <a href="#" class="campaign-shop-btn">Shop online <i class="bi bi-arrow-right"></i></a>
    </div>
</section>

@endsection
