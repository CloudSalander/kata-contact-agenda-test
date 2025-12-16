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
            2 => $this->agenda->removeContact(),
            3 => $this->agenda->searchContacts(),
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
}

?>