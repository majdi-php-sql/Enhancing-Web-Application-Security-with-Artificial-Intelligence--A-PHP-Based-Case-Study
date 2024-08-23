<?php
namespace Majdi\SecureLogin\Helper;

// I developed this helper class to provide utility functions for security checks
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_SECURE_LOGIN = 'security/secure_login/';

    public function isSecureLoginEnabled()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SECURE_LOGIN . 'enabled',
            ScopeInterface::SCOPE_STORE
        );
    }
}
?>
