<?php

class App {
    //defaults
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() 
    {
        $url = $this->parseURL();
        $url_param = $this->extractParam();
        //var_dump($url_param[1]);
        // controller
        if (file_exists("../app/controllers/$url[0]_controller.php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '_controller.php';
        $this->controller = new $this->controller;

        // method
        if( isset($url[1]) ) {
            if ( method_exists($this->controller, $url[1] ) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if( !empty($url) ) {
            $this->params = array_values($url);
        }
        else {
            $this->params = array_values($url_param);
        }
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if ( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = explode('/', $url);
            return $url;
        }
    }

    public function extractParam()
    {
        $url = basename($_SERVER['REQUEST_URI']);
        $url = explode('?', $url);
        return $url;
    }
}