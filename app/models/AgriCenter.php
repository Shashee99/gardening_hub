<?php 

    class AgriCenter
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function agriCenters()
        {
            $sql = "SELECT * FROM agricenters";
            $this->db->query($sql);
            $result = $this->db->resultSet();

            $places = array();
                // while($row = $result->fetch_assoc()) 
                // {
                //   $places[] = $row;
                // }
            return $result;
        }
    }