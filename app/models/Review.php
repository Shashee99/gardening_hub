<?php

    class Review
    {
        private $db;

        public function __construct()
        {
            $this->db =  new Database;
        }
        public function addProductRating($data)
        {
            $sql = "INSERT INTO product_rating_review (product_id,customer_id,review,rating) VALUES (:pro_id,:cus_id,:review,:rating)";
            $this->db->query($sql);
            $this->db->bind(':pro_id',$data['product_id']);
            $this->db->bind(':cus_id',$data['customer_id']);
            $this->db->bind(':review',$data['review']);
            $this->db->bind(':rating',$data['rating']);
            
            if($this->db->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function getAproductReviewRating($id)
        {
            $sql = "SELECT * FROM product_rating_review INNER JOIN customer ON product_rating_review.customer_id = customer.customer_id 
                    WHERE customer.customer_id= :cus_id AND product_rating_review.product_id = :pro_id 
                    UNION ALL SELECT * FROM product_rating_review INNER JOIN customer ON product_rating_review.customer_id = customer.customer_id
                    WHERE product_rating_review.product_id = :pro_id2  AND customer.customer_id<> :cus_id2";

            $this->db->query($sql);
            $this->db->bind(':pro_id', $id);
            $this->db->bind('cus_id', $_SESSION['cus_id']);
            $this->db->bind(':pro_id2', $id);
            $this->db->bind('cus_id2', $_SESSION['cus_id']);
            $result = $this->db->resultSet();
            
            return $result;
        }
        public function overallRatingOfProduct($id)
        {
            $sql ="SELECT AVG(rating) AS rate, COUNT(*) As count FROM product_rating_review  WHERE product_id =:pro_id ";
            $this->db->query($sql);
            $this->db->bind(':pro_id', $id);
            $result = $this->db->singleRecord();
            return $result;

        }
        public function isAddedSellerReview($id)
        {
            $sql = "SELECT * FROM seller_rating_review WHERE seller_id = :seller_id AND customer_id = :cus_id LIMIT 1";
            $this->db->query($sql);
            $this->db->bind(':seller_id', $id);
            $this->db->bind(':cus_id', $_SESSION['cus_id']);
            $result = $this->db->resultSet();
            return $result;
        }
        public function topRatedProducts($id)
        {
            $sql = "SELECT seller_product_details.image, AVG(product_rating_review.rating) AS rating FROM seller_product_details INNER JOIN product_rating_review  ON seller_product_details.product_no = product_rating_review.product_id 
                    WHERE seller_product_details.seller_id = :seller_id GROUP BY product_rating_review.product_id ORDER BY product_rating_review.rating DESC LIMIT 4 ";

            $this->db->query($sql);            
            $this->db->bind(':seller_id', $id);
            $result = $this->db->resultSet();
            return $result;
        }
        public function getsASellerReview($id)
        {
            $sql = "SELECT * FROM seller_rating_review INNER JOIN customer ON seller_rating_review.customer_id = customer.customer_id 
                    WHERE customer.customer_id= :cus_id AND seller_rating_review.seller_id = :seller_id  
                    UNION ALL SELECT * FROM seller_rating_review INNER JOIN customer ON seller_rating_review.customer_id = customer.customer_id
                    WHERE customer.customer_id <> :cus_id2 AND seller_rating_review.seller_id = :seller_id2 ";

            $this->db->query($sql);
            $this->db->bind('seller_id', $id);
            $this->db->bind('cus_id', $_SESSION['cus_id']);
            $this->db->bind(':seller_id2', $id);
            $this->db->bind('cus_id2', $_SESSION['cus_id']);
            $result = $this->db->resultSet();

            return $result;
        }
        public function getASellerRating($id)
        {
            $sql = "SELECT AVG(service) AS service_rate, AVG(products) AS products_rate, AVG(overall) AS overall FROM seller_rating_review   WHERE seller_id = :seller_id";
            $this->db->query($sql);            
            $this->db->bind(':seller_id', $id);
            $result = $this->db->singleRecord();
            return $result;
        }
        public function addSellerRating($data)
        {
            $sql = "INSERT INTO seller_rating_review (customer_id,seller_id,review,service,products,overall) VALUES (:cus_id,:sel_id,:review,:service,:products,:overall)";
            $this->db->query($sql);
            $this->db->bind('sel_id',$data['seller_id']);
            $this->db->bind(':cus_id',$data['customer_id']);
            $this->db->bind(':review',$data['review']);
            $this->db->bind(':service',$data['service']);
            $this->db->bind(':products',$data['products']);
            $this->db->bind(':overall',$data['overall']);
            
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