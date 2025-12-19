<?php
// Include configuration
require_once 'config.php';

// Set page title
$page_title = 'Home';

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- Hero Section -->
<section class="bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-on-scroll">
                Learn Skills for Your Future
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-800 animate-on-scroll">
                Discover thousands of courses in technologys
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll">
                <a href="course.php" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
                    <i class="fas fa-book-open mr-2"></i>
                    Browse Courses
                </a>
                <a href="about.php" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
                    <i class="fas fa-info-circle mr-2"></i>
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg: px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">
            Why Choose PSIT01?
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="text-center p-6 card-hover bg-gray-50 rounded-lg animate-on-scroll">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Expert Instructor</h3>
                <p class="text-gray-600">
                    Learn from industry professionals with years of experience
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center p-6 card-hover bg-gray-50 rounded-lg animate-on-scroll">
                <div class="bg-secondary text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-certificate text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Certifications</h3>
                <p class="text-gray-600">
                    Earn recognized certificates upon course completion
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center p-6 card-hover bg-gray-50 rounded-lg animate-on-scroll">
                <div class="bg-accent text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Flexible Learning</h3>
                <p class="text-gray-600">
                    Study at your own pace, anytime and anywhere
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm: px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Popular Categories</h2>
            <p class="text-gray-600">Explore our wide range of course categories</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php 
            // Get categories from database
            require_once 'db/db.php';
            require_once 'data/courses.php';
            $categories = getCategoriesWithIcons();
            
            foreach($categories as $category):
            ?>
                <a href="<?php echo SITE_URL; ?>/courses.php?category=<?php echo urlencode($category['name']); ?>" 
                   class="group bg-gray-50 hover:bg-gradient-to-bl from-violet-500 to-fuchsia-500 hover:text-white p-6 rounded-lg text-center transition duration-300 card-hover animate-on-scroll">
                    <div class="text-4xl mb-3 group-hover:scale-110 transition-transform">
                        <i class="fas <?php echo $category['icon']; ?>"></i>
                    </div>
                    <h3 class="font-semibold"><?php echo $category['name']; ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg: px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Ready to Start Learning?
        </h2>
        <p class="text-xl text-gray-800 mb-8">
            Join thousands of students already learning on PSIT01
        </p>
        <a href="courses.php" class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
            Get Started Now
        </a>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>