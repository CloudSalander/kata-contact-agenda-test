<?php

use App\Tests\BaseTest;

class RemoveContactTest extends BaseTest {

    public function testRemoveContactWhenRightId() {
        $agenda = $this->createAgenda();
        $contact = $this->createContact(
            "Pepe",
            "Lopez",
            "pepe@pepe.com",
            "600123123"
        );

        $agenda->add($contact);
        $rightId = 0; //We only have 1 contact

        $agenda->removeContactById($rightId);
        $this->assertCount(0, $agenda->getContacts());       //Empty agenda!
    }

    public function testCantRemoveContactWhenWrongId() {
        $agenda = $this->createAgenda();
        $contact = $this->createContact(
            "Pepe",
            "Lopez",
            "pepe@pepe.com",
            "600123123"
        );

        $agenda->add($contact);
        $wrongId = 1; 

        $agenda->removeContactById($wrongId);
        $this->assertCount(1, $agenda->getContacts());       //Empty agenda!
    }

    public function testCantRemoveWhenEmptyContactList() {
        $agenda = $this->createAgenda();
        $contacts = $agenda->getContacts();
        $contactId = 0;
        $this->assertEmpty($contacts);
        $agenda->removeContactById($contactId);
        $this->assertEmpty($contacts);     
    }

}