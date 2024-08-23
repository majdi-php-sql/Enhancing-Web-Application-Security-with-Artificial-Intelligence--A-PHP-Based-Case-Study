<?php
defined('_JEXEC') or die;

if (!JSession::checkToken('get')) {
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(['error' => 'Invalid token']);
    exit;
}

require_once JPATH_ROOT . '/plugins/system/secure_login_system/helper.php';

$input = JFactory::getApplication()->input->get('user_input', '', 'STRING');
$sanitizedInput = SecureLoginHelper::validateInput($input);

// Proceed with secure operations
?>
