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
 
// I developed the registration logic with secure practices.

require_once '../config/config.php';
require_once '../utils/validation.php';
require_once '../utils/security.php';
require_once '../utils/encryption.php';
require_once '../utils/logger.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // I sanitized and validated the inputs.
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $csrf_token = sanitize_input($_POST['csrf_token']);

    // I ensured the CSRF token is valid.
    if (!validate_csrf_token($csrf_token)) {
        log_error("CSRF token validation failed for registration.");
        die('CSRF token validation failed.');
    }

    // I validated the username and email.
    if (!validate_username($username) || !validate_email($email)) {
        log_error("Invalid username or email during registration.");
        die('Invalid username or email.');
    }

    // I hashed the password for secure storage.
    $hashed_password = hash_password($password);

    // I encrypted the email for added security.
    $encrypted_email = encrypt_data($email, $encryption_key);

    try {
        // I inserted the user data securely into the database.
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, encrypted_email) VALUES (:username, :email, :password, :encrypted_email)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':encrypted_email', $encrypted_email);
        $stmt->execute();

        log_access("User registered successfully: " . $username);
        header('Location: login.php');
    } catch (PDOException $e) {
        log_error("Registration error: " . $e->getMessage());
        die('Registration failed.');
    }
}
?>
