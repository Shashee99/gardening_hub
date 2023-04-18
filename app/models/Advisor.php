<?php

    class Advisor
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function advisorDetails($id)
        {
            $sql = "SELECT * FROM advisor WHERE advisor_id = :id AND isDeleted = 0;";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $result = $this->db->singleRecord();
            return $result;
        }
        public function get_non_registered_advisors(){
            $this->db->query('SELECT * FROM `advisor` WHERE is_registered = 0 AND isDeleted = 0;');
            $dataset = $this->db->resultSet();
            return $dataset;
        }

        public function all_registered_advisors(){
            $this -> db ->query('SELECT * FROM `advisor` WHERE is_registered = 1 AND isDeleted = 0;');
            $dataset = $this->db->resultSet();
            return $dataset;
        }

        public function getAdvisorName ($id){
            $this -> db -> query('SELECT name FROM advisor WHERE advisor_id = :id AND isDeleted = 0;');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();

            return $row->name;
        }

        public function getAdvisordetails($id){
            $this -> db -> query('SELECT * FROM advisor WHERE advisor_id = :id AND isDeleted = 0;');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();

            return $row;
        }

        public function searchuserbyname_registeredadvisor($name){
            $search_term = $name . '%';
            $this -> db -> query('SELECT * FROM `advisor` WHERE `name` LIKE :search_term AND is_registered = 1 AND isDeleted = 0;');
            $this ->db ->bind(':search_term',$search_term);
            $dataset = $this->db->resultSet();
            return $dataset;

        }
        public function searchuserbyname_unregisteredadvisor($name){
            $search_term = $name . '%';
            $this -> db -> query('SELECT * FROM `advisor` WHERE `name` LIKE :search_term AND is_registered = 0 AND isDeleted = 0;');
            $this ->db ->bind(':search_term',$search_term);
            $dataset = $this->db->resultSet();
            return $dataset;

        }

        public function recentlyaddedadvisors()
        {
            $this -> db -> query('SELECT * FROM advisor WHERE is_registered = 0 AND isDeleted = 0 ORDER BY advisor_id DESC LIMIT 5; ');
            $dataset = $this -> db-> resultSet();
            return $dataset;
        }

        public function delete_advisor($id){

            $this -> db -> query('UPDATE advisor SET isDeleted = 1 WHERE advisor_id = :id;');
            $this -> db -> bind(':id', $id);
            $this->db->execute();
            $this -> db -> query('UPDATE user SET user_state = 2 WHERE user_id = :id;');
            $this -> db -> bind(':id', $id);
            $this->db->execute();
        }


    }