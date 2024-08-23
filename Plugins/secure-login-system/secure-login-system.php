<?php
/*
Plugin Name: Secure Login System
Description: A comprehensive security plugin for WordPress, providing advanced AI-based threat detection, secure login, and data protection.
Version: 1.0.0
Author: Majdi M. S. Awad
Author URI: https://github.com/majdi-php-sql/
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include required files
require_once(plugin_dir_path(__FILE__) . 'secure-login-ajax.php');

// Register admin menu
function secure_login_add_admin_menu() {
    add_menu_page(
        __('Secure Login Settings', 'secure-login-system'),  // Page title
        __('Secure Login', 'secure-login-system'),           // Menu title
        'manage_options',                                    // Capability
        'secure-login-system',                               // Menu slug
        'secure_login_settings_page',                        // Function to display the page content
        'dashicons-shield-alt',                              // Icon URL
        110                                                  // Position
    );
}
add_action('admin_menu', 'secure_login_add_admin_menu');

// Define the settings page
function secure_login_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Secure Login Settings', 'secure-login-system'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('secure_login_settings_group');
            do_settings_sections('secure-login-system');
            submit_button(__('Save Settings', 'secure-login-system'));
            ?>
        </form>
    </div>
    <?php
}

// Register settings
function secure_login_register_settings() {
    // Registering security options
    register_setting('secure_login_settings_group', 'enable_ai_threat_detection');
    register_setting('secure_login_settings_group', 'enable_secure_sessions');
    register_setting('secure_login_settings_group', 'enforce_strong_passwords');
    
    // Adding sections and fields
    add_settings_section(
        'secure_login_security_settings',
        __('Security Settings', 'secure-login-system'),
        null,
        'secure-login-system'
    );

    add_settings_field(
        'enable_ai_threat_detection',
        __('Enable AI-based Threat Detection', 'secure-login-system'),
        'secure_login_ai_threat_detection_callback',
        'secure-login-system',
        'secure_login_security_settings'
    );

    add_settings_field(
        'enable_secure_sessions',
        __('Enable Secure Session Management', 'secure-login-system'),
        'secure_login_secure_sessions_callback',
        'secure-login-system',
        'secure_login_security_settings'
    );

    add_settings_field(
        'enforce_strong_passwords',
        __('Enforce Strong Password Policy', 'secure-login-system'),
        'secure_login_strong_passwords_callback',
        'secure-login-system',
        'secure_login_security_settings'
    );
}

add_action('admin_init', 'secure_login_register_settings');

// Callback functions for settings fields
function secure_login_ai_threat_detection_callback() {
    $option = get_option('enable_ai_threat_detection');
    ?>
    <input type="checkbox" name="enable_ai_threat_detection" value="1" <?php checked(1, $option, true); ?> />
    <label><?php _e('Enable or disable AI-based threat detection', 'secure-login-system'); ?></label>
    <?php
}

function secure_login_secure_sessions_callback() {
    $option = get_option('enable_secure_sessions');
    ?>
    <input type="checkbox" name="enable_secure_sessions" value="1" <?php checked(1, $option, true); ?> />
    <label><?php _e('Enable or disable secure session management', 'secure-login-system'); ?></label>
    <?php
}

function secure_login_strong_passwords_callback() {
    $option = get_option('enforce_strong_passwords');
    ?>
    <input type="checkbox" name="enforce_strong_passwords" value="1" <?php checked(1, $option, true); ?> />
    <label><?php _e('Enforce strong passwords for user accounts', 'secure-login-system'); ?></label>
    <?php
}
