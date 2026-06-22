    <!-- ============================================
         FOOTER
         ============================================ -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-5">
                <!-- Brand -->
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo $rootPath; ?>index.php" class="footer-brand">Axvero<span>.</span></a>
                    <p class="footer-desc">Elevating your everyday style with premium fashion and home essentials. Discover the art of modern living.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo $rootPath; ?>about-us.php">About Us</a></li>
                        <li><a href="<?php echo $rootPath; ?>careers.php">Careers</a></li>
                        <li><a href="<?php echo $rootPath; ?>store-locator.php">Store Locator</a></li>
                        <li><a href="<?php echo $rootPath; ?>sustainability.php">Sustainability</a></li>
                        <li><a href="<?php echo $rootPath; ?>account.php">My Account</a></li>
                        <li><a href="<?php echo $rootPath; ?>account.php?tab=orders">Track Order</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Categories</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo $rootPath; ?>category.php?category=Women">Women</a></li>
                        <li><a href="<?php echo $rootPath; ?>category.php?category=Mens">Men</a></li>
                        <li><a href="<?php echo $rootPath; ?>category.php?category=Kids">Kids</a></li>
                        <li><a href="<?php echo $rootPath; ?>category.php?category=Accessories">Accessories</a></li>
                        <li><a href="<?php echo $rootPath; ?>category.php?category=HomeDecor">Home & Decor</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-heading">Contact</h5>
                    <ul class="footer-contact">
                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <span>123 Fashion Avenue,<br>New York, NY 10001</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone"></i>
                            <span>+1 (800) AXV-RERO</span>
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <span>hello@axvero.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Newsletter</h5>
                    <p class="footer-desc" style="margin-bottom: 16px;">Subscribe to receive updates, early access, and exclusive offers.</p>
                    <form class="footer-newsletter">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; 2026 Axvero. All rights reserved.</p>
                <div class="footer-payments">
                    <i class="bi bi-credit-card-2-front"></i>
                    <i class="bi bi-paypal"></i>
                    <i class="bi bi-stripe"></i>
                    <i class="bi bi-wallet2"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================
         BACK TO TOP
         ============================================ -->
    <button id="backToTop" class="back-to-top" aria-label="Back to top">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo $rootPath; ?>assets/js/main.js"></script>
</body>
</html>
