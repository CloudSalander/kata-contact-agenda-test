<?php
//Question for classrom: Can we divide more methods logic?
include('Contact.php');

class Agenda {
    private array $contacts;

    const REMOVE_MSG  = "Contact to remove?(select contact index number)";
    //Note: Searching by surname is totally arbitry decision
    const SEARCH_MSG = "Enter surname to search";
    //Note: Could be .txt or json...whatever.
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

    public function searchContacts(): void {
        $toSearch = readline(self::SEARCH_MSG);
        foreach($this->contacts as $contact) {
            if(str_contains($contact->getSurname(), $toSearch)) echo $contact;
        }
    }

    public function exportContacts(): void {
        $exportFile = fopen(self::EXPORT_FILE_NAME,'w');
        foreach($this->contacts as $contact) {
            fwrite($exportFile,$contact);
        }
        fclose($exportFile);
    }

}

?>