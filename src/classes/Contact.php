<?php 

include('value-objects/Email.php');
include('value-objects/PhoneNumber.php');

class Contact {
    //todo: EMAIL AND PHONE validations
    const INPUT_NAME = "Enter name";
    const INPUT_SURNAME = "Enter surname";
    const INPUT_EMAIL = "Enter email";
    const INPUT_PHONE = "Enter phone number";
    const INPUT_EMAIL_ERROR = "Please, enter valid email";
    const INPUT_PHONE_ERROR = "Please, enter valid phone number";

    private string $name;
    private string $surname;
    private string $email;
    private string $phone;

    public function __construct() {
        $this->name = readline(self::INPUT_NAME);
        $this->surname = readline(self::INPUT_SURNAME);
        $this->enterPhone();
        $this->enterEmail();
    }

    public function getSurname(): string {
        return $this->surname;
    }

    private function enterEmail(): void {
        while(true) {
            $email = readline(self::INPUT_EMAIL);
            try{
                $this->email = new Email($email);
                break;
            }
            catch(InvalidArgumentException $e) {
               echo self::INPUT_EMAIL_ERROR.PHP_EOL;
            }
        }
    }

    private function enterPhone(): void {
        while(true) {
            $phone = readline(self::INPUT_PHONE);
            try{
                $this->phone = new PhoneNumber($phone);
                break;
            }
            catch(InvalidArgumentException $e) {
               echo self::INPUT_PHONE_ERROR.PHP_EOL;
            }
        }
    }

    public function __toString() {
        return $this->surname.",".$this->name."  📞 ".$this->phone." ✉️  ".$this->email.PHP_EOL;
    }
}
?>