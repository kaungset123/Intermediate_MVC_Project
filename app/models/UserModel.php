<?php

class UserModel{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database; // instantiation database object
    }

    public function getAllUsers(){
        $this->db->query("SELECT * FROM users");
        return $this->db->multipleSet();
    }

    public function register($name,$email,$password){
        $password = password_hash($password,PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $this->db->bind(":name",$name);
        $this->db->bind(":email",$email);
        $this->db->bind(":password",$password);
        return $this->db->execute();
    }

    public function getUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email",$email);
        return $this->db->singleSet();
        // $row = $this->db->singleSet(); // to return an object
        // if(empty($row)){
        //     return false;
        // }else{
        //     return $row;
        // }

    }

   
}