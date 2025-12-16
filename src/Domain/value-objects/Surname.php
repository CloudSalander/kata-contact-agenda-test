<?php 
final class Surname
{
    const MAX_SURNAME_LONG = 200;
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new InvalidArgumentException('Surname cannot be empty.');
        }

        if (strlen($value) > self::MAX_SURNAME_LONG) {
            throw new InvalidArgumentException('Surame too long.');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}

?>