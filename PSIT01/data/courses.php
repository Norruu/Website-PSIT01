<?php
// Course Data Array
$courses = [
    [
        'id' => 1,
        'title' => 'Complete Web Development Bootcamp',
        'description' => 'Learn HTML, CSS, JavaScript, PHP, and MySQL from scratch.  Build real-world projects and become a full-stack developer.',
        'instructor' => 'John Doe',
        'category' => 'Programming',
        'price' => 2999,
        'original_price' => 4999,
        'duration' => '40 hours',
        'lessons' => 120,
        'students' => 15234,
        'rating' => 4.8,
        'level' => 'Beginner',
        'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500',
        'featured' => true
    ],
    [
        'id' => 2,
        'title' => 'Graphic Design Masterclass',
        'description' => 'Master Adobe Photoshop, Illustrator, and InDesign. Create stunning designs for print and digital media.',
        'instructor' => 'Jane Smith',
        'category' => 'Design',
        'price' => 1999,
        'original_price' => 3499,
        'duration' => '25 hours',
        'lessons' => 85,
        'students' => 8932,
        'rating' => 4.7,
        'level' => 'Intermediate',
        'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=500',
        'featured' => true
    ],
    [
        'id' => 3,
        'title' => 'Digital Marketing Strategy',
        'description' => 'Learn SEO, social media marketing, content marketing, and email campaigns. Grow your business online.',
        'instructor' => 'Mike Johnson',
        'category' => 'Marketing',
        'price' => 1799,
        'original_price' => 2999,
        'duration' => '18 hours',
        'lessons' => 65,
        'students' => 12456,
        'rating' => 4.6,
        'level' => 'Beginner',
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500',
        'featured' => true
    ],
    [
        'id' => 4,
        'title' => 'Python Programming for Beginners',
        'description' => 'Start your programming journey with Python. Learn basics, data structures, and build practical projects.',
        'instructor' => 'Sarah Williams',
        'category' => 'Programming',
        'price' => 1499,
        'original_price' => 2499,
        'duration' => '30 hours',
        'lessons' => 95,
        'students' => 18765,
        'rating' => 4.9,
        'level' => 'Beginner',
        'image' => 'https://images.unsplash.com/photo-1526379095098-d400fd0bf935?w=500',
        'featured' => false
    ],
    [
        'id' => 5,
        'title' => 'Business Strategy & Management',
        'description' => 'Develop essential business skills including strategic planning, leadership, and project management.',
        'instructor' => 'Robert Brown',
        'category' => 'Business',
        'price' => 2499,
        'original_price' => 3999,
        'duration' => '22 hours',
        'lessons' => 75,
        'students' => 6543,
        'rating' => 4.5,
        'level' => 'Intermediate',
        'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500',
        'featured' => false
    ],
    [
        'id' => 6,
        'title' => 'Photography Fundamentals',
        'description' => 'Master camera settings, composition, lighting, and post-processing.  Capture stunning photos.',
        'instructor' => 'Emily Davis',
        'category' => 'Photography',
        'price' => 1299,
        'original_price' => 2199,
        'duration' => '15 hours',
        'lessons' => 50,
        'students' => 9876,
        'rating' => 4.7,
        'level' => 'Beginner',
        'image' => 'https://images.unsplash.com/photo-1452587925148-ce544e77e70d?w=500',
        'featured' => false
    ]
];

// Helper function to get featured courses
function getFeaturedCourses($courses) {
    return array_filter($courses, function($course) {
        return $course['featured'] === true;
    });
}

// Helper function to get courses by category
function getCoursesByCategory($courses, $category) {
    return array_filter($courses, function($course) use ($category) {
        return $course['category'] === $category;
    });
}

// Helper function to format price
function formatPrice($price) {
    return '₱' . number_format($price, 2);
}
?>