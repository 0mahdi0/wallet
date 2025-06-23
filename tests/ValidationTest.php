<?php
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    protected function setUp(): void
    {
        $GLOBALS['existing_emails'] = [];
        $this->validator = new TestableForntendUser();
    }

    public function test_validate_email_password_empty_fields()
    {
        $result = $this->validator->validateEmailPassword('', '');
        $this->assertFalse($result['is_valid']);
        $this->assertSame('ایمیل نمی تواند خالی باشد', $result['message']);
    }

    public function test_validate_email_password_invalid_email()
    {
        $result = $this->validator->validateEmailPassword('invalid', 'pass');
        $this->assertFalse($result['is_valid']);
        $this->assertSame('ایمیل وارد شده معتبر نمی باشد', $result['message']);
    }

    public function test_validate_register_required_fields()
    {
        $result = $this->validator->validateRegister('', '', '', '');
        $this->assertFalse($result['is_valid']);
        $this->assertSame('تمامی فیلد ها الزامی می باشد', $result['message']);
    }

    public function test_validate_register_duplicate_email()
    {
        $GLOBALS['existing_emails'] = ['test@example.com'];
        $result = $this->validator->validateRegister('John', 'Doe', 'test@example.com', 'pass');
        $this->assertFalse($result['is_valid']);
        $this->assertSame('این آدرس ایمیل در دسترس نمی باشد', $result['message']);
    }
}
