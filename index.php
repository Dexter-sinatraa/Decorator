<?php

// Базовий інтерфейс
interface Coffee {
    public function cost();
    public function description();
}

// Конкретний клас - простий кавовий напій
class SimpleCoffee implements Coffee {
    public function cost() {
        return 5;
    }

    public function description() {
        return "Simple Coffee";
    }
}

// Декоратор
abstract class CoffeeDecorator implements Coffee {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost() {
        return $this->coffee->cost();
    }

    public function description() {
        return $this->coffee->description();
    }
}

// Конкретний декоратор - добавлення молока
class MilkDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 2;
    }

    public function description() {
        return $this->coffee->description() . ", Milk";
    }
}

// Конкретний декоратор - добавлення цукру
class SugarDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 1;
    }

    public function description() {
        return $this->coffee->description() . ", Sugar";
    }
}

// Використання паттерна Декоратор
$coffee = new SimpleCoffee();
echo $coffee->description() . " costs $" . $coffee->cost() . "<br>";

$milkCoffee = new MilkDecorator($coffee);
echo $milkCoffee->description() . " costs $" . $milkCoffee->cost() . "<br>";

$sweetMilkCoffee = new SugarDecorator($milkCoffee);
echo $sweetMilkCoffee->description() . " costs $" . $sweetMilkCoffee->cost() . "<br>";
