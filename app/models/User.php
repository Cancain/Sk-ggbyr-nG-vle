<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function registerUser($data){

        //Set up sql query
        $this->db->query('INSERT INTO users (userName, firstName, lastName, email, password)
                            VALUES (:userName, :firstName, :lastName, :email, :password) ');
        
        //Bind parameters
        $this->db->bind('userName', $data['userName']);
        $this->db->bind('firstName', $data['firstName']);
        $this->db->bind('lastName', $data['lastName']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }
}