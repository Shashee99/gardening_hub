<?php

    class Product
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function productdetails()
        {
            $sql = "SELECT * FROM seller_product_details INNER JOIN seller ON seller.seller_id = seller_product_details.seller_id";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;
        }

    }
