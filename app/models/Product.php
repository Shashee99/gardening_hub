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
            $sql = "SELECT * FROM seller_product_details INNER JOIN seller ON seller.seller_id = seller_product_details.seller_id WHERE seller_product_details.product_no= :no";
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
        public function filterProducts($cat, $sub_cat, $price)
        {
            $sql = "SELECT * FROM seller INNER JOIN seller_product_details ON seller_product_details.seller_id = seller.seller_id 
                    INNER JOIN product_category ON seller_product_details.category_id = product_category.product_id ";

            if($cat != "")
            {
                $sql .= "WHERE product_category.product_category =  ".$cat ;
                // $this->db->query($sql);
                // $this->db->bind(':cat',$cat);
            }
            if($sub_cat != "")
            {
                $sql .= "AND WHERE product_category.sub_category =  ".$sub_cat ;
                // $this->db->query($sql);
                // $this->db->bind(':sub_cat',$sub_cat);
            }
            if($price != "")
            {
                // $sql .= "WHERE product_category.product_category = :cat " ;
                // $this->db->query($sql);
                // $this->db->bind(':cat',$cat);
                if($price == 100)
                {
                    $sql .= "AND WHERE seller_product_details.price BETWEEN 0 AND 100";
                }
                elseif($price == 500)
                {
                    $sql .= "AND WHERE seller_product_details.price BETWEEN 101 AND 500";
                }
                elseif($price == 1000)
                {
                    $sql .= "AND WHERE seller_product_details.price BETWEEN 501 AND 1000";
                }
                elseif($price == 2000)
                {
                    $sql .= "AND WHERE seller_product_details.price BETWEEN 1001 AND 2000";
                }
                elseif($price == 5000)
                {
                    $sql .= "AND WHERE seller_product_details.price BETWEEN 2001 AND 5000";
                }
                else
                {
                    $sql .= "AND WHERE seller_product_details.price > 5000";
                }
                
            }
            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;
        }


    }
