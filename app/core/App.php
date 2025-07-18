<?php

class App {

    protected $controller = 'login';
    protected $method     = 'index';
    protected $special_url = ['apply'];
    protected $params     = [];


    public function __construct() {
        if (! empty($_SESSION['user_id'])){
            $this->controller = 'home';
        }
    // If you’re already logged in (we have a user_id), go home by default
 


        // Break your URL into pieces
        $url = $this->parseUrl();

        // ── SAFEGUARD: only try $url[1] if it actually exists ──────────────────────
        if (isset($url[1])) {
            // does a matching controller file exist?
            if (file_exists('app/controllers/' . $url[1] . '.php')) {
                $this->controller = $url[1];
                $_SESSION['controller'] = $this->controller;

                // special public pages stay on index()
                if (in_array($this->controller, $this->special_url)) {
                    $this->method = 'index';
                }
                unset($url[1]);
            } else {
                // they requested a non‑existent controller
                header('Location: /home');
                exit;
            }
        }
        // ────────────────────────────────────────────────────────────────────────────

        // load the controller class file
        require_once 'app/controllers/' . $this->controller . '.php';
        // instantiate it (your class is named exactly like the file)
        $this->controller = new $this->controller;

        // see if method is segment 2
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            $_SESSION['method'] = $this->method;
            unset($url[2]);
        }

        // any remaining pieces are parameters
        $this->params = $url ? array_values($url) : [];

        // finally call HomeController->index($params...) or whatever
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        // grab path, strip query string
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // trim trailing slash, sanitize, explode
        $filtered = filter_var(rtrim($path, '/'), FILTER_SANITIZE_URL);
        $url = explode('/', $filtered);
        // remove the empty element before the first slash
        unset($url[0]);
        return $url;
    }

}
