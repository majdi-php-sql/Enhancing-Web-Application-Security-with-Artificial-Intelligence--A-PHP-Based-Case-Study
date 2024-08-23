<div class="secure-login-form">
    <h2><?php esc_html_e('Login', 'secure-login-system'); ?></h2>
    <form method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
        <input type="hidden" name="action" value="secure_login_user">
        <input type="text" name="user_login" placeholder="<?php esc_attr_e('Username', 'secure-login-system'); ?>" required>
        <input type="password" name="user_password" placeholder="<?php esc_attr_e('Password', 'secure-login-system'); ?>" required>
        <button type="submit"><?php esc_html_e('Login', 'secure-login-system'); ?></button>
    </form>
</div>
