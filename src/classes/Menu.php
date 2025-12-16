<?php

class Menu {
    const OPTIONS = ['Add Contact','Show Contacts','Delete Contact','Search Contact','Export Contacts','Exit'];

    public function __construct(private Agenda $agenda, private ContactInput $contactInput){}

    public function showOptions(): void {
        foreach(self::OPTIONS as $index => $option) {
            echo $index." - ".$option.PHP_EOL;
        }
    }

    public function doOption(int $option): void {
        //TODO: Enum for options?
        match ($option) {
            0 => $this->createContact(),
            1 => $this->showContacts(),
            2 => $this->removeContact(),
            3 => $this->searchContacts(),
            4 => $this->agenda->exportContacts(),
            default => null
        };
    }

    private function createContact(): void {
        $contact = $this->contactInput->createContact();
        $this->agenda->add($contact);
        echo "✅ Contact added successfully!" . PHP_EOL;
    }

    private function showContacts(): void {
        $contacts = $this->agenda->getContacts();
        if(empty($contacts)) {
            echo "Ups! Empty agenda Man/Gal!".PHP_EOL;
            return;
        }

        foreach($contacts as  $index => $contact) {
            echo ($index+1).": ".$contact;
        }
    }

    private function removeContact(): void {
        $this->showContacts();
        $contacts = $this->agenda->getContacts();
        $choice = intval(readline("Select contact number to remove"));
        $keys = array_keys($contacts);
        $idToRemove = $keys[$choice - 1] ?? null;
        if($idToRemove !== null)  {
            $this->agenda->removeContactById($idToRemove);
            echo "✅ Contact removed succesfully! ".PHP_EOL;
        }
        else echo "Selected contact doesn't exists!".PHP_EOL;
    }

    private function searchContacts() {

        $query = readline("Enter surname to search: "); // único dato
        $results = $this->agenda->searchBySurname($query);

        if (empty($results)) {
            echo "No contacts found." . PHP_EOL;
            return;
        }

        foreach ($results as $index => $contact) {
            echo ($index+1) . ": $contact";
        }
    }
}

?>