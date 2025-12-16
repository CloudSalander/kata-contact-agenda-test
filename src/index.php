<?php
include('classes/Menu.php');
include('classes/Agenda.php');
include('classes/ContactInput.php');
include('classes/CliInputReader.php');

define('EXIT_CODE',5);
define('INPUT_MSG', "Please, enter your option(0 to 5)");

//Note: We can instantiate agenda and ContactInput directly on MenuConstructor, not with vars. Just for readability
$agenda = new Agenda();
$contactInput = new ContactInput(new CliInputReader());
$menu = new Menu($agenda,$contactInput);

$option = 0;

while($option != EXIT_CODE) {
    $menu->showOptions();
    $option = readline(INPUT_MSG);
    $menu->doOption(intval($option));
}

?>