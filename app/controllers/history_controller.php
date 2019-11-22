<?php

class History extends Controller
{
    public function index()
    {
        if (isset($_COOKIE["username"])) {
            $data['judul'] = "History";
            date_default_timezone_set('Asia/Jakarta');
            $data['currentDateTime'] = date('Y-m-d H:i:s');
            $this->render('template/header', $data);
            $this->render('history', $data);
            $this->render('template/footer');
        }
        else {
            header('Location: ' . BASEURL . '/index');
        }
    }

    public function show($id)
    {
        $data['judul'] = "History";
        date_default_timezone_set('Asia/Jakarta');
        $data['currentDateTime'] = date('Y-m-d A h:i:s');
        $data['history'] = $this->model('history')->ShowMovieHistory($id);
        $data['review'] = $this->model('history')->ShowReview($id);
        $data['reviewed'] = array();
        foreach($data['review'] as $key1 => $value1):
            foreach($value1 as $key2 => $value2):
                array_push($data['reviewed'], $value2);
            endforeach;
        endforeach;
        $this->render('template/header', $data);
        $this->render('history', $data);
        $this->render('template/footer');
    }

    public function delete($iduser,$idmovie)
    {
        if($this->model('history')->DeleteReview($iduser, $idmovie)>0) {
            header('Location: ' . BASEURL . '/history/show/' . $iduser);
        }else{            
            header('Location: ' . BASEURL . '/history/show/' . $iduser);
        }
    }

    public function insert($iduser)
    {
        $data['star'] = $_POST['star'];
        $data['content'] = $_POST['content'];
        $data['idmovie'] = $_POST['idmovie'];
        if($this->model('history')->InsertReview($iduser, $data['idmovie'], $data['star'], $data['content']) > 0) {
            header('Location: ' . BASEURL . '/history/show/' . $iduser);
        }else{
            header('Location: ' . BASEURL . '/review/show/' . $iduser .'/'. $data['idmovie']);
        }
    }

    public function update($iduser)
    {
        $data['star'] = $_POST['star'];
        $data['content'] = $_POST['content'];
        $data['idmovie'] = $_POST['idmovie'];
        if($this->model('history')->EditReview($iduser, $data['idmovie'], $data['star'], $data['content']) > 0) {
            header('Location: ' . BASEURL . '/history/show/' . $iduser);
        }else{
            header('Location: ' . BASEURL . '/review/show/' . $iduser .'/'. $data['idmovie']);
        }
    }

    


}
