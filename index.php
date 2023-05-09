<?php

header('Content-Type: text/plain; charset=UTF-8');

try {

    $user = new User('Ivan', 35, 'user@mail.com');

    var_dump($user->getAll());

    $user->setName('Peter');

    var_dump($user->getAll());

    $user->setAge(45);

    var_dump($user->getAll());

    $user->setEmail('post@mail.com');

} catch (badMethodNameException $e) {

    echo 'Выброшено пользовательское исключение badMethodNameException: ' . $e->getMessage() . PHP_EOL;

} catch (Exception $e) {

    echo 'Выброшено исключение: ' . $e->getMessage() . PHP_EOL;

}

class User {

    public function __construct(private string $name, private int $age, private string $email) {}

    public function __call(string $methodName, array $arguments) {

        if (!(method_exists($this, $methodName))) {

            throw new badMethodNameException($methodName);

        }

        call_user_func_array(array($this, $methodName), $arguments);
    }

    public function getAll() {
        return array(
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email
        );
    }

    private function setName(string $name) {
        $this->name = $name;
    }

    private function setAge(int $age) {
        $this->age = $age;
    }
}

class badMethodNameException extends Exception {

    public function __construct(string $methodName) {
        $message = 'Попытка вызвать несуществующий метод ' . $methodName;
        parent::__construct($message);
    }
 }
?>