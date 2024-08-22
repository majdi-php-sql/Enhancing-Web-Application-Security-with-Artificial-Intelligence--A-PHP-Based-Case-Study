<?php
// Require Composer's autoload file
require_once 'C:/xampp/htdocs/registration-login-system/vendor/autoload.php';

// Use the necessary classes from PHP-ML
use Phpml\Classification\SVM;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\ModelManager;

// Sample data and labels
$samples = [
    ['192.168.1.1', 'Mozilla/5.0', 'session123'],
    ['192.168.1.2', 'Mozilla/5.0', 'session124'],
    ['192.168.1.3', 'Chrome/90.0', 'session125'],
    ['192.168.1.4', 'Safari/13.1', 'session126'],
    ['10.0.0.1', 'Mozilla/5.0', 'sessionX'],
    ['8.8.8.8', 'Unknown', 'sessionY'],
    ['123.123.123.123', 'SuspiciousAgent/1.0', 'sessionZ'],
    ['10.0.0.2', 'Chrome/90.0', 'sessionABC'],
];

$labels = [
    'normal',
    'normal',
    'normal',
    'normal',
    'anomaly',
    'anomaly',
    'anomaly',
    'anomaly',
];

// Create an SVM classifier with a linear kernel
$classifier = new SVM(Kernel::LINEAR, $cost = 1000);
$classifier->train($samples, $labels);

// Save the trained model
$modelManager = new ModelManager();
$modelPath = 'C:/xampp/htdocs/registration-login-system/models/security_model.phpml';
$modelManager->saveToFile($classifier, $modelPath);

echo 'Security model trained and saved successfully at ' . $modelPath;
?>
