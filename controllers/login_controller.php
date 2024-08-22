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
 
// I developed the login logic with secure practices.

require_once '../config/config.php';
require_once '../utils/validation.php';
require_once '../utils/security.php';
require_once '../utils/logger.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // I sanitized and validated the inputs.
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);
    $csrf_token = sanitize_input($_POST['csrf_token']);

    // I ensured the CSRF token is valid.
    if (!validate_csrf_token($csrf_token)) {
        log_error("CSRF token validation failed for login.");
        die('CSRF token validation failed.');
    }

    try {
        // I fetched the user from the database securely.
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // I verified the password securely.
        if ($user && verify_password($password, $user['password'])) {
            // I started a secure session.
            $_SESSION['user_id'] = $user['id'];
            regenerate_session(); // I regenerated the session ID for security.

            log_access("User logged in successfully: " . $username);
            header('Location: dashboard.php');
        } else {
            log_error("Invalid login attempt for user: " . $username);
            die('Invalid username or password.');
        }
    } catch (PDOException $e) {
        log_error("Login error: " . $e->getMessage());
        die('Login failed.');
    }
}
?>
