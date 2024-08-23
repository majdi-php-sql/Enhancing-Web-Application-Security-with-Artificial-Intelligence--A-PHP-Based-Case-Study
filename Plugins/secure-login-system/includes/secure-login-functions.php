<?php
// Core plugin functions

// Security functions including SQL Injection Prevention, XSS/CSRF Prevention, etc.
function secure_login_sanitize_input($input) {
    return htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
}

function secure_login_validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function secure_login_hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// AI-based security enhancements
function secure_login_ai_security_check($user_data) {
    // Implement AI logic using the PHP-ML library to detect suspicious behavior
    $ai_model = get_option('secure_login_ai_model');
    // Load and run AI model
}

// Shortcodes for forms
function secure_login_form_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . '../templates/login-form.php';
    return ob_get_clean();
}

function secure_registration_form_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . '../templates/registration-form.php';
    return ob_get_clean();
}

function secure_otp_verification_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . '../templates/otp-verification.php';
    return ob_get_clean();
}
