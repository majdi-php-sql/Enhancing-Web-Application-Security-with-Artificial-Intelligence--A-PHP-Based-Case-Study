# Registration and Login Management System

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/php-%3E%3D7.4-blue.svg)
![AI Security](https://img.shields.io/badge/AI-Security-green.svg)

---

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Directory Structure](#directory-structure)
- [Configuration](#configuration)
- [Usage](#usage)
- [Security Mechanisms](#security-mechanisms)
  - [SQL Injection Prevention](#sql-injection-prevention)
  - [Cross-Site Scripting (XSS) and Cross-Site Request Forgery (CSRF) Prevention](#cross-site-scripting-xss-and-cross-site-request-forgery-csrf-prevention)
  - [Secure Session Management](#secure-session-management)
  - [AI-Enhanced Access Control and Authentication](#ai-enhanced-access-control-and-authentication)
  - [Input Validation and Sanitization](#input-validation-and-sanitization)
- [AI Integration](#ai-integration)
- [Security Testing](#security-testing)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## Introduction

I developed this **Registration and Login Management System** with a focus on security, utilizing advanced PHP techniques and integrating AI-based models for real-time threat detection and prevention. This system is designed to be both robust and user-friendly, ensuring that users can safely register, log in, and manage their accounts while being protected from various cyber threats.

---

## Features

- **Secure Registration and Login**: Implements best practices for user authentication and password management.
- **AI-Enhanced Security**: Uses AI models for real-time threat detection, preventing unauthorized access and suspicious activities.
- **SQL Injection Protection**: Safeguards against SQL injection attacks through prepared statements and input validation.
- **XSS and CSRF Prevention**: Protects against cross-site scripting and cross-site request forgery attacks using modern PHP techniques.
- **Secure Session Management**: Custom session handling for enhanced security.
- **Logging and Monitoring**: Tracks user activities and potential security threats with detailed logs.

---

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- XAMPP or any local server environment
- [PHP-ML](https://github.com/php-ai/php-ml) library

---

## Installation

1. **Clone the Repository**
    ```bash
    git clone https://github.com/majdi-php-sql/registration-login-system.git
    ```
2. **Navigate to the Project Directory**
    ```bash
    cd registration-login-system
    ```
3. **Install Dependencies**
    ```bash
    composer install
    ```
4. **Set Up the Database**
    - Create a database in MySQL.
    - Import the provided SQL file located in the `/sql/` directory.
    - Configure database credentials in `config/config.php`.

---

## Directory Structure

```plaintext
/registration-login-system/
|-- /ai/
|   |-- ai_security.php               # AI-based security enhancements (PHP-ML integration)
|-- /assets/
|   |-- /css/
|       |-- style.css                 # Custom CSS for frontend styling
|   |-- /js/
|       |-- scripts.js                # JavaScript for client-side validation and security
|-- /config/
|   |-- config.php                    # Database and application configuration
|-- /logs/
|   |-- access.log                    # Logs for tracking access attempts
|   |-- error.log                     # Logs for error tracking
|-- /sessions/
|   |-- session_handler.php           # Custom session management
|-- /templates/
|   |-- header.php                    # Common header template
|   |-- footer.php                    # Common footer template
|-- /views/
|   |-- dashboard.php                 # User dashboard based on role
|   |-- login.php                     # Login page
|   |-- register.php                  # Registration page
|   |-- otp_verification.php          # OTP verification page
|   |-- error.php                     # Error handling page
|-- /controllers/
|   |-- login_controller.php          # Login logic
|   |-- register_controller.php       # Registration logic
|   |-- otp_controller.php            # OTP verification logic
|-- /utils/
|   |-- validation.php                # Input validation functions
|   |-- security.php                  # Security functions (hashing, CSRF tokens, etc.)
|   |-- email.php                     # Email functions (sending OTPs, etc.)
|   |-- encryption.php                # Encryption functions for sensitive data
|   |-- logger.php                    # Logging functions
|-- /models/
|   |-- train_model.php               # AI model training script
|   |-- security_model.phpml          # AI model for security
|-- index.php                         # Main entry point
|-- .htaccess                         # Apache configuration for security (e.g., URL rewriting, file access restrictions)
```

---

## Configuration

1. **Database Configuration**: Edit the `config/config.php` file to include your database credentials.
2. **Environment Configuration**: Customize settings in `.htaccess` to fine-tune the security measures and environment settings.

---

## Usage

- **Accessing the Application**: Navigate to `http://localhost/registration-login-system/` in your browser.
- **User Registration**: Users can sign up using the registration page.
- **Login and Authentication**: Implemented with secure password hashing and AI-enhanced anomaly detection.
- **OTP Verification**: Two-factor authentication using OTP verification.

---

## Security Mechanisms

### SQL Injection Prevention

I used prepared statements and parameterized queries throughout the application to prevent SQL injection attacks. This method ensures that user inputs are never directly included in SQL queries, thereby mitigating the risk of injection vulnerabilities.

### Cross-Site Scripting (XSS) and Cross-Site Request Forgery (CSRF) Prevention

I implemented output escaping and input sanitization techniques to prevent XSS attacks. Additionally, CSRF tokens are generated and validated for every form submission to prevent unauthorized requests.

### Secure Session Management

The application uses custom session management that stores session data in a secure directory, ensures session IDs are regenerated frequently, and enforces strict session cookie settings.

### AI-Enhanced Access Control and Authentication

I developed an AI model that continuously monitors user behavior for anomalies. If suspicious activity is detected, the AI model triggers an immediate response to block the potential threat.

### Input Validation and Sanitization

I validated and sanitized all user inputs using custom validation functions to ensure that only safe data is processed by the application. This prevents common vulnerabilities like SQL injection and XSS.

---

## AI Integration

The AI model integrated into the system uses the PHP-ML library to analyze user behavior patterns. This model is trained to detect anomalies, enhancing the security of the authentication process by providing real-time threat detection and prevention.

---

## Security Testing

I conducted comprehensive security testing to evaluate the effectiveness of the implemented security mechanisms. This included testing for SQL injection, XSS, CSRF, and session hijacking vulnerabilities. The results confirmed that the system is robust against common web security threats.

---

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Contact

For any questions or support, please contact me at:

- **Email**: [majdiawad.php@gmail.com](mailto:majdiawad.php@gmail.com)
- **GitHub**: [https://github.com/majdi-php-sql](https://github.com/majdi-php-sql)

---

Thank you for using this Registration and Login Management System. Your contributions and feedback are always welcome!
