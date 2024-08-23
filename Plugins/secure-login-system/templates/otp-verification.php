<div class="secure-login-form">
    <h2><?php esc_html_e('OTP Verification', 'secure-login-system'); ?></h2>
    <form method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
        <input type="hidden" name="action" value="secure_verify_otp">
        <input type="text" name="otp_code" placeholder="<?php esc_attr_e('Enter OTP', 'secure-login-system'); ?>" required>
        <button type="submit"><?php esc_html_e('Verify OTP', 'secure-login-system'); ?></button>
    </form>
</div>
