<?php

namespace App;


require __DIR__ . '/vendor/autoload.php';

use App\Cli\Menu;
use App\Cli\ContactInput;
use App\Cli\CliInputReader;
use App\Domain\Agenda;
use App\Infrastructure\ContactExporter;

define('EXIT_CODE',5);
define('INPUT_MSG', "Please, enter your option(0 to 5)");

//Note: We can instantiate agenda and ContactInput directly on MenuConstructor, not with vars. Just for readability
$agenda = new Agenda();
$contactInput = new ContactInput(new CliInputReader());
$contactExporter = new ContactExporter();
$menu = new Menu($agenda,$contactInput,$contactExporter);

$option = 0;

while($option != EXIT_CODE) {
    $menu->showOptions();
    $option = readline(INPUT_MSG);
    $menu->doOption(intval($option));
}

?>