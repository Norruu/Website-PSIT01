<?php
// Include configuration
require_once 'config.php';

// Include course data
require_once 'data/courses. php';

// Set page title
$page_title = 'All Courses';

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-secondary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg: px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Explore Our Courses</h1>
        <p class="text-xl text-gray-100">
            Choose from <?php echo count($courses); ?> courses across multiple categories
        </p>
    </div>
</section>

<!-- Filters Section -->
<section class="bg-white py-6 shadow-sm sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4 items-center">
            <span class="font-semibold text-gray-700">Filter by:</span>
            <button class="px-4 py-2 rounded-lg bg-primary text-white">All Courses</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Programming</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Design</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Business</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Marketing</button>
        </div>
    </div>
</section>

<!-- Courses Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Course Count -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                All Courses <span class="text-gray-500 font-normal">(<?php echo count($courses); ?> courses)</span>
            </h2>
        </div>
        
        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($courses as $course): ?>
                <?php include 'components/course-card. php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
            Featured Courses
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $featuredCourses = getFeaturedCourses($courses);
            foreach($featuredCourses as $course): 
            ?>
                <?php include 'components/course-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>