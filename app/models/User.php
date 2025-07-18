<?php


class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() { }

    

    public function authenticate($username, $password) {
        $username = strtolower($username);
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);

        if ($rows && password_verify($password, $rows['password'])) {

            
            $ins = $db->prepare("INSERT INTO logins (user_id) VALUES (:uid)");
            $ins->bindValue(':uid', $rows['userid']);
            $ins->execute();
            

            $_SESSION['auth']     = 1;
            $_SESSION['username'] = ucwords($username);
            $_SESSION['userid']   = $rows['userid'];
            unset($_SESSION['failedAuth']);

            header('Location: /home');
            die;
        } else {
            if (isset($_SESSION['failedAuth'])) {
                $_SESSION['failedAuth']++;
            } else {
                $_SESSION['failedAuth'] = 1;
            }
            header('Location: /login');
            die;
        }
    }

    
}
