<?php

header('Content-Type: text/plain; charset=UTF-8');

$users = [
    array('id' => 245, 'password' => 'secret'),
    array('id' => 'user', 'password' => 'example'),
    array('id' => 423, 'password' => 'secret1234')
];

foreach ($users as $value) {

    testUser ($value['id'], $value['password']);

}



function testUser (mixed $id, string $password) {

    try {

        $user = new User($id, $password);
    
        var_dump($user->getUserData());
    
    } catch (Exception $e) {
    
        echo 'Выброшено исключение: "' . $e->getMessage() 
        . '" В файле: ' . $e->getFile() . ', строке: ' . $e->getLine() . PHP_EOL;
    
    }

}

class User {

    public function __construct(private mixed $id, private string $password) {
        $this::setID($id);
        $this::setPassword($password);
    }

    public function getUserData() {
        return array(
            'id' => $this->id,
            '$password' => $this->password
        );
    }

    private function setID(mixed $id) {
        if (is_int($id)) {
            $this->id = $id;
        } else {
            throw new Exception ('Введено некорректное значение поля id. Поле id должно быть числом.');
        }
    }

    private function setPassword(string $password) {
        if (strlen($password) <= 8) {
            $this->password = $password;
        } else {
            throw new Exception ('Введено некорректное значение поля password. Поле password должно иметь длину не более 8 символов.');
        }
    }
}
?>