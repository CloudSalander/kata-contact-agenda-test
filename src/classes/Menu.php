<?php

class Menu {
    const OPTIONS = ['Add Contact','Show Contacts','Delete Contact','Search Contact','Export Contacts','Exit'];

    public function __construct(private Agenda $agenda){}

    public function showOptions(): void {
        foreach(self::OPTIONS as $index => $option) {
            echo $index." - ".$option.PHP_EOL;
        }
    }

    public function doOption(int $option): void {
        //TODO: Enum for options?
        match ($option) {
            0 => $this->agenda->createContact(),
            1 => $this->agenda->showContacts(),
            2 => $this->agenda->removeContact(),
            3 => $this->agenda->searchContacts(),
            4 => $this->agenda->exportContacts(),
            default => null
        };
    }
}

?>