<?php
include('classes/Menu.php');
include('classes/Agenda.php');

define('EXIT_CODE',5);
define('INPUT_MSG', "Please, enter your option(0 to 5)");

$agenda = new Agenda();
$menu = new Menu($agenda);

$option = 0;

while($option != EXIT_CODE) {
    $menu->showOptions();
    $option = readline(INPUT_MSG);
    $menu->doOption(intval($option));
}

?>