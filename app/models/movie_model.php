<?php

class movie_model {
    private $data;
    private $db;
    private $api_key = "24e24f2fe04971613e54501530daca7e";

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
        $this->data = 1;
    }

    public function getAllMovie_New()
    {
        $end = FALSE;
        $i = 1;

        $result = array();
        $ch = curl_init();

        while (!$end) {
            $init_url = "https://api.themoviedb.org/3/discover/movie";

            $api_key = "api_key=24e24f2fe04971613e54501530daca7e";
            $language = "language=en-US";
            $sort_by = "sort_by=popularity.desc";
            $adult = "include_adult=false";
            $video = "include_video=false";
            $page = "page=" . $i;
            $limit_low = "release_date.gte=" . date("Y-m-d");
            $limit_high = "release_date.lte=" . date("Y-m-d", strtotime("+7 days", time()));

            $requirements = "?" . $api_key . "&" . $language . "&" . $sort_by;
            $filtering = "&" . $adult . "&" . $video;
            $limitation = "&" . $page . "&" . $limit_low . "&" . $limit_high;

            $query_string = $requirements . $filtering . $limitation;

            $url = $init_url . $query_string;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            $output = json_decode($output, true)['results'];
            $result = array_merge($result, $output);

            $i += 1;

            if ($i > 3 || empty($output)) {
                $end = TRUE;
            }
        }

        curl_close($ch);
        return $result;
    }   

    public function getAllMovie()
    {
        // $sql = "SELECT id, name, photo, rating FROM movies";
        // $this->db->query($sql);
        // $res = $this->db->resultSet();

        // return $res;

        return $this->getAllMovie_New();
    }

    public function getMovieByName_New($name)
    {
        $end = FALSE;
        $i = 1;

        $result = array();
        $ch = curl_init();

        while (!$end) {
            $init_url = "https://api.themoviedb.org/3/search/movie";

            $api_key = "api_key=24e24f2fe04971613e54501530daca7e";
            $language = "language=en-US";
            $sort_by = "sort_by=popularity.desc";
            $adult = "include_adult=false";
            $video = "include_video=false";
            $page = "page=" . $i;
            $query = "query=" . $name;

            $requirements = "?" . $api_key . "&" . $language . "&" . $sort_by;
            $filtering = "&" . $adult . "&" . $video;
            $limitation = "&" . $page . "&" . $query;

            $query_string = $requirements . $filtering . $limitation;

            $url = $init_url . $query_string;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            $output = json_decode($output, true)['results'];
            $result = array_merge($result, $output);

            $i += 1;

            if ($i > 3 || empty($output)) {
                $end = TRUE;
            }
        }

        curl_close($ch);
        return $result;
    }

    public function getMovieByName($name)
    {
        // $sql = "SELECT id, name, photo, rating, description FROM movies WHERE name LIKE :keyword";
        // $this->db->query($sql);
        // $this->db->bind('keyword', "%$name%");
        // $res = $this->db->resultSet();
        // return $res;

        return $this->getMovieByName_New($name);
    }

}