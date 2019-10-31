<?php
class Login extends Controller {
    
    public function index()
    {
        if (!isset($_COOKIE["username"])) {
            $this->render('login');
        }
        else {
            header('Location: ' . BASEURL . '/index');
        }
    }

    public function validate_login() 
    { 
        
        $email = $_POST["email"];
        $password = $_POST["password"];
       
        $result = $this->model('user')->validateEmailPassword($email, $password);
        if ($result != "") {
            $cookie_name = "username";
            $cookie_value = $result;
            setcookie($cookie_name, $cookie_value, time() + 15400, "/");
            header("Location: ..\index");
            
        }
        else {
            
            echo '<script type="text/javascript">';
            echo 'alert("Wrong Email or Password");';
            echo 'history.back(self);</script>';
            //header("Location: \public\login");
        }
        
    }
}