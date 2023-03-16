<?php
class Seller{
    private $db;

    public function __construct() {
        $this -> db = new Database;
    }

    public function getItemData() {
        $id =$_SESSION['user_id'];
        $this -> db -> query('SELECT * FROM seller_product_details WHERE seller_id = :id');
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



//       $this -> db ->execute();
//
//        $cus_id =intval($result->product_id);
//
//        $this -> db -> query('UPDATE seller_product_details_demo SET image = :image WHERE product_id = :id');
//
//        $this -> db -> bind(':image', $data['image']);
//        $this -> db -> bind(':id', $cus_id);


    }
    public function get_all_sellers(){
        $this -> db ->query('SELECT * FROM seller');
        $dataset = $this->db->resultSet();
        return $dataset;
    }
    public function get_non_registered_sellers(){
        $this->db->query('SELECT * FROM `seller` WHERE is_registered = 0');
        $dataset = $this->db->resultSet();
        return $dataset;
    }

    public function all_registered_sellers(){
        $this -> db ->query('SELECT * FROM `seller` WHERE is_registered = 1');
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
        $this -> db -> query('SELECT owner_name FROM seller WHERE seller_id = :id');
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
                                WHERE wishlist.seller_id = :id;
        ');
        $this -> db-> bind(':id',$id);
        $orderdetails = $this -> db -> resultSet();
        return $orderdetails;
    }

    public function order($data) {
        $id =$_SESSION['user_id'];
        $this -> db -> query('UPDATE wishlist 
                              SET completeness = :orderComplete,
                              confirmation = :confirmation
                              complete_date = :order_date
                              WHERE seller_id = :id');

        $this -> db -> bind(':orderComplete', $data['completeness']);
        $this -> db -> bind(':confirmation', $data['confirmation']);
        $this -> db -> bind(':order_date', $data['complete_date']);
        $this -> db-> bind(':id',$id);
    }
    public function searchuserbyname_registeredsellers($name){
        $search_term = $name . '%';
        $this -> db -> query('SELECT * FROM `seller` WHERE `shop_name` LIKE :search_term AND is_registered = 1');
        $this ->db ->bind(':search_term',$search_term);
        $dataset = $this->db->resultSet();
        return $dataset;

    }
    public function searchuserbyname_unregisteredsellers($name){
        $search_term = $name . '%';
        $this -> db -> query('SELECT * FROM `seller` WHERE `shop_name` LIKE :search_term AND is_registered = 0');
        $this ->db ->bind(':search_term',$search_term);
        $dataset = $this->db->resultSet();
        return $dataset;

    }
    public function recentlyaddedsellers()
    {
        $this -> db -> query('SELECT * FROM seller ORDER BY seller_id DESC LIMIT 5; ');
        $dataset = $this -> db-> resultSet();
        return $dataset;
    }



    
    public function order_conf($item) {
        $id =$_SESSION['user_id'];
        $this -> db -> query('UPDATE wishlist 
                              SET confirmation = 1
                              WHERE (seller_id = :id  AND product_no = :item)');
        
        $this -> db -> bind(':item', $item);
        // $this -> db -> bind(':confirmation', $data['confirmation']);
        // $this -> db -> bind(':order_date', $data['complete_date']);
        $this -> db-> bind(':id',$id);
        $this->db->execute();
    }

    public function order_cancel($product_no, $cancel_reason) {
        $id =$_SESSION['user_id'];
        $this -> db -> query('UPDATE wishlist 
                              SET cancel_reason = :cancel_reason 
                              WHERE (seller_id = :id  AND product_no = :item)');
        
        $this -> db -> bind(':cancel_reason', $cancel_reason);
        $this -> db -> bind(':item', $product_no);
        $this -> db-> bind(':id',$id);
        $this->db->execute();
    }
}

