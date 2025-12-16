<?php
//Question for classrom: Can we divide more methods logic?
namespace App\Domain;

class Agenda {
    private array $contacts;
    const EXPORT_FILE_NAME = "contacts.txt";

    public function __construct() {
        $this->contacts = [];
    }

    public function add(Contact $contact): void {
       $this->contacts[] = $contact;
    }

    public function getContacts(): array {
        return $this->contacts;
    }

    public function removeContactById(int $contactIndex): void {
        unset($this->contacts[$contactIndex]);
        $this->contacts = array_values($this->contacts);
    }

    public function searchBySurname(string $surname): array {
       return array_filter($this->contacts, function(Contact $contact) use ($surname) {
            return str_contains($contact->getSurname(), $surname);
        });
    }
}

?>