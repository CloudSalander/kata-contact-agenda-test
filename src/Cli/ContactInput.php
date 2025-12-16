<?php
class ContactInput
{
    public function __construct(private InputReader $reader) {}

    public function createContact(): Contact
    {
        while(true) {
            //Note: Trying the entire input makes to repeat al the process if you fail one field, sorry :P
            try {
                $name = new Name($this->reader->read('Enter name'));
                $surname = new Surname($this->reader->read('Enter surname'));
                $email = new Email($this->reader->read('Enter email'));
                $phone = new PhoneNumber($this->reader->read('Enter phone number'));
                return new Contact($name, $surname, $email, $phone);
            } catch(InvalidArgumentException $e) {
                echo "Error: " . $e->getMessage() . PHP_EOL;
                echo "Please try again." . PHP_EOL;
                continue;
            }
        }
    }
}
?>