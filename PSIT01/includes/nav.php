<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo/Brand -->
            <div class="flex-shrink-0">
                <a href="<?php echo SITE_URL; ?>/index.php" class="text-2xl font-bold text-primary">
                    <i class="fas fa-graduation-cap"></i> <?php echo SITE_NAME; ?>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <?php foreach($nav_items as $item): ?>
                        <a href="<?php echo SITE_URL .  '/' . $item['url']; ?>" 
                           class="<?php echo isActive($item['url']); ?> text-gray-700 hover:bg-primary hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            <?php echo $item['name']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" id="mobile-menu-button" class="text-gray-700 hover: text-primary focus: outline-none focus:text-primary">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Navigation -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm: px-3">
            <?php foreach($nav_items as $item): ?>
                <a href="<?php echo SITE_URL .  '/' . $item['url']; ?>" 
                   class="<?php echo isActive($item['url']); ?> text-gray-700 hover:bg-primary hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    <?php echo $item['name']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>