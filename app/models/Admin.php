<?php
class Admin{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }


    public function get_non_registered_sellers(){
        $this->db->query('SELECT * FROM `seller` WHERE is_registered = 0');
        $dataset = $this->db->resultSet();
        return $dataset;
    }

    public function all_registered_sellers(){
        $this->db->query('SELECT * FROM `seller` WHERE is_registered = 1');
        $dataset = $this->db->resultSet();
        return $dataset;
    }
    public function get_non_registered_advisors(){
        $this->db->query('SELECT * FROM `advisor` WHERE is_registered = 0');
        $dataset = $this->db->resultSet();
        return $dataset;
    }

    public function all_registered_advisors(){
        $this -> db ->query('SELECT * FROM `advisor` WHERE is_registered = 1');
        $dataset = $this->db->resultSet();
        return $dataset;
    }


    public function get_customer_by_id($id){
        $this ->db ->query('SELECT * FROM customer WHERE customer_id = :cusid');
        $this ->db-> bind(':cusid',$id);
        $dataset = $this -> db -> singleRecord();
        return $dataset;
    }


    public function sellerApprove($id){
        $this ->db -> query('UPDATE user SET user_state = 1 WHERE user_id = :id');
        $this ->db-> bind(':id',$id);
        $this -> db -> execute();
        $this ->db -> query('UPDATE seller SET is_registered = 1 WHERE seller_id = :id');
        $this ->db-> bind(':id',$id);
        $this -> db -> execute();
        return true;

    }


}