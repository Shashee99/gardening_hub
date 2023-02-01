<?php
class Seller{
    private $db;

    public function __construct() {
        $this -> db = new Database;
    }

    public function getItemData() {
        $id =$_SESSION['user_id'];
        $this -> db -> query('SELECT title, price,image FROM seller_product_details WHERE seller_id = :id');
        $this -> db-> bind(':id',$id);

        $results = $this -> db -> resultSet();
        return $results;
    }

    public function add2($data) {
        $this -> db -> query('INSERT INTO seller_product_details_demo (seller_id, title, price, description, quantity) VALUES (:seller_id, :title, :price, :description, :quantity)');

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
}

