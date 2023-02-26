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
        public function getaProductDetails($id)
        {
            $sql = "SELECT * FROM seller_product_details WHERE product_no= :no";
            $this->db->query($sql);
            $this->db->bind(':no', $id);
            $result = $this->db->singleRecord();
            return $result;
        }
        public function addProductToWislist($data)
        {
            $sql = "INSERT INTO wishlist (product_no,customer_id,count,status) VALUES (:id,:cus_id,:quantity,:status)";
            $this->db->query($sql);
            $this->db->bind(':id',$data['Products_details']->product_no);
            $this->db->bind(':cus_id',$_SESSION['cus_id']);
            $this->db->bind(':quantity',$data['count']);
            $this->db->bind(':status', 0);
            $this->db->execute();

        }


    }
