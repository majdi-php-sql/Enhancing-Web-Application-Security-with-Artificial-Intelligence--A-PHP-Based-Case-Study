<?php
/**
 * ==========================================================
 * Author: Majdi M. S. Awad
 * Author Website: https://github.com/majdi-php-sql?tab=repositories
 * App Website: https://github.com/majdi-php-sql?tab=repositories
 * Author Email: majdiawad.php@gmail.com
 * Address: Abu Dhabi, UAE
 * License: MIT
 * ==========================================================
 *
 * Description:
 * This script is part of a series of applications and tools developed by Majdi M. S. Awad. 
 * It is designed and implemented with a focus on robust functionality, security, and 
 * user-friendly design. The script is distributed under the MIT License, allowing 
 * for free usage, modification, and distribution, provided that the original author 
 * is credited.
 *
 * Usage:
 * Users are encouraged to explore, modify, and integrate this script into their projects. 
 * Please refer to the included documentation for detailed instructions and examples on 
 * how to utilize this script effectively.
 *
 * Disclaimer:
 * While every effort has been made to ensure the reliability and accuracy of this script, 
 * it is provided "as is" without warranty of any kind. The author is not liable for any 
 * damages or issues arising from the use of this script.
 *
 * ==========================================================
 */
 
// I developed the OTP verification logic with secure practices.

require_once '../config/config.php';
require_once '../utils/security.php';
require_once '../utils/email.php';
require_once '../utils/logger.php';

function generate_otp() {
    // I generated a random 6-digit OTP code.
    return rand(100000, 999999);
}

function send_otp($email, $otp_code) {
    // I sent the OTP code to the user's email.
    $subject = "Your OTP Code";
    $message = "Your OTP code is: " . $otp_code;
    return send_email($email, $subject, $message);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // I sanitized and validated the input.
    $email = sanitize_input($_POST['email']);

    // I generated the OTP and sent it to the user.
    $otp_code = generate_otp();
    $otp_expiry = date("Y-m-d H:i:s", strtotime("+15 minutes"));

    try {
        // I updated the user with the OTP code and expiry.
        $stmt = $pdo->prepare("UPDATE users SET otp_code = :otp_code, otp_expiry = :otp_expiry WHERE email = :email");
        $stmt->bindParam(':otp_code', $otp_code);
        $stmt->bindParam(':otp_expiry', $otp_expiry);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if (send_otp($email, $otp_code)) {
            log_access("OTP sent successfully to: " . $email);
            header('Location: otp_verification.php');
        } else {
            log_error("Failed to send OTP to: " . $email);
            die('Failed to send OTP.');
        }
    } catch (PDOException $e) {
        log_error("OTP generation error: " . $e->getMessage());
        die('OTP generation failed.');
    }
}
?>
