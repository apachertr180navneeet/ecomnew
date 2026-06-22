@extends('layouts.app')

@section('title', 'Flash Sale')

@section('nav_flash', 'active')
@section('flash_active', 'active')

@section('content')
<!-- ============================================
     BREADCRUMB
     ============================================ -->
<div class="category-breadcrumb py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-family: var(--ff-primary); font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">Flash Sale</li>
            </ol>
        </nav>
    </div>
</div>

<!-- ============================================
     FLASH SALE HERO SECTION
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="sale-hero mb-5">
            <div class="sale-hero-pattern"></div>
            <div class="row align-items-center g-4 position-relative">
                <div class="col-lg-7 text-start">
                    <span class="sale-hero-tag mb-3">
                        <i class="bi bi-lightning-fill"></i> FLASH DEALS
                    </span>
                    <h1 class="sale-hero-title mb-3">Lightning Sale is Live!</h1>
                    <p class="sale-hero-desc mb-4">Snatch premium luxury & streetwear brands at record-breaking discount levels. Quantities are strictly limited. Deals expire when the timer hits zero!</p>
                    
                    <div class="d-flex flex-wrap gap-4 align-items-center">
                        <!-- Dynamic Countdown Box -->
                        <div class="sale-countdown-container" id="heroCountdown">
                            <span class="countdown-label" id="countdownLabel">Ending In:</span>
                            <div class="countdown-timer">
                                <div class="countdown-part" id="hour-box">00</div>
                                <div class="countdown-sep">:</div>
                                <div class="countdown-part" id="min-box">00</div>
                                <div class="countdown-sep">:</div>
                                <div class="countdown-part" id="sec-box">00</div>
                            </div>
                        </div>

                        <!-- Shopper Count indicator -->
                        <div class="sale-shoppers-counter">
                            <i class="bi bi-people-fill text-success"></i> 
                            <span class="fw-semibold" id="shopperCount">142</span> shoppers claiming deals right now!
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-end">
                    <!-- Elegant Abstract Clock / Lightning SVG graphic to wow users -->
                    <svg width="280" height="280" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 0 20px rgba(168, 85, 240, 0.45));">
                        <circle cx="100" cy="100" r="80" stroke="#6A0DAD" stroke-width="4" stroke-dasharray="10 6" opacity="0.6"/>
                        <circle cx="100" cy="100" r="70" stroke="#A855F0" stroke-width="8"/>
                        <!-- Lightning Bolt -->
                        <path d="M115 40L75 110H105L85 165L135 95H105L115 40Z" fill="url(#boltGrad)"/>
                        <defs>
                            <linearGradient id="boltGrad" x1="75" y1="40" x2="135" y2="165" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="#FF3E6C"/>
                                <stop offset="100%" stop-color="#A855F0"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>

        <!-- ============================================
             TIME SLOTS CONTROLS
             ============================================ -->
        <div class="sale-slots-container mb-5">
            <div class="sale-slots-row">
                <!-- Slot 1: Ended -->
                <button class="sale-slot-pill" data-slot="ended" onclick="switchSlot('ended', this)">
                    <span class="sale-slot-time">10:00 AM</span>
                    <span class="sale-slot-status">
                        <span class="status-dot"></span> Ended
                    </span>
                </button>

                <!-- Slot 2: Active -->
                <button class="sale-slot-pill active" data-slot="active" onclick="switchSlot('active', this)">
                    <span class="sale-slot-time">02:00 PM</span>
                    <span class="sale-slot-status">
                        <span class="status-dot active-dot"></span> Active Now
                    </span>
                </button>

                <!-- Slot 3: Upcoming -->
                <button class="sale-slot-pill" data-slot="upcoming-1" onclick="switchSlot('upcoming-1', this)">
                    <span class="sale-slot-time">06:00 PM</span>
                    <span class="sale-slot-status">
                        <span class="status-dot"></span> 06:00 PM
                    </span>
                </button>

                <!-- Slot 4: Upcoming -->
                <button class="sale-slot-pill" data-slot="upcoming-2" onclick="switchSlot('upcoming-2', this)">
                    <span class="sale-slot-time">10:00 PM</span>
                    <span class="sale-slot-status">
                        <span class="status-dot"></span> 10:00 PM
                    </span>
                </button>
            </div>
        </div>

        <!-- ============================================
             FILTERS BAR
             ============================================ -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 mb-4">
            <!-- Category pills -->
            <div class="sale-cat-pills">
                <button class="sale-cat-pill active" onclick="filterCategory('All', this)">All</button>
                <button class="sale-cat-pill" onclick="filterCategory('Apparel', this)">Apparel</button>
                <button class="sale-cat-pill" onclick="filterCategory('Footwear', this)">Footwear</button>
                <button class="sale-cat-pill" onclick="filterCategory('Beauty', this)">Beauty</button>
                <button class="sale-cat-pill" onclick="filterCategory('Accessories', this)">Accessories</button>
                <button class="sale-cat-pill" onclick="filterCategory('Tech', this)">Tech</button>
            </div>

            <!-- Total counted label -->
            <div class="text-muted fw-semibold" id="itemsCountText" style="font-size: 0.9rem;">
                Showing 6 deals
            </div>
        </div>

        <!-- ============================================
             DEALS PRODUCTS GRID
             ============================================ -->
        <div class="sale-grid" id="saleGrid">
            <!-- Dynamic JavaScript injections -->
        </div>

        <!-- Empty search state -->
        <div id="saleEmptyState" class="text-center py-5" style="display: none;">
            <i class="bi bi-lightning-slash text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3 fw-bold text-dark">No deals match this category</h3>
            <p class="text-muted">Try selecting a different filter pill or exploring another time slot.</p>
        </div>
    </div>
</section>

<!-- ============================================
     CUSTOM FLOATING TOAST SYSTEM
     ============================================ -->
<div class="sale-toast-container" id="toastContainer"></div>

<!-- ============================================
     JAVASCRIPT LOGIC
     ============================================ -->
<script>
    // 1. Data Store for all slots
    const dealsDatabase = {
        ended: [
            {
                id: 'e1',
                title: 'Nike Air Max Running Shoes',
                category: 'Footwear',
                originalPrice: 13999,
                discountedPrice: 4199,
                discountPercent: 70,
                img: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&h=600&fit=crop&q=80',
                claimedPercent: 100,
                stockLeft: 0,
                urgencyText: 'SOLD OUT'
            },
            {
                id: 'e2',
                title: 'Sony WH-1000XM4 Noise Canceling Headphones',
                category: 'Tech',
                originalPrice: 29990,
                discountedPrice: 11990,
                discountPercent: 60,
                img: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=600&fit=crop&q=80',
                claimedPercent: 100,
                stockLeft: 0,
                urgencyText: 'SOLD OUT'
            },
            {
                id: 'e3',
                title: 'Levi\'s 511 Slim Fit Jeans',
                category: 'Apparel',
                originalPrice: 4599,
                discountedPrice: 2299,
                discountPercent: 50,
                img: 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500&h=600&fit=crop&q=80',
                claimedPercent: 100,
                stockLeft: 0,
                urgencyText: 'SOLD OUT'
            },
            {
                id: 'e4',
                title: 'Chanel No. 5 Luxury Parfum 100ml',
                category: 'Beauty',
                originalPrice: 16500,
                discountedPrice: 9075,
                discountPercent: 45,
                img: 'https://images.unsplash.com/photo-1547887537-6158d64c35b3?w=500&h=600&fit=crop&q=80',
                claimedPercent: 100,
                stockLeft: 0,
                urgencyText: 'SOLD OUT'
            }
        ],
        active: [
            {
                id: 'a1',
                title: 'Adidas Ultraboost Lightweight Sneakers',
                category: 'Footwear',
                originalPrice: 17999,
                discountedPrice: 6299,
                discountPercent: 65,
                img: 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500&h=600&fit=crop&q=80',
                claimedPercent: 85,
                stockLeft: 2,
                urgencyText: 'ONLY 2 LEFT'
            },
            {
                id: 'a2',
                title: 'Apple AirPods Pro Wireless Earbuds',
                category: 'Tech',
                originalPrice: 24900,
                discountedPrice: 12450,
                discountPercent: 50,
                img: 'https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?w=500&h=600&fit=crop&q=80',
                claimedPercent: 70,
                stockLeft: 5,
                urgencyText: 'SELLING FAST'
            },
            {
                id: 'a3',
                title: 'Zara Vintage Leather Biker Jacket',
                category: 'Apparel',
                originalPrice: 7990,
                discountedPrice: 1997,
                discountPercent: 75,
                img: 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&h=600&fit=crop&q=80',
                claimedPercent: 92,
                stockLeft: 1,
                urgencyText: 'ONLY 1 LEFT'
            },
            {
                id: 'a4',
                title: 'Dyson Airwrap Styler Complete Special Edition',
                category: 'Beauty',
                originalPrice: 45900,
                discountedPrice: 27540,
                discountPercent: 40,
                img: 'https://images.unsplash.com/photo-1608248597279-f99d160bfcbc?w=500&h=600&fit=crop&q=80',
                claimedPercent: 60,
                stockLeft: 4,
                urgencyText: 'LIMITED STOCK'
            },
            {
                id: 'a5',
                title: 'Michael Kors Jet Set Travel Shoulder Tote',
                category: 'Accessories',
                originalPrice: 32000,
                discountedPrice: 14400,
                discountPercent: 55,
                img: 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=500&h=600&fit=crop&q=80',
                claimedPercent: 78,
                stockLeft: 3,
                urgencyText: 'POPULAR CHOICE'
            },
            {
                id: 'a6',
                title: 'Ray-Ban Classic Gold Aviator Sunglasses',
                category: 'Accessories',
                originalPrice: 12500,
                discountedPrice: 5000,
                discountPercent: 60,
                img: 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=500&h=600&fit=crop&q=80',
                claimedPercent: 80,
                stockLeft: 2,
                urgencyText: 'ONLY 2 LEFT'
            }
        ],
        'upcoming-1': [
            {
                id: 'u11',
                title: 'Samsung Galaxy Watch 6 Smartwatch',
                category: 'Tech',
                originalPrice: 33999,
                discountedPrice: 15299,
                discountPercent: 55,
                img: 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 12,
                urgencyText: 'COMING SOON'
            },
            {
                id: 'u12',
                title: 'Puma Classic Suede Retro Sneakers',
                category: 'Footwear',
                originalPrice: 6999,
                discountedPrice: 2449,
                discountPercent: 65,
                img: 'https://images.unsplash.com/photo-1539185441755-769473a23570?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 15,
                urgencyText: 'COMING SOON'
            },
            {
                id: 'u13',
                title: 'Tommy Hilfiger Slim Fit Oxford Polo',
                category: 'Apparel',
                originalPrice: 4999,
                discountedPrice: 2499,
                discountPercent: 50,
                img: 'https://images.unsplash.com/photo-1581655353564-df123a1eb820?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 20,
                urgencyText: 'COMING SOON'
            },
            {
                id: 'u14',
                title: 'Estée Lauder Night Repair Complex Serum',
                category: 'Beauty',
                originalPrice: 8900,
                discountedPrice: 5785,
                discountPercent: 35,
                img: 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 18,
                urgencyText: 'COMING SOON'
            }
        ],
        'upcoming-2': [
            {
                id: 'u21',
                title: 'Bose QuietComfort Noise Canceling Headphones',
                category: 'Tech',
                originalPrice: 35900,
                discountedPrice: 19745,
                discountPercent: 45,
                img: 'https://images.unsplash.com/photo-1546435770-a3e426bf472b?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 10,
                urgencyText: 'COMING SOON'
            },
            {
                id: 'u22',
                title: 'Under Armour Lightweight Training Shoes',
                category: 'Footwear',
                originalPrice: 9999,
                discountedPrice: 3999,
                discountPercent: 60,
                img: 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 15,
                urgencyText: 'COMING SOON'
            },
            {
                id: 'u23',
                title: 'Gucci GG Marmont Leather Card Case Holder',
                category: 'Accessories',
                originalPrice: 22000,
                discountedPrice: 15400,
                discountPercent: 30,
                img: 'https://images.unsplash.com/photo-1627124765135-509b9d4d2943?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 5,
                urgencyText: 'COMING SOON'
            },
            {
                id: 'u24',
                title: 'MAC Retro Matte Velvet Lipstick Duo',
                category: 'Beauty',
                originalPrice: 3600,
                discountedPrice: 1800,
                discountPercent: 50,
                img: 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=500&h=600&fit=crop&q=80',
                claimedPercent: 0,
                stockLeft: 25,
                urgencyText: 'COMING SOON'
            }
        ]
    };

    let activeSlot = 'active';
    let activeCategory = 'All';

    // 2. Format Currency standard logic
    function formatINR(number) {
        return new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR',
            maximumFractionDigits: 0
        }).format(number);
    }

    // 3. Render deals onto the grid based on current filters
    function renderDealsGrid() {
        const grid = document.getElementById("saleGrid");
        const emptyState = document.getElementById("saleEmptyState");
        const counterText = document.getElementById("itemsCountText");
        
        let products = dealsDatabase[activeSlot] || [];
        
        // Filter by category
        if (activeCategory !== 'All') {
            products = products.filter(p => p.category === activeCategory);
        }

        grid.innerHTML = '';
        counterText.textContent = `Showing ${products.length} deal${products.length !== 1 ? 's' : ''}`;

        if (products.length === 0) {
            grid.style.display = "none";
            emptyState.style.display = "block";
            return;
        }

        grid.style.display = "";
        emptyState.style.display = "none";

        products.forEach(p => {
            const isEnded = activeSlot === 'ended';
            const isUpcoming = activeSlot.startsWith('upcoming');
            
            // Build the card HTML
            const card = document.createElement("div");
            card.className = "sale-card-item";
            card.setAttribute("data-id", p.id);

            // Sold-out check for finished slot
            let overlayHTML = '';
            if (isEnded) {
                overlayHTML = `<div class="sale-ended-overlay"><span class="sold-out-badge">SOLD OUT</span></div>`;
            }

            // Urgency tag check
            let urgencyHTML = '';
            if (p.urgencyText && !isEnded) {
                urgencyHTML = `<span class="badge-urgency">${p.urgencyText}</span>`;
            }

            // Stock progress element
            let progressHTML = '';
            if (!isUpcoming) {
                progressHTML = `
                    <div class="sale-progress-container">
                        <div class="sale-progress-text">
                            <span class="text-claimed">${p.claimedPercent}% Claimed</span>
                            <span class="text-remaining">${isEnded ? '0 left' : p.stockLeft + ' left'}</span>
                        </div>
                        <div class="sale-progress">
                            <div class="sale-progress-bar" style="width: ${p.claimedPercent}%"></div>
                        </div>
                    </div>
                `;
            } else {
                progressHTML = `
                    <div class="sale-progress-container">
                        <div class="sale-progress-text text-center w-100">
                            <span class="text-muted fw-semibold">Starts in: <span class="slot-start-timer" style="color: var(--clr-primary-light);">Calculating...</span></span>
                        </div>
                    </div>
                `;
            }

            // Button CTA logic
            let buttonHTML = '';
            if (isEnded) {
                buttonHTML = `<button class="btn-sale-action btn-claimed" disabled><i class="bi bi-slash-circle"></i> Sale Ended</button>`;
            } else if (isUpcoming) {
                // Check if notification is set in sessionStorage
                const isNotified = sessionStorage.getItem(`notify_${p.id}`) === 'true';
                if (isNotified) {
                    buttonHTML = `<button class="btn-sale-action btn-reminder-set" disabled><i class="bi bi-check2-circle"></i> Reminder Set 🔔</button>`;
                } else {
                    buttonHTML = `<button class="btn-sale-action btn-notify-me" onclick="setReminder('${p.id}', '${p.title.replace(/'/g, "\\'")}', this)"><i class="bi bi-bell"></i> Notify Me</button>`;
                }
            } else {
                // Active slot
                const isClaimed = sessionStorage.getItem(`claimed_${p.id}`) === 'true';
                if (isClaimed || p.stockLeft === 0) {
                    buttonHTML = `<button class="btn-sale-action btn-claimed" disabled><i class="bi bi-check-lg"></i> Claimed ✔</button>`;
                } else {
                    buttonHTML = `<button class="btn-sale-action btn-claim-deal" onclick="claimDeal('${p.id}', '${p.title.replace(/'/g, "\\'")}', this)"><i class="bi bi-cart-plus"></i> Claim Deal</button>`;
                }
            }

            card.innerHTML = `
                <div class="sale-card-img-wrapper">
                    ${overlayHTML}
                    <span class="sale-card-badge badge-discount">-${p.discountPercent}% OFF</span>
                    ${urgencyHTML}
                    <img src="${p.img}" alt="${p.title}" class="sale-card-img">
                </div>
                <div class="sale-card-body">
                    <span class="sale-card-category">${p.category}</span>
                    <h4 class="sale-card-title">${p.title}</h4>
                    <div class="sale-card-prices">
                        <span class="price-discounted">${formatINR(p.discountedPrice)}</span>
                        <span class="price-original">${formatINR(p.originalPrice)}</span>
                    </div>
                    ${progressHTML}
                    <div class="mt-auto">
                        ${buttonHTML}
                    </div>
                </div>
            `;
            
            grid.appendChild(card);
        });

        // Trigger updating slot sub-timers if slot is upcoming
        if (activeSlot.startsWith('upcoming')) {
            updateUpcomingTimers();
        }
    }

    // 4. Time slot toggling
    function switchSlot(slotName, buttonElement) {
        activeSlot = slotName;

        // Toggle active slots visual
        document.querySelectorAll(".sale-slot-pill").forEach(btn => btn.classList.remove("active"));
        buttonElement.classList.add("active");

        // Update hero banner label and timer details
        const label = document.getElementById("countdownLabel");
        if (slotName === 'ended') {
            label.textContent = "Deal Closed";
            document.getElementById("hour-box").textContent = "00";
            document.getElementById("min-box").textContent = "00";
            document.getElementById("sec-box").textContent = "00";
            document.getElementById("heroCountdown").style.opacity = "0.6";
        } else if (slotName.startsWith('upcoming')) {
            label.textContent = "Starts In:";
            document.getElementById("heroCountdown").style.opacity = "1";
            updateHeroTimer();
        } else {
            // Active
            label.textContent = "Ending In:";
            document.getElementById("heroCountdown").style.opacity = "1";
            updateHeroTimer();
        }

        // Render deals
        renderDealsGrid();
    }

    // 5. Category pill toggling
    function filterCategory(category, buttonElement) {
        activeCategory = category;

        // Toggle active visual
        document.querySelectorAll(".sale-cat-pill").forEach(btn => btn.classList.remove("active"));
        buttonElement.classList.add("active");

        renderDealsGrid();
    }

    // 6. Interactive claiming deal simulated logic
    function claimDeal(productId, productTitle, buttonElement) {
        // Prevent double claim
        if (sessionStorage.getItem(`claimed_${productId}`) === 'true') return;

        // Save claimed state
        sessionStorage.setItem(`claimed_${productId}`, 'true');

        // Locate card and update database counts
        const products = dealsDatabase.active;
        const itemIndex = products.findIndex(p => p.id === productId);
        if (itemIndex > -1) {
            const productObj = products[itemIndex];
            
            // Adjust stocks
            if (productObj.stockLeft > 0) {
                productObj.stockLeft -= 1;
                productObj.claimedPercent = Math.min(99, Math.floor(productObj.claimedPercent + (100 - productObj.claimedPercent) / 2));
            }
            
            // Find card items inside page
            const cardEl = document.querySelector(`.sale-card-item[data-id="${productId}"]`);
            if (cardEl) {
                // Update progress bar
                const bar = cardEl.querySelector(".sale-progress-bar");
                const percentText = cardEl.querySelector(".text-claimed");
                const leftText = cardEl.querySelector(".text-remaining");
                
                if (bar) bar.style.width = productObj.claimedPercent + "%";
                if (percentText) percentText.textContent = productObj.claimedPercent + "% Claimed";
                if (leftText) leftText.textContent = productObj.stockLeft + " left";
                
                // Update urgency tag if 1 item left
                const urgencyTag = cardEl.querySelector(".badge-urgency");
                if (urgencyTag) {
                    if (productObj.stockLeft === 1) {
                        urgencyTag.textContent = "ONLY 1 LEFT";
                    } else if (productObj.stockLeft === 0) {
                        urgencyTag.style.display = "none";
                    }
                }

                // Transform button to Claimed state
                buttonElement.className = "btn-sale-action btn-claimed";
                buttonElement.innerHTML = `<i class="bi bi-check-lg"></i> Claimed ✔`;
                buttonElement.disabled = true;
                buttonElement.onclick = null;
            }

            // Create floating Toast notification
            showToast(`🎉 Deal Claimed! <strong>${productTitle}</strong> has been successfully claimed and reserved in your cart.`, 'success');
        }
    }

    // 7. Setting upcoming deal reminder
    function setReminder(productId, productTitle, buttonElement) {
        if (sessionStorage.getItem(`notify_${productId}`) === 'true') return;

        // Save notify state
        sessionStorage.setItem(`notify_${productId}`, 'true');

        // Update button
        buttonElement.className = "btn-sale-action btn-reminder-set";
        buttonElement.innerHTML = `<i class="bi bi-check2-circle"></i> Reminder Set 🔔`;
        buttonElement.disabled = true;
        buttonElement.onclick = null;

        // Show toast
        showToast(`🔔 Reminder Set! We will send you an alert notification when <strong>${productTitle}</strong> becomes active.`, 'info');
    }

    // 8. Custom Toast Alert System
    function showToast(message, type = 'success') {
        const container = document.getElementById("toastContainer");
        
        const toast = document.createElement("div");
        toast.className = `sale-toast ${type === 'success' ? 'toast-success' : ''}`;
        
        let icon = '<i class="bi bi-lightning-fill text-purple sale-toast-icon"></i>';
        if (type === 'success') {
            icon = '<i class="bi bi-check-circle-fill sale-toast-icon"></i>';
        } else if (type === 'info') {
            icon = '<i class="bi bi-bell-fill text-purple sale-toast-icon"></i>';
        }

        toast.innerHTML = `
            ${icon}
            <div class="sale-toast-message">${message}</div>
        `;

        container.appendChild(toast);

        // Slide away and delete after 4.5 seconds
        setTimeout(() => {
            toast.classList.add("fade-out");
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4500);
    }

    // 9. Countdown Timer Calculations (End of slot schedules)
    // Slot schedule:
    // Ended: 10:00 AM - 02:00 PM
    // Active: 02:00 PM - 06:00 PM
    // Upcoming-1: 06:00 PM - 10:00 PM
    // Upcoming-2: 10:00 PM - 02:00 AM
    function getSlotTargetTime(slotName) {
        const now = new Date();
        const target = new Date();
        
        let targetHr = 18; // default active ends at 06:00 PM
        
        if (slotName === 'active') {
            targetHr = 18; // Active ends at 18:00 (6 PM)
        } else if (slotName === 'upcoming-1') {
            // For upcoming-1 slot: countdown to start of slot (06:00 PM)
            targetHr = 18; 
        } else if (slotName === 'upcoming-2') {
            // For upcoming-2 slot: countdown to start of slot (10:00 PM)
            targetHr = 22; 
        }

        target.setHours(targetHr, 0, 0, 0);

        // If target hour has already passed today, set to tomorrow
        if (target < now) {
            target.setDate(now.getDate() + 1);
        }

        return target;
    }

    function updateHeroTimer() {
        if (activeSlot === 'ended') return;

        const now = new Date();
        const target = getSlotTargetTime(activeSlot);
        
        let diff = target - now;
        if (diff < 0) diff = 0;

        const hrs = Math.floor(diff / (1000 * 60 * 60));
        const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const secs = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById("hour-box").textContent = String(hrs).padStart(2, '0');
        document.getElementById("min-box").textContent = String(mins).padStart(2, '0');
        document.getElementById("sec-box").textContent = String(secs).padStart(2, '0');
    }

    function updateUpcomingTimers() {
        const timerLabels = document.querySelectorAll(".slot-start-timer");
        if (timerLabels.length === 0) return;

        const now = new Date();
        const target = getSlotTargetTime(activeSlot);
        
        let diff = target - now;
        if (diff < 0) diff = 0;

        const hrs = Math.floor(diff / (1000 * 60 * 60));
        const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const secs = Math.floor((diff % (1000 * 60)) / 1000);

        const formatStr = `${String(hrs).padStart(2, '0')}h : ${String(mins).padStart(2, '0')}m : ${String(secs).padStart(2, '0')}s`;
        
        timerLabels.forEach(lbl => {
            lbl.textContent = formatStr;
        });
    }

    // 10. Run live ticks
    setInterval(() => {
        updateHeroTimer();
        if (activeSlot.startsWith('upcoming')) {
            updateUpcomingTimers();
        }
    }, 1000);

    // Initial page load bindings
    document.addEventListener("DOMContentLoaded", () => {
        // Init timers
        updateHeroTimer();
        
        // Render initial active slot grid
        renderDealsGrid();

        // Simulate dynamic active shoppers changing every few seconds to look alive
        setInterval(() => {
            const countEl = document.getElementById("shopperCount");
            if (countEl) {
                let count = parseInt(countEl.textContent);
                // random offset between -3 and +3
                const delta = Math.floor(Math.random() * 7) - 3;
                count = Math.max(120, Math.min(180, count + delta));
                countEl.textContent = count;
            }
        }, 3000);

        // Global shortcut Ctrl+K to search/focus something (placeholder standard helper)
        window.addEventListener("keydown", (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === "k") {
                e.preventDefault();
                showToast("💡 Pro tip: Switch tabs between Ended, Active, and Upcoming deals to shop all slots!", 'info');
            }
        });
    });
</script>
@endsection
