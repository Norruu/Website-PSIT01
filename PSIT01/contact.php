<?php
// Include configuration
require_once 'config.php';

// Set page title
$page_title = 'Contact Us';

// Initialize variables
$success_message = '';
$error_message = '';

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    
    if (empty($subject)) {
        $errors[] = 'Subject is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    } elseif (strlen($message) < 10) {
        $errors[] = 'Message must be at least 10 characters';
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Here you would typically: 
        // 1. Send an email
        // 2. Save to database
        // 3. Send to CRM system
        
        // For now, we'll just show a success message
        $success_message = 'Thank you for contacting us! We\'ll get back to you soon.';
        
        // Clear form data
        $name = $email = $subject = $message = '';
    } else {
        $error_message = implode('<br>', $errors);
    }
}

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/nav.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-primary to-secondary text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Get In Touch</h1>
        <p class="text-xl text-gray-100">
            We'd love to hear from you! Send us a message and we'll respond as soon as possible.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm: px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="animate-on-scroll">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Contact Information</h2>
                <p class="text-gray-600 mb-8 text-lg">
                    Have questions?  We're here to help!  Reach out to us through any of the following channels.
                </p>
                
                <!-- Contact Details -->
                <div class="space-y-6">
                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="bg-primary text-white w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Email Us</h3>
                            <p class="text-gray-600">info@PSIT01.com</p>
                            <p class="text-gray-600">support@PSIT01.com</p>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-start">
                        <div class="bg-secondary text-white w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Call Us</h3>
                            <p class="text-gray-600">+63 (2) 123-4567</p>
                            <p class="text-gray-600">+63 917 123 4567</p>
                        </div>
                    </div>
                    
                    <!-- Location -->
                    <div class="flex items-start">
                        <div class="bg-accent text-white w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Visit Us</h3>
                            <p class="text-gray-600">Brgy. Camingawan,</p>
                            <p class="text-gray-600">Kabankalan City, Negros Occidental</p>
                            <p class="text-gray-600">Philippines</p>
                        </div>
                    </div>
                    
                    <!-- Hours -->
                    <div class="flex items-start">
                        <div class="bg-green-500 text-white w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Business Hours</h3>
                            <p class="text-gray-600">Monday - Friday: 9: 00 AM - 6:00 PM</p>
                            <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                            <p class="text-gray-600">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="font-semibold text-gray-800 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-200 hover:bg-primary hover:text-white w-12 h-12 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="bg-gray-200 hover:bg-primary hover:text-white w-12 h-12 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="bg-gray-200 hover:bg-primary hover:text-white w-12 h-12 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="bg-gray-200 hover:bg-primary hover:text-white w-12 h-12 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg animate-on-scroll">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                
                <!-- Success Message -->
                <?php if ($success_message): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-check-circle mr-2"></i>
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Error Messages -->
                <?php if ($error_message): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Form -->
                <form method="POST" action="" class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="<?php echo $name ??  ''; ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus: ring-2 focus:ring-primary"
                               placeholder="Juan Dela Cruz"
                               required>
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="<?php echo $email ?? ''; ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="juan@example.com"
                               required>
                    </div>
                    
                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-gray-700 font-semibold mb-2">
                            Subject <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               value="<?php echo $subject ?? ''; ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="Course Inquiry"
                               required>
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-gray-700 font-semibold mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="5"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus: ring-primary"
                                  placeholder="Tell us more about your inquiry..."
                                  required><?php echo $message ?? ''; ?></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>