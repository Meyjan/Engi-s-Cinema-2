<?php
class Home extends Controller {
    public function index()
    {
        if (isset($_COOKIE["username"])) {
            $title['judul'] = "Home";
            $data = $this->model('movie')->getAllMovie();
            
            $this->render('template/header',$title);
            $this->render('index',$data);
        }
        else 
        {
            header('Location: ' . BASEURL . '/login');
        }
        
    }

    public function request_id() 
    {
        $username = $_POST['username'];
        $data = $this->model('user')->getID($username);
        echo $data;
    }
}