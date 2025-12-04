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

    public function createContact(): void {
       $this->contacts[] = new Contact();
    }

    public function showContacts(): void {
        foreach($this->contacts as $index => $contact) {
            echo $index.": ".$contact;
        }
    }

    public function removeContact(): void {
        $this->showContacts();
        $contactId = readline(self::REMOVE_MSG.PHP_EOL);
        if($this->isValidContactId($contactId)) {
            unset($this->contacts[$contactId]);
            $this->contacts = array_values($this->contacts);
        }
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

    private function isValidContactId(int $contactId): bool {
        return ($contactId > 0) && ($contactId < count($this->contacts));
    }

}

?>