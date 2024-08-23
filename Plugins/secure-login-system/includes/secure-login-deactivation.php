<?php
// Plugin deactivation functions
function secure_login_deactivate() {
    // Optionally, drop custom database tables
    global $wpdb;
    $table_name = $wpdb->prefix . 'secure_users';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");

    // Remove plugin options
    delete_option('secure_login_ai_model');
    delete_option('secure_login_security_level');
}
