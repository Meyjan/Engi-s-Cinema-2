<?php

class detail_model{
    private $data;
    private $db;

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
    }

    public function ShowMovieDetail($id)
    {
        $this->db->query("SELECT * FROM movies WHERE movies.id='$id'");
        return $this->db->single();
    }
    
    public function ShowSchedule($id)
    {
        $this->db->query("SELECT id_schedule, id_movie, date_of_play, SUM(vacant) AS vacant FROM schedules S JOIN shows SH ON S.id=SH.id_schedule JOIN seats SE ON SE.id_schedules=SH.id_schedule WHERE id_movie='$id' GROUP BY SH.id_schedule ORDER BY date_of_play ASC");
        return $this->db->resultSet();
    }

    public function ShowReview($id)
    {
        $this->db->query("SELECT * FROM reviews JOIN users ON reviews.id_user=users.id WHERE reviews.id_movie='$id'");
        return $this->db->resultSet() ;
    }

}