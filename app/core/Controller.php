<?php
class Controller {
     public function __construct()
     {
         // if you’re not already on the Login controller, you must be logged in
         if (get_class($this) !== 'Login' && empty($_SESSION['user_id'])) {
             header('Location: /login');
             exit;
         }
     }

     public function model($model) {
         require_once 'app/models/' . $model . '.php';
         return new $model();
     }

     public function view($view, $data = []) {
         require_once 'app/views/' . $view . '.php';
     }

 } 
// end Controller class
?>
