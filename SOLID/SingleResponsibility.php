<?php

class Product

{
    public function get($name) {}

    public function set($name, $value) {}
    
}

class ProductHandler

{

    public function save(Product $instance) {}

    public function update(Product $instance) {}

    public function delete(Product $instance) {}

}

class ProductOutputter

{

    public function show(Product $instance) {}

    public function print(Product $instance) {}
    
}