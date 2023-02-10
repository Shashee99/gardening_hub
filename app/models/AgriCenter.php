<?php 

    class AgriCenter
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
    }