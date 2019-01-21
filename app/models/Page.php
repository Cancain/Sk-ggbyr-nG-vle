<?php
class Page {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getPortfolio(){
        $this->db->query('SELECT * FROM portfolio');
        $data = $this->db->resultSet();
        return $data;
    }

    
}