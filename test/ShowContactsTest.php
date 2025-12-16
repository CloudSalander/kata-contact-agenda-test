<?php 

use PHPUnit\Framework\TestCase;

class ShowContactsTest extends TestCase
{
    public function testShowContactsWhenAgendaIsEmpty()
    {
        $agenda = new Agenda();

        $contacts = $agenda->getContacts();

        $this->assertIsArray($contacts);
        $this->assertCount(0, $contacts);
    }

    public function testShowContactsWithOneContact()
    {
        $agenda = new Agenda();

        $contact = new Contact(
            new Name("John"),
            new Surname("Doe"),
            new Email("john@example.com"),
            new PhoneNumber("600123123")
        );

        $agenda->add($contact);

        $contacts = $agenda->getContacts();

        $this->assertCount(1, $contacts);
        $this->assertSame($contact, $contacts[0]);
    }

    public function testShowContactsWithMultipleContacts()
    {
        $agenda = new Agenda();

        $contact1 = new Contact(
            new Name("John"),
            new Surname("Doe"),
            new Email("john@example.com"),
            new PhoneNumber("600123123")
        );

        $contact2 = new Contact(
            new Name("Jane"),
            new Surname("Smith"),
            new Email("jane@example.com"),
            new PhoneNumber("600456456")
        );

        $agenda->add($contact1);
        $agenda->add($contact2);

        $contacts = $agenda->getContacts();

        $this->assertCount(2, $contacts);
        $this->assertSame($contact1, $contacts[0]);
        $this->assertSame($contact2, $contacts[1]);
    }

}
