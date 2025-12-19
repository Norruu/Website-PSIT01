<?php
// Include configuration
require_once 'config.php';

// Set page title
$page_title = '404 - Page Not Found';

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- 404 Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg: px-8 text-center">
        <!-- 404 Illustration -->
        <div class="mb-8">
            <div class="text-9xl font-bold text-primary mb-4">404</div>
            <i class="fas fa-exclamation-triangle text-6xl text-gray-300"></i>
        </div>
        
        <!-- Message -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Oops! Page Not Found
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            The page you're looking for doesn't exist or has been moved.
        </p>
        
        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <a href="index.php" class="btn-primary inline-block">
                <i class="fas fa-home mr-2"></i>
                Go to Homepage
            </a>
            <a href="courses.php" class="btn-secondary inline-block">
                <i class="fas fa-book-open mr-2"></i>
                Browse Courses
            </a>
        </div>
        
        <!-- Helpful Links -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Helpful Links</h2>
            <div class="grid grid-cols-1 md: grid-cols-2 gap-4">
                <?php foreach($nav_items as $item): ?>
                    <a href="<?php echo SITE_URL . '/' . $item['url']; ?>" 
                       class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <i class="fas fa-arrow-right text-primary"></i>
                        <span class="font-semibold text-gray-700"><?php echo $item['name']; ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>