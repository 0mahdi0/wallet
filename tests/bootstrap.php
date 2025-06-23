<?php
// Set flag to prevent automatic plugin initialization
define('WALLET_TESTS', true);

// Stub minimal wallet parent class
if (!class_exists('wallet')) {
    class wallet {}
}

// Stub WordPress functions used by validation methods
if (!function_exists('is_email')) {
    function is_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

if (!function_exists('email_exists')) {
    function email_exists($email) {
        return in_array($email, $GLOBALS['existing_emails'] ?? [], true);
    }
}

require __DIR__ . '/../forntend/main-forntend.class.php';

class TestableForntendUser extends forntend_user {
    public function __construct() {}
    public function validateEmailPassword($email, $password) {
        return $this->wp_wu_validate_email_password($email, $password);
    }
    public function validateRegister($first, $last, $email, $password) {
        return $this->wp_wu_validate_register($first, $last, $email, $password);
    }
}
