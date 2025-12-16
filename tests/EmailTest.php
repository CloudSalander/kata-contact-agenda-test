<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Email;

class EmailTest extends TestCase
{
    public function testInvalidEmailThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email("not-an-email");
    }

    public function testValidEmail(): void
    {
        $email = new Email("alice@example.com");
        $this->assertSame("alice@example.com", (string)$email);
    }
}
