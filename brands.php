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
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">All Brands</li>
            </ol>
        </nav>
    </div>
</div>

<!-- ============================================
     BRANDS HERO SECTION
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container brands-container">
        <div class="brands-hero text-center mb-5">
            <div class="brands-hero-pattern"></div>
            <h1 class="brands-hero-title mb-3">Discover Top Brands</h1>
            <p class="brands-hero-desc mx-auto mb-4">Explore 500+ top brands in clothing, footwear, beauty, electronics &amp; home decor.</p>
            
            <!-- Pill Search Input -->
            <div class="brands-search-wrapper mb-4">
                <i class="bi bi-search brands-search-icon"></i>
                <input type="text" id="brandSearch" class="brands-search-control" placeholder="Search for your favorite brand...">
            </div>

            <!-- Trending search chips -->
            <div class="brands-trending-chips-wrapper">
                <span class="brands-trending-label">Trending:</span>
                <a class="brand-chip-link" onclick="triggerSearch('Nike')">Nike</a>
                <a class="brand-chip-link" onclick="triggerSearch('Adidas')">Adidas</a>
                <a class="brand-chip-link" onclick="triggerSearch('Levi\'s')">Levi's</a>
                <a class="brand-chip-link" onclick="triggerSearch('Samsung')">Samsung</a>
                <a class="brand-chip-link" onclick="triggerSearch('Sony')">Sony</a>
                <a class="brand-chip-link" onclick="triggerSearch('Apple')">Apple</a>
                <a class="brand-chip-link" onclick="triggerSearch('Zara')">Zara</a>
            </div>
        </div>

        <!-- ============================================
             FILTERS & ALPHABET ANCHOR JUMPS
             ============================================ -->
        <div class="brand-filter-nav mb-5">
            <!-- Department Pills -->
            <div class="brand-cat-pills">
                <button class="brand-cat-pill active" onclick="filterCategory('All', this)">All</button>
                <button class="brand-cat-pill" onclick="filterCategory('Fashion', this)">Fashion</button>
                <button class="brand-cat-pill" onclick="filterCategory('Beauty', this)">Beauty</button>
                <button class="brand-cat-pill" onclick="filterCategory('Electronics', this)">Electronics</button>
                <button class="brand-cat-pill" onclick="filterCategory('Home', this)">Home</button>
                <button class="brand-cat-pill" onclick="filterCategory('Kids', this)">Kids</button>
            </div>

            <!-- Alphabet Jump Navigation -->
            <div class="brand-alphabet-nav" id="alphabetNav">
                <a href="#letter-A" class="brand-letter-link" data-letter="A">A</a>
                <a href="#letter-B" class="brand-letter-link" data-letter="B">B</a>
                <a href="#letter-C" class="brand-letter-link" data-letter="C">C</a>
                <a href="#letter-D" class="brand-letter-link disabled" data-letter="D">D</a>
                <a href="#letter-E" class="brand-letter-link disabled" data-letter="E">E</a>
                <a href="#letter-F" class="brand-letter-link disabled" data-letter="F">F</a>
                <a href="#letter-G" class="brand-letter-link disabled" data-letter="G">G</a>
                <a href="#letter-H" class="brand-letter-link disabled" data-letter="H">H</a>
                <a href="#letter-I" class="brand-letter-link disabled" data-letter="I">I</a>
                <a href="#letter-J" class="brand-letter-link disabled" data-letter="J">J</a>
                <a href="#letter-K" class="brand-letter-link disabled" data-letter="K">K</a>
                <a href="#letter-L" class="brand-letter-link disabled" data-letter="L">L</a>
                <a href="#letter-M" class="brand-letter-link disabled" data-letter="M">M</a>
                <a href="#letter-N" class="brand-letter-link disabled" data-letter="N">N</a>
                <a href="#letter-O" class="brand-letter-link disabled" data-letter="O">O</a>
                <a href="#letter-P" class="brand-letter-link disabled" data-letter="P">P</a>
                <a href="#letter-Q" class="brand-letter-link disabled" data-letter="Q">Q</a>
                <a href="#letter-R" class="brand-letter-link disabled" data-letter="R">R</a>
                <a href="#letter-S" class="brand-letter-link disabled" data-letter="S">S</a>
                <a href="#letter-T" class="brand-letter-link disabled" data-letter="T">T</a>
                <a href="#letter-U" class="brand-letter-link disabled" data-letter="U">U</a>
                <a href="#letter-V" class="brand-letter-link disabled" data-letter="V">V</a>
                <a href="#letter-W" class="brand-letter-link disabled" data-letter="W">W</a>
                <a href="#letter-X" class="brand-letter-link disabled" data-letter="X">X</a>
                <a href="#letter-Y" class="brand-letter-link disabled" data-letter="Y">Y</a>
                <a href="#letter-Z" class="brand-letter-link disabled" data-letter="Z">Z</a>
            </div>
        </div>

        <!-- ============================================
             FEATURED BRANDS SHOWCASE
             ============================================ -->
        <div class="mb-5 text-start" id="featuredSection">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold mb-0" style="color: #1a1a2e;">Featured Brands</h2>
                <a href="#letter-A" class="text-purple fw-semibold text-decoration-none">See all Featured</a>
            </div>
            
            <div class="row g-4">
                <!-- 1. Nike -->
                <div class="col-lg-3 col-md-6" data-category="Fashion">
                    <div class="featured-brand-card" onclick="trackBrandView('Nike')">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=600&fit=crop&q=80" alt="Nike" class="featured-brand-img">
                        <div class="featured-brand-logo-badge">
                            <i class="bi bi-lightning-fill text-purple"></i>
                        </div>
                        <div class="featured-brand-overlay">
                            <h3 class="featured-brand-title">Discover Nike</h3>
                            <a href="category.php?category=Mens&brand=Nike" class="btn btn-purple-custom featured-brand-btn py-2 px-3">Explore Collection</a>
                        </div>
                    </div>
                </div>

                <!-- 2. Levi's -->
                <div class="col-lg-3 col-md-6" data-category="Fashion">
                    <div class="featured-brand-card" onclick="trackBrandView('Levi\'s')">
                        <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=400&h=600&fit=crop&q=80" alt="Levi's" class="featured-brand-img">
                        <div class="featured-brand-logo-badge">
                            <i class="bi bi-shield-check text-purple"></i>
                        </div>
                        <div class="featured-brand-overlay">
                            <h3 class="featured-brand-title">Original Levi's</h3>
                            <a href="category.php?category=Mens&brand=Levis" class="btn btn-purple-custom featured-brand-btn py-2 px-3">Explore Collection</a>
                        </div>
                    </div>
                </div>

                <!-- 3. Intel -->
                <div class="col-lg-3 col-md-6" data-category="Electronics">
                    <div class="featured-brand-card" onclick="trackBrandView('Intel')">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&h=600&fit=crop&q=80" alt="Intel" class="featured-brand-img">
                        <div class="featured-brand-logo-badge">
                            <i class="bi bi-cpu text-purple"></i>
                        </div>
                        <div class="featured-brand-overlay">
                            <h3 class="featured-brand-title">Future-proof Intel</h3>
                            <a href="category.php?category=Electronics&brand=Intel" class="btn btn-purple-custom featured-brand-btn py-2 px-3">Explore Collection</a>
                        </div>
                    </div>
                </div>

                <!-- 4. L'Oreal -->
                <div class="col-lg-3 col-md-6" data-category="Beauty">
                    <div class="featured-brand-card" onclick="trackBrandView('L\'Oréal')">
                        <img src="https://images.unsplash.com/photo-1608248597279-f99d160bfcbc?w=400&h=600&fit=crop&q=80" alt="L'Oreal" class="featured-brand-img">
                        <div class="featured-brand-logo-badge">
                            <i class="bi bi-flower1 text-purple"></i>
                        </div>
                        <div class="featured-brand-overlay">
                            <h3 class="featured-brand-title">Because You're Worth It</h3>
                            <a href="category.php?category=Women&brand=LOreal" class="btn btn-purple-custom featured-brand-btn py-2 px-3">Explore Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================
             ALL BRANDS ALPHABETICAL DIRECTORY
             ============================================ -->
        <div class="all-brands-directory">

            <!-- Section: A -->
            <div class="brand-letter-section py-4" id="letter-A">
                <h3 class="brand-section-header">A</h3>
                <div class="brand-cards-grid">
                    
                    <a href="category.php?category=Mens&brand=Adidas" class="brand-card-item" data-category="Fashion" onclick="trackBrandView('Adidas')">
                        <span class="brand-card-badge brand-badge-trending">TRENDING</span>
                        <div class="brand-card-logo"><i class="bi bi-activity"></i></div>
                        <h4 class="brand-card-name">Adidas</h4>
                        <p class="brand-card-meta">Fashion &bull; 140 products</p>
                    </a>

                    <a href="category.php?category=Electronics&brand=Apple" class="brand-card-item" data-category="Electronics" onclick="trackBrandView('Apple')">
                        <div class="brand-card-logo"><i class="bi bi-apple"></i></div>
                        <h4 class="brand-card-name">Apple</h4>
                        <p class="brand-card-meta">Electronics &bull; 410 products</p>
                    </a>

                    <a href="category.php?category=HomeDecor&brand=Amazon" class="brand-card-item" data-category="Home" onclick="trackBrandView('Amazon')">
                        <div class="brand-card-logo"><i class="bi bi-cart3"></i></div>
                        <h4 class="brand-card-name">Amazon</h4>
                        <p class="brand-card-meta">Home &bull; 250 products</p>
                    </a>

                    <a href="category.php?category=Mens&brand=Armani" class="brand-card-item" data-category="Fashion" onclick="trackBrandView('Armani')">
                        <div class="brand-card-logo"><i class="bi bi-gem"></i></div>
                        <h4 class="brand-card-name">Armani</h4>
                        <p class="brand-card-meta">Fashion &bull; 160 products</p>
                    </a>

                    <a href="category.php?category=Electronics&brand=Asus" class="brand-card-item" data-category="Electronics" onclick="trackBrandView('Asus')">
                        <div class="brand-card-logo"><i class="bi bi-cpu"></i></div>
                        <h4 class="brand-card-name">Asus</h4>
                        <p class="brand-card-meta">Electronics &bull; 125 products</p>
                    </a>

                    <a href="category.php?category=Beauty&brand=Avon" class="brand-card-item" data-category="Beauty" onclick="trackBrandView('Avon')">
                        <div class="brand-card-logo"><i class="bi bi-flower1"></i></div>
                        <h4 class="brand-card-name">Avon</h4>
                        <p class="brand-card-meta">Beauty &bull; 90 products</p>
                    </a>

                </div>
            </div>

            <!-- Section: B -->
            <div class="brand-letter-section py-4" id="letter-B">
                <h3 class="brand-section-header">B</h3>
                <div class="brand-cards-grid">
                    
                    <a href="category.php?category=HomeDecor&brand=Bosch" class="brand-card-item" data-category="Home" onclick="trackBrandView('Bosch')">
                        <div class="brand-card-logo"><i class="bi bi-wrench"></i></div>
                        <h4 class="brand-card-name">Bosch</h4>
                        <p class="brand-card-meta">Home &bull; 180 products</p>
                    </a>

                    <a href="category.php?category=Electronics&brand=Bose" class="brand-card-item" data-category="Electronics" onclick="trackBrandView('Bose')">
                        <span class="brand-card-badge brand-badge-premium">PREMIUM</span>
                        <div class="brand-card-logo"><i class="bi bi-headphones"></i></div>
                        <h4 class="brand-card-name">Bose</h4>
                        <p class="brand-card-meta">Electronics &bull; 110 products</p>
                    </a>

                    <a href="category.php?category=Mens&brand=Burberry" class="brand-card-item" data-category="Fashion" onclick="trackBrandView('Burberry')">
                        <div class="brand-card-logo"><i class="bi bi-umbrella"></i></div>
                        <h4 class="brand-card-name">Burberry</h4>
                        <p class="brand-card-meta">Fashion &bull; 220 products</p>
                    </a>

                    <a href="category.php?category=Beauty&brand=Benefit" class="brand-card-item" data-category="Beauty" onclick="trackBrandView('Benefit')">
                        <div class="brand-card-logo"><i class="bi bi-sparkles"></i></div>
                        <h4 class="brand-card-name">Benefit</h4>
                        <p class="brand-card-meta">Beauty &bull; 95 products</p>
                    </a>

                    <a href="category.php?category=Mens&brand=Balenciaga" class="brand-card-item" data-category="Fashion" onclick="trackBrandView('Balenciaga')">
                        <div class="brand-card-logo"><i class="bi bi-bag"></i></div>
                        <h4 class="brand-card-name">Balenciaga</h4>
                        <p class="brand-card-meta">Fashion &bull; 135 products</p>
                    </a>

                    <a href="category.php?category=Mens&brand=Puma" class="brand-card-item" data-category="Fashion" onclick="trackBrandView('Puma')">
                        <div class="brand-card-logo"><i class="bi bi-lightning"></i></div>
                        <h4 class="brand-card-name">Puma</h4>
                        <p class="brand-card-meta">Fashion &bull; 190 products</p>
                    </a>

                </div>
            </div>

            <!-- Section: C -->
            <div class="brand-letter-section py-4" id="letter-C">
                <h3 class="brand-section-header">C</h3>
                <div class="brand-cards-grid">
                    
                    <a href="category.php?category=Electronics&brand=Canon" class="brand-card-item" data-category="Electronics" onclick="trackBrandView('Canon')">
                        <div class="brand-card-logo"><i class="bi bi-camera"></i></div>
                        <h4 class="brand-card-name">Canon</h4>
                        <p class="brand-card-meta">Electronics &bull; 145 products</p>
                    </a>

                    <a href="category.php?category=Bags&brand=Coach" class="brand-card-item" data-category="Fashion" onclick="trackBrandView('Coach')">
                        <div class="brand-card-logo"><i class="bi bi-briefcase"></i></div>
                        <h4 class="brand-card-name">Coach</h4>
                        <p class="brand-card-meta">Fashion &bull; 120 products</p>
                    </a>

                    <a href="category.php?category=Accessories&brand=Casio" class="brand-card-item" data-category="Electronics" onclick="trackBrandView('Casio')">
                        <span class="brand-card-badge brand-badge-new">NEW</span>
                        <div class="brand-card-logo"><i class="bi bi-watch"></i></div>
                        <h4 class="brand-card-name">Casio</h4>
                        <p class="brand-card-meta">Electronics &bull; 80 products</p>
                    </a>

                    <a href="category.php?category=Electronics&brand=Cisco" class="brand-card-item" data-category="Electronics" onclick="trackBrandView('Cisco')">
                        <div class="brand-card-logo"><i class="bi bi-cloud"></i></div>
                        <h4 class="brand-card-name">Cisco</h4>
                        <p class="brand-card-meta">Electronics &bull; 70 products</p>
                    </a>

                </div>
            </div>

        </div>

        <!-- Empty search state -->
        <div id="brandsEmptyState" class="brands-empty-state mt-5" style="display: none;">
            <i class="bi bi-search brands-empty-icon"></i>
            <h3 class="brands-empty-title">No brands found</h3>
            <p class="brands-empty-text">We couldn't find any brands matching your query. Please try another search term.</p>
        </div>
    </div>
</section>

<!-- ============================================
     RECENTLY VIEWED BOTTOM BAR
     ============================================ -->
<div id="recentlyViewedBar" class="brand-history-bar" style="display: none;">
    <div class="brand-history-container">
        <div class="brand-history-left">
            <span class="brand-history-title">Recently Viewed:</span>
            <div class="brand-history-list" id="recentlyViewedList">
                <!-- Chips dynamically injected here -->
            </div>
        </div>
        <button class="brand-history-clear" onclick="clearBrandHistory()">Clear History</button>
    </div>
</div>

<!-- ============================================
     JAVASCRIPT LOGIC FOR FILTERING, ANCHORS, HISTORY
     ============================================ -->
<script>
    let activeCategory = 'All';

    // 1. Trending Search chip click handler
    function triggerSearch(brandName) {
        const searchInput = document.getElementById("brandSearch");
        searchInput.value = brandName;
        // Trigger live search
        const event = new Event('input', { bubbles: true });
        searchInput.dispatchEvent(event);
    }

    // 2. Category Pill filter click handler
    function filterCategory(category, buttonElement) {
        activeCategory = category;
        
        // Toggle active button pill
        document.querySelectorAll(".brand-cat-pill").forEach(btn => btn.classList.remove("active"));
        buttonElement.classList.add("active");
        
        applyAllFilters();
    }

    // Combined search and category filtering logic
    function applyAllFilters() {
        const searchQuery = document.getElementById("brandSearch").value.toLowerCase().trim();
        const letterSections = document.querySelectorAll(".brand-letter-section");
        const featuredSection = document.getElementById("featuredSection");
        const emptyState = document.getElementById("brandsEmptyState");
        let directoryHasVisible = false;

        // A. Filter Featured Brands Section
        let featuredHasVisible = false;
        featuredSection.querySelectorAll("[data-category]").forEach(cardWrapper => {
            const cat = cardWrapper.getAttribute("data-category");
            const brandTitle = cardWrapper.querySelector(".featured-brand-title").textContent.toLowerCase();
            
            const matchesCat = (activeCategory === 'All' || cat === activeCategory);
            const matchesSearch = (searchQuery === '' || brandTitle.includes(searchQuery));
            
            if (matchesCat && matchesSearch) {
                cardWrapper.classList.remove("d-none");
                featuredHasVisible = true;
            } else {
                cardWrapper.classList.add("d-none");
            }
        });
        
        if (featuredHasVisible) {
            featuredSection.style.display = "";
        } else {
            featuredSection.style.display = "none";
        }

        // B. Filter Alphabetical Sections
        letterSections.forEach(section => {
            const letter = section.querySelector(".brand-section-header").textContent;
            let sectionHasVisible = false;
            
            section.querySelectorAll(".brand-card-item").forEach(card => {
                const cat = card.getAttribute("data-category");
                const name = card.querySelector(".brand-card-name").textContent.toLowerCase();
                
                const matchesCat = (activeCategory === 'All' || cat === activeCategory);
                const matchesSearch = (searchQuery === '' || name.includes(searchQuery));
                
                if (matchesCat && matchesSearch) {
                    card.style.display = "";
                    sectionHasVisible = true;
                    directoryHasVisible = true;
                } else {
                    card.style.display = "none";
                }
            });
            
            if (sectionHasVisible) {
                section.style.display = "";
                // Enable alphabet links
                document.querySelector(`.brand-letter-link[data-letter="${letter}"]`).classList.remove("disabled");
            } else {
                section.style.display = "none";
                // Disable alphabet links
                document.querySelector(`.brand-letter-link[data-letter="${letter}"]`).classList.add("disabled");
            }
        });

        // C. Show Empty State if completely empty
        if (directoryHasVisible || featuredHasVisible) {
            emptyState.style.display = "none";
        } else {
            emptyState.style.display = "block";
        }
    }

    // 3. Recently Viewed History tracker
    function trackBrandView(brandName) {
        let history = JSON.parse(localStorage.getItem('viewedBrands')) || [];
        
        // Remove if duplicate, then prepend
        history = history.filter(item => item !== brandName);
        history.unshift(brandName);
        
        // Keep at most 5 items in history
        if (history.length > 5) {
            history.pop();
        }
        
        localStorage.setItem('viewedBrands', JSON.stringify(history));
        renderBrandHistory();
    }

    function renderBrandHistory() {
        const bar = document.getElementById("recentlyViewedBar");
        const listContainer = document.getElementById("recentlyViewedList");
        const history = JSON.parse(localStorage.getItem('viewedBrands')) || [];
        
        if (history.length > 0) {
            listContainer.innerHTML = '';
            history.forEach(brand => {
                const item = document.createElement("div");
                item.className = "brand-history-item";
                item.textContent = brand;
                item.onclick = function() {
                    triggerSearch(brand);
                };
                listContainer.appendChild(item);
            });
            bar.style.display = "block";
        } else {
            bar.style.display = "none";
        }
    }

    function clearBrandHistory() {
        localStorage.removeItem('viewedBrands');
        renderBrandHistory();
    }

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("brandSearch");
        
        // Bind search input typing
        searchInput.addEventListener("input", applyAllFilters);

        // Global key shortcut Ctrl+K to focus search input
        window.addEventListener("keydown", function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === "k") {
                e.preventDefault();
                searchInput.focus();
            }
        });

        // Smooth scrolling for alphabet navigation anchors
        document.querySelectorAll(".brand-letter-link").forEach(link => {
            link.addEventListener("click", function(e) {
                e.preventDefault();
                const letter = this.getAttribute("data-letter");
                const target = document.getElementById(`letter-${letter}`);
                if (target) {
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                    
                    // Toggle active letter style
                    document.querySelectorAll(".brand-letter-link").forEach(l => l.classList.remove("active"));
                    this.classList.add("active");
                }
            });
        });

        // Render history on page load
        renderBrandHistory();
    });
</script>

<?php 
include 'includes/footer.php'; 
?>
