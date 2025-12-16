<footer class="bg-gray-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md: grid-cols-4 gap-8">
            <!-- About Section -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold mb-4">
                    <i class="fas fa-graduation-cap"></i> <?php echo SITE_NAME; ?>
                </h3>
                <p class="text-gray-400 mb-4">
                    <?php echo SITE_DESCRIPTION; ?>
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-linkedin text-2xl"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <?php foreach($nav_items as $item): ?>
                        <li>
                            <a href="<?php echo SITE_URL . '/' . $item['url']; ?>" 
                               class="text-gray-400 hover: text-white transition">
                                <?php echo $item['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <i class="fas fa-envelope mr-2"></i>
                        info@ryanjaymadayag@gmail.com
                    </li>
                    <li>
                        <i class="fas fa-phone mr-2"></i>
                        +63 919 660 2047
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Negros Occidental, Philippines
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>