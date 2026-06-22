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
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">Store Locator</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Custom Page Styling -->
<style>
    .store-hero {
        position: relative;
        padding: 80px 0;
        background: linear-gradient(135deg, #1a1a2e 0%, #4B097A 50%, #6A0DAD 100%);
        color: #fff;
        overflow: hidden;
        text-align: center;
    }
    .store-hero-pattern {
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
    .store-hero-title {
        font-size: 3rem;
        font-weight: 800;
        letter-spacing: -1px;
        margin-bottom: 15px;
    }
    .store-hero-desc {
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.9;
        font-weight: 300;
    }
    .store-search-box {
        position: relative;
        max-width: 100%;
        margin-bottom: 24px;
    }
    .store-search-control {
        width: 100%;
        padding: 14px 20px 14px 50px;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-md);
        font-size: 0.95rem;
        outline: none;
        transition: var(--transition-fast);
    }
    .store-search-control:focus {
        border-color: var(--clr-primary-light);
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.06);
    }
    .store-search-icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--clr-primary);
        font-size: 1.2rem;
    }
    .store-list-container {
        max-height: 600px;
        overflow-y: auto;
        padding-right: 8px;
    }
    .store-list-container::-webkit-scrollbar {
        width: 6px;
    }
    .store-list-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    .store-list-container::-webkit-scrollbar-thumb {
        background: var(--clr-primary-light);
        border-radius: 4px;
        opacity: 0.7;
    }
    .store-card {
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 24px;
        margin-bottom: 16px;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }
    .store-card:hover {
        border-color: var(--clr-primary-light);
        box-shadow: var(--shadow-sm);
    }
    .store-card.active {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.02);
        box-shadow: var(--shadow-md);
    }
    .store-card-city {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--clr-primary-light);
        letter-spacing: 1px;
        margin-bottom: 6px;
    }
    .store-card-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--clr-dark);
        margin-bottom: 12px;
    }
    .store-card-info {
        font-size: 0.88rem;
        color: var(--clr-text-light);
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 16px;
    }
    .store-card-info div {
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }
    .store-card-info i {
        color: var(--clr-primary);
        font-size: 1rem;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .store-card-services {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        border-top: 1px dashed var(--clr-border);
        padding-top: 14px;
    }
    .service-chip {
        font-size: 0.72rem;
        background: #f5f5fa;
        color: var(--clr-text-light);
        padding: 3px 8px;
        border-radius: 4px;
        font-weight: 500;
    }
    .map-frame-wrapper {
        background: #f1f3f7;
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-lg);
        height: 600px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-md);
    }
    .map-svg-canvas {
        width: 100%;
        height: 100%;
        background-color: #e3e7f0;
    }
    .map-region {
        fill: #d5dbe5;
        stroke: #fff;
        stroke-width: 1.5;
        transition: fill 0.3s;
    }
    .map-region:hover {
        fill: #cbd3e1;
    }
    .map-grid-line {
        stroke: rgba(255, 255, 255, 0.4);
        stroke-width: 1;
        stroke-dasharray: 4 4;
    }
    .map-marker {
        cursor: pointer;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .map-marker circle.marker-dot {
        fill: var(--clr-primary);
        transition: fill 0.3s;
    }
    .map-marker circle.marker-pulse {
        fill: var(--clr-primary-light);
        opacity: 0.4;
        transform-origin: center;
        animation: markerRipple 2s infinite ease-out;
    }
    .map-marker.active circle.marker-dot {
        fill: #ef4444;
    }
    .map-marker.active circle.marker-pulse {
        fill: #ef4444;
        animation-duration: 1.2s;
    }
    .map-marker:hover {
        transform: scale(1.3);
    }
    @keyframes markerRipple {
        0% {
            r: 8px;
            opacity: 0.6;
        }
        100% {
            r: 28px;
            opacity: 0;
        }
    }
    .map-tooltip {
        position: absolute;
        background: var(--clr-white);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--clr-border);
        padding: 16px;
        width: 250px;
        z-index: 10;
        pointer-events: none;
        opacity: 0;
        transform: translate(-50%, -110%);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    .map-tooltip.visible {
        opacity: 1;
        transform: translate(-50%, -120%);
    }
    .map-tooltip-title {
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 4px;
    }
    .map-tooltip-desc {
        font-size: 0.78rem;
        color: var(--clr-text-light);
        margin-bottom: 8px;
        line-height: 1.4;
    }
    .map-tooltip-hours {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--clr-primary);
    }
    .store-city-filter-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }
    .store-city-pill {
        border: 1.5px solid var(--clr-border);
        background: var(--clr-white);
        padding: 8px 18px;
        font-size: 0.82rem;
        font-weight: 600;
        border-radius: var(--radius-pill);
        cursor: pointer;
        transition: var(--transition-fast);
        color: var(--clr-text-light);
    }
    .store-city-pill:hover,
    .store-city-pill.active {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.04);
        color: var(--clr-primary);
    }
    
    /* Toast directions simulator */
    .locator-toast-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1080;
    }
    .locator-toast {
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

    @media (max-width: 991.98px) {
        .map-frame-wrapper {
            height: 400px;
            margin-top: 30px;
        }
    }
</style>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="store-hero">
    <div class="store-hero-pattern"></div>
    <div class="container position-relative">
        <h1 class="store-hero-title">Axvero Outlets</h1>
        <p class="store-hero-desc">Visit our flagship digital fitting stores to experience materials, receive personal styling tips, and collect online orders.</p>
    </div>
</section>

<!-- ============================================
     LOCATOR GRID
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <!-- Left Panel: Stores Listing -->
            <div class="col-lg-5">
                <!-- Search -->
                <div class="store-search-box">
                    <i class="bi bi-search store-search-icon"></i>
                    <input type="text" id="storeSearchInput" oninput="filterStores()" class="store-search-control" placeholder="Search by city, store name, or pincode...">
                </div>

                <!-- City Filters -->
                <div class="store-city-filter-chips">
                    <button class="store-city-pill active" onclick="filterCity('All', this)">All Stores</button>
                    <button class="store-city-pill" onclick="filterCity('Mumbai', this)">Mumbai</button>
                    <button class="store-city-pill" onclick="filterCity('Delhi', this)">Delhi NCR</button>
                    <button class="store-city-pill" onclick="filterCity('Bengaluru', this)">Bengaluru</button>
                </div>

                <!-- Store Cards Column -->
                <div class="store-list-container" id="storeList">
                    <!-- Store 1: Mumbai -->
                    <div class="store-card active" id="card-mumbai" data-city="Mumbai" onclick="focusStore('mumbai')">
                        <span class="store-card-city">Mumbai FLAGSHIP</span>
                        <h3 class="store-card-name">Colaba Causeway Flagship</h3>
                        <div class="store-card-info">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                                <span>Colaba Causeway, Block A, Mumbai, MH 400001</span>
                            </div>
                            <div>
                                <i class="bi bi-telephone"></i>
                                <span>+91 22 4567 8901</span>
                            </div>
                            <div>
                                <i class="bi bi-clock"></i>
                                <span>10:00 AM - 09:30 PM (Mon-Sun)</span>
                            </div>
                        </div>
                        <div class="store-card-services">
                            <span class="service-chip">In-Store Tailoring</span>
                            <span class="service-chip">Personal Styling</span>
                            <span class="service-chip">Click &amp; Collect</span>
                        </div>
                        <button class="btn btn-sm btn-outline-purple mt-3 px-3 py-2 fw-semibold" style="border: 1px solid var(--clr-primary); color: var(--clr-primary); border-radius: var(--radius-pill); font-size: 0.8rem;" onclick="simulateDirections('Colaba Causeway Flagship, Mumbai', event)">
                            <i class="bi bi-compass me-1"></i> Get Directions
                        </button>
                    </div>

                    <!-- Store 2: Delhi -->
                    <div class="store-card" id="card-delhi" data-city="Delhi" onclick="focusStore('delhi')">
                        <span class="store-card-city">Delhi NCR FLAGSHIP</span>
                        <h3 class="store-card-name">Connaught Place Flagship</h3>
                        <div class="store-card-info">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                                <span>Connaught Place, Inner Circle, New Delhi, DL 110001</span>
                            </div>
                            <div>
                                <i class="bi bi-telephone"></i>
                                <span>+91 11 2345 6789</span>
                            </div>
                            <div>
                                <i class="bi bi-clock"></i>
                                <span>10:00 AM - 09:30 PM (Mon-Sun)</span>
                            </div>
                        </div>
                        <div class="store-card-services">
                            <span class="service-chip">In-Store Tailoring</span>
                            <span class="service-chip">Personal Styling</span>
                            <span class="service-chip">Bridal Lounges</span>
                        </div>
                        <button class="btn btn-sm btn-outline-purple mt-3 px-3 py-2 fw-semibold" style="border: 1px solid var(--clr-primary); color: var(--clr-primary); border-radius: var(--radius-pill); font-size: 0.8rem;" onclick="simulateDirections('Connaught Place Flagship, Delhi', event)">
                            <i class="bi bi-compass me-1"></i> Get Directions
                        </button>
                    </div>

                    <!-- Store 3: Bengaluru -->
                    <div class="store-card" id="card-bengaluru" data-city="Bengaluru" onclick="focusStore('bengaluru')">
                        <span class="store-card-city">Bengaluru BOUTIQUE</span>
                        <h3 class="store-card-name">Indiranagar Experience Store</h3>
                        <div class="store-card-info">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                                <span>100 Feet Road, Indiranagar, Bengaluru, KA 560038</span>
                            </div>
                            <div>
                                <i class="bi bi-telephone"></i>
                                <span>+91 80 3456 7890</span>
                            </div>
                            <div>
                                <i class="bi bi-clock"></i>
                                <span>10:30 AM - 09:00 PM (Mon-Sun)</span>
                            </div>
                        </div>
                        <div class="store-card-services">
                            <span class="service-chip">Personal Styling</span>
                            <span class="service-chip">Tea &amp; Cafe Lounge</span>
                            <span class="service-chip">Click &amp; Collect</span>
                        </div>
                        <button class="btn btn-sm btn-outline-purple mt-3 px-3 py-2 fw-semibold" style="border: 1px solid var(--clr-primary); color: var(--clr-primary); border-radius: var(--radius-pill); font-size: 0.8rem;" onclick="simulateDirections('Indiranagar Experience Store, Bengaluru', event)">
                            <i class="bi bi-compass me-1"></i> Get Directions
                        </button>
                    </div>

                    <!-- Empty state -->
                    <div id="noStoresMsg" class="text-center py-5" style="display: none;">
                        <i class="bi bi-geo-fill text-muted" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 fw-bold text-dark">No outlets found</h4>
                        <p class="text-muted small">Try checking another city or adjusting your search term.</p>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Interactive SVG map -->
            <div class="col-lg-7">
                <div class="map-frame-wrapper">
                    <!-- Vector SVG Map of abstract network grid -->
                    <svg class="map-svg-canvas" viewBox="0 0 800 600">
                        <!-- Grid Lines for high-tech premium cartography feel -->
                        <line x1="0" y1="100" x2="800" y2="100" class="map-grid-line" />
                        <line x1="0" y1="200" x2="800" y2="200" class="map-grid-line" />
                        <line x1="0" y1="300" x2="800" y2="300" class="map-grid-line" />
                        <line x1="0" y1="400" x2="800" y2="400" class="map-grid-line" />
                        <line x1="0" y1="500" x2="800" y2="500" class="map-grid-line" />
                        <line x1="100" y1="0" x2="100" y2="600" class="map-grid-line" />
                        <line x1="200" y1="0" x2="200" y2="600" class="map-grid-line" />
                        <line x1="300" y1="0" x2="300" y2="600" class="map-grid-line" />
                        <line x1="400" y1="0" x2="400" y2="600" class="map-grid-line" />
                        <line x1="500" y1="0" x2="500" y2="600" class="map-grid-line" />
                        <line x1="600" y1="0" x2="600" y2="600" class="map-grid-line" />
                        <line x1="700" y1="0" x2="700" y2="600" class="map-grid-line" />

                        <!-- Abstract outline of landmass (aesthetic polygon shapes) -->
                        <path d="M 150 120 L 250 80 L 380 90 L 450 140 L 520 220 L 480 340 L 410 480 L 340 540 L 320 570 L 300 540 L 220 460 L 180 320 L 120 220 Z" class="map-region" />
                        
                        <!-- Map Marker: Delhi (North) coordinates: x=340, y=140 -->
                        <g class="map-marker" id="marker-delhi" transform="translate(340, 140)" onclick="focusStore('delhi')">
                            <circle cx="0" cy="0" r="28" class="marker-pulse" />
                            <circle cx="0" cy="0" r="10" class="marker-dot" />
                            <text x="16" y="5" font-family="Poppins" font-size="12" font-weight="700" fill="#1a1a2e">Delhi NCR</text>
                        </g>

                        <!-- Map Marker: Mumbai (West) coordinates: x=200, y=360 -->
                        <g class="map-marker active" id="marker-mumbai" transform="translate(200, 360)" onclick="focusStore('mumbai')">
                            <circle cx="0" cy="0" r="28" class="marker-pulse" />
                            <circle cx="0" cy="0" r="10" class="marker-dot" />
                            <text x="16" y="5" font-family="Poppins" font-size="12" font-weight="700" fill="#1a1a2e">Mumbai</text>
                        </g>

                        <!-- Map Marker: Bengaluru (South) coordinates: x=280, y=490 -->
                        <g class="map-marker" id="marker-bengaluru" transform="translate(280, 490)" onclick="focusStore('bengaluru')">
                            <circle cx="0" cy="0" r="28" class="marker-pulse" />
                            <circle cx="0" cy="0" r="10" class="marker-dot" />
                            <text x="16" y="5" font-family="Poppins" font-size="12" font-weight="700" fill="#1a1a2e">Bengaluru</text>
                        </g>
                    </svg>

                    <!-- Dynamic Floating Map Tooltip -->
                    <div id="mapTooltip" class="map-tooltip">
                        <div class="map-tooltip-title" id="tooltipTitle">Colaba Causeway Flagship</div>
                        <div class="map-tooltip-desc" id="tooltipAddr">Colaba Causeway, Block A, Mumbai, MH</div>
                        <div class="map-tooltip-hours" id="tooltipHours">10:00 AM - 09:30 PM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TOAST NOTIFICATION AREA
     ============================================ -->
<div class="locator-toast-container" id="locatorToastContainer"></div>

<!-- ============================================
     JAVASCRIPT LOGIC
     ============================================ -->
<script>
    let activeCityFilter = 'All';
    
    // Store database coordinates mapping for floating tooltips
    const storeMapCoords = {
        mumbai: { x: 200, y: 360, title: "Colaba Causeway Flagship", address: "Colaba Causeway, Block A, Mumbai", hours: "Open until 09:30 PM" },
        delhi: { x: 340, y: 140, title: "Connaught Place Flagship", address: "Connaught Place, New Delhi", hours: "Open until 09:30 PM" },
        bengaluru: { x: 280, y: 490, title: "Indiranagar Experience Store", address: "100 Feet Road, Indiranagar, Bengaluru", hours: "Open until 09:00 PM" }
    };

    document.addEventListener("DOMContentLoaded", () => {
        // Center initial tooltip on Mumbai
        updateMapTooltip('mumbai');
    });

    // 1. Focus on specific store card & marker
    function focusStore(storeId) {
        // Toggle store cards
        document.querySelectorAll(".store-card").forEach(c => c.classList.remove("active"));
        const card = document.getElementById(`card-${storeId}`);
        if (card) {
            card.classList.add("active");
            card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        // Toggle markers active state
        document.querySelectorAll(".map-marker").forEach(m => m.classList.remove("active"));
        const marker = document.getElementById(`marker-${storeId}`);
        if (marker) {
            marker.classList.add("active");
        }

        updateMapTooltip(storeId);
    }

    // 2. Map floating tooltip position updating
    function updateMapTooltip(storeId) {
        const tooltip = document.getElementById("mapTooltip");
        const details = storeMapCoords[storeId];
        
        if (!details) return;

        document.getElementById("tooltipTitle").textContent = details.title;
        document.getElementById("tooltipAddr").textContent = details.address;
        document.getElementById("tooltipHours").textContent = details.hours;

        // Position coordinates conversion
        // SVG size is 800 x 600, converted to percentages inside wrapper
        const percentageX = (details.x / 800) * 100;
        const percentageY = (details.y / 600) * 100;

        tooltip.style.left = `${percentageX}%`;
        tooltip.style.top = `${percentageY}%`;
        tooltip.classList.add("visible");
    }

    // 3. City filtering
    function filterCity(city, buttonElement) {
        activeCityFilter = city;

        // Toggle active button style
        document.querySelectorAll(".store-city-pill").forEach(pill => pill.classList.remove("active"));
        buttonElement.classList.add("active");

        applyFilters();
    }

    // 4. Combined input and pill filters
    function applyFilters() {
        const query = document.getElementById("storeSearchInput").value.toLowerCase().trim();
        const cards = document.querySelectorAll(".store-card");
        const msg = document.getElementById("noStoresMsg");
        let visibleCount = 0;
        let firstVisibleId = null;

        cards.forEach(card => {
            const cardCity = card.getAttribute("data-city");
            const cardName = card.querySelector(".store-card-name").textContent.toLowerCase();
            const cardAddr = card.querySelector(".store-card-info").textContent.toLowerCase();

            const matchesCity = (activeCityFilter === 'All' || cardCity === activeCityFilter);
            const matchesQuery = (query === '' || cardName.includes(query) || cardAddr.includes(query));

            if (matchesCity && matchesQuery) {
                card.style.display = "block";
                visibleCount++;
                if (!firstVisibleId) {
                    firstVisibleId = card.id.replace('card-', '');
                }
            } else {
                card.style.display = "none";
            }
        });

        // Toggle empty state message
        if (visibleCount === 0) {
            msg.style.display = "block";
            document.getElementById("mapTooltip").classList.remove("visible");
        } else {
            msg.style.display = "none";
            // Focus first available matching store
            if (firstVisibleId) {
                focusStore(firstVisibleId);
            }
        }
    }

    function filterStores() {
        applyFilters();
    }

    // 5. Simulate direction loader toast
    function simulateDirections(storeName, e) {
        e.stopPropagation(); // prevent card click bubble

        showLocatorToast(`🗺️ Loading directions to <strong>${storeName}</strong>. Standard routes loaded!`);
    }

    function showLocatorToast(message) {
        const container = document.getElementById("locatorToastContainer");
        const toast = document.createElement("div");
        toast.className = "locator-toast";
        toast.innerHTML = `
            <i class="bi bi-compass text-purple" style="font-size: 1.4rem; color: var(--clr-primary) !important;"></i>
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
