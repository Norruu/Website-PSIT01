<?php

// Calculate discount percentage
$discount = 0;
if ($course['original_price'] > $course['price']) {
    $discount = round((($course['original_price'] - $course['price']) / $course['original_price']) * 100);
}
?>

<div class="bg-white rounded-lg shadow-md overflow-hidden card-hover animate-on-scroll">
    <!-- Course Image -->
    <div class="relative">
        <img src="<?php echo $course['image']; ?>" 
             alt="<?php echo $course['title']; ?>" 
             class="w-full h-48 object-cover">
        
        <?php if ($discount > 0): ?>
            <span class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                -<?php echo $discount; ?>%
            </span>
        <?php endif; ?>
        
        <span class="absolute top-2 left-2 bg-violet-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
            <?php echo $course['level']; ?>
        </span>
    </div>
    
    <!-- Course Content -->
    <div class="p-5">
        <!-- Category -->
        <p class="text-sm text-primary font-semibold mb-2">
            <i class="fas fa-tag"></i> <?php echo $course['category']; ?>
        </p>
        
        <!-- Title -->
        <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">
            <?php echo $course['title']; ?>
        </h3>
        
        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            <?php echo $course['description']; ?>
        </p>
        
        <!-- Instructor -->
        <p class="text-sm text-gray-500 mb-3">
            <i class="fas fa-user-tie"></i> <?php echo $course['instructor']; ?>
        </p>
        
        <!-- Course Stats -->
        <div class="flex items-center gap-4 text-xs text-gray-500 mb-4">
            <span>
                <i class="fas fa-clock"></i> <?php echo $course['duration']; ?>
            </span>
            <span>
                <i class="fas fa-book"></i> <?php echo $course['lessons']; ?> lessons
            </span>
            <span>
                <i class="fas fa-user-graduate"></i> <?php echo number_format($course['students']); ?>
            </span>
        </div>
        
        <!-- Rating -->
        <div class="flex items-center mb-4">
            <span class="text-yellow-400 mr-1">
                <?php 
                // Display star rating
                $fullStars = floor($course['rating']);
                $halfStar = ($course['rating'] - $fullStars) >= 0.5;
                
                for ($i = 0; $i < $fullStars; $i++) {
                    echo '<i class="fas fa-star"></i>';
                }
                if ($halfStar) {
                    echo '<i class="fas fa-star-half-alt"></i>';
                }
                ?>
            </span>
            <span class="text-gray-700 font-semibold ml-1"><?php echo $course['rating']; ?></span>
        </div>
        
        <!-- Price & CTA -->
        <div class="flex items-center justify-between">
            <div>
                <span class="text-2xl font-bold text-primary">
                    <?php echo formatPrice($course['price']); ?>
                </span>
                <?php if ($discount > 0): ?>
                    <span class="text-sm text-gray-400 line-through ml-2">
                        <?php echo formatPrice($course['original_price']); ?>
                    </span>
                <?php endif; ?>
            </div>
            <a href="course-detail.php?id=<?php echo $course['id']; ?>" 
               class="bg-violet-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm font-semibold">
                View Course
            </a>
        </div>
    </div>
</div>