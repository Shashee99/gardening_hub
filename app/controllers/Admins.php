<?php

class Admins extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->adminModel = $this->model('Admin');
        $this->customerModel = $this->model('Customer');
        $this->sellerModel = $this->model('Seller');
        $this->userModel = $this->model('User');
        $this->advisorModel = $this->model('Advisor');
        $this->complaintModel = $this -> model('Complaint');
        $this->mailer = new Mailer();
    }

    public function home()
    {

        $advisors = $this->advisorModel->all_registered_advisors();
        $customers = $this->customerModel->get_all_customers();
        $sellers = $this -> sellerModel -> recentlyaddedsellers();

        $data = [
            'nav' => 'home',
            'title' => 'Dashboard',
            'advisors' => $advisors,
            'customers' => $customers,
            'jsfile' => 'admin_home.js',
            'sellers' => $sellers

        ];
        $this->view('admin/home', $data);
    }

    public function productcategories()
    {
        $data = [
            'nav' => 'categories',
            'title' => 'Product Categories',
            'jsfile' => 'admin_categories.js'
        ];
        $this->view('admin/productcategories', $data);
    }

    public function customers()
    {
        $customer = $this->customerModel->get_all_customers();
        $data = [
            'nav' => 'customers',
            'title' => 'Customers',
            'customers' => $customer,
            'jsfile' => 'admin_customers.js'
        ];
        $this->view('admin/customers', $data);
    }

    public function sellers()
    {
        $sellers = $this->adminModel->all_registered_sellers();
        $data = [
            'nav' => 'Sellers',
            'title' => 'Product Sellers',
            'sellers' => $sellers,
            'jsfile' => 'admin_sellers.js'
        ];
        $this->view('admin/sellers', $data);
    }

    public function complains()
    {
        $complaints = $this->complaintModel->getAllComplaints();

        foreach ($complaints as $rowdata) {
            $rowdata->posted_user_id = $this->userModel->getNamebyuserid($rowdata->posted_user_id);
            $rowdata->complained_user_id = $this->userModel->getNamebyuserid($rowdata->complained_user_id);
        }
        $data = [
            'nav' => 'complaint',
            'title' => 'Complaints',
            'complaints' => $complaints,
            'jsfile' => 'admin_complaint.js'
        ];
        $this->view('admin/complains', $data);
    }

    public function advisors()
    {
        $advisors = $this->adminModel->all_registered_advisors();

        $data = [
            'nav' => 'advisors',
            'title' => 'Agricultural Advisors',
            'registeredAdvisors' => $advisors,
            'jsfile' => 'admin_advisors.js'
        ];
        $this->view('admin/advisors', $data);
    }

    public function reports()
    {
        $data = [
            'nav' => 'report',
            'title' => 'Reports'
        ];
        $this->view('admin/reports', $data);
    }

    public function newsellers()
    {
        $newsellers = $this->adminModel->get_non_registered_sellers();
        $data = [
            'nav' => 'New sellers',
            'title' => 'Product Sellers',
            'newsellers' => $newsellers,
            'jsfile' => 'admin_sellers.js'
        ];
        $this->view('admin/newsellers', $data);
    }

    public function newadvisors()
    {
        $newadvisors = $this->adminModel->get_non_registered_advisors();
        $data = [
            'nav' => 'New advisors',
            'title' => 'New Agricultural Advisors',
            'newadvisors' => $newadvisors,
            'jsfile' => 'admin_advisors.js'
        ];
        $this->view('admin/newadvisors', $data);
    }

    public function viewcustomer($id)
    {
        $customerinfo = $this->customerModel->getCustomerDetails($id);
        $data = [
            'nav' => 'customers',
            'title' => 'Customers',
            'customerinfo' => $customerinfo,
            'jsfile' => 'admin_customers.js'
        ];
        $this->view('admin/customerpreview', $data);
    }

    public function viewseller($id)
    {
        $sellers = $this->sellerModel->getSellerDetails($id);
        $complaints = $this ->complaintModel -> getallthecomplaintstothisid($id);

        foreach ($complaints as $rowdata) {
            $rowdata->posted_user_id = $this->userModel->getNamebyuserid($rowdata->posted_user_id);
            $rowdata->complained_user_id = $this->userModel->getNamebyuserid($rowdata->complained_user_id);
        }


        $data = [
            'nav' => 'Sellers',
            'title' => 'Sellers',
            'sellerinfo' => $sellers,
            'jsfile' => 'admin_sellers.js',
            'complaints' => $complaints
        ];
        $this->view('admin/registeredsellerpreview', $data);
    }

    public function viewsellerregistered($id){
        $sellers = $this->sellerModel->getSellerDetails($id);
        $data = [
            'nav' => 'Sellers',
            'title' => 'Sellers',
            'sellerinfo' => $sellers,
            'jsfile' => 'admin_sellers.js'
        ];
        $this->view('admin/registeredsellerpreview', $data);
    }

    public function viewadvisor($id)
    {
        $advisor = $this->advisorModel->getAdvisordetails($id);
        $data = [
            'nav' => 'Advisor',
            'title' => 'Advisors',
            'advisor' => $advisor,
            'jsfile' => 'admin_advisors.js'
        ];
        $this->view('admin/advisorpreview', $data);
    }
    public function viewadvisorregistered($id)
    {
        $advisor = $this->advisorModel->getAdvisordetails($id);
        $complaints = $this ->complaintModel -> getallthecomplaintstothisid($id);

        foreach ($complaints as $rowdata) {
            $rowdata->posted_user_id = $this->userModel->getNamebyuserid($rowdata->posted_user_id);
            $rowdata->complained_user_id = $this->userModel->getNamebyuserid($rowdata->complained_user_id);
        }

        $data = [
            'nav' => 'Advisor',
            'title' => 'Advisors',
            'advisor' => $advisor,
            'jsfile' => 'admin_advisors.js',
            'complaints'=> $complaints
        ];
        $this->view('admin/registeredadvisorpreview', $data);
    }

    public function sellerApprove($id)
    {

        $this->adminModel->sellerApprove($id);
        $username = '';
//        getting the email of the seller from user table
        $email = $this->userModel->getemailbyuserid($id);
//        generating the verification code
        $verification_code = substr(uniqid(rand()), 0, 6);
//       updating the verification code in users table
        $this->userModel->insertverificationcode($id, $verification_code);

        if($this->mailer->sendVerificationbyMail($username,$email,$verification_code)){
            redirect('admins/sellers');
        }

    }


    public function advisorApprove($id)
    {

        $val = $this->adminModel->advisorApprove($id);
        $username = '';
//        getting the email of the seller from user table
        $email = $this->userModel->getemailbyuserid($id);
//        generating the verification code
        $verification_code = substr(uniqid(rand()), 0, 6);
//       updating the verification code in users table
        $this->userModel->insertverificationcode($id, $verification_code);

        if ($this->mailer->sendVerificationbyMail($username,$email,$verification_code)) {
            redirect('admins/advisors');
        }

    }
    public function rejectseller($id){

        $email = $this-> userModel -> getemailbyuserid($id);

        $data = [
            'nav' => 'Sellers',
            'title' => 'Product Sellers',
            'email' => $email,
            'sellerid' => $id,
            'jsfile' => 'admin_sellers.js'

        ];

        $this -> view('admin/sellerreject',$data);

    }
    public function rejectAdvisor($id){

        $email = $this-> userModel -> getemailbyuserid($id);

        $data = [
            'nav' => 'Advisors',
            'title' => 'Advisor',
            'email' => $email,
            'sellerid' => $id,
            'jsfile' => 'admin_advisors.js'

        ];

        $this -> view('admin/sellerreject',$data);

    }



    public function viewcomplain($complaintID)
    {

        $complaints = $this->complaintModel->getcomplaintbyid($complaintID);
        $complainant = $this->userModel->getNamebyuserid($complaints->posted_user_id);
        $complainant_type = $this->userModel->getUsertype($complaints->posted_user_id);
        $complainee = $this->userModel->getNamebyuserid($complaints->complained_user_id);
        $complainee_type = $this->userModel->getUsertype($complaints->posted_user_id);
        $this->complaintModel->viewedcomplain($complaintID);

        $data = [
            'nav' => 'complaint',
            'title' => 'Complaints',
            'complaints' => $complaints,
            'complainant' => $complainant,
            'complainant_type' => $complainant_type,
            'complainee' => $complainee,
            'complainee_type' => $complainee_type,
            'jsfile' => 'admin_complaint.js'
        ];
        $this->view('admin/complaintview', $data);

    }

    public function rejectauser(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $username = "";
            $usermail = trim($_POST['email']);
            $reason = trim($_POST['reason']);
            $id = $this->userModel->getuseridbyemail( $usermail);
//        remove the user from user table
            $this ->userModel -> deleteuserbyid($id);

            if ($this ->mailer ->sendDeclinedRegistrationEmail($username,$usermail,$reason)) {
                redirect('admins/home');
            }
            else{
                die("error");
            }
        }
    }

//delete a seller
    public function deleteaSeller($id){

        $data = [

            'id' => $id,
            'nav' => 'Sellers',
            'title' => 'Delete a Product Seller ?',
            'jsfile' => 'admin_sellers.js'

            ];

        $this->view('admin/sellerdeleteconfirmation',$data);

    }

//    delete an advisor

    public function deleteaadviser($id){

        $data = [

            'id' => $id,
            'nav' => 'Advisor',
            'title' => 'Delete a Advisor ?',
            'jsfile' => 'admin_advisors.js'

        ];

        $this->view('admin/advisordeleteconfirmation',$data);

    }

}
