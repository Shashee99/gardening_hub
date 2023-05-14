<?php

    class Problem
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function viewallProblem()
        {
            $sql = 'SELECT * FROM problem INNER JOIN customer ON problem.customer_id = customer.customer_id';
            $this -> db -> query($sql);
            return $this->db->resultSet();
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
        public function getAproblemwithcusinfo($id)
        {
            $sql = 'SELECT * FROM problem INNER JOIN customer ON problem.customer_id = customer.customer_id  WHERE problem.problem_id = :problem_id';
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

        public function getadvisorreplyforproblemid($id){

            $sql = "SELECT * FROM problem_reply INNER JOIN advisor ON problem_reply.advisor_id = advisor.advisor_id WHERE problem_reply.problem_id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }

        public function get_num_of_times_advisor_repliedforaproblem($problem_id,$advisor_id){
            $sql = "SELECT COUNT(*) AS num_of_replies FROM problem_reply WHERE problem_id = :probid AND advisor_id = :advisorid; ";
            $this->db->query($sql);
            $this->db->bind(':probid', $problem_id);
            $this->db->bind(':advisorid', $advisor_id);
            return $this->db->singleRecord();

        }
        public function get_num_of_repliedadvisorsforaproblem($problem_id){
            $sql = "SELECT COUNT(*) AS num_of_advisors FROM problem_advisors WHERE problem_id = :probid";
            $this->db->query($sql);
            $this->db->bind(':probid', $problem_id);
            return $this->db->singleRecord();
        }

        public function insertreply($problem_id,$reply,$customer_id,$advisor_id){
            $sql = "INSERT INTO problem_reply (customer_id,reply,problem_id,advisor_id) VALUES (:cusid,:reply,:probid,:advid)";
            $this->db->query($sql);
            $this->db->bind(':probid', $problem_id);
            $this->db->bind(':reply', $reply);
            $this->db->bind(':cusid', $customer_id);
            $this->db->bind(':advid', $advisor_id);
            $this->db->execute();
        }

        public function getreplyfromcustomerid($cusid,$problem_id){
            $sql = "SELECT * FROM problem_reply INNER JOIN advisor ON problem_reply.advisor_id = advisor.advisor_id WHERE problem_reply.customer_id = :cusid AND problem_reply.problem_id = :probid";
            $this->db->query($sql);
            $this->db->bind(':probid', $problem_id);
            $this->db->bind(':cusid', $cusid);
            return $this->db->resultSet();
        }

        public function getproblemswithcategoryandadvisorsid($category,$advisor){

            if($advisor == " "){
                $sql = "SELECT * FROM problem WHERE category = :category";
                $this->db->query($sql);
                $this->db->bind(':category', $category);
                return $this->db->resultSet();
            }
            else{
                $sql = "SELECT * FROM problem INNER JOIN problem_advisors ON problem.problem_id = problem_advisors.problem_id WHERE problem_advisors.advisor_id = :advid AND problem.category = :category ; ";
                $this->db->query($sql);
                $this->db->bind(':category', $category);
                $this->db->bind(':advid', $advisor);
                return $this->db->resultSet();
            }

        }
       
        public function filterProblem($category,$reply,$adviosr)
        {
           if($reply==='allproblem' && $category === "all"){
            $sql2='SELECT * FROM problem';
            $this->db->query($sql2);
            return $this->db->resultSet();
           }
           elseif($reply==='replied' && $category === "all" ){
              $sql='SELECT * FROM problem INNER JOIN problem_advisors ON problem.problem_id = problem_advisors.problem_id WHERE problem_advisors.advisor_id = :advisorid';
              $this->db->query($sql);
              $this -> db -> bind(':advisorid',$adviosr);
              return $this->db->resultset();
               
           }
           elseif($reply==='allproblem' && $category != "all"){
            $sql2='SELECT * FROM problem WHERE category=:category';
            $this->db->query($sql2);
            $this->db->bind(':category',$category);
            return $this->db->resultSet();
           }
           elseif($reply==='replied' && $category != "all"){
            $sql='SELECT * FROM problem INNER JOIN problem_advisors ON problem.problem_id = problem_advisors.problem_id WHERE problem_advisors.advisor_id = :advisorid AND problem.category = :cat';
            $this->db->query($sql);
            $this -> db -> bind(':advisorid',$adviosr);
            $this -> db -> bind(':cat',$category);
            return $this->db->resultset();
           }
           else{
              $sql2='SELECT * FROM problem WHERE category=:category';
              $this->db->query($sql2);
              $this->db->bind(':category',$category);
              return $this->db->resultSet();
           }
    
        }




    }