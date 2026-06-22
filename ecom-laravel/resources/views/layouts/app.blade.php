<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Axvero - Discover premium fashion, home decor, and lifestyle products. Shop the latest trends in clothing, footwear, and accessories.">
    <meta name="keywords" content="fashion, ecommerce, clothing, shoes, home decor, premium fashion">
    <meta name="author" content="Axvero">
    <title>@yield('title', 'Axvero — Premium Fashion &amp; Lifestyle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E🛍️%3C/text%3E%3C/svg%3E">
    <style>span.fw-bold.text-purple { font-size: 12px; }</style>
    @stack('styles')
</head>
<body>
    <div class="announcement-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex gap-4 header-top-left">
                <span>English <i class="bi bi-chevron-down ms-1"></i></span>
                <span>Indian Rupee <i class="bi bi-chevron-down ms-1"></i></span>
            </div>
            <div class="d-flex gap-4 header-top-right">
                <a href="{{ url('/seller/login') }}" style="color:inherit;text-decoration:none;">Become a Seller ! <i class="bi bi-chevron-down ms-1"></i></a>
                <span>Helpline: +911169261706</span>
            </div>
        </div>
    </div>

    <header class="main-header py-2 py-lg-3 border-bottom">
        <div class="container d-flex align-items-center justify-content-between gap-3">
            <a href="{{ url('/') }}" class="brand-logo-custom d-flex flex-column align-items-center flex-shrink-0">
                <div class="logo-ax">AX</div>
                <div class="logo-text">AXVERO</div>
            </a>
            <div class="search-bar-custom flex-grow-1 mx-lg-5 d-none d-lg-block">
                <input type="text" placeholder="I am shopping for...">
                <i class="bi bi-search search-icon-custom"></i>
            </div>
            <div class="profile-actions-custom d-none d-lg-flex align-items-center gap-2">
                <div class="profile-icon-wrapper">
                    <i class="bi bi-person"></i>
                </div>
                <div class="profile-text" id="headerProfileText">
                    <a href="{{ url('/login') }}">Login</a> | <a href="{{ url('/register') }}">Registration</a>
                </div>
            </div>
            <div class="mobile-header-controls d-flex d-lg-none align-items-center gap-1">
                <button class="mobile-icon-btn" type="button" id="mobileSearchToggle" aria-label="Search">
                    <i class="bi bi-search"></i>
                </button>
                <a href="#" class="mobile-icon-btn" aria-label="Wishlist">
                    <i class="bi bi-heart"></i>
                </a>
                <a href="{{ url('/cart') }}" class="mobile-icon-btn position-relative" aria-label="Cart">
                    <i class="bi bi-bag"></i>
                    <span class="mobile-cart-badge" id="mobileCartCount">3</span>
                </a>
                <a href="{{ url('/account') }}" class="mobile-icon-btn d-none d-sm-flex" aria-label="Account" id="mobileAccountLink">
                    <i class="bi bi-person"></i>
                </a>
                <button class="mobile-hamburger-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenuOffcanvas" aria-controls="mobileMenuOffcanvas" aria-label="Open menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </div>
        <div class="mobile-search-bar d-lg-none" id="mobileSearchBar" style="display: none;">
            <div class="container py-2">
                <div class="position-relative">
                    <input type="text" class="form-control mobile-search-input" placeholder="Search for products, brands...">
                    <i class="bi bi-search mobile-search-icon"></i>
                    <button class="mobile-search-close" id="mobileSearchClose" aria-label="Close search">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="offcanvas offcanvas-start mobile-offcanvas" tabindex="-1" id="mobileMenuOffcanvas" aria-labelledby="mobileMenuOffcanvasLabel">
        <div class="offcanvas-header mobile-offcanvas-header">
            <a href="{{ url('/') }}" class="brand-logo-custom d-flex flex-column align-items-center">
                <div class="logo-ax" style="font-size: 1.4rem;">AX</div>
                <div class="logo-text">AXVERO</div>
            </a>
            <button type="button" class="mobile-offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="offcanvas-body mobile-offcanvas-body">
            <div class="mobile-user-card">
                <div class="mobile-user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="mobile-user-info">
                    <p class="mobile-user-greeting" id="mobileGreetingText">Welcome!</p>
                    <div class="mobile-user-actions" id="mobileGreetingActions">
                        <a href="{{ url('/login') }}" class="mobile-user-btn">Login</a>
                        <span class="mobile-user-divider">&bull;</span>
                        <a href="{{ url('/register') }}" class="mobile-user-btn">Register</a>
                    </div>
                </div>
            </div>
            <nav class="mobile-nav-section">
                <ul class="mobile-nav-list">
                    <li class="mobile-nav-item @yield('home_active')">
                        <a href="{{ url('/') }}"><i class="bi bi-house-door"></i><span>Home</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item @yield('flash_active')">
                        <a href="{{ url('/flash-sale') }}"><i class="bi bi-lightning"></i><span>Flash Sale</span><span class="mobile-nav-hot-badge">HOT</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item @yield('brands_active')">
                        <a href="{{ url('/brands') }}"><i class="bi bi-shop"></i><span>All Brands</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item @yield('categories_active')">
                        <a href="{{ url('/categories') }}"><i class="bi bi-grid"></i><span>All Categories</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="#"><i class="bi bi-people"></i><span>Team Login</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                </ul>
            </nav>
            <div class="mobile-nav-divider"></div>
            <div class="mobile-nav-section">
                <h6 class="mobile-section-label">Shop by Category</h6>
                <div class="mobile-category-chips">
                    <a href="{{ url('/category/Women') }}" class="mobile-chip">Women</a>
                    <a href="{{ url('/category/Mens') }}" class="mobile-chip">Men</a>
                    <a href="{{ url('/category/Kids') }}" class="mobile-chip">Kids</a>
                    <a href="{{ url('/category/Footwear') }}" class="mobile-chip">Footwear</a>
                    <a href="{{ url('/category/HomeDecor') }}" class="mobile-chip">Home Decor</a>
                    <a href="{{ url('/category/Bags') }}" class="mobile-chip">Bags</a>
                    <a href="{{ url('/category/Accessories') }}" class="mobile-chip">Accessories</a>
                </div>
            </div>
            <div class="mobile-nav-divider"></div>
            <nav class="mobile-nav-section">
                <h6 class="mobile-section-label">Help & Support</h6>
                <ul class="mobile-nav-list mobile-nav-list-compact">
                    <li class="mobile-nav-item">
                        <a href="#"><i class="bi bi-headset"></i><span>Helpline: +911169261706</span></a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="{{ url('/seller/login') }}"><i class="bi bi-shop-window"></i><span>Become a Seller</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="mobile-offcanvas-footer">
            <div class="mobile-lang-currency">
                <button class="mobile-footer-chip"><i class="bi bi-globe2"></i> English</button>
                <button class="mobile-footer-chip"><i class="bi bi-currency-rupee"></i> INR</button>
            </div>
        </div>
    </div>

    <div class="nav-bar-custom py-3 border-bottom">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="dropdown">
                <div class="nav-categories d-flex align-items-center gap-2" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <span class="text-purple">Categories</span>
                    <span class="text-muted fs-6">(See All)</span>
                    <i class="bi bi-chevron-down text-purple ms-1"></i>
                </div>
                <ul class="dropdown-menu categories-dropdown-menu shadow-sm border-0 py-2 mt-2" aria-labelledby="categoriesDropdown">
                    <li><a class="dropdown-item" href="{{ url('/category/Westernwear') }}">Westernwear</a></li>
                    <li><a class="dropdown-item" href="{{ url('/category/Indianwear') }}">Indianwear</a></li>
                    <li><a class="dropdown-item" href="{{ url('/category/Mens') }}">Mens</a></li>
                    <li><a class="dropdown-item" href="{{ url('/category/Kids') }}">Kids</a></li>
                    <li><a class="dropdown-item" href="{{ url('/category/Women') }}">Women</a></li>
                    <li><a class="dropdown-item" href="{{ url('/category/Footwear') }}">Footwear</a></li>
                    <li><a class="dropdown-item" href="{{ url('/category/Bags') }}">Bags</a></li>
                </ul>
            </div>
            <ul class="nav-links-custom d-flex gap-4 mb-0 align-items-center d-none d-lg-flex">
                <li><a href="{{ url('/') }}" class="nav-link-item @yield('nav_home')">Home</a></li>
                <li><a href="{{ url('/flash-sale') }}" class="nav-link-item @yield('nav_flash')">Flash Sale</a></li>
                <li><a href="{{ url('/brands') }}" class="nav-link-item @yield('nav_brands')">All Brands</a></li>
                <li><a href="{{ url('/categories') }}" class="nav-link-item @yield('nav_categories')">All categories</a></li>
                <li><a href="#" class="nav-link-item">Team Login/ Company Person</a></li>
            </ul>
            <a href="{{ url('/cart') }}" class="nav-cart-custom d-flex align-items-center gap-2 text-decoration-none" id="desktopCartBtn">
                <i class="bi bi-cart3 text-purple fs-4"></i>
                <span class="text-purple" id="desktopCartCount">3</span>
            </a>
        </div>
    </div>

    <script>
        var ROOT_PATH = '{{ url('/') }}';
        document.addEventListener("DOMContentLoaded", function() {
            function syncHeaderCartCount() {
                let totalQty = 0;
                try {
                    const localCart = localStorage.getItem('axv_cart');
                    if (localCart) {
                        const cart = JSON.parse(localCart);
                        cart.forEach(item => { totalQty += (parseInt(item.qty) || 1); });
                    } else { totalQty = 3; }
                } catch(e) { totalQty = 3; }
                const desktopCountEl = document.getElementById('desktopCartCount');
                const mobileCountEl = document.getElementById('mobileCartCount');
                if (desktopCountEl) desktopCountEl.textContent = totalQty;
                if (mobileCountEl) mobileCountEl.textContent = totalQty;
            }
            function syncHeaderUserState() {
                try {
                    const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
                    const userName = localStorage.getItem('userName') || 'Navneet Kumar';
                    const profileTextEl = document.getElementById('headerProfileText');
                    if (profileTextEl) {
                        if (isLoggedIn) {
                            profileTextEl.innerHTML = '<a href="' + ROOT_PATH + 'account" class="fw-bold text-purple">' + userName + '</a> | <a href="javascript:void(0)" onclick="headerLogout()">Logout</a>';
                        } else {
                            profileTextEl.innerHTML = '<a href="' + ROOT_PATH + 'login">Login</a> | <a href="' + ROOT_PATH + 'register">Registration</a>';
                        }
                    }
                    const mobileGreetingText = document.getElementById('mobileGreetingText');
                    const mobileGreetingActions = document.getElementById('mobileGreetingActions');
                    const mobileAccountLink = document.getElementById('mobileAccountLink');
                    if (isLoggedIn) {
                        if (mobileGreetingText) mobileGreetingText.textContent = 'Welcome, ' + userName.split(' ')[0] + '!';
                        if (mobileGreetingActions) {
                            mobileGreetingActions.innerHTML = '<a href="' + ROOT_PATH + 'account" class="mobile-user-btn">My Account</a> <span class="mobile-user-divider">&bull;</span> <a href="javascript:void(0)" onclick="headerLogout()" class="mobile-user-btn">Logout</a>';
                        }
                        if (mobileAccountLink) mobileAccountLink.href = ROOT_PATH + 'account';
                    } else {
                        if (mobileGreetingText) mobileGreetingText.textContent = 'Welcome!';
                        if (mobileGreetingActions) {
                            mobileGreetingActions.innerHTML = '<a href="' + ROOT_PATH + 'login" class="mobile-user-btn">Login</a> <span class="mobile-user-divider">&bull;</span> <a href="' + ROOT_PATH + 'register" class="mobile-user-btn">Register</a>';
                        }
                        if (mobileAccountLink) mobileAccountLink.href = ROOT_PATH + 'login';
                    }
                } catch(e) {}
            }
            window.headerLogout = function() {
                try {
                    localStorage.removeItem('isLoggedIn');
                    localStorage.removeItem('userName');
                    if (typeof showToast === 'function') showToast('Logged out successfully');
                    setTimeout(function() { window.location.href = ROOT_PATH; }, 800);
                } catch(e) { window.location.href = ROOT_PATH; }
            };
            syncHeaderCartCount();
            syncHeaderUserState();
            window.addEventListener('storage', function() {
                syncHeaderCartCount();
                syncHeaderUserState();
            });
        });
    </script>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ url('/') }}" class="footer-brand">Axvero<span>.</span></a>
                    <p class="footer-desc">Elevating your everyday style with premium fashion and home essentials. Discover the art of modern living.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/careers') }}">Careers</a></li>
                        <li><a href="{{ url('/store-locator') }}">Store Locator</a></li>
                        <li><a href="{{ url('/sustainability') }}">Sustainability</a></li>
                        <li><a href="{{ url('/account') }}">My Account</a></li>
                        <li><a href="{{ url('/account?tab=orders') }}">Track Order</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Categories</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/category/Women') }}">Women</a></li>
                        <li><a href="{{ url('/category/Mens') }}">Men</a></li>
                        <li><a href="{{ url('/category/Kids') }}">Kids</a></li>
                        <li><a href="{{ url('/category/Accessories') }}">Accessories</a></li>
                        <li><a href="{{ url('/category/HomeDecor') }}">Home & Decor</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-heading">Contact</h5>
                    <ul class="footer-contact">
                        <li><i class="bi bi-geo-alt"></i><span>123 Fashion Avenue,<br>New York, NY 10001</span></li>
                        <li><i class="bi bi-telephone"></i><span>+1 (800) AXV-RERO</span></li>
                        <li><i class="bi bi-envelope"></i><span>hello@axvero.com</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Newsletter</h5>
                    <p class="footer-desc" style="margin-bottom: 16px;">Subscribe to receive updates, early access, and exclusive offers.</p>
                    <form class="footer-newsletter">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Axvero. All rights reserved.</p>
                <div class="footer-payments">
                    <i class="bi bi-credit-card-2-front"></i>
                    <i class="bi bi-paypal"></i>
                    <i class="bi bi-stripe"></i>
                    <i class="bi bi-wallet2"></i>
                </div>
            </div>
        </div>
    </footer>

    <button id="backToTop" class="back-to-top" aria-label="Back to top">
        <i class="bi bi-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
