
<?php 
final class Name
{
    const MAX_NAME_LONG = 100;
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new InvalidArgumentException('Name cannot be empty.');
        }

        if (strlen($value) > self::MAX_NAME_LONG) {
            throw new InvalidArgumentException('Name too long.');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
?>
