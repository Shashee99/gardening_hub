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
        public function viewOtherProgress($id)
        {
            $sql = "SELECT * FROM progress WHERE customer_id != :id and is_delete = :delete ORDER BY updated_date DESC";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $this->db->bind(':delete',0);
            $result = $this->db->resultSet();
            return $result;
        }
    }