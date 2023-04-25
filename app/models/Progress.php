<?php 

    class Progress
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function viewMyProgress($id)
        {
            $sql = "SELECT * FROM progress WHERE customer_id = :id and is_delete = :delete ORDER BY updated_date DESC";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $this->db->bind(':delete',0);
            $result = $this->db->resultSet();
            return $result;

        }
        public function progressPhotosbyId($id)
        {
            $sql = "SELECT * FROM progress_photos WHERE progress_id = :id";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $result = $this->db->resultSet();
            return $result;

        }
        public function viewOtherProgress($id)
        {
            $sql = "SELECT * FROM progress WHERE customer_id != :id and is_delete = :delete ORDER BY updated_date DESC";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $this->db->bind(':delete',0);
            $result = $this->db->resultSet();
            return $result;
        }
        public function deleteprogress($id)
        {
            $sql ="UPDATE progress SET is_delete = :delete WHERE progress_id = :id";
            $this->db->query($sql);
            $this->db->bind(':delete', 1);
            $this->db->bind(':id', $id);
            $this->db->execute();
        }
        public function addProgress($data,$photo)
        {
            $sql = "INSERT INTO progress(started_date,category,title,content,updated_date,customer_id,is_delete) VALUES (:start_d,:cat,:title,:content,:update_d,:cus_id,:is_delete)";
            $this->db->query($sql);
            $this->db->bind(':start_d',date('Y-m-d'));
            $this->db->bind(':cat',$data['category'] );
            $this->db->bind(':title',$data['title'] );
            $this->db->bind(':content',$data['progress'] );
            $this->db->bind(':update_d',date('Y-m-d'));
            $this->db->bind(':cus_id',$_SESSION['cus_id'] );
            $this->db->bind(':is_delete',0);

            if($this->db->execute())
            {
                $sql1 = "SELECT * FROM progress WHERE customer_id = :cus_id ORDER BY progress_id DESC LIMIT 1";
                $this->db->query($sql1);
                $this->db->bind(':cus_id', $_SESSION['cus_id'] );
                $row1 = $this->db->singleRecord();

                if($this->db->rowCount() > 0)
                {
                    foreach($photo as $rows)
                    {
                        $sql2 = "INSERT INTO progress_photos (progress_id,name) VALUES (:progress_id,:name)";
                        $this->db->query($sql2);
                        $this->db->bind(':progress_id',$row1->progress_id);
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
        }
        public function viewAProgress($id)
        {
            $sql = "SELECT * FROM progress WHERE progress_id = :id and is_delete = :delete LIMIT 1";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $this->db->bind(':delete',0);
            $result = $this->db->singleRecord();
            return $result;

        }
        public function oneProgressPhoto($id)
        {
            $sql = "SELECT * FROM progress_photos WHERE progress_id = :id";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $result = $this->db->resultSet();
            return $result;
        }
        public function updateProgress($data)
        {
            $sql = "UPDATE progress SET title=:title, content=:content, updated_date=:update_d WHERE progress_id=:id";
            $this->db->query($sql);
            $this->db->bind(':title',$data['title'] );
            $this->db->bind(':content',$data['progress'] );
            $this->db->bind(':update_d',date('Y-m-d'));
            $this->db->bind(':id',$data['id'] );

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