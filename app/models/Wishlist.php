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
            $sql =  "SELECT * FROM wishlist WHERE status = :status and customer_id = :id";
            $this->db->query($sql);
            $this->db->bind(':status', $type);
            $this->db->bind(':id', $_SESSION['cus_id']);
            $this->db->execute();
            $result = $this->db->rowCount();
            return $result;
        }
        public function isCustomerPurchaseProduct($id)
        {
            $sql = "SELECT * FROM wishlist INNER JOIN seller_product_details ON 
                    wishlist.product_no = seller_product_details.product_no WHERE
                    seller_product_details.seller_id = :seller_id AND wishlist.customer_id = :cus_id AND( wishlist.status= 1 OR wishlist.status= 3 )";
            $this->db->query($sql);
            $this->db->bind(':cus_id', $_SESSION['cus_id']);
            $this->db->bind(':seller_id', $id);
            $result = $this->db->resultSet();

            return $result;
            
        } 
        public function filterWishlist($fdate,$tdate,$opt1,$opt2,$opt3,$opt4,$opt5)
        {
            $sql = "SELECT * FROM wishlist INNER JOIN seller_product_details ON 
                    wishlist.product_no = seller_product_details.product_no INNER JOIN seller ON  
                    seller_product_details.seller_id = seller.seller_id WHERE wishlist.customer_id = :id ";

            if(!empty($fdate) && !empty($tdate))
            {
                $sql .= "AND DATE(wishlist.order_date_time) BETWEEN :from_date AND :to_date AND";
                if(!empty($opt1))
                {
                    $sql .= " wishlist.status = 0 OR";
                }
                elseif(!empty($opt2))
                {
                    $sql .= " wishlist.status = 1 OR";
                }
                elseif(!empty($opt3))
                {
                    $sql .= " wishlist.status = 2  OR";
                }
                elseif(!empty($opt4))
                {
                    $sql .= " wishlist.status = 3 OR";
                }
                elseif(!empty($opt5))
                {
                    $sql .= " wishlist.status = 4 OR";
                }
                if(empty($opt1) && empty($opt2) && empty($opt3) && empty($opt4) && empty($opt5) )
                {
                    $sql = rtrim($sql, 'AND');
                }
                else
                {
                    $sql = rtrim($sql, 'OR');
                }  

            }
            elseif(!empty($fdate) && empty($tdate))
            {
                $sql .= "AND DATE(wishlist.order_date_time) > :from_date AND";
                if(!empty($opt1))
                {
                    $sql .= " wishlist.status = 0 OR";
                }
                elseif(!empty($opt2))
                {
                    $sql .= " wishlist.status = 1 OR";
                }
                elseif(!empty($opt3))
                {
                    $sql .= " wishlist.status = 2  OR";
                }
                elseif(!empty($opt4))
                {
                    $sql .= " wishlist.status = 3 OR";
                }
                elseif(!empty($opt5))
                {
                    $sql .= " wishlist.status = 4 OR";
                }
                if(empty($opt1) && empty($opt2) && empty($opt3) && empty($opt4) && empty($opt5) )
                {
                    $sql = rtrim($sql, 'AND');
                }
                else
                {
                    $sql = rtrim($sql, 'OR');
                } 
               
            }
            elseif(empty($fdate) && !empty($tdate))
            {
                $sql .= "AND DATE(wishlist.order_date_time) < :to_date AND (";
                if(!empty($opt1))
                {
                    $sql .= " wishlist.status = 0 OR";
                }
                elseif(!empty($opt2))
                {
                    $sql.= " wishlist.status = 1 OR";
                }
                elseif(!empty($opt3))
                {
                    $sql .= " wishlist.status = 2  OR";
                }
                elseif(!empty($opt4))
                {
                    $sql .= " wishlist.status = 3 OR";
                }
                elseif(!empty($opt5))
                {
                    $sql .= " wishlist.status = 4 OR";
                }
                if(empty($opt1) && empty($opt2) && empty($opt3) && empty($opt4) && empty($opt5) )
                {
                    $sql = rtrim($sql, 'AND');
                    $sql = rtrim($sql, '(');
                }
                else
                {
                    $sql = rtrim($sql, 'OR');
                    $sql .= ")";
                }
                
            }

            $this->db->query($sql); 

            if(!empty($fdate) && !empty($tdate))
            {
                $this->db->bind(':from_date', $fdate);
                $this->db->bind(':to_date', $tdate);
            }
            elseif(!empty($fdate) && empty($tdate))
            {
                $this->db->bind(':from_date', $fdate);
            }
            elseif(empty($fdate) && !empty($tdate))
            {
                $this->db->bind(':to_date', $tdate);
            }
            
            $this->db->bind(':id', $_SESSION['cus_id']);
            $result = $this->db->resultSet();

            return $result;
        }
    }