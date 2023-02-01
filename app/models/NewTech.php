<?php

    class NewTech
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function newtechnologies()
        {
            $sql = "SELECT * FROM new_technology ";
            $this->db->query($sql);
            $row = $this->db->resultSet($sql);
            return $row;
        }
    }
