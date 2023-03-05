<?php
class ProductCategory{

    private $db;
    public function __construct()
    {
        $this ->db = new Database();
    }
    public function categorydetails(){
        $sql = 'SELECT DISTINCT(product_category) FROM product_category';
        $this->db->query($sql);
        $dataset = $this->db->resultSet();
        return $dataset;
    }
    public function getAllCategories(){
        $this->db->query('SELECT * FROM product_category');
        $dataset = $this->db->resultSet();
        return $dataset;
    }
    public function insertcat($cat,$subcat){
        $this->db->query('INSERT INTO product_category(product_category,sub_category) VALUES (:cat,:subcat)');
        $this->db->bind(':cat',$cat);
        $this->db->bind(':subcat',$subcat);
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function updatecat($id,$cat,$subcat){
        $this->db->query('UPDATE product_category SET product_category =:cat,sub_category=:subcat WHERE product_id=:id ');
        $this->db->bind(':cat',$cat);
        $this->db->bind(':subcat',$subcat);
        $this->db->bind(':id',$id);
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){
        $this->db->query('DELETE FROM product_category WHERE product_id = :id');
        $this->db->bind(':id',$id);
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function subcategory($category){
        $sql = 'SELECT * FROM product_category where product_category = :category ';
        $this->db->query($sql);
        $this->db->bind(':category',$category);
        $dataset = $this->db->resultSet();
        return $dataset;
    }

    public function getproductid($cat,$subcat){
        $sql = 'SELECT product_id FROM product_category WHERE product_category = :cat AND sub_category = :sub';
        $this->db ->query($sql);
        $this->db-> bind(':cat',$cat);
        $this->db-> bind(':sub',$subcat);
        $result = $this ->db->singleRecord();
        return $result;

    }

    public function searchbycatname($name){
        $search_term = $name . '%';
        $this -> db -> query('SELECT * FROM product_category  WHERE product_category LIKE :search_term ');
        $this ->db ->bind(':search_term',$search_term);
        $dataset = $this->db->resultSet();
        return $dataset;

    }

}