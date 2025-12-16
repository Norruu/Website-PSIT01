<?php
// Site Configuration
define('SITE_NAME', 'PSIT01');
define('SITE_URL', 'http://localhost/PSIT01');
define('SITE_DESCRIPTION', 'Learn and grow with online courses focusing on PSIT01');

// Navigation Menu Items
$nav_items = [
    ['name' => 'Home', 'url' => 'index.php'],
    ['name' => 'About', 'url' => 'about. php'],
    ['name' => 'Courses', 'url' => 'courses.php'],
    ['name' => 'Contact', 'url' => 'contact.php'],
];

// Helper function to check if current page is active
function isActive($page) {
    $current_page = basename($_SERVER['PHP_SELF']);
    return $current_page === $page ?  'active' : '';
}
?>