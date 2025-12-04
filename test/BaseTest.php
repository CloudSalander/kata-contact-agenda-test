<?php 

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase {

    protected Agenda $agenda;

    protected function setUp(): void {
        $this->agenda = new Agenda();
    }
}