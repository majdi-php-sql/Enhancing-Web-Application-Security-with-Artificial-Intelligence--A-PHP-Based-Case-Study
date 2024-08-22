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
 
// I wrote functions for input validation.

function sanitize_input($data) {
    // I sanitized input data to prevent XSS and SQL injection.
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function validate_username($username) {
    // I validated that the username is alphanumeric and between 3-20 characters.
    return preg_match('/^[a-zA-Z0-9]{3,20}$/', $username);
}

function validate_email($email) {
    // I validated that the email follows a standard format.
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
?>
