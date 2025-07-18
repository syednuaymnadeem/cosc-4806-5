<?php
class Login extends Controller {

    public function index() {
        $this->view('login/index');
    }

    public function verify(){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

   
        $user = $this->model('User')->authenticate($username, $password);

        if ($user) {
       
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];

       
            if ($user['username'] === 'admin') {
                header('Location: /reports');
            } else {
                header('Location: /home');
            }
            exit;
        }

   
        $_SESSION['flash_error'] = 'Invalid credentials.';
        header('Location: /login');
        exit;
    }
}
