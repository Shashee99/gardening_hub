<?php
class Complaints extends Controller {

    public function __construct(){

        $this->complaintModel = $this->model('Complaint');

    }
    public function allnewcomplaints(){
        $tabledata = $this->complaintModel->getAllComplaints();
        $tabledata = json_encode($tabledata);
        echo $tabledata;
        exit();
    }


}