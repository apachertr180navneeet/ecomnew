document.addEventListener('DOMContentLoaded', function () {

    var header = document.querySelector('.main-header');
    var backToTop = document.getElementById('backToTop');

    /* ===== 1. STICKY HEADER ===== */
    function handleHeaderScroll() {
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    window.addEventListener('scroll', handleHeaderScroll);

    /* ===== 2. BACK TO TOP ===== */
    function handleBackToTop() {
        if (window.scrollY > 500) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    }
    window.addEventListener('scroll', handleBackToTop);
    backToTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    /* ===== 3. ANNOUNCEMENT BAR CLOSE ===== */
    var closeAnnounce = document.querySelector('.close-announce');
    if (closeAnnounce) {
        closeAnnounce.addEventListener('click', function () {
            var bar = document.querySelector('.announcement-bar');
            bar.style.transition = 'all 0.4s ease';
            bar.style.maxHeight = bar.offsetHeight + 'px';
            bar.style.overflow = 'hidden';
            requestAnimationFrame(function () {
                bar.style.maxHeight = '0';
                bar.style.padding = '0';
            });
            setTimeout(function () { bar.remove(); }, 500);
        });
    }

    /* ===== 4. BOOTSTRAP CAROUSEL CUSTOM NAV ===== */
    document.querySelectorAll('[data-carousel-prev]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = document.querySelector(btn.getAttribute('data-carousel-prev'));
            if (target) {
                var carousel = bootstrap.Carousel.getOrCreateInstance(target);
                carousel.prev();
            }
        });
    });
    document.querySelectorAll('[data-carousel-next]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = document.querySelector(btn.getAttribute('data-carousel-next'));
            if (target) {
                var carousel = bootstrap.Carousel.getOrCreateInstance(target);
                carousel.next();
            }
        });
    });

    /* ===== 5. SCROLL REVEAL ANIMATIONS ===== */
    var revealElements = document.querySelectorAll('.reveal');
    if (revealElements.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealElements.forEach(function (el) { revealObserver.observe(el); });
    }

    /* ===== 6. WISHLIST TOGGLE ===== */
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.wishlist-btn');
        if (!btn) return;
        e.preventDefault();
        e.stopPropagation();
        var icon = btn.querySelector('i');
        if (icon.classList.contains('bi-heart')) {
            icon.classList.remove('bi-heart');
            icon.classList.add('bi-heart-fill');
            btn.classList.add('wishlist-active');
            showToast('Added to wishlist!');
        } else {
            icon.classList.remove('bi-heart-fill');
            icon.classList.add('bi-heart');
            btn.classList.remove('wishlist-active');
            showToast('Removed from wishlist');
        }
        updateWishlistCount();
    });

    /* ===== 7. WISHLIST HEADER COUNT ===== */
    var wishlistBadge = document.querySelector('.header-action-btn .badge-count');
    function updateWishlistCount() {
        var count = document.querySelectorAll('.wishlist-active').length;
        if (wishlistBadge) {
            wishlistBadge.textContent = count > 99 ? '99+' : count;
        }
    }

    /* ===== 8. ADD TO CART ===== */
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.add-cart-btn');
        if (!btn) return;
        e.preventDefault();
        e.stopPropagation();
        var cartBadge = document.querySelector('.cart-count');
        if (cartBadge) {
            var current = parseInt(cartBadge.textContent) || 0;
            cartBadge.textContent = current + 1;
        }
        showToast('Added to cart!');
    });

    /* ===== 9. TOAST NOTIFICATION ===== */
    // Create toast element if not exists
    var toast = document.querySelector('.axvero-toast');
    if (!toast) {
        toast = document.createElement('div');
        toast.className = 'axvero-toast';
        document.body.appendChild(toast);
    }
    var toastTimer;
    function showToast(message) {
        if (toastTimer) clearTimeout(toastTimer);
        toast.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + message;
        toast.classList.add('show');
        toastTimer = setTimeout(function () {
            toast.classList.remove('show');
        }, 2500);
    }
    window.showToast = showToast;

    /* ===== 10. NEWSLETTER FORM ===== */
    var newsletter = document.querySelector('.footer-newsletter');
    if (newsletter) {
        newsletter.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = newsletter.querySelector('input');
            if (input && input.value.trim()) {
                showToast('Thank you for subscribing!');
                input.value = '';
            }
        });
    }

    /* ===== 11. SEARCH FOCUS EFFECT ===== */
    var searchInput = document.querySelector('.search-bar-custom input');
    if (searchInput) {
        searchInput.addEventListener('focus', function () {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.3s ease';
        });
        searchInput.addEventListener('blur', function () {
            this.parentElement.style.transform = 'scale(1)';
        });
    }

    /* ===== 12. SMOOTH SCROLL FOR ANCHOR LINKS ===== */
    document.addEventListener('click', function (e) {
        var link = e.target.closest('a[href^="#"]');
        if (!link) return;
        var hash = link.getAttribute('href');
        if (hash === '#') return;
        var target = document.querySelector(hash);
        if (target) {
            e.preventDefault();
            window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
        }
    });

    /* ===== 13. INITIAL STATE ===== */
    handleHeaderScroll();
    handleBackToTop();
    updateWishlistCount();

    /* ===== 13b. MOBILE SEARCH TOGGLE ===== */
    var mobileSearchToggle = document.getElementById('mobileSearchToggle');
    var mobileSearchBar = document.getElementById('mobileSearchBar');
    var mobileSearchClose = document.getElementById('mobileSearchClose');

    if (mobileSearchToggle && mobileSearchBar) {
        mobileSearchToggle.addEventListener('click', function () {
            if (mobileSearchBar.style.display === 'none' || !mobileSearchBar.style.display) {
                mobileSearchBar.style.display = 'block';
                var searchInput = mobileSearchBar.querySelector('input');
                if (searchInput) searchInput.focus();
            } else {
                mobileSearchBar.style.display = 'none';
            }
        });
    }
    if (mobileSearchClose && mobileSearchBar) {
        mobileSearchClose.addEventListener('click', function () {
            mobileSearchBar.style.display = 'none';
        });
    }

    /* ===== 14. TRENDING NOW SECTION SLIDER ===== */
    const track = document.getElementById('trendingProductsTrack');
    const prevBtn = document.getElementById('trendingPrevBtn');
    const nextBtn = document.getElementById('trendingNextBtn');
    const tabBtns = document.querySelectorAll('.trending-tab-btn');
    
    if (track && prevBtn && nextBtn && tabBtns.length > 0) {
        let currentCategory = 'men';
        let currentIndex = 0;
        
        function getVisibleCardsCount() {
            const width = window.innerWidth;
            if (width <= 576) return 1;
            if (width <= 991) return 2;
            return 3;
        }
        
        function updateSlider() {
            const items = track.querySelectorAll(`.${currentCategory}-item`);
            const visibleCount = getVisibleCardsCount();
            const maxIndex = Math.max(0, items.length - visibleCount);
            
            if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }
            
            // Disable/enable arrows
            if (currentIndex === 0) {
                prevBtn.style.opacity = '0.5';
                prevBtn.style.pointerEvents = 'none';
            } else {
                prevBtn.style.opacity = '1';
                prevBtn.style.pointerEvents = 'auto';
            }
            
            if (currentIndex >= maxIndex) {
                nextBtn.style.opacity = '0.5';
                nextBtn.style.pointerEvents = 'none';
            } else {
                nextBtn.style.opacity = '1';
                nextBtn.style.pointerEvents = 'auto';
            }
            
            // Calculate shift percentage based on item width
            if (items.length > 0) {
                const cardWidth = items[0].getBoundingClientRect().width;
                const gap = 24;
                const shift = currentIndex * (cardWidth + gap);
                track.style.transform = `translateX(-${shift}px)`;
            }
        }
        
        function switchCategory(category) {
            currentCategory = category;
            currentIndex = 0;
            
            // Show/Hide items
            const allItems = track.querySelectorAll('.trending-product-card');
            allItems.forEach(item => {
                if (item.classList.contains(`${category}-item`)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Reset transform before calculating layout
            track.style.transform = 'translateX(0)';
            
            // Update active button state
            tabBtns.forEach(btn => {
                if (btn.getAttribute('data-category') === category) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
            
            // Give browser a tick to reflow
            setTimeout(updateSlider, 50);
        }
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const cat = this.getAttribute('data-category');
                switchCategory(cat);
            });
        });
        
        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });
        
        nextBtn.addEventListener('click', function() {
            const items = track.querySelectorAll(`.${currentCategory}-item`);
            const visibleCount = getVisibleCardsCount();
            const maxIndex = Math.max(0, items.length - visibleCount);
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateSlider();
            }
        });
        
        // Initialize view
        switchCategory('men');
        
        // Handle resize
        window.addEventListener('resize', updateSlider);
    }

    /* ===== 15. FEATURED FOOTWEAR SLIDER ===== */
    const fwTrack = document.getElementById('footwearProductsTrack');
    const fwPrevBtn = document.getElementById('footwearPrevBtn');
    const fwNextBtn = document.getElementById('footwearNextBtn');
    const fwTabBtns = document.querySelectorAll('.footwear-tab-btn');
    
    if (fwTrack && fwPrevBtn && fwNextBtn && fwTabBtns.length > 0) {
        let currentCategory = 'men';
        let currentIndex = 0;
        
        function getVisibleCardsCount() {
            const width = window.innerWidth;
            if (width <= 576) return 1;
            if (width <= 991) return 2;
            return 3;
        }
        
        function updateSlider() {
            const items = fwTrack.querySelectorAll(`.footwear-${currentCategory}-item`);
            const visibleCount = getVisibleCardsCount();
            const maxIndex = Math.max(0, items.length - visibleCount);
            
            if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }
            
            // Disable/enable arrows
            if (currentIndex === 0) {
                fwPrevBtn.style.opacity = '0.5';
                fwPrevBtn.style.pointerEvents = 'none';
            } else {
                fwPrevBtn.style.opacity = '1';
                fwPrevBtn.style.pointerEvents = 'auto';
            }
            
            if (currentIndex >= maxIndex) {
                fwNextBtn.style.opacity = '0.5';
                fwNextBtn.style.pointerEvents = 'none';
            } else {
                fwNextBtn.style.opacity = '1';
                fwNextBtn.style.pointerEvents = 'auto';
            }
            
            // Calculate shift percentage based on item width
            if (items.length > 0) {
                const cardWidth = items[0].getBoundingClientRect().width;
                const gap = 24;
                const shift = currentIndex * (cardWidth + gap);
                fwTrack.style.transform = `translateX(-${shift}px)`;
            }
        }
        
        function switchCategory(category) {
            currentCategory = category;
            currentIndex = 0;
            
            // Show/Hide items
            const allItems = fwTrack.querySelectorAll('.footwear-product-card');
            allItems.forEach(item => {
                if (item.classList.contains(`footwear-${category}-item`)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Reset transform before calculating layout
            fwTrack.style.transform = 'translateX(0)';
            
            // Update active button state
            fwTabBtns.forEach(btn => {
                if (btn.getAttribute('data-footwear-category') === category) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
            
            // Give browser a tick to reflow
            setTimeout(updateSlider, 50);
        }
        
        fwTabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const cat = this.getAttribute('data-footwear-category');
                switchCategory(cat);
            });
        });
        
        fwPrevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });
        
        fwNextBtn.addEventListener('click', function() {
            const items = fwTrack.querySelectorAll(`.footwear-${currentCategory}-item`);
            const visibleCount = getVisibleCardsCount();
            const maxIndex = Math.max(0, items.length - visibleCount);
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateSlider();
            }
        });
        
        // Initialize view
        switchCategory('men');
        
        // Handle resize
        window.addEventListener('resize', updateSlider);
    }
});
