<?php

class user_model {

    private $data;
    private $db;

    public function __construct()
    { 
        $this->db = new Database;
        //$this->data = $_GET['id'];
        $this->data = 1;
    }
    //for login
    function validateEmailPassword($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $this->db->query($sql);
        $this->db->bind('email', $email);

        $res = $this->db->single();
        if ($res) {
            if ($res['password'] == $password) {
                return $res['username'];
            } else {
                return "";
            }
        }

    }


    function addUser($username, $email, $password, $photo, $phone) 
    {
        $sql_insert = "INSERT INTO users (`username`, `email`, `password`, `photo`, `phone`) VALUES (:username, :email, :password, :photo, :phone)";
        $this->db->query($sql_insert);
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        $this->db->bind('photo', $photo);
        $this->db->bind('phone', $phone);
        
        $this->db->execute();
        return $this->db->rowCount();
        // CloseConnectionDB($conn);
        // exit();
    }

    function validateUsername($username) 
    {
        $sql_username = "SELECT * FROM users WHERE username='$username'";
        $this->db->query($sql_username);
        $this->db->bind('username', $username);
        $res = $this->db->single();
        if ($res) {
            return $res["username"];
        }
        else {
            return null;
        }
    }

    function validateEmail($email) 
    {
        $sql_email = "SELECT * FROM users WHERE email='$email'";
        $this->db->query($sql_email);
        $this->db->bind('email', $email);
        $res = $this->db->single();

        if ($res) {
            return 1;
        }
        else {
            return 0;
        }
    }

    function validatePhone($phone) 
    {
        $sql_phone = "SELECT * FROM users WHERE phone='$phone'";
        $this->db->query($sql_phone);
        $this->db->bind('phone', $phone);
        $res = $this->db->single();

        if ($res) {
            return 1;
        }
        else {
            return 0;
        }
    
    }

    function getID($username) {
        $sql_username = "SELECT id FROM users WHERE username='$username'";
        $this->db->query($sql_username);
        $this->db->bind('username', $username);
        $res = $this->db->single();
        if ($res) {
            return $res['id'];
        }
        else {
            return 0;
        }
    }
}