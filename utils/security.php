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
 
// I developed security functions for hashing, CSRF protection, and secure session handling.

function hash_password($password) {
    // I used password_hash with bcrypt for secure password storage.
    return password_hash($password, PASSWORD_BCRYPT);
}

function verify_password($password, $hashed_password) {
    // I imported password_verify for secure password comparison.
    return password_verify($password, $hashed_password);
}

function generate_csrf_token() {
    // I generated a secure CSRF token using bin2hex and random_bytes.
    return bin2hex(random_bytes(32));
}

function validate_csrf_token($token) {
    // I checked if the CSRF token is valid.
    return hash_equals($_SESSION['csrf_token'], $token);
}

function regenerate_session() {
    // I developed a function to regenerate session IDs to prevent session fixation.
    session_regenerate_id(true);
}

// I ensured that sessions are started securely.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    regenerate_session(); // I ensured that sessions are regenerated upon start.
}
?>
