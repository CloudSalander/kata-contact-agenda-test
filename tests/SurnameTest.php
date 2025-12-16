<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Surname;

class SurnameTest extends TestCase
{
    public function testSurnameCannotBeEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Surname("");
    }

    public function testSurnameCannotExceed200Bytes(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Surname(str_repeat("b", 201));
    }

    public function testValidSurname(): void
    {
        $surname = new Surname("Smith");
        $this->assertSame("Smith", (string)$surname);
    }
}
