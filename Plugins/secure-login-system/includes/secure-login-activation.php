<?php
// Plugin activation functions
function secure_login_activate() {
    // Create custom database tables if needed
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . 'secure_users';
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_login varchar(60) NOT NULL,
        user_email varchar(100) NOT NULL,
        user_password varchar(255) NOT NULL,
        otp_code varchar(6) NOT NULL,
        user_role varchar(20) DEFAULT 'subscriber',
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Create options for AI security settings
    add_option('secure_login_ai_model', 'default');
    add_option('secure_login_security_level', 'high');
}
