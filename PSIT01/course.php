<?php
// Include configuration
require_once 'config.php';

// Include database and course functions
require_once 'db/db.php';
require_once 'data/courses.php';

// Set page title
$page_title = 'All Courses';

// Get filter parameters
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';

// Get filtered courses from database
$filtered_courses = filterCourses($search, $category, $sort);

// Get unique categories
$categories_data = getAllCategories();
$categories = array_column($categories_data, 'category');

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Explore Our Courses</h1>
        <p class="text-xl text-gray-100 mb-6">
            Choose from <?php echo count(getAllCourses()); ?> courses across multiple categories
        </p>
        
        <!-- Search Bar -->
        <form method="GET" action="" class="max-w-2xl">
            <div class="flex gap-2">
                <div class="flex-1 relative">
                    <input type="text" 
                           name="search" 
                           value="<?php echo htmlspecialchars($search); ?>"
                           placeholder="Search for courses..." 
                           class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-white">
                    <i class="fas fa-search absolute right-4 top-4 text-gray-400"></i>
                </div>
                <button type="submit" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Search
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Filters Section -->
<section class="bg-white py-6 shadow-sm sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm: px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
            <!-- Category Filters -->
            <div class="flex flex-wrap gap-2 items-center">
                <span class="font-semibold text-gray-700 mr-2">Category:</span>
                <a href="<?php echo SITE_URL; ?>/course.php" 
                   class="px-4 py-2 rounded-lg <?php echo empty($category) ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?> transition">
                    All
                </a>
                <?php foreach($categories as $cat): ?>
                    <a href="? category=<?php echo urlencode($cat); ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                       class="px-4 py-2 rounded-lg <?php echo $category === $cat ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?> transition">
                        <?php echo $cat; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <!-- Sort Dropdown -->
            <div class="flex items-center gap-2">
                <span class="font-semibold text-gray-700">Sort by:</span>
                <select name="sort" id="sort-select" 
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">Default</option>
                    <option value="price_low" <?php echo $sort === 'price_low' ?  'selected' : ''; ?>>Price:  Low to High</option>
                    <option value="price_high" <?php echo $sort === 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
                    <option value="rating" <?php echo $sort === 'rating' ? 'selected' :  ''; ?>>Highest Rated</option>
                    <option value="popular" <?php echo $sort === 'popular' ? 'selected' : ''; ?>>Most Popular</option>
                </select>
            </div>
        </div>
        
        <!-- Active Filters Display -->
        <?php if (!empty($search) || !empty($category)): ?>
            <div class="mt-4 flex flex-wrap gap-2 items-center">
                <span class="text-sm text-gray-600">Active filters: </span>
                <?php if (! empty($search)): ?>
                    <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm flex items-center gap-2">
                        Search: "<?php echo htmlspecialchars($search); ?>"
                        <a href="? <?php echo !empty($category) ? 'category=' . urlencode($category) : ''; ?>" class="hover:text-gray-200">
                            <i class="fas fa-times"></i>
                        </a>
                    </span>
                <?php endif; ?>
                <?php if (!empty($category)): ?>
                    <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm flex items-center gap-2">
                        Category: <?php echo htmlspecialchars($category); ?>
                        <a href="?<?php echo !empty($search) ? 'search=' . urlencode($search) : ''; ?>" class="hover:text-gray-200">
                            <i class="fas fa-times"></i>
                        </a>
                    </span>
                <?php endif; ?>
                <a href="<?php echo SITE_URL; ?>/course.php" class="text-sm text-purple-600 hover:underline">Clear all</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Courses Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Course Count -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <?php if (! empty($search) || !empty($category)): ?>
                    Search Results
                <?php else: ?>
                    All Courses
                <?php endif; ?>
                <span class="text-gray-500 font-normal">(<?php echo count($filtered_courses); ?> <?php echo count($filtered_courses) === 1 ? 'course' : 'courses'; ?>)</span>
            </h2>
        </div>
        
        <!-- Courses Grid -->
        <?php if (count($filtered_courses) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($filtered_courses as $course): ?>
                    <?php include 'components/course-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- No Results -->
            <div class="text-center py-16">
                <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No courses found</h3>
                <p class="text-gray-600 mb-6">
                    Try adjusting your search or filter to find what you're looking for. 
                </p>
                <a href="courses.php" class="btn-primary inline-block">
                    <i class="fas fa-arrow-left mr-2"></i>
                    View All Courses
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Featured Section (only show if no filters applied) -->
<?php if (empty($search) && empty($category)): ?>
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
            Featured Courses
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $featuredCourses = getFeaturedCourses();
            foreach($featuredCourses as $course): 
            ?>
                <?php include 'components/course-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- JavaScript for Sort Dropdown -->
<script>
document.getElementById('sort-select').addEventListener('change', function() {
    const sortValue = this.value;
    const urlParams = new URLSearchParams(window.location.search);
    
    if (sortValue) {
        urlParams.set('sort', sortValue);
    } else {
        urlParams.delete('sort');
    }
    
    window.location.search = urlParams.toString();
});
</script>

<?php
// Include footer
include 'includes/footer.php';
?>