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
        public function addProblem($data, $photo)
        {
            $sql = "INSERT INTO problem (title,content,category,customer_id) VALUES (:title,:content,:cat,:cus_id)";
            $this->db->query($sql);
            $this->db->bind(':title',$data['title'] );
            $this->db->bind(':content',$data['problem'] );
            $this->db->bind(':cat',$data['category'] );
            $this->db->bind(':cus_id',$_SESSION['cus_id'] );

            if($this->db->execute())
            {
                $sql1 = "SELECT * FROM problem WHERE customer_id = :cus_id ORDER BY problem_id DESC LIMIT 1";
                $this->db->query($sql1);
                $this->db->bind(':cus_id', $_SESSION['cus_id'] );
                $row1 = $this->db->singleRecord();

                
                if($this->db->rowCount() > 0)
                {
                    foreach($photo as $rows)
                    {
                        $sql2 = "INSERT INTO problem_photo (problem_id, image)
                                VALUES (:problem_id, :image)";
                        $this->db->query($sql2);
                        $this->db->bind(':problem_id',$row1->problem_id);
                        $this->db->bind(':image', $rows);
                        $this->db->execute();

                    }
                    return true;
                }
                else
                {
                    // Should be changed
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        public function problemPhotosById($id)
        {
            $sql = "SELECT * FROM problem_photo WHERE problem_id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }
    }