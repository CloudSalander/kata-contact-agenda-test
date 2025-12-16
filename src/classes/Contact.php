<?php 

include('value-objects/Name.php');
include('value-objects/Surname.php');
include('value-objects/Email.php');
include('value-objects/PhoneNumber.php');

class Contact {

    public function __construct(
        private Name $name,
        private Surname $surname,
        private Email $email,
        private PhoneNumber $phone
    ) {}

    public function getSurname(): string {
        return $this->surname;
    }
    public function __toString() {
        return $this->surname.",".$this->name."  📞 ".$this->phone." ✉️  ".$this->email.PHP_EOL;
    }
}
?>