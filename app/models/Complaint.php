<?php
class Complaint
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllComplaints(){
        $this->db->query('SELECT * FROM complain');
        $dataset = $this->db->resultSet();
        return $dataset;

    }

    public function getcomplaintbyid($id){
        $this -> db ->query('SELECT * FROM complain WHERE complian_no = :id');
        $this ->db -> bind(':id',$id);
        $comp = $this ->db -> singleRecord();
        return $comp;
    }
    public function viewedcomplain($complainref){
        $this->db-> query('UPDATE complain SET state = 1 WHERE complian_no = :compid');
        $this -> db -> bind(':compid',$complainref);
        $this -> db -> execute();

    }
    public function addComplainForSeller($data, $photo)
    {
        $sql = "INSERT INTO complain (complain,posted_user_id,complained_user_id) VALUES (:complain,:cus_id,:seller_id)";
        $this->db->query($sql);
        $this -> db -> bind(':complain',$data['complain']);
        $this -> db -> bind(':cus_id',$_SESSION['cus_id']);
        $this -> db -> bind(':seller_id',$data['seller']->seller_id);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public function isaddedcomplainforseller($id)
    {
        $sql = "SELECT * FROM complain WHERE posted_user_id = :cus_id AND complained_user_id = :seller_id ";
        $this->db->query($sql);
        $this -> db -> bind(':cus_id',$_SESSION['cus_id']);
        $this -> db -> bind(':seller_id',$id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getallthecomplaintstothisid($id){
        $this ->db -> query('SELECT * FROM complain WHERE complained_user_id = :id;');
        $this -> db -> bind(':id',$id);
        $dataset = $this->db->resultSet();
        return $dataset;
    }



}