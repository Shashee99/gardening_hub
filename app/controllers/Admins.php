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
        $this->complaintModel = $this->model('Complaint');
        $this->userModel = $this->model('User');
        $this->advisorModel = $this->model('Advisor');
        $this->mailer = new Mailer();
    }

    public function home()
    {

        $advisors = $this->advisorModel->all_registered_advisors();
        $customers = $this->customerModel->get_all_customers();
//        $sellers = $this -> customerModel -> get_all_sellers();

        $data = [
            'nav' => 'home',
            'title' => 'Dashboard',
            'advisors' => $advisors,
            'customers' => $customers,
            'jsfile' => 'admin_home.js'
//            'sellers' => $sellers

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
        $this->view('admin/Complains', $data);
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
        $data = [
            'nav' => 'Sellers',
            'title' => 'Sellers',
            'sellerinfo' => $sellers,
            'jsfile' => 'admin_sellers.js'
        ];
        $this->view('admin/sellerpreview', $data);
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


    public function getlatesadvisors()
    {


    }


}
