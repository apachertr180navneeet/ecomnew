<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Axvero - Discover premium fashion, home decor, and lifestyle products. Shop the latest trends in clothing, footwear, and accessories.">
    <meta name="keywords" content="fashion, ecommerce, clothing, shoes, home decor, premium fashion">
    <meta name="author" content="Axvero">
    <title>Axvero — Premium Fashion &amp; Lifestyle</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E🛍️%3C/text%3E%3C/svg%3E">
    <style>
        span.fw-bold.text-purple {
            font-size: 12px;
        }
    </style>
</head>
<body>

    <!-- ============================================
         ANNOUNCEMENT / TOP BAR
         ============================================ -->
    <div class="announcement-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex gap-4 header-top-left">
                <span>English <i class="bi bi-chevron-down ms-1"></i></span>
                <span>Indian Rupee <i class="bi bi-chevron-down ms-1"></i></span>
            </div>
            <div class="d-flex gap-4 header-top-right">
                <a href="seller/login.php" style="color:inherit;text-decoration:none;">Become a Seller ! <i class="bi bi-chevron-down ms-1"></i></a>
                <span>Helpline: +911169261706</span>
            </div>
        </div>
    </div>

    <!-- ============================================
         MAIN HEADER
         ============================================ -->
    <header class="main-header py-2 py-lg-3 border-bottom">
        <div class="container d-flex align-items-center justify-content-between gap-3">
            <!-- Logo -->
            <a href="index.php" class="brand-logo-custom d-flex flex-column align-items-center flex-shrink-0">
                <div class="logo-ax">AX</div>
                <div class="logo-text">AXVERO</div>
            </a>

            <!-- Search Bar (Desktop Only) -->
            <div class="search-bar-custom flex-grow-1 mx-lg-5 d-none d-lg-block">
                <input type="text" placeholder="I am shopping for...">
                <i class="bi bi-search search-icon-custom"></i>
            </div>

            <!-- Profile Actions (Desktop Only) -->
            <div class="profile-actions-custom d-none d-lg-flex align-items-center gap-2">
                <div class="profile-icon-wrapper">
                    <i class="bi bi-person"></i>
                </div>
                <div class="profile-text" id="headerProfileText">
                    <a href="login-page.php">Login</a> | <a href="register-page.php">Registration</a>
                </div>
            </div>

            <!-- Mobile / Tablet Controls -->
            <div class="mobile-header-controls d-flex d-lg-none align-items-center gap-1">
                <!-- Search Toggle -->
                <button class="mobile-icon-btn" type="button" id="mobileSearchToggle" aria-label="Search">
                    <i class="bi bi-search"></i>
                </button>
                <!-- Wishlist -->
                <a href="#" class="mobile-icon-btn" aria-label="Wishlist">
                    <i class="bi bi-heart"></i>
                </a>
                <!-- Cart -->
                <a href="cart.php" class="mobile-icon-btn position-relative" aria-label="Cart">
                    <i class="bi bi-bag"></i>
                    <span class="mobile-cart-badge" id="mobileCartCount">3</span>
                </a>
                <!-- Person / Account -->
                <a href="account.php" class="mobile-icon-btn d-none d-sm-flex" aria-label="Account" id="mobileAccountLink">
                    <i class="bi bi-person"></i>
                </a>
                <!-- Hamburger Button -->
                <button class="mobile-hamburger-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenuOffcanvas" aria-controls="mobileMenuOffcanvas" aria-label="Open menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Search Expand (hidden by default, toggled via JS) -->
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

    <!-- ============================================
         MOBILE OFFCANVAS NAVIGATION
         ============================================ -->
    <div class="offcanvas offcanvas-start mobile-offcanvas" tabindex="-1" id="mobileMenuOffcanvas" aria-labelledby="mobileMenuOffcanvasLabel">
        <!-- Offcanvas Header -->
        <div class="offcanvas-header mobile-offcanvas-header">
            <a href="index.php" class="brand-logo-custom d-flex flex-column align-items-center">
                <div class="logo-ax" style="font-size: 1.4rem;">AX</div>
                <div class="logo-text">AXVERO</div>
            </a>
            <button type="button" class="mobile-offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Offcanvas Body -->
        <div class="offcanvas-body mobile-offcanvas-body">
            <!-- User Greeting Card -->
            <div class="mobile-user-card">
                <div class="mobile-user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="mobile-user-info">
                    <p class="mobile-user-greeting" id="mobileGreetingText">Welcome!</p>
                    <div class="mobile-user-actions" id="mobileGreetingActions">
                        <a href="login-page.php" class="mobile-user-btn">Login</a>
                        <span class="mobile-user-divider">&bull;</span>
                        <a href="register-page.php" class="mobile-user-btn">Register</a>
                    </div>
                </div>
            </div>

            <!-- Primary Navigation -->
            <nav class="mobile-nav-section">
                <ul class="mobile-nav-list">
                    <li class="mobile-nav-item <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">
                        <a href="index.php"><i class="bi bi-house-door"></i><span>Home</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item <?php echo ($currentPage == 'flash-sale.php') ? 'active' : ''; ?>">
                        <a href="flash-sale.php"><i class="bi bi-lightning"></i><span>Flash Sale</span><span class="mobile-nav-hot-badge">HOT</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item <?php echo ($currentPage == 'brands.php') ? 'active' : ''; ?>">
                        <a href="brands.php"><i class="bi bi-shop"></i><span>All Brands</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item <?php echo ($currentPage == 'categories.php') ? 'active' : ''; ?>">
                        <a href="categories.php"><i class="bi bi-grid"></i><span>All Categories</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="#"><i class="bi bi-people"></i><span>Team Login</span><i class="bi bi-chevron-right mobile-nav-arrow"></i></a>
                    </li>
                </ul>
            </nav>

            <!-- Divider -->
            <div class="mobile-nav-divider"></div>

            <!-- Categories Quick Access -->
            <div class="mobile-nav-section">
                <h6 class="mobile-section-label">Shop by Category</h6>
                <div class="mobile-category-chips">
                    <a href="category.php?category=Women" class="mobile-chip">Women</a>
                    <a href="category.php?category=Mens" class="mobile-chip">Men</a>
                    <a href="category.php?category=Kids" class="mobile-chip">Kids</a>
                    <a href="category.php?category=Footwear" class="mobile-chip">Footwear</a>
                    <a href="category.php?category=HomeDecor" class="mobile-chip">Home Decor</a>
                    <a href="category.php?category=Bags" class="mobile-chip">Bags</a>
                    <a href="category.php?category=Accessories" class="mobile-chip">Accessories</a>
                </div>
            </div>

            <!-- Divider -->
            <div class="mobile-nav-divider"></div>

            <!-- Support Links -->
            <nav class="mobile-nav-section">
                <h6 class="mobile-section-label">Help & Support</h6>
                <ul class="mobile-nav-list mobile-nav-list-compact">
                    <li class="mobile-nav-item">
                        <a href="#"><i class="bi bi-headset"></i><span>Helpline: +911169261706</span></a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="seller/login.php"><i class="bi bi-shop-window"></i><span>Become a Seller</span></a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Offcanvas Footer -->
        <div class="mobile-offcanvas-footer">
            <div class="mobile-lang-currency">
                <button class="mobile-footer-chip"><i class="bi bi-globe2"></i> English</button>
                <button class="mobile-footer-chip"><i class="bi bi-currency-rupee"></i> INR</button>
            </div>
        </div>
    </div>

    <!-- ============================================
         BOTTOM NAVIGATION BAR (Desktop only)
         ============================================ -->
    <div class="nav-bar-custom py-3 border-bottom">
        <div class="container d-flex align-items-center justify-content-between">
            <!-- Left Categories -->
            <div class="dropdown">
                <div class="nav-categories d-flex align-items-center gap-2" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <span class="text-purple">Categories</span>
                    <span class="text-muted fs-6">(See All)</span>
                    <i class="bi bi-chevron-down text-purple ms-1"></i>
                </div>
                <ul class="dropdown-menu categories-dropdown-menu shadow-sm border-0 py-2 mt-2" aria-labelledby="categoriesDropdown">
                    <li><a class="dropdown-item" href="category.php?category=Westernwear">Westernwear</a></li>
                    <li><a class="dropdown-item" href="category.php?category=Indianwear">Indianwear</a></li>
                    <li><a class="dropdown-item" href="category.php?category=Mens">Mens</a></li>
                    <li><a class="dropdown-item" href="category.php?category=Kids">Kids</a></li>
                    <li><a class="dropdown-item" href="category.php?category=Women">Women</a></li>
                    <li><a class="dropdown-item" href="category.php?category=Footwear">Footwear</a></li>
                    <li><a class="dropdown-item" href="category.php?category=Bags">Bags</a></li>
                </ul>
            </div>

            <!-- Middle Navigation Links -->
            <ul class="nav-links-custom d-flex gap-4 mb-0 align-items-center d-none d-lg-flex">
                <li><a href="index.php" class="nav-link-item <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                <li><a href="flash-sale.php" class="nav-link-item <?php echo ($currentPage == 'flash-sale.php') ? 'active' : ''; ?>">Flash Sale</a></li>
                <li><a href="brands.php" class="nav-link-item <?php echo ($currentPage == 'brands.php') ? 'active' : ''; ?>">All Brands</a></li>
                <li><a href="categories.php" class="nav-link-item <?php echo ($currentPage == 'categories.php') ? 'active' : ''; ?>">All categories</a></li>
                <li><a href="#" class="nav-link-item">Team Login/ Company Person</a></li>
            </ul>

            <!-- Right Shopping Cart -->
            <a href="cart.php" class="nav-cart-custom d-flex align-items-center gap-2 text-decoration-none" id="desktopCartBtn">
                <i class="bi bi-cart3 text-purple fs-4"></i>
                <span class="text-purple" id="desktopCartCount">3</span>
            </a>
        </div>
    </div>

<script>
    // ===== Axvero Header State Sync =====
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Sync Cart Count
        function syncHeaderCartCount() {
            let totalQty = 0;
            try {
                const localCart = localStorage.getItem('axv_cart');
                if (localCart) {
                    const cart = JSON.parse(localCart);
                    cart.forEach(item => {
                        totalQty += (parseInt(item.qty) || 1);
                    });
                } else {
                    totalQty = 3; // Default mockup count
                }
            } catch(e) {
                totalQty = 3;
            }

            const desktopCountEl = document.getElementById('desktopCartCount');
            const mobileCountEl = document.getElementById('mobileCartCount');
            if (desktopCountEl) desktopCountEl.textContent = totalQty;
            if (mobileCountEl) mobileCountEl.textContent = totalQty;
        }

        // 2. Sync User Authentication State
        function syncHeaderUserState() {
            try {
                const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
                const userName = localStorage.getItem('userName') || 'Navneet Kumar';

                // Desktop header update
                const profileTextEl = document.getElementById('headerProfileText');
                if (profileTextEl) {
                    if (isLoggedIn) {
                        profileTextEl.innerHTML = `<a href="account.php" class="fw-bold text-purple">${userName}</a> | <a href="javascript:void(0)" onclick="headerLogout()">Logout</a>`;
                    } else {
                        profileTextEl.innerHTML = `<a href="login-page.php">Login</a> | <a href="register-page.php">Registration</a>`;
                    }
                }

                // Mobile greeting and links update
                const mobileGreetingText = document.getElementById('mobileGreetingText');
                const mobileGreetingActions = document.getElementById('mobileGreetingActions');
                const mobileAccountLink = document.getElementById('mobileAccountLink');

                if (isLoggedIn) {
                    if (mobileGreetingText) mobileGreetingText.textContent = `Welcome, ${userName.split(' ')[0]}!`;
                    if (mobileGreetingActions) {
                        mobileGreetingActions.innerHTML = `<a href="account.php" class="mobile-user-btn">My Account</a> <span class="mobile-user-divider">&bull;</span> <a href="javascript:void(0)" onclick="headerLogout()" class="mobile-user-btn">Logout</a>`;
                    }
                    if (mobileAccountLink) {
                        mobileAccountLink.href = 'account.php';
                    }
                } else {
                    if (mobileGreetingText) mobileGreetingText.textContent = `Welcome!`;
                    if (mobileGreetingActions) {
                        mobileGreetingActions.innerHTML = `<a href="login-page.php" class="mobile-user-btn">Login</a> <span class="mobile-user-divider">&bull;</span> <a href="register-page.php" class="mobile-user-btn">Register</a>`;
                    }
                    if (mobileAccountLink) {
                        mobileAccountLink.href = 'login-page.php';
                    }
                }
            } catch(e) {}
        }

        // Global logout function
        window.headerLogout = function() {
            try {
                localStorage.removeItem('isLoggedIn');
                localStorage.removeItem('userName');
                if (typeof showToast === 'function') {
                    showToast('Logged out successfully');
                }
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 800);
            } catch(e) {
                window.location.href = 'index.php';
            }
        };

        syncHeaderCartCount();
        syncHeaderUserState();

        // Listen for storage changes to sync across tabs
        window.addEventListener('storage', function() {
            syncHeaderCartCount();
            syncHeaderUserState();
        });
    });
</script>
