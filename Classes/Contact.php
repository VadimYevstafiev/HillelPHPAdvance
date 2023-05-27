<?php

namespace Classes;

class Contact {
    protected $name;
    protected $surname;
    protected $email;
    protected $phone;
    protected $address;
    
    public function __construct()
    {
        $this->reset();
    }

    public function name (string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    public function surname (string $surname): Contact
    {
        $this->surname = $surname;
        return $this;
    }

    public function email (string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    public function phone (string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    public function address (string $address): Contact
    {
        $this->address = $address;
        return $this;
    }

    public function build (): Contact
    {
        $output = clone $this;
        $this->reset();

        return $output;
    }

    protected function reset(): void
    {
        foreach(get_object_vars($this) as $key => $value)
        {
            $this->$key = NULL;
        }
    }
}