<?php 
namespace App\Tests;

use App\Tests\BaseTest;

class ShowContactsTest extends BaseTest
{
    public function testShowContactsWhenAgendaIsEmpty()
    {
        $agenda = $this->createAgenda();

        $contacts = $agenda->getContacts();

        $this->assertIsArray($contacts);
        $this->assertCount(0, $contacts);
    }

    public function testShowContactsWithOneContact()
    {
        $agenda = $this->createAgenda();

        $contact = $this->createContact(
            "Pepe",
            "Lopez",
            "pepe@pepe.com",
            "600123123"
        );

        $agenda->add($contact);

        $contacts = $agenda->getContacts();

        $this->assertCount(1, $contacts);
        $this->assertSame($contact, $contacts[0]);
    }

    public function testShowContactsWithMultipleContacts()
    {

       $agenda = $this->createAgenda();

        $contact1 = $this->createContact(
            "Pepe",
            "Lopez",
            "pepe@pepe.com",
            "600123123"
        );

       $contact2 = $this->createContact(
            "Luisa",
            "López",
            "luisa@luisa.com",
            "600456456"
        );

        $agenda->add($contact1);
        $agenda->add($contact2);

        $contacts = $agenda->getContacts();

        $this->assertCount(2, $contacts);
        $this->assertSame($contact1, $contacts[0]);
        $this->assertSame($contact2, $contacts[1]);
    }

}
