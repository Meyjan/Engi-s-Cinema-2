<?php

class history_model
{
    private $data;
    private $db;

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
    }

    public function ShowMovieHistory($id)
    {
        $this->db->query("SELECT * FROM (((watches JOIN shows ON watches.id_schedule = shows.id_schedule) JOIN schedules ON watches.id_schedule = schedules.id) JOIN movies ON shows.id_movie = movies.id) WHERE watches.id_user = $id ORDER BY date_of_play DESC");
        //$this->db->bind('id_user', $id);
        // var_dump( $this->db->resultSet());
        return $this->db->resultSet();
    }

    public function ShowReview($id)
    {
        $this->db->query("SELECT id_movie FROM reviews WHERE reviews.id_user='$id'");
        return $this->db->resultSet();
    }

    public function DeleteReview($iduser,$idmovie)
    {
        $this->db->query("DELETE FROM reviews WHERE reviews.id_user = '$iduser' AND reviews.id_movie = '$idmovie'");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function InsertReview($iduser,$idmovie,$star,$content)
    {
        $this->db->query("INSERT INTO reviews (`id`, `id_movie`, `id_user`, `content`, `rating`) VALUES ('', '$idmovie', '$iduser', '$content', '$star')");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function EditReview($iduser,$idmovie,$star,$content)
    {
        $this->db->query("UPDATE reviews SET `content` = '$content', `rating` = '$star' WHERE reviews.id_movie = $idmovie AND reviews.id_user = $iduser;");
        $this->db->execute();
        return $this->db->rowCount();
    }


}
