<?php

    class Wishlist
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function customerWishlistDetails()
        {
            $sql = "SELECT * FROM wishlist INNER JOIN seller_product_details ON 
                    wishlist.product_no = seller_product_details.product_no INNER JOIN seller ON  
                    seller_product_details.seller_id = seller.seller_id WHERE wishlist.customer_id = :id";

            $this->db->query($sql);
            $this->db->bind(':id', $_SESSION['cus_id']);
            $result = $this->db->resultSet();

            return $result;
        }

        public function orderCountGet($type)
        {
            $sql =  "SELECT * FROM wishlist WHERE status = :status";
            $this->db->query($sql);
            $this->db->bind(':status', $type);
            $this->db->execute();
            $result = $this->db->rowCount();
            return $result;
        }
    }