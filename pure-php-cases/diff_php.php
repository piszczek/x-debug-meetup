<?php


class Car {
    private $name;

    public function __construct(string $name)
    {
        $someVariable = 1;
        $variable2 = $someVariable + 1;

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$car = new Car('Audi');

echo "Your car is {$car->getName()}";


