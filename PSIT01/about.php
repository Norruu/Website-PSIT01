<?php
// Include configuration
require_once 'config.php';

// Set page title
$page_title = 'About Us';

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">About PSIT01</h1>
        <p class="text-xl text-gray-100">
            Empowering learners worldwide with quality education
        </p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm: px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="animate-on-scroll">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-bullseye text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Our Mission</h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    To provide accessible, high-quality education that empowers individuals 
                    to achieve their personal and professional goals.  We believe everyone 
                    deserves the opportunity to learn and grow, regardless of their background 
                    or location.
                </p>
            </div>
            
            <!-- Vision -->
            <div class="animate-on-scroll">
                <div class="bg-secondary text-white w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-eye text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Our Vision</h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    To become the leading online learning platform in the Philippines and beyond, 
                    transforming lives through education and creating a community of lifelong learners 
                    who drive positive change in the world.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <!-- Stat 1 -->
            <div class="animate-on-scroll">
                <div class="text-4xl md:text-5xl font-bold mb-2">50K+</div>
                <div class="text-gray-100 text-lg">Active Students</div>
            </div>
            
            <!-- Stat 2 -->
            <div class="animate-on-scroll">
                <div class="text-4xl md:text-5xl font-bold mb-2">500+</div>
                <div class="text-gray-100 text-lg">Online Courses</div>
            </div>
            
            <!-- Stat 3 -->
            <div class="animate-on-scroll">
                <div class="text-4xl md:text-5xl font-bold mb-2">200+</div>
                <div class="text-gray-100 text-lg">Expert Instructors</div>
            </div>
            
            <!-- Stat 4 -->
            <div class="animate-on-scroll">
                <div class="text-4xl md:text-5xl font-bold mb-2">98%</div>
                <div class="text-gray-100 text-lg">Satisfaction Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg: px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Story</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
        </div>
        
        <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
            <p>
                PSIT01 was founded in 2020 with a simple yet powerful idea: education should be 
                accessible to everyone, everywhere. What started as a small project by a group of 
                passionate educators has grown into a thriving community of learners and instructors 
                from around the world.
            </p>
            <p>
                Our platform was built during the challenging times of the pandemic, when traditional 
                education was disrupted.  We saw an opportunity to create something meaningful—a space 
                where knowledge knows no boundaries, and learning never stops.
            </p>
            <p>
                Today, we're proud to serve thousands of students across multiple countries, offering 
                courses in technology, business, design, and more.  But our journey is far from over.  
                Every day, we work to improve our platform, expand our course offerings, and support 
                our community of lifelong learners.
            </p>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Core Values</h2>
            <div class="w-20 h-1 bg-primary mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Value 1 -->
            <div class="text-center p-6 card-hover animate-on-scroll">
                <div class="bg-blue-100 text-primary w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Passion for Learning</h3>
                <p class="text-gray-600">
                    We believe in the transformative power of education and are passionate 
                    about helping others discover their potential. 
                </p>
            </div>
            
            <!-- Value 2 -->
            <div class="text-center p-6 card-hover animate-on-scroll">
                <div class="bg-green-100 text-green-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Community First</h3>
                <p class="text-gray-600">
                    Our students and instructors are at the heart of everything we do. 
                    We're building a supportive learning community. 
                </p>
            </div>
            
            <!-- Value 3 -->
            <div class="text-center p-6 card-hover animate-on-scroll">
                <div class="bg-purple-100 text-purple-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Excellence</h3>
                <p class="text-gray-600">
                    We're committed to delivering high-quality courses and exceptional 
                    learning experiences that exceed expectations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Meet Our Team</h2>
            <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
            <p class="text-gray-600 text-lg">
                The passionate people behind PSI01
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <?php
            $team = [
                [
                    'name' => 'Wiljohn Dela Cruz',
                    'position' => 'CEO & Founder',
                    'image' => 'https://i.pravatar.cc/300?img=1',
                    'social' => ['linkedin' => '#', 'twitter' => '#']
                ],
                [
                    'name' => 'John Rigo Gulmatico',
                    'position' => 'CTO',
                    'image' => 'https://i.pravatar.cc/300?img=1',
                    'social' => ['linkedin' => '#', 'twitter' => '#']
                ],
                [
                    'name' => 'Robel Andrew Ambahan',
                    'position' => 'Head Content',
                    'image' => 'https://i.pravatar.cc/300?img=1',
                    'social' => ['linkedin' => '#', 'twitter' => '#']
                ],
                [
                    'name' => 'Ryan Jay Madayag',
                    'position' => 'Lead Developer',
                    'image' => 'https://i.pravatar.cc/300?img=1',
                    'social' => ['linkedin' => '#', 'twitter' => '#']
                ]
            ];
            
            foreach($team as $member):
            ?>
                <div class="bg-white rounded-lg overflow-hidden shadow-md card-hover animate-on-scroll">
                    <img src="<?php echo $member['image']; ?>" 
                         alt="<?php echo $member['name']; ?>" 
                         class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">
                            <?php echo $member['name']; ?>
                        </h3>
                        <p class="text-primary font-semibold mb-4">
                            <?php echo $member['position']; ?>
                        </p>
                        <div class="flex justify-center space-x-4">
                            <a href="<?php echo $member['social']['linkedin']; ?>" 
                               class="text-gray-400 hover:text-primary transition">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="<?php echo $member['social']['twitter']; ?>" 
                               class="text-gray-400 hover:text-primary transition">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-bl from-violet-500 to-fuchsia-500 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg: px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Join Our Learning Community
        </h2>
        <p class="text-xl mb-8">
            Start your learning journey today and unlock your potential
        </p>
        <a href="courses.php" class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
            Browse Courses
        </a>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>