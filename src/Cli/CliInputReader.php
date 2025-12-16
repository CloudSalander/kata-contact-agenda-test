<?php
namespace App\Cli;

class CliInputReader implements InputReader {
    public function read(string $msg): string {
        $line = readline($msg . ': ');
        return trim($line);        //Students note: Trimming input text we do a minimum sanitization of text, not "only" input
    }
}
?>