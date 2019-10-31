<?php

class review_model{
    private $data;
    private $db;

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
    }

    public function GetReview($iduser)
    {
        $this->db->query("SELECT * FROM reviews WHERE reviews.id_user='$iduser'");
        return $this->db->single();
    }

    public function GetMoviesReview($idmovie)
    {
        $this->db->query("SELECT * FROM movies WHERE movies.id='$idmovie'");
        return $this->db->single();
    }

    public function GetMoviesUserReview($iduser, $idmovie)
    {
        $this->db->query("SELECT reviews.id, id_movie, id_user, content, reviews.rating, movies.name FROM reviews JOIN users ON reviews.id_user = users.id JOIN movies ON reviews.id_movie = movies.id WHERE movies.id = '$idmovie' AND users.id = '$iduser'");
        return $this->db->single();
    }
}