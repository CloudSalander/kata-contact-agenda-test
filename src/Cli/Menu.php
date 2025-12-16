<?php

enum MenuOption : int {
    case ADD_CONTACT    = 0;
    case SHOW_CONTACTS  = 1;
    case REMOVE_CONTACT = 2;
    case SEARCH_CONTACT = 3;
    case EXPORT_CONTACTS = 4;
    case EXIT           = 5;

    public function label(): string
    {
        return match ($this) {
            self::ADD_CONTACT     => 'Add Contact',
            self::SHOW_CONTACTS   => 'Show Contacts',
            self::REMOVE_CONTACT  => 'Delete Contact',
            self::SEARCH_CONTACT  => 'Search Contact',
            self::EXPORT_CONTACTS => 'Export Contacts',
            self::EXIT            => 'Exit',
        };
    }
}

class Menu {

    public function __construct(private Agenda $agenda, private ContactInput $contactInput, private ContactExporter $contactExporter){}

    public function showOptions(): void {
        foreach(MenuOption::cases() as $option) {
            echo $option->value." - ".$option->label().PHP_EOL;
        }
    }

    public function doOption(int $option): void {
        $menuOption = MenuOption::tryFrom($option);

        if ($menuOption === null) {
            echo "Invalid option" . PHP_EOL;
            return;
        }

        match ($menuOption) {
            MenuOption::ADD_CONTACT => $this->createContact(),
            MenuOption::SHOW_CONTACTS => $this->showContacts(),
            MenuOption::REMOVE_CONTACT => $this->removeContact(),
            MenuOption::SEARCH_CONTACT => $this->searchContacts(),
            MenuOption::EXPORT_CONTACTS => $this->exportContacts(),
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

    private function searchContacts(): void {

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

    private function exportContacts(): void {
        $contacts = $this->agenda->getContacts();
        if (empty($contacts)) {
            echo "No contacts to export." . PHP_EOL;
            return;
        }

        $this->contactExporter->export($contacts);
        echo "✅ Contacts exported successfully!" . PHP_EOL;
    }
}

?>