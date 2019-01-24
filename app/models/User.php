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

    public function getUserFromUserName($user){

        //set up sql query
        $this->db->query('SELECT * FROM users
                            WHERE userName = :userName');

        //bind parameters
        $this->db->bind('userName', $user);

        //set the found user to a variable
        $foundUser = $this->db->single();

        //return found user if found else return false
        if($foundUser){
            return $foundUser;
        } else {
            return false;
        }
    }

    public function getUserById($id){
        //Set up sql query
        $this->db->query('SELECT * FROM users
                            WHERE id = :userId');
        //bind parameters
        $this->db->bind('userId', $id);

        //set the found user to a variable
        $foundUser = $this->db->single();

        //return found user if found else return false
        if($foundUser){
            return $foundUser;
        } else {
            return false;
        }
    }
}