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
 
// I developed logging functions to handle access and error logging.

function log_access($message) {
    // I implemented logging of access attempts for monitoring.
    file_put_contents(__DIR__ . '/../logs/access.log', date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
}

function log_error($message) {
    // I developed detailed error logging to track issues.
    file_put_contents(__DIR__ . '/../logs/error.log', date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
}
?>
