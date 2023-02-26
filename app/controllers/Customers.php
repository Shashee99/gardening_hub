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


       
    }