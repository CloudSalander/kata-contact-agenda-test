<?php

namespace App\Tests;

use App\Tests\BaseTest;
class AddContactTest extends BaseTest
{
    public function testAddContactHappyPath(): void
    {
        $agenda = $this->createAgenda();

        $contact = $this->createContact(
            "John",
            "Doe",
            "john@example.com",
            "600123123"
        );

        $agenda->add($contact);

        $contacts = $agenda->getContacts();

        $this->assertCount(1, $contacts);
        $this->assertSame($contact, $contacts[0]);
    }
    
}