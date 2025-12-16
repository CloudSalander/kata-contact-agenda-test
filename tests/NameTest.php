<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Name;

class NameTest extends TestCase
{
    public function testNameCannotBeEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Name("");
    }

    public function testNameCannotExceed200Bytes(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Name(str_repeat("a", 201));
    }

    public function testValidName(): void
    {
        $name = new Name("Alice");
        $this->assertSame("Alice", (string)$name);
    }
}
