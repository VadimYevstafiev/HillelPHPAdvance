<?php

namespace Classes;

class Contact {
    protected $instance;
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
        $this->instance->name = $name;
        return $this;
    }

    public function surname (string $surname): Contact
    {
        $this->instance->surname = $surname;
        return $this;
    }

    public function email (string $email): Contact
    {
        $this->instance->email = $email;
        return $this;
    }

    public function phone (string $phone): Contact
    {
        $this->instance->phone = $phone;
        return $this;
    }

    public function address (string $address): Contact
    {
        $this->instance->address = $address;
        return $this;
    }

    public function build (): \stdClass
    {
        $output = $this->instance;
        $this->reset();

        return $output;
    }

    protected function reset(): void
    {
        $this->instance = new \stdClass();
    }
}