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
    public function techPhotosbyId($id)
    {
        $sql = "SELECT * FROM tecpoto WHERE no =:no";
        $this->db->query($sql);
        $this->db->bind(':no', $id);
        $row = $this->db->resultSet($sql);
        return $row;
    }
}
