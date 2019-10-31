<?php
class Search extends Controller {
    
    public $search_q = "";
    public function index($data) 
    {
        $this->render('template/header',$title);
        $this->render('search', $data);
        $this->render('template/footer');
    }
    
    public function searching($name, $val)
    {
        if (isset($_COOKIE["username"])) {
            $title['judul'] = "Search";
            if (substr($val[1], -1) == "=") 
            {
                $search_q = "";
            }
            else {
                $search_q = explode('=', $val)[1];
            }
            $data = $this->model('movie')->getMovieByName($search_q);
            $this->index($data);

        }
        else 
        {
            header('Location: ' . BASEURL . '/login');
        }
        
    }
}