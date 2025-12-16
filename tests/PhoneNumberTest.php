<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\PhoneNumber;

class PhoneNumberTest extends TestCase
{
    public function testInvalidPhoneNumberThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new PhoneNumber("abc123");
    }

    public function testValidPhoneNumber(): void
    {
        $phone = new PhoneNumber("600123123");
        $this->assertSame("600123123", (string)$phone);
    }
}
