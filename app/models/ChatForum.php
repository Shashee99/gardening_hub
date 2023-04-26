<?php

class ChatForum
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_all_messages(){
        $sql = "SELECT * FROM chat_forum INNER JOIN customer ON chat_forum.user_id = customer.customer_id ORDER BY chat_id ASC;    ";
        $this->db->query($sql);
        $row = $this->db->resultSet($sql);
        return $row;
    }
    public function sendmessage($text){
        $sql = "INSERT INTO chat_forum(user_id,message) VALUES (:id,:msg)";
        $this->db->query($sql);
        $this -> db -> bind(':msg',$text);
        $this -> db -> bind(':id',$_SESSION['cus_id']);

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
