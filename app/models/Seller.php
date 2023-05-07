<?php
class Seller{
    private $db;

    public function __construct() {
        $this -> db = new Database;
    }

    public function getItemData() {
        $id =$_SESSION['user_id'];
        $this -> db -> query('SELECT *, AVG(rating) AS total_rating
                                FROM seller_product_details
                                LEFT JOIN product_rating_review
                                ON seller_product_details.product_no = product_rating_review.product_id
                                WHERE seller_product_details.seller_id = :id
                                GROUP BY seller_product_details.product_no;
        ');
        // $this -> db -> query('SELECT * FROM seller_product_details WHERE seller_id = :id');
        $this -> db-> bind(':id',$id);

        $results = $this -> db -> resultSet();
        return $results;
    }

    public function add2($data) {
        $this -> db -> query('INSERT INTO seller_product_details (seller_id, title, price, description, quantity) VALUES (:seller_id, :title, :price, :description, :quantity)');
        $this -> db -> bind(':title', $data['title']);
        $this -> db -> bind(':price', $data['price']);
        $this -> db -> bind(':description', $data['description']);
        $this -> db -> bind(':quantity', $data['quantity']);
        $this -> db -> bind(':seller_id', $_SESSION['user_id']);

        if($this -> db -> execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addProductDetails($data,$photo) {
        $sql = 'INSERT INTO seller_product_details (seller_id,category_id,price,title,description,quantity,image) values (:seller_id,:cat_id,:price,:title,:description,:quantity,:image)';
        $this->db->query($sql);
        $this -> db -> bind(':cat_id', $data['product_id']);
        $this -> db -> bind(':title', $data['title']);
        $this -> db -> bind(':price', $data['price']);
        $this -> db -> bind(':description', $data['description']);
        $this -> db -> bind(':quantity', $data['quantity']);
        $this -> db -> bind(':seller_id', $_SESSION['user_id']);
        $this -> db -> bind(':image', $data['image']);
        $this->db->execute();

        $sql = 'SELECT * FROM seller_product_details WHERE seller_id = :seller_id ORDER BY product_no DESC LIMIT 1' ;
        $this ->db ->query($sql);
        $this ->db-> bind(':seller_id',$_SESSION['user_id']);
        $res = $this -> db -> singleRecord();
        if($res) {
            foreach ($photo as $photos){
                $sql1 = 'INSERT INTO product_photos (product_no, image_name) VALUES (:product_no,:image_name)';
                $this ->db ->query($sql1);
                $this ->db-> bind(':product_no',$res->product_no);
                $this ->db-> bind(':image_name',$photos);
                $this -> db ->execute();


            }
            return true;
        } else {
            return false;
        }



//        $this -> db ->execute();
//
//        $cus_id =intval($result->product_id);
//
//        $this -> db -> query('UPDATE seller_product_details_demo SET image = :image WHERE product_id = :id');
//
//        $this -> db -> bind(':image', $data['image']);
//        $this -> db -> bind(':id', $cus_id);


    }
    public function get_all_sellers(){
        $this -> db ->query('SELECT * FROM seller WHERE is_registered = 1 AND isDeleted = 0;');
        $dataset = $this->db->resultSet();
        return $dataset;
    }
    public function get_non_registered_sellers(){
        $this->db->query('SELECT * FROM `seller` WHERE is_registered = 0 AND isDeleted = 0;');
        $dataset = $this->db->resultSet();
        return $dataset;
    }

    public function all_registered_sellers(){
        $this -> db ->query('SELECT * FROM `seller` WHERE is_registered = 1 AND isDeleted = 0;');
        $dataset = $this->db->resultSet();
        return $dataset;
    }
    public function getSellerDetails($sell_id)
    {
        $sql = "SELECT * FROM seller WHERE seller_id = :sell_id LIMIT 1";
        $this->db->query($sql);
        $this->db->bind(':sell_id', $sell_id);
        $row = $this->db->singleRecord();
        return $row;
    }

    public function getSellerName ($id){
        $this -> db -> query('SELECT owner_name FROM seller WHERE seller_id = :id AND isDeleted = 0;');
        $this ->db ->bind(':id',$id);
        $row = $this -> db -> singleRecord();
        return $row->owner_name;
    }

    public function getItemById($id) {
        $this -> db -> query('SELECT * FROM seller_product_details WHERE product_no = :id');
        $this -> db-> bind(':id',$id);

        $results = $this -> db -> singleRecord();
        return $results;
    }

    public function getProductImages($id) {
        $this -> db -> query('SELECT * FROM product_photos WHERE product_no = :id');
        $this -> db-> bind(':id',$id);

        $results = $this -> db -> resultSet();
        return $results;
    }

    public function getReviewData($id){
        $userid =$_SESSION['user_id'];
        $this -> db -> query('SELECT * FROM product_rating_review
                                INNER JOIN customer
                                ON product_rating_review.customer_id = customer.customer_id
                                INNER JOIN seller_product_details
                                ON product_rating_review.product_id = seller_product_details.product_no
                                WHERE seller_product_details.seller_id = :sellerid
                                AND seller_product_details.product_no =  :productid;
        ');
        $this -> db-> bind(':sellerid',$userid);
        $this -> db-> bind(':productid',$id);
        $orderdetails = $this -> db -> resultSet();
        return $orderdetails;

    }

    public function getCatData() {
        $this -> db -> query('SELECT DISTINCT(product_category) FROM product_category');

        $catresults = $this -> db -> resultSet();
        return $catresults;
    }

    public function getOrderData() {
        $id =$_SESSION['user_id'];
        $this -> db -> query('SELECT * FROM wishlist
                                INNER JOIN customer
                                ON wishlist.customer_id = customer.customer_id
                                INNER JOIN seller_product_details
                                ON wishlist.product_no = seller_product_details.product_no
                                WHERE seller_product_details.seller_id = :id;
        ');
        $this -> db-> bind(':id',$id);
        $orderdetails = $this -> db -> resultSet();
        return $orderdetails;
    }

    public function getcancleOrderData() {
        $id =$_SESSION['user_id'];
        $this -> db -> query('SELECT * FROM wishlist
                                INNER JOIN customer
                                ON wishlist.customer_id = customer.customer_id
                                INNER JOIN seller_product_details
                                ON wishlist.product_no = seller_product_details.product_no
                                WHERE seller_product_details.seller_id = :id
                                AND wishlist.status = 2;
        ');
        $this -> db-> bind(':id',$id);
        $orderdetails = $this -> db -> resultSet();
        return $orderdetails;
    }

    public function getcompleteOrderData() {
        $id =$_SESSION['user_id'];
        $this -> db -> query('SELECT * FROM wishlist
                                INNER JOIN customer
                                ON wishlist.customer_id = customer.customer_id
                                INNER JOIN seller_product_details
                                ON wishlist.product_no = seller_product_details.product_no
                                WHERE seller_product_details.seller_id = :id
                                AND wishlist.status = 3;
        ');
        $this -> db-> bind(':id',$id);
        $orderdetails = $this -> db -> resultSet();
        return $orderdetails;
    }

    
    // public function order($data) {
    //     $id =$_SESSION['user_id'];
    //     $this -> db -> query('UPDATE wishlist 
    //                           SET completeness = :orderComplete,
    //                           confirmation = :confirmation
    //                           complete_date = :order_date
    //                           WHERE seller_id = :id');

    //     $this -> db -> bind(':orderComplete', $data['completeness']);
    //     $this -> db -> bind(':confirmation', $data['confirmation']);
    //     $this -> db -> bind(':order_date', $data['complete_date']);
    //     $this -> db-> bind(':id',$id);
    // }
    public function searchuserbyname_registeredsellers($name){
        $search_term = $name . '%';
        $this -> db -> query('SELECT * FROM `seller` WHERE `shop_name` LIKE :search_term AND is_registered = 1 AND isDeleted = 0;');
        $this ->db ->bind(':search_term',$search_term);
        $dataset = $this->db->resultSet();
        return $dataset;

    }
    public function searchuserbyname_unregisteredsellers($name){
        $search_term = $name . '%';
        $this -> db -> query('SELECT * FROM `seller` WHERE `shop_name` LIKE :search_term AND is_registered = 0 AND isDeleted = 0;');
        $this ->db ->bind(':search_term',$search_term);
        $dataset = $this->db->resultSet();
        return $dataset;

    }
    public function recentlyaddedsellers()
    {
        $this -> db -> query('SELECT * FROM seller WHERE is_registered = 0 AND isDeleted = 0 ORDER BY seller_id DESC LIMIT 5; ');
        $dataset = $this -> db-> resultSet();
        return $dataset;
    }



    
    public function order_conf($item) {
        $this -> db -> query('UPDATE wishlist  
                              SET status = 1,
                              confirm_reject_date_time = NOW()                     
                              WHERE (wishlit_id = :item)');
        
        $this -> db -> bind(':item', $item);
        // $this -> db -> bind(':confirmation', $data['confirmation']);
        // $this -> db -> bind(':order_date', $data['complete_date']);
        $this->db->execute();
    }

    public function order_cancel($order_no, $cancel_reason) {
        $this -> db -> query('UPDATE wishlist 
                              SET status_msg = :cancel_reason,
                              status = 2,
                              confirm_reject_date_time = NOW() 
                              WHERE (wishlit_id = :item)');
        
        $this -> db -> bind(':cancel_reason', $cancel_reason);
        $this -> db -> bind(':item', $order_no);
        $this->db->execute();
    }

    public function order_complete($compete_order_no) {
        $this -> db -> query('UPDATE wishlist  
                              SET status = 3,
                              complete_date_time = NOW()
                              WHERE (wishlit_id = :compete_order_no)');
        
        $this -> db -> bind(':compete_order_no', $compete_order_no);
        // $this -> db -> bind(':confirmation', $data['confirmation']);
        // $this -> db -> bind(':order_date', $data['complete_date']);
        $this->db->execute();
    }

    // public function update($data1) {
    //     $id =$_SESSION['user_id'];
    //     $this -> db -> query('UPDATE seller_product_details 
    //                           SET title = :title, price = :price, description = :description
    //                           WHERE (seller_id = :id)');

    //     $this -> db -> bind(':title' , $data1['title']);
    //     $this -> db -> bind(':price' , $data1['price']);
    //     $this -> db -> bind(':description' , $data1['description']);
    //     $this -> db-> bind(':id',$id);
    //     $this->db->execute();
    // }

    public function updateProductDetails($data1,$photo) {
        $this -> db -> query('UPDATE seller_product_details 
                              SET title = :title, 
                                  price = :price, 
                                  description = :description,
                                  image = :image
                              WHERE (product_no = :id)');
        $this -> db -> bind(':id', $data1['id']);
        $this -> db -> bind(':title', $data1['title']);
        $this -> db -> bind(':price', $data1['price']);
        $this -> db -> bind(':description', $data1['description']);
        $this -> db -> bind(':image', $data1['image']);
        $this->db->execute();

        // $sql = 'SELECT * FROM seller_product_details WHERE seller_id = :seller_id ORDER BY product_no DESC LIMIT 1' ;
        // $sql = 'SELECT * FROM product_photos WHERE product_no = :id' ;
        // $this ->db ->query($sql);
        // $this -> db -> bind(':id', $data1['id']);
        // $res = $this -> db -> singleRecord();
        // if($res) {

        $this -> db -> query('DELETE FROM product_photos WHERE (product_no = :id)');
        $this -> db-> bind(':id', $data1['id']);
        $this->db->execute();
        foreach ($photo as $photos){
                $sql1 = 'INSERT INTO product_photos (product_no, image_name) VALUES (:id,:image_name)';
                $this ->db ->query($sql1);
                $this -> db -> bind(':id', $data1['id']);
                $this ->db-> bind(':image_name',$photos);
                $this -> db ->execute();
            }
            return true;
        }

        public function delete($delete_item_id) {
            $this -> db -> query('DELETE FROM seller_product_details 
                                  WHERE (product_no = :delete_item_id)');
            
            $this -> db -> bind(':delete_item_id', $delete_item_id);
            $this->db->execute();
        }
            
    
        public function getSelectedRadioItems($radio_value) {
            $id =$_SESSION['user_id'];
            $this -> db -> query('SELECT *, AVG(rating) AS total_rating FROM seller_product_details 
                                    INNER JOIN product_category
                                    ON seller_product_details.category_id = product_category.product_id
                                    INNER JOIN product_rating_review
                                    ON seller_product_details.product_no = product_rating_review.product_id
                                    WHERE product_category.product_category = :category_name 
                                    AND seller_product_details.seller_id = :id 
                                    GROUP BY seller_product_details.product_no;
                                    ');
            $this -> db-> bind(':category_name',$radio_value);
            $this -> db-> bind(':id',$id);
            $results = $this -> db -> resultSet();
            return $results;
        }

        public function getSelectedRadioCats() {
            $this -> db -> query('SELECT DISTINCT(product_category) FROM product_category');
    
            $catresults = $this -> db -> resultSet();
            return $catresults;
        }

        public function addNewCategory($data) {
            $id =$_SESSION['user_id'];
            $this -> db -> query('INSERT INTO new_product_category
                                    (seller_id, description, items, status)  
                                    VALUES(:id, :description, :items, :status)
            ');

            $this -> db -> bind(':id',$id);
            $this -> db -> bind(':description', $data['description']);
            $this -> db -> bind(':items', $data['items']);
            $this -> db -> bind(':status', 0);
            if($this -> db -> execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getreportData(){
            $id =$_SESSION['user_id'];
            $this -> db -> query('SELECT *, 
                                    AVG(rating) AS fullrating,
                                    (quantity - count) AS num_of_sold_items,
                                    (quantity - count)*price AS item_income,
                                    SUM((quantity - count)*price) AS total_income
                                    FROM `seller_product_details` 
                                    LEFT JOIN wishlist 
                                    ON seller_product_details.product_no = wishlist.product_no
                                    INNER JOIN product_rating_review
                                    ON seller_product_details.product_no = product_rating_review.product_id
                                    WHERE seller_id = :id
                                    AND wishlist.status = 3
                                    AND DATEDIFF(CURRENT_TIMESTAMP(), wishlist.complete_date_time)<30
                                    GROUP BY seller_product_details.product_no;
            ');
            $this -> db -> bind(':id',$id);
            $results = $this -> db -> resultSet();
            return $results;
        }

        public function gettotalIncome(){
            $id =$_SESSION['user_id'];
            $this -> db -> query('SELECT SUM(item_income) AS total_income
                                    FROM (
                                        SELECT 
                                            AVG(rating) AS fullrating,
                                            (quantity - count) AS num_of_sold_items,
                                            (quantity - count)*price AS item_income
                                            FROM `seller_product_details` 
                                            LEFT JOIN wishlist 
                                            ON seller_product_details.product_no = wishlist.product_no
                                            INNER JOIN product_rating_review
                                            ON seller_product_details.product_no = product_rating_review.product_id
                                            WHERE seller_id = :id
                                            AND wishlist.status = 3
                                            AND DATEDIFF(CURRENT_TIMESTAMP(), wishlist.complete_date_time)<30
                                            GROUP BY seller_product_details.product_no
                                        ) AS item_income_table;
            ');  
            
            $this -> db -> bind(':id',$id);
            $results = $this -> db -> singleRecord();
            // var_dump($results);
            return $results;
        }
}