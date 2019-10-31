<?php

class Buyticket extends Controller{

    
    public function index()
    {
        if (isset($_COOKIE["username"])) {
            $data['judul'] = "Buy Ticket";
            $data['iduser'] = $this->model('buyticket')->GetUserId($_COOKIE["username"]);
            date_default_timezone_set('Asia/Jakarta');
            $data['currentDateTime'] = date('Y-m-d H:i:s');
            $this->render('template/header',$data);
            $this->render('buyticket', $data);
            $this->render('template/footer');
        }
        else {
            header("Location:". BASEURL ."\index");
        }
    }

    public function show($idmovie,$idschedule)
    {
        if (isset($_COOKIE["username"])) {
            $data['judul'] = "Buy Ticket";
            $data['iduser'] = $this->model('user')->GetID($_COOKIE["username"]);
            $data['idmovie'] = $idmovie;
            $data['idschedule'] = $idschedule;
            $data['movie'] = $this->model('buyticket')->GetMovieTicket($idmovie,$idschedule);
            $data['seats'] = $this->model('buyticket')->GetSeat($idschedule);
            date_default_timezone_set('Asia/Jakarta');
            $data['currentDateTime'] = date('Y-m-d H:i:s');
            $this->render('template/header',$data);
            $this->render('buyticket',$data);
            $this->render('template/footer');
        }
        else {
            header('Location: ' . BASEURL . '/index');
        }
    }

    public function insert_watches() 
    {
        $dataJSON = file_get_contents('php://input');
        $data = json_decode($dataJSON, true);
        $id_user = $_POST["iduser"];
        var_dump( $id_user);
        $id_schedule = $_POST["idschedule"];
        $chair = $_POST["seats"];
        
        $result = $this->model('buyticket')->InsertWatches($id_user, $id_schedule, $chair);
        $result2 = $this->model('buyticket')->UpdateSeat($id_schedule, $chair);

        if ($result > 0 && $result2 > 0) {
            header('Location: ' . BASEURL . '/history/show/' . $id_user);
        }
        else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        }   
    }

    // public function updateseat()
    // {
    //     $dataJSON = file_get_contents('php://input');
    //     $data = json_decode($dataJSON, true);
    //     $id_user = $data["id_user"];
    //     $id_schedule = $data["id_schedule"];
    //     $chair = $data["chair"];
    //     $this->model('buyticket')->UpdateSeat($id_user);
    //     if($this->model('buyticket')->InsertWatches($id_user, $id_schedule, $chair) > 0){
    //         header('Location: ' . BASEURL . '/history/show/' . $id_user);
    //     }else{
    //         header('Location: ' . BASEURL . '/history/show/' . $id_user);
    //     }
    // }

}