<?php

class buyticket_model{
    private $data;
    private $db;

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
    }

    public function GetMovieTicket($idmovie,$idschedule)
    {
        $this->db->query("SELECT * FROM movies JOIN schedules WHERE movies.id='$idmovie' AND schedules.id='$idschedule'");
        return $this->db->single();
    }

    public function GetSeat($idschedule)
    {
        $this->db->query("SELECT * FROM seats WHERE seats.id_schedules='$idschedule'");
        return $this->db->resultSet();
    }

    public function GetUserId($username)
    {
        $this->db->query("SELECT * FROM users WHERE users.username='$username'");
        return $this->db->resultSet();
    }

    public function InsertWatches($id_user, $id_schedule, $chair)
    {
        $sql_insert = "INSERT INTO watches (`id_user`, `id_schedule`, `chair_number`) VALUES (:id_user, :id_schedule, :chair)";
        $this->db->query($sql_insert);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_schedule', $id_schedule);
        $this->db->bind('chair', $chair);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function UpdateSeat($id_schedule,$idseat)
    {
        $this->db->query("UPDATE `seats` SET `vacant` = '0' WHERE seats.name = '$idseat' AND seats.id_schedules = '$id_schedule'");
        $this->db->execute();
        return $this->db->rowCount();
    }

    // public function InsertWatches($iduser,$idschedule,$idseat)
    // {
    //     $this->db->query("INSERT INTO `watches` (`id`, `id_user`, `id_schedule`, `chair_number`) VALUES ('', '$iduser', '$idschedule', '$idseat')");
    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }


}