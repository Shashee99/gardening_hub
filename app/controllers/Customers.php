<?php 

    class Customers extends Controller
    {
        public function __construct()
        {
            $this->customerModel = $this->model('Customer');
        }

        public function viewHomePage()
        {
            $this->view('customers/cushomepage' );
        }
        public function allcustomers(){
            $tabledata = $this->customerModel->get_all_customers();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();
        }
        public function merge()
        {
            echo 'Yes';
        }

        public function searchbynames(){


            if(isset($_POST['searchbyname'])){
                $text = $_POST['searchbyname'];
                $dataset = $this->customerModel -> searchuserbyname($text);
                echo json_encode($dataset);
                unset($_POST['searchbyname']);
                exit();
            }
            else{
                $tabledata = $this->customerModel->get_all_customers();
                $tabledata =json_encode($tabledata);
                echo $tabledata;
                exit();

            }

        }

        public function recentlyaddedcustomers(){

            $dataset = $this -> customerModel -> recentlyaddedcustomers();
            $data = json_encode($dataset);
            echo $data;
            exit();
        }


       
    }