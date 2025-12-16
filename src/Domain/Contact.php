<?php 

namespace App\Domain;

use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Surname;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\PhoneNumber;

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