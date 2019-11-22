<?php

class Review extends Controller
{
    public function index()
    {
        $data['judul'] = "Review";
        $this->render('template/header', $data);
        $this->render('review');
        $this->render('template/footer');
    }

    public function show($iduser,$idmovie)
    {
        $data['judul'] = "Review";
        $data['iduser'] = $iduser;
        $data['idmovie'] = $idmovie;
        $data['review'] = $this->model('review')->GetReview($iduser);
        $data['movie'] = $this->model('review')->GetMoviesReview($idmovie);
        $data['userreview'] = $this->model('review')->GetMoviesUserReview($iduser, $idmovie);
        $this->render('template/header', $data);
        $this->render('review', $data);
        $this->render('template/footer');
    }
}
