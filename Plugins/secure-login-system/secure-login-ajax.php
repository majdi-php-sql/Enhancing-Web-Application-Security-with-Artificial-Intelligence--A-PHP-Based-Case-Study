<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// AJAX handler for secure login
function secure_login_ajax_handler() {
    check_ajax_referer('secure_login_nonce', 'security');

    $username = sanitize_user($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    // Check credentials
    $user = wp_authenticate($username, $password);
    
    if (is_wp_error($user)) {
        wp_send_json_error(['message' => __('Invalid username or password', 'secure-login-system')]);
    } else {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        wp_send_json_success(['message' => __('Login successful', 'secure-login-system')]);
    }

    wp_die();
}
add_action('wp_ajax_secure_login', 'secure_login_ajax_handler');
add_action('wp_ajax_nopriv_secure_login', 'secure_login_ajax_handler');
