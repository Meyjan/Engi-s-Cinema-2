<?php

class buyticket_model
{
    private $data;
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        //$this->data = $_GET['id'];
    }

    public function GetMovieTicket($idmovie, $idschedule)
    {
        $this->db->query("SELECT * FROM movies JOIN schedules WHERE movies.id='$idmovie' AND schedules.id='$idschedule'");
        return $this->db->single();
    }

    public function GetSeat($idschedule)
    {
        $this->db->query("SELECT * FROM seats WHERE seats.id_schedules='$idschedule'");
        return $this->db->resultSet();
    }

    public function GetUserId($username)
    {
        $this->db->query("SELECT * FROM users WHERE users.username='$username'");
        return $this->db->resultSet();
    }

    public function New_InsertWatches($id_user, $id_film, $id_schedule, $id_seat)
    {
        // SOAP... GET VIRTUAL ACCOUNT FIRST
        $xml_data = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service/">
        <soapenv:Header/>
        <soapenv:Body>
           <ser:GenerateVA>
              <arg0>1</arg0>
           </ser:GenerateVA>
        </soapenv:Body>
        </soapenv:Envelope>';
        $URL = "http://localhost:8080/ws-bank/service/GenerateVirtualAccount?wsdl";

        $ch_va = curl_init($URL);
        curl_setopt($ch_va, CURLOPT_HTTPHEADER, array('Content-Type: text/xml;charset=utf-8'));
        curl_setopt($ch_va, CURLOPT_POST, 1);
        curl_setopt($ch_va, CURLOPT_POSTFIELDS, "$xml_data");
        curl_setopt($ch_va, CURLOPT_RETURNTRANSFER, 1);
        $output_va = curl_exec($ch_va);
        curl_close($ch_va);

        //Dummy VA => Should get from SOAP
        $virtual_acc = $output_va;

        $ch = curl_init();
        $init_url = "http://localhost:3005/add";

        //Generate Price
        $set_price = $id_film % 30 * 1000 + 30000;

        $user = "user=" . $id_user;
        $film = "film=" . $id_film;
        $schedule = "schedule=" . $id_schedule;
        $seat = "chair=" . $id_seat;
        $va = "va=" . $virtual_acc;
        $price = "price=" . $set_price;

        $url = $init_url;
        $post_field = $user + "&" + $film + "&" + $schedule + "&" + $seat + "&" + $va + "&" + $price;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLPOT_POSTFIELDS, $post_field);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        if ($output == "OK") {
            $output = json_decode($output, true)['values']['message'];
        } else {
            $output = "FAIL";
        }

        return ($output);
    }

    public function InsertWatches($id_user, $id_schedule, $chair)
    {
        $sql_insert = "INSERT INTO watches (`id_user`, `id_schedule`, `chair_number`) VALUES (:id_user, :id_schedule, :chair)";
        $this->db->query($sql_insert);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_schedule', $id_schedule);
        $this->db->bind('chair', $chair);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function New_UpdateSeat($id_user, $id_film, $id_schedule, $id_seat)
    {
        $ch = curl_init();
        $init_url = "http://localhost:3005/set_seat";

        $user = "user=" . $id_user;
        $film = "film=" . $id_film;
        $schedule = "schedule=" . $id_schedule;
        $seat = "chair=" . $id_seat;

        $url = $init_url;
        $post_field = $user + "&" + $film + "&" + $schedule + "&" + $seat;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLPOT_POSTFIELDS, $post_field);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        if ($output == "OK") {
            $output = json_decode($output, true)['values']['message'];
        } else {
            $output = "FAIL";
        }

        return ($output);
    }

    public function UpdateSeat($id_schedule, $idseat)
    {
        $this->db->query("UPDATE `seats` SET `vacant` = '0' WHERE seats.name = '$idseat' AND seats.id_schedules = '$id_schedule'");
        $this->db->execute();
        return $this->db->rowCount();
    }

    // public function InsertWatches($iduser,$idschedule,$idseat)
    // {
    //     $this->db->query("INSERT INTO `watches` (`id`, `id_user`, `id_schedule`, `chair_number`) VALUES ('', '$iduser', '$idschedule', '$idseat')");
    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }


}
