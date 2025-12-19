<?php
// Include configuration
require_once 'config.php';

// Include database and course functions
require_once 'db/db.php';
require_once 'data/courses.php';

// Get course ID from URL parameter
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Get course from database
$current_course = getCourseById($course_id);

// If course not found, redirect to courses page
if (!$current_course) {
    header('Location: ' . SITE_URL . '/course.php');
    exit;
}

// Set page title
$page_title = $current_course['title'];

// Calculate discount percentage
$discount = calculateDiscount($current_course['original_price'], $current_course['price']);

// Get related courses from same category
$all_courses = getAllCourses();
$related_courses = getCoursesByCategory($all_courses, $current_course['category']);
$related_courses = array_filter($related_courses, function($c) use ($course_id) {
    return $c['id'] != $course_id;
});
$related_courses = array_slice($related_courses, 0, 3);

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- Course Hero Section -->
<section class="bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Course Info -->
            <div class="lg:col-span-2">
                <!-- Breadcrumb -->
                <div class="text-sm mb-4">
                    <a href="index.php" class="hover:underline">Home</a>
                    <span class="mx-2">/</span>
                    <a href="course.php" class="hover:underline">Courses</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-200"><?php echo $current_course['category']; ?></span>
                </div>
                
                <!-- Category Badge -->
                <span class="inline-block bg-white text-violet-600 px-4 py-1 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-tag"></i> <?php echo $current_course['category']; ?>
                </span>
                
                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-bold mb-4">
                    <?php echo $current_course['title']; ?>
                </h1>
                
                <!-- Description -->
                <p class="text-xl text-gray-100 mb-6">
                    <?php echo $current_course['description']; ?>
                </p>
                
                <!-- Meta Info -->
                <div class="flex flex-wrap gap-6 text-sm">
                    <div>
                        <i class="fas fa-star text-yellow-400"></i>
                        <span class="font-semibold ml-1"><?php echo $current_course['rating']; ?></span>
                        <span class="text-gray-200 ml-1">(1,234 reviews)</span>
                    </div>
                    <div>
                        <i class="fas fa-user-graduate"></i>
                        <span class="ml-1"><?php echo number_format($current_course['students']); ?> students</span>
                    </div>
                    <div>
                        <i class="fas fa-signal"></i>
                        <span class="ml-1"><?php echo $current_course['level']; ?></span>
                    </div>
                </div>
                
                <!-- Instructor -->
                <div class="mt-6 flex items-center">
                    <img src="https://i.pravatar.cc/100?img=<?php echo $course_id; ?>" 
                         alt="<?php echo $current_course['instructor']; ?>" 
                         class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <p class="text-sm text-gray-200">Instructor</p>
                        <p class="font-semibold"><?php echo $current_course['instructor']; ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Course Card (Sticky on Desktop) -->
            <div class="lg:col-span-1">
                <div class="bg-white text-gray-800 rounded-lg shadow-xl p-6 lg:sticky lg:top-20">
                    <!-- Course Image -->
                    <img src="<?php echo $current_course['image']; ?>" 
                         alt="<?php echo $current_course['title']; ?>" 
                         class="w-full h-48 object-cover rounded-lg mb-4">
                    
                    <!-- Price -->
                    <div class="mb-4">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-bold text-primary">
                                <?php echo formatPrice($current_course['price']); ?>
                            </span>
                            <?php if ($discount > 0): ?>
                                <span class="text-xl text-gray-400 line-through">
                                    <?php echo formatPrice($current_course['original_price']); ?>
                                </span>
                                <span class="bg-red-500 text-white px-2 py-1 rounded text-sm font-semibold">
                                    -<?php echo $discount; ?>%
                                </span>
                            <?php endif; ?>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">
                            <i class="fas fa-clock"></i> Offer ends soon! 
                        </p>
                    </div>
                    
                    <!-- Enroll Button -->
                    <button class="w-full bg-violet-600 text-white py-3 rounded-lg font-semibold hover:bg-violet-700 transition mb-3">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Enroll Now
                    </button>
                    
                    <button class="w-full bg-gray-100 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-200 transition mb-4">
                        <i class="fas fa-heart mr-2"></i>
                        Add to Wishlist
                    </button>
                    
                    <!-- What's Included -->
                    <div class="border-t pt-4">
                        <h3 class="font-semibold mb-3">This course includes:</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li><i class="fas fa-video text-primary mr-2"></i> <?php echo $current_course['duration']; ?> on-demand video</li>
                            <li><i class="fas fa-book text-primary mr-2"></i> <?php echo $current_course['lessons']; ?> lessons</li>
                            <li><i class="fas fa-download text-primary mr-2"></i> Downloadable resources</li>
                            <li><i class="fas fa-mobile-alt text-primary mr-2"></i> Access on mobile and desktop</li>
                            <li><i class="fas fa-infinity text-primary mr-2"></i> Lifetime access</li>
                            <li><i class="fas fa-certificate text-primary mr-2"></i> Certificate of completion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Content Tabs -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg: grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Tab Navigation -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="flex border-b">
                        <button class="tab-button active px-6 py-4 font-semibold text-grey-700 border-b-2 border-violet-600" data-tab="overview">
                            Overview
                        </button>
                        <button class="tab-button px-6 py-4 font-semibold text-gray-600 hover:text-grey" data-tab="curriculum">
                            Curriculum
                        </button>
                        <button class="tab-button px-6 py-4 font-semibold text-gray-600 hover:text-grey" data-tab="reviews">
                            Reviews
                        </button>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="p-6">
                        <!-- Overview Tab -->
                        <div id="overview-tab" class="tab-content">
                            <h2 class="text-2xl font-bold mb-4">Course Overview</h2>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                <?php echo $current_course['description']; ?>
                            </p>
                            
                            <h3 class="text-xl font-bold mb-3">What you'll learn</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                    <span class="text-gray-600">Master the fundamentals of <?php echo strtolower($current_course['category']); ?></span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                    <span class="text-gray-600">Build real-world projects from scratch</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                    <span class="text-gray-600">Best practices and industry standards</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                    <span class="text-gray-600">Certificate upon completion</span>
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-bold mb-3">Requirements</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6">
                                <li>No prior experience required - we'll teach you everything</li>
                                <li>A computer with internet connection</li>
                                <li>Willingness to learn and practice</li>
                            </ul>
                            
                            <h3 class="text-xl font-bold mb-3">Who this course is for</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-2">
                                <li>Beginners who want to learn <?php echo strtolower($current_course['category']); ?></li>
                                <li>Students looking to build their portfolio</li>
                                <li>Professionals wanting to upskill</li>
                                <li>Anyone interested in <?php echo strtolower($current_course['category']); ?></li>
                            </ul>
                        </div>
                        
                        <!-- Curriculum Tab -->
                        <div id="curriculum-tab" class="tab-content hidden">
                            <h2 class="text-2xl font-bold mb-4">Course Curriculum</h2>
                            <p class="text-gray-600 mb-6">
                                <?php echo $current_course['lessons']; ?> lessons • <?php echo $current_course['duration']; ?> total length
                            </p>
                            
                            <!-- Module 1 -->
                            <div class="border rounded-lg mb-4">
                                <button class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition">
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-down mr-3 text-gray-600"></i>
                                        <span class="font-semibold">Module 1: Introduction</span>
                                    </div>
                                    <span class="text-sm text-gray-600">5 lessons • 45min</span>
                                </button>
                                <div class="p-4 space-y-2">
                                    <div class="flex items-center justify-between py-2 hover:bg-gray-50 px-2 rounded">
                                        <div class="flex items-center">
                                            <i class="fas fa-play-circle text-primary mr-3"></i>
                                            <span class="text-gray-700">1. 1 Welcome to the course</span>
                                        </div>
                                        <span class="text-sm text-gray-500">5: 30</span>
                                    </div>
                                    <div class="flex items-center justify-between py-2 hover:bg-gray-50 px-2 rounded">
                                        <div class="flex items-center">
                                            <i class="fas fa-play-circle text-primary mr-3"></i>
                                            <span class="text-gray-700">1.2 Course overview</span>
                                        </div>
                                        <span class="text-sm text-gray-500">8:15</span>
                                    </div>
                                    <div class="flex items-center justify-between py-2 hover:bg-gray-50 px-2 rounded">
                                        <div class="flex items-center">
                                            <i class="fas fa-lock text-gray-400 mr-3"></i>
                                            <span class="text-gray-700">1.3 Setting up your environment</span>
                                        </div>
                                        <span class="text-sm text-gray-500">12:45</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Module 2 -->
                            <div class="border rounded-lg mb-4">
                                <button class="w-full flex items-center justify-between p-4 bg-gray-50 hover: bg-gray-100 transition">
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-down mr-3 text-gray-600"></i>
                                        <span class="font-semibold">Module 2: Fundamentals</span>
                                    </div>
                                    <span class="text-sm text-gray-600">8 lessons • 1hr 20min</span>
                                </button>
                            </div>
                            
                            <!-- Module 3 -->
                            <div class="border rounded-lg mb-4">
                                <button class="w-full flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 transition">
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-down mr-3 text-gray-600"></i>
                                        <span class="font-semibold">Module 3: Advanced Topics</span>
                                    </div>
                                    <span class="text-sm text-gray-600">12 lessons • 2hr 15min</span>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Reviews Tab -->
                        <div id="reviews-tab" class="tab-content hidden">
                            <h2 class="text-2xl font-bold mb-4">Student Reviews</h2>
                            
                            <!-- Rating Summary -->
                            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                                <div class="flex items-center gap-8">
                                    <div class="text-center">
                                        <div class="text-5xl font-bold text-primary mb-2">
                                            <?php echo $current_course['rating']; ?>
                                        </div>
                                        <div class="text-yellow-400 mb-2">
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i class="fas fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="text-sm text-gray-600">Course Rating</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <div class="w-16 text-sm">5 stars</div>
                                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 75%"></div>
                                            </div>
                                            <div class="w-12 text-sm text-gray-600">75%</div>
                                        </div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <div class="w-16 text-sm">4 stars</div>
                                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                                <div class="bg-yellow-400 h-2 rounded-full" style="width:  15%"></div>
                                            </div>
                                            <div class="w-12 text-sm text-gray-600">15%</div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="w-16 text-sm">3 stars</div>
                                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 10%"></div>
                                            </div>
                                            <div class="w-12 text-sm text-gray-600">10%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <!-- Individual Reviews -->
                            <div class="space-y-6">
                                <?php
                                    $sample_reviews = [
                                        ['name' => 'Maria Garcia', 'rating' => 5, 'date' => '2 days ago', 'comment' => 'Excellent course! The instructor explains everything clearly and the projects are very practical.'],
                                        ['name' => 'John Santos', 'rating' => 5, 'date' => '1 week ago', 'comment' => 'Best investment I made this year.  Highly recommended for beginners! '],
                                        ['name' => 'Lisa Chen', 'rating' => 4, 'date' => '2 weeks ago', 'comment' => 'Great content overall. Would love to see more advanced examples.'],
                                    ];
                                        foreach($sample_reviews as $index => $review):
                                        ?>
                                            <div class="border-b pb-6">
                                                <div class="flex items-start gap-4">
                                                    <img src="https://i.pravatar.cc/80?img=<?php echo $index + 20; ?>" 
                                                        alt="<?php echo $review['name']; ?>" 
                                                        class="w-12 h-12 rounded-full">
                                                    <div class="flex-1">
                                                        <div class="flex items-center justify-between mb-2">
                                                            <h4 class="font-semibold"><?php echo $review['name']; ?></h4>
                                                            <span class="text-sm text-gray-500"><?php echo $review['date']; ?></span>
                                                        </div>
                                                        <div class="text-yellow-400 mb-2">
                                                            <?php for($i = 0; $i < $review['rating']; $i++): ?>
                                                                <i class="fas fa-star text-sm"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <p class="text-gray-600"><?php echo $review['comment']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                <!-- Instructor Section -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold mb-4">About the Instructor</h2>
                    <div class="flex items-start gap-4">
                        <img src="https://i.pravatar.cc/100?img=<?php echo $course_id; ?>" 
                             alt="<?php echo $current_course['instructor']; ?>" 
                             class="w-20 h-20 rounded-full">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2"><?php echo $current_course['instructor']; ?></h3>
                            <p class="text-primary font-semibold mb-3"><?php echo $current_course['category']; ?> Expert</p>
                            <p class="text-gray-600 mb-4">
                                Professional <?php echo strtolower($current_course['category']); ?> instructor with over 10 years of experience.  
                                Passionate about teaching and helping students achieve their goals.
                            </p>
                            <div class="flex gap-6 text-sm text-gray-600">
                                <div><i class="fas fa-star text-yellow-400 mr-1"></i> 4.8 Instructor Rating</div>
                                <div><i class="fas fa-play-circle text-primary mr-1"></i> 25 Courses</div>
                                <div><i class="fas fa-user-graduate text-primary mr-1"></i> 50,000+ Students</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Related Courses -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4">Related Courses</h3>
                    <div class="space-y-4">
                        <?php foreach($related_courses as $related_course): ?>
                            <a href="<?php echo SITE_URL; ?>/course-detail.php?id=<?php echo $related_course['id']; ?>" 
                            class="block hover:bg-gray-50 p-2 rounded transition">
                                <div class="flex gap-3">
                                    <img src="<?php echo $related_course['image']; ?>" 
                                        alt="<?php echo htmlspecialchars($related_course['title']); ?>" 
                                        class="w-20 h-20 object-cover rounded">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-sm mb-1 line-clamp-2">
                                            <?php echo htmlspecialchars($related_course['title']); ?>
                                        </h4>
                                        <p class="text-xs text-gray-600 mb-1"><?php echo htmlspecialchars($related_course['instructor']); ?></p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm font-bold text-primary">
                                                <?php echo formatPrice($related_course['price']); ?>
                                            </span>
                                            <span class="text-xs text-gray-600">
                                                <i class="fas fa-star text-yellow-400"></i>
                                                <?php echo $related_course['rating']; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add custom JavaScript for tabs -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');
            
            // Remove active class from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('active', 'text-black', 'border-b-2', 'border-indigo-700');
                btn.classList.add('text-gray-600');
            });
            
            // Add active class to clicked button
            this.classList.add('active', 'text-black', 'border-b-2', 'border-indigo-700');
            this.classList.remove('text-gray-600');
            
            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show selected tab content
            document.getElementById(tabName + '-tab').classList.remove('hidden');
        });
    });
});
</script>

<?php
// Include footer
include 'includes/footer.php';
?>