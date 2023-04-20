<?php
class Complaint
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllComplaints(){
        $this->db->query('SELECT * FROM complain WHERE state != 2;');
        $dataset = $this->db->resultSet();
        return $dataset;

    }
    public function getresolvedAllComplaints(){
        $this->db->query('SELECT * FROM complain WHERE state = 2;');
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

    public function getallthecomplaintstothisid($id){
        $this ->db -> query('SELECT * FROM complain WHERE complained_user_id = :id;');
        $this -> db -> bind(':id',$id);
        $dataset = $this->db->resultSet();
        return $dataset;
    }

    public function resolvecomplaint($complainref){
        $this->db-> query('UPDATE complain SET state = 2 WHERE complian_no = :compid');
        $this -> db -> bind(':compid',$complainref);
        $this -> db -> execute();
        return true;
    }

    public function deletecomplaint($complainref){
        $this->db-> query('DELETE FROM complain WHERE complian_no = :compid');
        $this -> db -> bind(':compid',$complainref);
        $this -> db -> execute();
        return true;
    }



}