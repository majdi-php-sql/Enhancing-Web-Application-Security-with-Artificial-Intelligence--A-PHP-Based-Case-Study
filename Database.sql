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

-- I created a SQL script for creating the necessary tables for the system.

CREATE DATABASE registration_login_system;

USE registration_login_system;

-- I developed a users table to store user information, ensuring strong security by encrypting sensitive data.
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    encrypted_email TEXT NOT NULL,  -- I added an encrypted email field for added security.
    otp_code VARCHAR(6),
    otp_expiry DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- I developed a sessions table to manage user sessions securely.
CREATE TABLE sessions (
    session_id VARCHAR(255) PRIMARY KEY,
    user_id INT,
    last_activity TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- I developed a logs table to track access and error logs.
CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    log_type ENUM('access', 'error') NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
