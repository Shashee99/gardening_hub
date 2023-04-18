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
            return $row;
        }
        public function get_all_customers(){
            $this -> db ->query('SELECT * FROM customer WHERE isDeleted = 0 ');
            $dataset = $this->db->resultSet();
            return $dataset;
        }

        public function getCustomerName ($id){
            $this -> db -> query('SELECT name FROM customer WHERE customer_id = :id AND isDeleted = 0;');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();
            return $row->name;
        }

        public function searchuserbyname($name){
            $search_term = $name . '%';
            $this -> db -> query('SELECT * FROM `customer` WHERE `name` LIKE :search_term AND isDeleted = 0;');
            $this ->db ->bind(':search_term',$search_term);
            $dataset = $this->db->resultSet();
            return $dataset;

        }
        public function recentlyaddedcustomers()
        {
            $this -> db -> query('SELECT * FROM customer WHERE isDeleted = 0 ORDER BY customer_id DESC LIMIT 5; ');
            $dataset = $this -> db-> resultSet();
            return $dataset;
        }
<<<<<<< HEAD
        public function getCustomerFullDetails($id)
        {
            $sql = "SELECT * FROM customer INNER JOIN user ON customer.customer_id= user.user_id WHERE customer.customer_id = :cus_id ";
            $this->db->query($sql);
            $this->db->bind(':cus_id', $id);
            return $this->db->singleRecord();
=======
        public function deletecustomer($id){
            $this -> db -> query('UPDATE customer SET isDeleted = 1 WHERE customer_id = :id; ');
            $this -> db -> bind(':id',$id);
            $this->db->execute();
            $this -> db ->query('UPDATE user SET user_state = 2 WHERE user_id = :id;');
            $this -> db -> bind(':id',$id);
            $this->db->execute();
            return true;
>>>>>>> 521234c3800ee6f13f76526c0bf3da5130d089c7
        }


    }