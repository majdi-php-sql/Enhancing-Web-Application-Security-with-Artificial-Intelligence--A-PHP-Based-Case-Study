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
 
// I developed a custom session handler to enhance session security.

function open_session($save_path, $session_name) {
    // I used the default session open function.
    return true;
}

function close_session() {
    // I used the default session close function.
    return true;
}

function read_session($session_id) {
    // I implemented secure session reading from the database.
    global $pdo;
    $stmt = $pdo->prepare("SELECT data FROM sessions WHERE session_id = :session_id");
    $stmt->bindParam(':session_id', $session_id);
    $stmt->execute();
    $session = $stmt->fetchColumn();
    return $session ? $session : '';
}

function write_session($session_id, $data) {
    // I securely wrote session data to the database.
    global $pdo;
    $stmt = $pdo->prepare("REPLACE INTO sessions (session_id, data) VALUES (:session_id, :data)");
    $stmt->bindParam(':session_id', $session_id);
    $stmt->bindParam(':data', $data);
    return $stmt->execute();
}

function destroy_session($session_id) {
    // I securely destroyed session data.
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM sessions WHERE session_id = :session_id");
    $stmt->bindParam(':session_id', $session_id);
    return $stmt->execute();
}

function gc_session($max_lifetime) {
    // I implemented garbage collection for expired sessions.
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM sessions WHERE last_activity < :time");
    $time = time() - $max_lifetime;
    $stmt->bindParam(':time', $time);
    return $stmt->execute();
}

// I set the custom session handler functions.
session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'gc_session');

?>
