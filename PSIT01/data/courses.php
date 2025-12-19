<?php
/**
 * Course Data Functions - Now using Database
 */

// Include database connection
require_once __DIR__ . '/../db/db.php';

/**
 * Get all courses from database
 */
function getAllCourses() {
    return fetchAll("SELECT * FROM courses ORDER BY created_at DESC");
}

/**
 * Get course by ID
 */
function getCourseById($id) {
    return fetchOne("SELECT * FROM courses WHERE id = :id", ['id' => $id]);
}

/**
 * Get featured courses
 */
function getFeaturedCourses($courses = null) {
    // If courses array is passed (for backward compatibility)
    if ($courses !== null) {
        return array_filter($courses, function($course) {
            return $course['featured'] == 1;
        });
    }
    // Otherwise get from database
    return fetchAll("SELECT * FROM courses WHERE featured = 1 ORDER BY rating DESC LIMIT 3");
}

/**
 * Get courses by category
 */
function getCoursesByCategory($courses, $category) {
    // If courses array is passed (for backward compatibility)
    if (is_array($courses)) {
        return array_filter($courses, function($course) use ($category) {
            return $course['category'] === $category;
        });
    }
    // Otherwise get from database
    return fetchAll("SELECT * FROM courses WHERE category = :category", ['category' => $category]);
}

/**
 * Search courses
 */
function searchCourses($search) {
    $search = "%$search%";
    return fetchAll(
        "SELECT * FROM courses 
         WHERE title LIKE : search 
         OR description LIKE :search2 
         OR instructor LIKE : search3",
        ['search' => $search, 'search2' => $search, 'search3' => $search]
    );
}

/**
 * Filter and sort courses
 */
function filterCourses($search = '', $category = '', $sort = '') {
    $sql = "SELECT * FROM courses WHERE 1=1";
    $params = [];
    
    // Apply search filter
    if (! empty($search)) {
        $sql .= " AND (title LIKE :search OR description LIKE : search OR instructor LIKE :search)";
        $params['search'] = "%$search%";
    }
    
    // Apply category filter
    if (!empty($category)) {
        $sql .= " AND category = :category";
        $params['category'] = $category;
    }
    
    // Apply sorting
    switch($sort) {
        case 'price_low':
            $sql .= " ORDER BY price ASC";
            break;
        case 'price_high':
            $sql .= " ORDER BY price DESC";
            break;
        case 'rating':
            $sql .= " ORDER BY rating DESC";
            break;
        case 'popular':
            $sql .= " ORDER BY students DESC";
            break;
        default:
            $sql .= " ORDER BY created_at DESC";
    }
    
    return fetchAll($sql, $params);
}

/**
 * Get all unique categories
 */
function getAllCategories() {
    return fetchAll("SELECT DISTINCT category FROM courses ORDER BY category");
}

/**
 * Get categories from categories table
 */
function getCategoriesWithIcons() {
    return fetchAll("SELECT * FROM categories ORDER BY name");
}

/**
 * Format price helper
 */
function formatPrice($price) {
    return '₱' . number_format($price, 2);
}

/**
 * Calculate discount percentage
 */
function calculateDiscount($original_price, $price) {
    if ($original_price > $price) {
        return round((($original_price - $price) / $original_price) * 100);
    }
    return 0;
}

// For backward compatibility, get all courses into $courses variable
$courses = getAllCourses();
?>