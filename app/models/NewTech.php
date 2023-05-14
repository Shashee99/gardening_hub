<?php

class NewTech
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function newtechnologies()
    {
        $sql = "SELECT * FROM new_technology ";
        $this->db->query($sql);
        $row = $this->db->resultSet($sql);
        return $row;
    }
    public function newtechnologiesByCat($category)
    {
        $sql = "SELECT * FROM new_technology WHERE category = :cat";
        $this->db->query($sql);
        $this->db->bind(':cat', $category);
        $row = $this->db->resultSet($sql);
        return $row;
    }
    public function myNewtechnologies()
    {
        $sql = "SELECT * FROM new_technology WHERE advisor_id=:id AND is_delete=0";
        $this->db->query($sql);
        $this->db->bind(':id',$_SESSION['advisor_id']);
        $row = $this->db->resultSet($sql);
        return $row;
    }
    public function myNewtechnologiesByCat($category)
    {
        $sql = "SELECT * FROM new_technology WHERE category = :cat AND advisor_id=:id AND is_delete=0";
        $this->db->query($sql);
        $this->db->bind(':cat', $category);
        $this->db->bind(':id',$_SESSION['advisor_id']);
        $row = $this->db->resultSet($sql);
        return $row;
    }
    public function techPhotosbyId($id)
    {
        $sql = "SELECT * FROM tecpoto WHERE no =:no";
        $this->db->query($sql);
        $this->db->bind(':no', $id);
        $row = $this->db->resultSet($sql);
        return $row;
    }
    public function deleteTecno($id) // delete for add tecnhology
    {
        $sql="UPDATE new_technology SET is_delete = 1 WHERE no =:id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
