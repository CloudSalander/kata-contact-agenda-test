<?php

final class PhoneNumber
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if (!preg_match('/^[0-9+\-\s()]+$/', $value) || preg_match_all('/\d/', $value) < 7) {
            throw new InvalidArgumentException('Invalid phone number.');
        }
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}

