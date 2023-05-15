<?php 

    class Customers extends Controller
    {
        private $customerModel;//create conection customer model
        private $wishlistModel;//create conection wishlist model
        

        public function __construct()
        {  //make conection to model
            $this->userModel = $this->model('User');
            $this->customerModel = $this->model('Customer');
            $this->wishlistModel = $this->model('Wishlist');
            $this->mailer = new Mailer();

        }
        //view customer home page 
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
        //customer view all others customer
        public function allcustomers(){
            $tabledata = $this->customerModel->get_all_customers();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();
        }
      //search other customer names by this function
        public function searchbynames(){

            //check post request
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
       //not in use now 
        public function recentlyaddedcustomers(){

            $dataset = $this -> customerModel -> recentlyaddedcustomers();
            $data = json_encode($dataset);
            echo $data;
            exit();
        }
        // get customer profile data and pass the data view page by this function
        public function myProfile($id)
        {
            $cus_details = $this->customerModel->getCustomerFullDetails($id);
            $data = [
                'cus_details' => $cus_details
            ];
            $this->view('customers/profile',$data);
        }
      //admin delete customer by this function
        public function deletecustomer(){
            $id = $_POST['id'];
            //call model accoding to the customer id
            $username = $this ->customerModel ->getCustomerName($id);
            $email = $this ->userModel ->getemailbyuserid($id);
            $result = $this -> customerModel -> deletecustomer($id);
            $email_result = $this -> mailer ->sendUserDeletingMessage($username,$email);

            if ($result && $email_result){
                echo "Deleted Successfully";
            }else{
                die("something went wrong");
            }
        }

       
    }