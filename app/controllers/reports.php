<?php
class Reports extends Controller {
  public function __construct() {
      parent::__construct();

    if (empty($_SESSION['username']) || 
        SESSION['username'] !== 'admin') {
        header('Location: /home');
        exit;
    }     

  }
  public function index() {}

  

 
}
?>