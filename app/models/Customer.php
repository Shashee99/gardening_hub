<?php

    class Customer
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getCustomerDetails($cus_id)
        {
            $sql = "SELECT * FROM customer WHERE customer_id = :cus_id LIMIT 1";
            $this->db->query($sql);
            $this->db->bind(':cus_id', $cus_id);
            $row = $this->db->singleRecord($sql);
            // print_r($row);
            // die();
            return $row;
        }
        public function get_all_customers(){
            $this -> db ->query('SELECT * FROM customer');
            $dataset = $this->db->resultSet();
            return $dataset;
        }

        public function getCustomerName ($id){
            $this -> db -> query('SELECT name FROM customer WHERE customer_id = :id');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();
            return $row->name;
        }

        public function searchuserbyname($name){
            $search_term = $name . '%';
            $this -> db -> query('SELECT * FROM `customer` WHERE `name` LIKE :search_term');
            $this ->db ->bind(':search_term',$search_term);
            $dataset = $this->db->resultSet();
            return $dataset;

        }

    }