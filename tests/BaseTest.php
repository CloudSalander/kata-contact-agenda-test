<?php 
//TODO: Better testing files order
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\Agenda;
use App\Domain\Contact;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Surname;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\PhoneNumber;

abstract class BaseTest extends TestCase {
    protected Agenda $agenda;

    protected function createContact(string $name,string $surname,string $email,string $phone): Contact {
        return new Contact(
            new Name($name),
            new Surname($surname),
            new Email($email),
            new PhoneNumber($phone)
        );
    }

    protected function createAgenda(): Agenda {
        return new Agenda();
    }

}