<?php
class Notifications extends Controller{

    private $notiModel;

    public function __construct()
    {
        $this->notiModel = $this->model('Notification');
    }

    public function getallnotifications(){

        $tabledata = $this->notiModel->getallnotifications();
        $tabledata =json_encode($tabledata);
        echo $tabledata;
        exit();

    }
    public function viewnotification(){
        $notiid=$_POST['notiid'];

        $result = $this->notiModel->clearnotification($notiid);
        if ($result){
            echo "Updated Succefully!";
            exit();
        }else{
            die("something went wrong");
            exit();
        }



    }

}