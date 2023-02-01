<?php

    class Harvest
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function allMyHarvest()
        {
            $sql = "Select * FROM harvest WHERE customer_id= :id AND deleted = :deleted ORDER BY harvest_id DESC";
            $this->db->query($sql);
            $this->db->bind(':id', $_SESSION['cus_id']);
            $this->db->bind(':deleted', '0');
            $row = $this->db->resultSet($sql);
            return $row;
        }
        public function allMyHarvestbyCategoey($category)
        {
            $sql = "Select * FROM harvest WHERE customer_id= :id AND deleted = :deleted AND category= :cat ORDER BY harvest_id DESC";
            $this->db->query($sql);
            $this->db->bind(':id', $_SESSION['cus_id']);
            $this->db->bind(':deleted', '0');
            $this->db->bind(':cat', $category);
            $row = $this->db->resultSet($sql);
    
            return $row;
        }
        public function harvestPhotos()
        {
            $sql = "SELECT * FROM harvest_photos";
            $this->db->query($sql);
            $row = $this->db->resultSet($sql);
            return $row;
        }
        public function harvestPhotosbyId($id)
        {
            $sql = "SELECT * FROM harvest_photos WHERE harvest_id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet($sql);
            return $row;
        }
        public function add($data, $photo)
        {
            $sql = "INSERT INTO harvest (date,category,title,description,customer_id,deleted)
                    VALUES (:date, :category, :title, :description, :cus_id, :deleted)";
            $this->db->query($sql);
            $this->db->bind(':date', date("Y-m-d"));
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':cus_id', $_SESSION['cus_id']);
            $this->db->bind(':deleted', 'false');

            if($this->db->execute())
            {
                $sql1 = "SELECT * FROM harvest WHERE customer_id = :cus_id ORDER BY harvest_id DESC LIMIT 1";
                $this->db->query($sql1);
                $this->db->bind(':cus_id', $_SESSION['cus_id'] );
                $row1 = $this->db->singleRecord();

                if($this->db->rowCount() > 0)
                {
                    foreach($photo as $rows)
                    {
                        $sql2 = "INSERT INTO harvest_photos (harvest_id, name)
                                VALUES (:harvest_id, :name)";
                        $this->db->query($sql2);
                        $this->db->bind(':harvest_id',$row1->harvest_id);
                        $this->db->bind(':name', $rows);
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
        public function allOtherHarvest()
        {
            $sql = "Select * FROM harvest WHERE customer_id != :cus_id AND deleted = :delete ORDER BY harvest_id DESC";
            $this->db->query($sql);
            $this->db->bind(':cus_id', $_SESSION['cus_id']);
            $this->db->bind(':delete', 0);
            $row = $this->db->resultSet($sql);
            return $row;            
        }
        public function allOtherHarvestbyCategoey($category)
        {
            $sql = "Select * FROM harvest WHERE customer_id != :id AND deleted = :deleted AND category= :cat ORDER BY harvest_id DESC";
            $this->db->query($sql);
            $this->db->bind(':id', $_SESSION['cus_id']);
            $this->db->bind(':deleted', 0);
            $this->db->bind(':cat', $category);
            $row = $this->db->resultSet($sql);
    
            return $row;
        }



    }
