<?php
class ContactExporter {
    private string $filename;

    public function __construct(string $filename = "contacts.txt") {
        $this->filename = $filename;
    }

    public function export(array $contacts): void {
        $file = fopen($this->filename, 'w');
        foreach ($contacts as $contact) {
            fwrite($file, (string)$contact);
        }
        fclose($file);
    }
}

?>