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
  public function index() {
    $r = $this->model('Report');

    $data = [
        'allReminders' => $r->getAllReminders(),
        'topUser'      => $r->getTopReminderUser(),
        'loginCounts'  => $r->getLoginCounts(),
    ];

    $this->view('reports/index', $data);
  } 
}
?>