<?php


class Logout extends Controller {
    
    public function out_account()
    {
        unset($_COOKIE['username']);
        setcookie('username', null, time() - 86400, '/'); 
        header('Location: ' . BASEURL . '\login');
        
    }
}