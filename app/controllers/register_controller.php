<?php
class Register extends Controller {
    
    public function index()
    {
        $this->render('register');
    }
    
    public function validate_username() 
    {
        $dataJSON = file_get_contents('php://input');
        $data = json_decode($dataJSON, true);
        $username = $data["username"];
        
        $result = $this->model('user')->validateUsername($username);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function validate_phone() 
    {
        $dataJSON = file_get_contents('php://input');
        $data = json_decode($dataJSON, true);
        $phone = $data["phone"];
        
        $result = $this->model('user')->validatePhone($phone);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function validate_email() 
    {
        $dataJSON = file_get_contents('php://input');
        $data = json_decode($dataJSON, true);
        $email = $data["email"];
        
        $result = $this->model('user')->validateEmail($email);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function registing()
    {
        $email = $_POST["email"];
        $phone = strval($_POST["phone"]);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $photo = $_POST["photo"];
        $result = $this->model('user')->addUser($username, $email, $password, $photo, $phone);
        if ($result > 0) {
            $cookie_name = "username";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + 86400, "/"); // 86400 = 1 day
  
            header("Location: ..\login");
        }
        else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        }   
    }
}