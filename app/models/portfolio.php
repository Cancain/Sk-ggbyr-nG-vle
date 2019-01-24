<?php
class Portfolio{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function removeById($id){
        $this->db->query('DELETE FROM portfolio WHERE id = :id');

        $this->db->bind('id', $id);
        $this->db->execute();
    }
}