<?php 

class FakeInputReader implements InputReader {
    private array $inputs;
    public function __construct(array $inputs) {
        $this->inputs = $inputs;
    }

    public function read(string $prompt): string {
        return array_shift($this->inputs);
    }
}

?>