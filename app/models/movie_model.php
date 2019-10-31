<?php


class movie_model {
    private $data;
    private $db;

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
        $this->data = 1;
    }

    public function getAllMovie()
    {
        $sql = "SELECT id, name, photo, rating FROM movies";
        $this->db->query($sql);
        $res = $this->db->resultSet();

        return $res;
    }

    public function getMovieByName($name)
    {
        $sql = "SELECT id, name, photo, rating, description FROM movies WHERE name LIKE :keyword";
        $this->db->query($sql);
        $this->db->bind('keyword', "%$name%");
        $res = $this->db->resultSet();
        return $res;
    }

}