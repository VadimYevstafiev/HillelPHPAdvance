<?php

header('Content-Type: text/plain; charset=UTF-8');

$color = new ValueObject(30,30,30);

var_dump($color->equals(new ValueObject(30,30,30)));

var_dump($color->equals(new ValueObject(30,35,30)));

$color = ValueObject::random();

var_dump($color);

$color = new ValueObject(10,20,30);

var_dump($color->mix(new ValueObject(20,30,40)));

$color = new ValueObject(0,300,0);

class ValueObject {

    private int $red;

    private int $green;

    private int $blue;

    public function __construct(int $red, int $green, int $blue) 
    {
        $this::setRed($red);
        $this::setGreen($green);
        $this::setBlue($blue);
    }

    public function getRed(): int 
    {
        return $this->red;
    }

    public function getGreen(): int 
    {
        return $this->green;
    }

    public function getBlue(): int 
    {
        return $this->blue;
    }

    public function equals(ValueObject $object): bool 
    {
        $functions = array('getRed', 'getGreen', 'getBlue');
        foreach ($functions as $value) 
        {
            if ($this->$value() != $object->$value()) 
            {
                return false;
            }
        }
        return true;
    }

    static public function random(): object 
    {
        return new ValueObject(rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(ValueObject $object): object 
    {
        $red = (int) (0.5 * ($this->getRed() + $object->getRed()));
        $green = (int) (0.5 * ($this->getGreen() + $object->getGreen()));
        $blue = (int) (0.5 * ($this->getBlue() + $object->getBlue()));
        return new ValueObject($red, $green, $blue);
    }

    private function setRed(int $value) 
    {
        $this::setColorValue('red', $value);
    }

    private function setGreen(int $value) 
    {
        $this::setColorValue('green', $value);
    }

    private function setBlue(int $value) 
    {
        $this::setColorValue('blue', $value);
    }

    private function setColorValue(string $name, int $value) 
    {
        $this->$name = $this::checkColorValue($value) ? $value : $this::badColorValue($name);
    }

    private function checkColorValue(int $value): bool
    {
        return ($value >=0 && $value <=255) ? true : false;
    }

    private function badColorValue(string $name)
    {
        throw new Exception ('Введено некоректное значение свойства ' . $name . 
        '. Свойство ' . $name . ' должно иметь значение в диапзоне от 0 до 255');
    }
}
?>