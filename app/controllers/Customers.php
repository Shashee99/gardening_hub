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


       
    }