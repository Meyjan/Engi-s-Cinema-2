<?php

class detail_model
{
    private $data;
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        //$this->data = $_GET['id'];
    }

    public function ShowMovieDetail_New($id)
    {
        $ch = curl_init();

        $init_url = "https://api.themoviedb.org/3/movie";

        $api_key = "api_key=24e24f2fe04971613e54501530daca7e";
        $language = "language=en-US";

        $query_string = "?" . $api_key . "&" . $language;

        $url = $init_url . "/" . $id . $query_string;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $output = json_decode($output, true);

        return $output;
    }

    public function ShowMovieDetail($id)
    {
        // $this->db->query("SELECT * FROM movies WHERE movies.id='$id'");
        // return $this->db->single();

        return $this->ShowMovieDetail_New($id);
    }

    public function ShowSchedule_New($id)
    {
        if ($id == "home") {
            echo ("home detected");
            return;
        }

        $this->db->query("SELECT id, date_of_play FROM schedules");

        $schedule_list = $this->db->resultSet();

        $ch = curl_init();
        $init_url = "http://localhost:3005/vacant";

        $film = "film=" . $id;

        $total_result = array();

        foreach ($schedule_list as $sl) {
            $schedule = "schedule=" . $sl['id'];
            $query_string = "?" . $film . "&" . $schedule;
            $url = $init_url . $query_string;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            $output = json_decode($output, true)['values'][0]['total'];

            $sl['vacant'] = 30 - $output;
            $sl['id_movie'] = $id;
            $sl['id_schedule'] = $sl['id'];
            array_push($total_result, $sl);
        }
        return ($total_result);
    }

    public function ShowSchedule($id)
    {
        // $this->db->query("SELECT id_schedule, id_movie, date_of_play, SUM(vacant) AS vacant FROM schedules S JOIN shows SH ON S.id=SH.id_schedule JOIN seats SE ON SE.id_schedules=SH.id_schedule WHERE id_movie='$id' GROUP BY SH.id_schedule ORDER BY date_of_play ASC");
        // return $this->db->resultSet();

        return $this->ShowSchedule_New($id);
    }

    public function ShowReview($id)
    {
        $this->db->query("SELECT * FROM reviews JOIN users ON reviews.id_user=users.id WHERE reviews.id_movie='$id'");
        return $this->db->resultSet();
    }

    public function ShowCritics($id)
    {
        $ch = curl_init();

        $init_url = "https://api.themoviedb.org/3/movie";

        $api_key = "api_key=24e24f2fe04971613e54501530daca7e";
        $language = "language=en-US";
        $page = "page=1";

        $query_string = "?" . $api_key . "&" . $language . "&" . $page;

        $url = $init_url . "/" . $id . "/reviews" . $query_string;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $output = json_decode($output, true)['results'];

        return $output;
    }
}
