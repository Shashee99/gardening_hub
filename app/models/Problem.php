<?php

    class Problem
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function givenUserProblems($id)
        {
            $sql = 'SELECT * FROM problem WHERE customer_id= :cus_id';
            $this->db->query($sql);
            $this->db->bind(':cus_id', $id);
            return $this->db->resultSet();
        }
        public function getAproblem($id)
        {
            $sql = 'SELECT * FROM problem WHERE problem_id= :problem_id';
            $this->db->query($sql);
            $this->db->bind(':problem_id', $id);
            return $this->db->singleRecord();
        }
        public function  getreplywithuserDetails($problem_id)
        {
            $sql = 'SELECT * FROM problema_reply INNER JOIN ON Advisor WHERE problem_id= :problem_id';
        }
        public function addProblem($data)
        {
            $sql = "INSERT INTO problem (title,content,category,customer_id) VALUES (:title,:content,:cat,:cus_id)";
            $this->db->query($sql);
            $this->db->bind(':title',$data['title'] );
            $this->db->bind(':content',$data['problem'] );
            $this->db->bind(':cat',$data['category'] );
            $this->db->bind(':cus_id',$_SESSION['cus_id'] );

            if($this->db->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }