<?php
class Complaint
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllComplaints(){
        $this->db->query('SELECT * FROM complain');
        $dataset = $this->db->resultSet();
        return $dataset;
    }

}