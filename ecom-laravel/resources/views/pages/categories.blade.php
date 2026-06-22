@extends('layouts.app')

@section('title', 'All Categories')

@section('nav_categories', 'active')
@section('categories_active', 'active')

@section('content')
<!-- ============================================
     BREADCRUMB
     ============================================ -->
<div class="category-breadcrumb py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-family: var(--ff-primary); font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">All Categories</li>
            </ol>
        </nav>
    </div>
</div>

<!-- ============================================
     CATEGORIES CATALOG MAIN CONTAINER
     ============================================ -->
<main class="py-5 bg-white">
    <div class="container categories-container">
        <!-- Title and description -->
        <div class="row mb-4 align-items-center">
            <div class="col-md-7 text-start">
                <h1 class="categories-header-title mb-2">All Categories</h1>
                <p class="categories-header-desc mb-0">Browse 128 categories across 10 departments — find exactly what you need</p>
            </div>
            <!-- Search & Sort Filter Bar -->
            <div class="col-md-5 mt-3 mt-md-0">
                <div class="d-flex gap-3 categories-filter-bar align-items-center">
                    <!-- Live Search Bar -->
                    <div class="categories-search-input-group">
                        <i class="bi bi-search categories-search-icon"></i>
                        <input type="text" id="categoriesSearch" class="categories-search-control" placeholder="Filter categories...">
                        <span class="categories-search-shortcut">⌘K</span>
                    </div>
                    <!-- Alphabetical Sort select -->
                    <div class="sort-select-wrapper">
                        <select id="sortSelect" class="sort-select-control">
                            <option value="asc">Sort: A-Z</option>
                            <option value="desc">Sort: Z-A</option>
                        </select>
                        <i class="bi bi-chevron-down sort-select-chevron"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordion Department List -->
        <div class="accordion mt-4" id="categoriesAccordion">

            <!-- 1. Men's Fashion -->
            <div class="accordion-item dept-accordion-item" data-name="Men's Fashion">
                <h2 class="accordion-header" id="headingMens">
                    <button class="accordion-button dept-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMens" aria-expanded="true" aria-controls="collapseMens">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Men's Fashion</span>
                                <span class="dept-meta-info">6 subcategories &bull; 2,400+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseMens" class="accordion-collapse collapse show" aria-labelledby="headingMens" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">
                            
                            <!-- Subcategory: Topwear (Expanded) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-tag-fill sub-card-icon"></i>
                                        <span class="sub-card-title">Topwear</span>
                                    </div>
                                    <i class="bi bi-chevron-right sub-card-chevron"></i>
                                </div>
                                <ul class="nested-items-list" style="display: block;">
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Shirts">Shirts <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=T-Shirts">T-Shirts <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=PoloShirts">Polo Shirts <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Sweaters">Hoodies &amp; Sweatshirts <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Jackets">Jackets &amp; Coats <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Bottomwear (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-layout-sidebar sub-card-icon"></i>
                                        <span class="sub-card-title">Bottomwear</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">4 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Jeans">Jeans <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Chinos">Chinos <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Joggers">Joggers <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Mens&subcategory=Shorts">Shorts <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Footwear (Expanded) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-layers-half sub-card-icon"></i>
                                        <span class="sub-card-title">Footwear</span>
                                    </div>
                                    <i class="bi bi-chevron-right sub-card-chevron"></i>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Footwear&type=Sports">Sports Shoes <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Footwear&type=Sneakers">Sneakers <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Footwear&type=Casual">Casual Shoes <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Footwear&type=Formal">Formal Shoes <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Footwear&type=Sandals">Sandals &amp; Slippers <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Accessories (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-gem sub-card-icon"></i>
                                        <span class="sub-card-title">Accessories</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">6 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Belts">Belts <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Wallets">Wallets <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Sunglasses">Sunglasses <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Socks">Socks <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Hats">Hats <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Scarves">Scarves <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Watches (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-watch sub-card-icon"></i>
                                        <span class="sub-card-title">Watches</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">12 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Analog">Analog Watches <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Digital">Digital Watches <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Smart">Smartwatches <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Bags & Luggage (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-briefcase-fill sub-card-icon"></i>
                                        <span class="sub-card-title">Bags &amp; Luggage</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">8 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Bags&type=Backpacks">Backpacks <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Bags&type=Duffels">Duffle Bags <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Bags&type=Messengers">Messenger Bags <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Eyewear (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-eye-fill sub-card-icon"></i>
                                        <span class="sub-card-title">Eyewear</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">5 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Reading">Reading Glasses <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Computer">Computer Glasses <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                            <!-- Subcategory: Jewellery (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-award-fill sub-card-icon"></i>
                                        <span class="sub-card-title">Jewellery</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">9 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Rings">Rings &amp; Bands <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                    <li><a href="{{ url('/category') }}?category=Accessories&type=Bracelets">Bracelets <i class="bi bi-arrow-right-short text-muted"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Electronics -->
            <div class="accordion-item dept-accordion-item" data-name="Electronics">
                <h2 class="accordion-header" id="headingElec">
                    <button class="accordion-button dept-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElec" aria-expanded="false" aria-controls="collapseElec">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Electronics</span>
                                <span class="dept-meta-info">8 subcategories &bull; 3,100+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseElec" class="accordion-collapse collapse" aria-labelledby="headingElec" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">
                            
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-phone sub-card-icon"></i>
                                        <span class="sub-card-title">Mobiles &amp; Tablets</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">15 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Electronics&type=Smartphones">Smartphones</a></li>
                                    <li><a href="{{ url('/category') }}?category=Electronics&type=Tablets">Tablets</a></li>
                                </ul>
                            </div>

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-display sub-card-icon"></i>
                                        <span class="sub-card-title">Laptops &amp; Desktops</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">10 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Electronics&type=Laptops">Laptops</a></li>
                                    <li><a href="{{ url('/category') }}?category=Electronics&type=Accessories">Peripherals</a></li>
                                </ul>
                            </div>

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-headphones sub-card-icon"></i>
                                        <span class="sub-card-title">Audio &amp; Speakers</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">24 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Electronics&type=Headphones">Headphones</a></li>
                                    <li><a href="{{ url('/category') }}?category=Electronics&type=Speakers">Bluetooth Speakers</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Beauty & Personal Care -->
            <div class="accordion-item dept-accordion-item" data-name="Beauty & Personal Care">
                <h2 class="accordion-header" id="headingBeauty">
                    <button class="accordion-button dept-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBeauty" aria-expanded="true" aria-controls="collapseBeauty">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-palette"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Beauty &amp; Personal Care</span>
                                <span class="dept-meta-info">5 subcategories &bull; 4,700+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseBeauty" class="accordion-collapse collapse show" aria-labelledby="headingBeauty" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">

                            <!-- Skincare (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-droplet-fill sub-card-icon"></i>
                                        <span class="sub-card-title">Skincare</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">8 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Cleansers">Cleansers</a></li>
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Moisturizers">Moisturizers</a></li>
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Serums">Serums &amp; Treatments</a></li>
                                </ul>
                            </div>

                            <!-- Makeup (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-brush sub-card-icon"></i>
                                        <span class="sub-card-title">Makeup</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">12 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Face">Face Makeup</a></li>
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Eyes">Eye Makeup</a></li>
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Lips">Lipsticks &amp; Gloss</a></li>
                                </ul>
                            </div>

                            <!-- Hair Care (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-scissors sub-card-icon"></i>
                                        <span class="sub-card-title">Hair Care</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">6 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Shampoos">Shampoos</a></li>
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Conditioners">Conditioners</a></li>
                                </ul>
                            </div>

                            <!-- Fragrance (Collapsed) -->
                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-flower1 sub-card-icon"></i>
                                        <span class="sub-card-title">Fragrance</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">4 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Perfumes">Perfumes</a></li>
                                    <li><a href="{{ url('/category') }}?category=Beauty&type=Deodorants">Deodorants</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Home & Living -->
            <div class="accordion-item dept-accordion-item" data-name="Home & Living">
                <h2 class="accordion-header" id="headingHome">
                    <button class="accordion-button dept-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHome" aria-expanded="false" aria-controls="collapseHome">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-house"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Home &amp; Living</span>
                                <span class="dept-meta-info">7 subcategories &bull; 5,900+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseHome" class="accordion-collapse collapse" aria-labelledby="headingHome" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-patch-check sub-card-icon"></i>
                                        <span class="sub-card-title">Home Decor</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">22 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=HomeDecor&type=Vases">Vases &amp; Pots</a></li>
                                    <li><a href="{{ url('/category') }}?category=HomeDecor&type=WallArt">Wall Decor</a></li>
                                </ul>
                            </div>

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-egg-fried sub-card-icon"></i>
                                        <span class="sub-card-title">Kitchen &amp; Dining</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">35 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=HomeDecor&type=Cookware">Cookware</a></li>
                                    <li><a href="{{ url('/category') }}?category=HomeDecor&type=Tableware">Tableware</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Sports & Fitness -->
            <div class="accordion-item dept-accordion-item" data-name="Sports & Fitness">
                <h2 class="accordion-header" id="headingSports">
                    <button class="accordion-button dept-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSports" aria-expanded="false" aria-controls="collapseSports">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-dribbble"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Sports &amp; Fitness</span>
                                <span class="dept-meta-info">6 subcategories &bull; 2,200+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseSports" class="accordion-collapse collapse" aria-labelledby="headingSports" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-activity sub-card-icon"></i>
                                        <span class="sub-card-title">Fitness Equipment</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">12 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Sports&type=Weights">Dumbbells &amp; Weights</a></li>
                                    <li><a href="{{ url('/category') }}?category=Sports&type=Treadmills">Treadmills</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Kids & Baby -->
            <div class="accordion-item dept-accordion-item" data-name="Kids & Baby">
                <h2 class="accordion-header" id="headingKids">
                    <button class="accordion-button dept-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKids" aria-expanded="false" aria-controls="collapseKids">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-emoji-smile-fill"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Kids &amp; Baby</span>
                                <span class="dept-meta-info">5 subcategories &bull; 1,800+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseKids" class="accordion-collapse collapse" aria-labelledby="headingKids" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-backpack sub-card-icon"></i>
                                        <span class="sub-card-title">Boys Clothing</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">25 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="{{ url('/category') }}?category=Kids&type=BoysShirts">T-shirts &amp; Shirts</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. Grocery & Food -->
            <div class="accordion-item dept-accordion-item" data-name="Grocery & Food">
                <h2 class="accordion-header" id="headingGrocery">
                    <button class="accordion-button dept-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGrocery" aria-expanded="false" aria-controls="collapseGrocery">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-basket3-fill"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Grocery &amp; Food</span>
                                <span class="dept-meta-info">6 subcategories &bull; 6,100+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseGrocery" class="accordion-collapse collapse" aria-labelledby="headingGrocery" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-cup-hot sub-card-icon"></i>
                                        <span class="sub-card-title">Beverages</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">75 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="#">Coffee</a></li>
                                    <li><a href="#">Tea &amp; Herbal</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. Gaming -->
            <div class="accordion-item dept-accordion-item" data-name="Gaming">
                <h2 class="accordion-header" id="headingGaming">
                    <button class="accordion-button dept-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGaming" aria-expanded="false" aria-controls="collapseGaming">
                        <div class="dept-header-left">
                            <div class="dept-icon-box">
                                <i class="bi bi-controller"></i>
                            </div>
                            <div class="dept-title-meta">
                                <span class="dept-name">Gaming</span>
                                <span class="dept-meta-info">4 subcategories &bull; 1,200+ products</span>
                            </div>
                        </div>
                        <div class="dept-action-trigger">
                            <i class="bi bi-chevron-down dept-chevron text-purple"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseGaming" class="accordion-collapse collapse" aria-labelledby="headingGaming" data-bs-parent="#categoriesAccordion">
                    <div class="accordion-body subcategory-grid-container">
                        <div class="subcategory-grid">

                            <div class="subcategory-card">
                                <div class="sub-card-header" onclick="toggleSublist(this)">
                                    <div class="sub-card-header-left">
                                        <i class="bi bi-unity sub-card-icon"></i>
                                        <span class="sub-card-title">Console Games</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="sub-card-meta">60 items</span>
                                        <i class="bi bi-chevron-right sub-card-chevron"></i>
                                    </div>
                                </div>
                                <ul class="nested-items-list" style="display: none;">
                                    <li><a href="#">PS5 Games</a></li>
                                    <li><a href="#">Xbox Games</a></li>
                                    <li><a href="#">Nintendo Switch</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Empty State Container -->
        <div id="searchEmptyState" class="search-empty-state mt-4" style="display: none;">
            <i class="bi bi-search search-empty-icon"></i>
            <h3 class="search-empty-title">No categories found</h3>
            <p class="search-empty-text">We couldn't find any departments or subcategories matching your query. Please try another search term.</p>
        </div>

    </div>
</main>

<!-- ============================================
     JAVASCRIPT LOGIC FOR FILTER AND SORT
     ============================================ -->
<script>
    // Toggle sublist (Topwear, bottomwear subcategories) inside cards
    function toggleSublist(headerElement) {
        const card = headerElement.closest('.subcategory-card');
        const list = card.querySelector('.nested-items-list');
        const chevron = card.querySelector('.sub-card-chevron');
        
        if (list) {
            const isVisible = list.style.display === 'block';
            
            // Accordion-like behavior: collapse all other subcategory cards in the same grid when opening this one
            if (!isVisible) {
                const parentGrid = card.closest('.subcategory-grid');
                if (parentGrid) {
                    parentGrid.querySelectorAll('.subcategory-card').forEach(function(otherCard) {
                        if (otherCard !== card) {
                            const otherList = otherCard.querySelector('.nested-items-list');
                            const otherChevron = otherCard.querySelector('.sub-card-chevron');
                            if (otherList) {
                                otherList.style.display = 'none';
                            }
                            otherCard.classList.remove('collapsible-active');
                        }
                    });
                }
            }
            
            list.style.display = isVisible ? 'none' : 'block';
            
            if (chevron) {
                if (isVisible) {
                    card.classList.remove('collapsible-active');
                } else {
                    card.classList.add('collapsible-active');
                }
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("categoriesSearch");
        const sortSelect = document.getElementById("sortSelect");
        const accordion = document.getElementById("categoriesAccordion");
        const emptyState = document.getElementById("searchEmptyState");
        
        // 1. Live Filter logic
        searchInput.addEventListener("input", function() {
            const query = searchInput.value.toLowerCase().trim();
            const items = accordion.querySelectorAll(".dept-accordion-item");
            let hasVisible = false;
            
            items.forEach(function(item) {
                const deptName = item.getAttribute("data-name").toLowerCase();
                const subTitles = Array.from(item.querySelectorAll(".sub-card-title")).map(el => el.textContent.toLowerCase());
                const nestedLinks = Array.from(item.querySelectorAll(".nested-items-list a")).map(el => el.textContent.toLowerCase());
                
                // Check match
                const isDeptMatch = deptName.includes(query);
                const isSubMatch = subTitles.some(title => title.includes(query));
                const isNestedMatch = nestedLinks.some(link => link.includes(query));
                
                if (query === "") {
                    // Reset to default
                    item.style.display = "";
                    hasVisible = true;
                    // Reset collapse states to defaults (Men's and Beauty open, others collapsed)
                    const collapseEl = item.querySelector(".accordion-collapse");
                    const buttonEl = item.querySelector(".dept-accordion-button");
                    const defaultOpenDepts = ["Men's Fashion", "Beauty & Personal Care"];
                    const shouldBeOpen = defaultOpenDepts.includes(item.getAttribute("data-name"));
                    
                    if (shouldBeOpen) {
                        collapseEl.classList.add("show");
                        buttonEl.classList.remove("collapsed");
                        buttonEl.setAttribute("aria-expanded", "true");
                    } else {
                        collapseEl.classList.remove("show");
                        buttonEl.classList.add("collapsed");
                        buttonEl.setAttribute("aria-expanded", "false");
                    }
                } else if (isDeptMatch || isSubMatch || isNestedMatch) {
                    item.style.display = "";
                    hasVisible = true;
                    
                    // Force expand parent accordion body to show matching subcategory
                    const collapseEl = item.querySelector(".accordion-collapse");
                    const buttonEl = item.querySelector(".dept-accordion-button");
                    collapseEl.classList.add("show");
                    buttonEl.classList.remove("collapsed");
                    buttonEl.setAttribute("aria-expanded", "true");
                    
                    // Highlight matching subcategories
                    item.querySelectorAll(".subcategory-card").forEach(function(card) {
                        const subTitle = card.querySelector(".sub-card-title").textContent.toLowerCase();
                        const cardLinks = Array.from(card.querySelectorAll(".nested-items-list a")).map(el => el.textContent.toLowerCase());
                        const isCardSubMatch = subTitle.includes(query);
                        const isCardNestedMatch = cardLinks.some(link => link.includes(query));
                        
                        if (isCardSubMatch || isCardNestedMatch) {
                            card.style.borderColor = "var(--clr-primary)";
                            card.style.backgroundColor = "rgba(106, 13, 173, 0.01)";
                            
                            // If a nested link matches, expand the nested list
                            if (isCardNestedMatch) {
                                const list = card.querySelector(".nested-items-list");
                                if (list) {
                                    list.style.display = "block";
                                    card.classList.add("collapsible-active");
                                }
                            }
                        } else {
                            card.style.borderColor = "";
                            card.style.backgroundColor = "";
                        }
                    });
                } else {
                    item.style.display = "none";
                }
            });
            
            // Empty state display
            if (hasVisible) {
                emptyState.style.display = "none";
                accordion.style.display = "";
            } else {
                emptyState.style.display = "block";
                accordion.style.display = "none";
            }
        });

        // 2. Sorting logic (A-Z / Z-A)
        sortSelect.addEventListener("change", function() {
            const order = sortSelect.value; // 'asc' or 'desc'
            const itemsArray = Array.from(accordion.querySelectorAll(".dept-accordion-item"));
            
            itemsArray.sort(function(a, b) {
                const nameA = a.getAttribute("data-name").toLowerCase();
                const nameB = b.getAttribute("data-name").toLowerCase();
                
                if (order === "asc") {
                    return nameA.localeCompare(nameB);
                } else {
                    return nameB.localeCompare(nameA);
                }
            });
            
            // Re-append to container in sorted order
            itemsArray.forEach(function(item) {
                accordion.appendChild(item);
            });
        });

        // 3. Global key combination (Ctrl+K or Cmd+K) to focus search
        window.addEventListener("keydown", function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === "k") {
                e.preventDefault();
                searchInput.focus();
            }
        });
    });
</script>
@endsection
