<?php

class Detail extends Controller{
    public function index()
    {
        $data['judul'] = "Detail";
        $this->render('template/header',$data);
        $this->render('detail');
        $this->render('template/footer');
    }

    public function show($id){
        $data['judul'] = "Detail";
        $data['content'] = $this->model('detail')->ShowMovieDetail($id);
        $data['schedule'] = $this->model('detail')->ShowSchedule($id);
        $data['review'] = $this->model('detail')->ShowReview($id);
        date_default_timezone_set('Asia/Jakarta');
        $data['currentDateTime'] = date('Y-m-d H:i:s');
        $this->render('template/header',$data);
        $this->render('detail',$data);
        $this->render('template/footer');
    }

}

        