<?php
// Admin page content
function secure_login_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Secure Login Settings', 'secure-login-system'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('secure_login_options_group');
            do_settings_sections('secure-login-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function secure_login_register_settings() {
    add_settings_section('secure_login_section', __('AI Security Settings', 'secure-login-system'), null, 'secure-login-settings');

    add_settings_field('secure_login_ai_model', __('AI Model', 'secure-login-system'), 'secure_login_ai_model_callback', 'secure-login-settings', 'secure_login_section');
    register_setting('secure_login_options_group', 'secure_login_ai_model');

    add_settings_field('secure_login_security_level', __('Security Level', 'secure-login-system'), 'secure_login_security_level_callback', 'secure-login-settings', 'secure_login_section');
    register_setting('secure_login_options_group', 'secure_login_security_level');
}

function secure_login_ai_model_callback() {
    $ai_model = get_option('secure_login_ai_model');
    ?>
    <input type="text" name="secure_login_ai_model" value="<?php echo esc_attr($ai_model); ?>" />
    <?php
}

function secure_login_security_level_callback() {
    $security_level = get_option('secure_login_security_level');
    ?>
    <select name="secure_login_security_level">
        <option value="low" <?php selected($security_level, 'low'); ?>>Low</option>
        <option value="medium" <?php selected($security_level, 'medium'); ?>>Medium</option>
        <option value="high" <?php selected($security_level, 'high'); ?>>High</option>
    </select>
    <?php
}

add_action('admin_init', 'secure_login_register_settings');
