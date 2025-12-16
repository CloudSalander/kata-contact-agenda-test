<?php
namespace App\Cli;
interface InputReader {
    public function read(string $msg): string;
}
