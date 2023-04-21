<?php 

    class Customers extends Controller
    {
        private $customerModel;
        private $wishlistModel;
        

        public function __construct()
        {
            $this->customerModel = $this->model('Customer');
            $this->wishlistModel = $this->model('Wishlist');
        }

        public function viewHomePage()
        {
            $data = [
                'pending' => $this->wishlistModel->orderCountGet(0),
                'rejected' => $this->wishlistModel->orderCountGet(1),
                'complete' => $this->wishlistModel->orderCountGet(3),
                'pending_to_complete' => $this->wishlistModel->orderCountGet(2),
                'wishlist' => $this->wishlistModel->customerWishlistDetails()    
            ];
            // var_dump($data['pending']);
            // die();
            $this->view('customers/cushomepage',$data );
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
        public function myProfile($id)
        {
            $cus_details = $this->customerModel->getCustomerFullDetails($id);
            $data = [
                'cus_details' => $cus_details
            ];
            $this->view('customers/profile',$data);
        }

        public function deletecustomer(){
            $id = $_POST['id'];
            $result = $this -> customerModel -> deletecustomer($id);
            if ($result){
                echo "Deleted Successfully";
            }else{
                die("something went wrong");
            }

        }


       
    }