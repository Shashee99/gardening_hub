<?php
class Notification{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getallnotifications(){

        $this ->db ->query('SELECT * FROM admin_notification WHERE is_viewed = 0 ;');
        $dataset = $this->db->resultSet();
        return $dataset;

    }
    public function clearnotification($id){
        $this -> db -> query('UPDATE admin_notification SET is_viewed = 1 WHERE notifiication_id = :id;');
        $this ->db ->bind(':id',$id);
        $result = $this->db->execute();
        return $result;
    }


    
}
