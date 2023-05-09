<?php

class Admins extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->notiModel = $this -> model('Notification');
        $this->adminModel = $this->model('Admin');
        $this->customerModel = $this->model('Customer');
        $this->sellerModel = $this->model('Seller');
        $this->userModel = $this->model('User');
        $this->advisorModel = $this->model('Advisor');
        $this->complaintModel = $this -> model('Complaint');
        $this->productcatModel = $this -> model('ProductCategory');
        $this->mailer = new Mailer();

    }

    public function home()
    {

        $advisors = $this->advisorModel->all_registered_advisors();
        $customers = $this->customerModel->get_all_customers();
        $sellers = $this -> sellerModel -> all_registered_sellers();
        $category = $this -> productcatModel -> getnewcategoryrequests_pending();
        $newsellers = $this -> sellerModel -> get_non_registered_sellers();
        $newadvisors = $this -> advisorModel -> get_non_registered_advisors();

        $data = [
            'nav' => 'home',
            'title' => 'Dashboard',
            'newcatrequests' => $category,
            'advisors' => $advisors,
            'customers' => $customers,
            'jsfile' => 'admin_home.js',
            'sellers' => $sellers,
            'newsellers' => $newsellers,
            'newadvisors' => $newadvisors

        ];
        $this->view('admin/home', $data);
    }

    public function productcategories()
    {
        $category = $this -> productcatModel -> getnewcategoryrequests_pending();
        $data = [
            'nav' => 'categories',
            'title' => 'Product Categories',
            'jsfile' => 'admin_categories.js',
            'newcatrequests' => $category
        ];
        $this->view('admin/productcategories', $data);
    }


    public function newproductcategories(){
        $newreqs = $this ->productcatModel-> getnewcategoryrequests();

        $data = [
            'newrequsets' => $newreqs,
            'nav' => 'categories',
            'title' => 'Product Categories',
            'jsfile' => 'admin_categories.js'
        ];
        $this->view('admin/newcategories', $data);
    }
    public function newproductcategories_pending(){

        $newreqs = $this ->productcatModel-> getnewcategoryrequests_pending();

        $data = [
            'newrequsets' => $newreqs,
            'nav' => 'categories',
            'title' => 'Product Categories',
            'jsfile' => 'admin_categories.js'
        ];
        $this->view('admin/newcategories_pending', $data);
    }
    public function newproductcategories_done(){

        $newreqs = $this ->productcatModel-> getnewcategoryrequests_done();

        $data = [
            'newrequsets' => $newreqs,
            'nav' => 'categories',
            'title' => 'Product Categories',
            'jsfile' => 'admin_categories.js'
        ];
        $this->view('admin/newcategories_done', $data);
    }
    public function newproductcategories_cancelled(){

        $newreqs = $this ->productcatModel-> getnewcategoryrequests_cancel();

        $data = [
            'newrequsets' => $newreqs,
            'nav' => 'categories',
            'title' => 'Product Categories',
            'jsfile' => 'admin_categories.js'
        ];
        $this->view('admin/newcategories_cancel', $data);
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
        $newsellers = $this -> sellerModel ->get_non_registered_sellers();
        $data = [
            'nav' => 'sellers',
            'title' => 'Product Sellers',
            'sellers' => $sellers,
            'newsellers' => $newsellers,
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
        $newadvisors = $this -> advisorModel -> get_non_registered_advisors();

        $data = [
            'nav' => 'advisors',
            'title' => 'Agricultural Advisors',
            'registeredAdvisors' => $advisors,
            'jsfile' => 'admin_advisors.js',
            'newadvisors' => $newadvisors
        ];
        $this->view('admin/advisors', $data);
    }



    public function newsellers()
    {
        $newsellers = $this->adminModel->get_non_registered_sellers();

        $data = [
            'nav' => 'sellers',
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
            'nav' => 'advisors',
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
            'nav' => 'sellers',
            'title' => 'Sellers',
            'sellerinfo' => $sellers,
            'jsfile' => 'admin_sellers.js',
            'complaints' => $complaints
        ];
        $this->view('admin/registeredsellerpreview', $data);
    }

    public function viewsellernonregistered($id){
        $sellers = $this->sellerModel->getSellerDetails($id);
        $data = [
            'nav' => 'sellers',
            'title' => 'Sellers',
            'sellerinfo' => $sellers,
            'jsfile' => 'admin_sellers.js'
        ];
        $this->view('admin/sellerpreview', $data);
    }

    public function viewadvisor($id)
    {
        $advisor = $this->advisorModel->getAdvisordetails($id);
        $document = $this ->advisorModel ->getAdvisordocuments($id);
        $data = [
            'nav' => 'advisors',
            'title' => 'Advisors',
            'advisor' => $advisor,
            'document' => $document,
            'jsfile' => 'admin_advisors.js'
        ];
        $this->view('admin/advisorpreview', $data);
    }
    public function viewadvisorregistered($id)
    {
        $advisor = $this->advisorModel->getAdvisordetails($id);
        $complaints = $this ->complaintModel -> getallthecomplaintstothisid($id);
        $document = $this ->advisorModel ->getAdvisordocuments($id);
        foreach ($complaints as $rowdata) {
            $rowdata->posted_user_id = $this->userModel->getNamebyuserid($rowdata->posted_user_id);
            $rowdata->complained_user_id = $this->userModel->getNamebyuserid($rowdata->complained_user_id);
        }

        $data = [
            'nav' => 'advisors',
            'title' => 'Advisors',
            'advisor' => $advisor,
            'jsfile' => 'admin_advisors.js',
            'document' => $document,
            'complaints'=> $complaints
        ];
        $this->view('admin/registeredadvisorpreview', $data);
    }

    public function sellerApprove($id)
    {

        $this->adminModel->sellerApprove($id);
        $this -> notiModel -> clearthenotificationafterapprove($id);

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
        $this -> notiModel -> clearthenotificationafterapprove($id);
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
            'nav' => 'sellers',
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
            'nav' => 'advisors',
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
        $posted_id = $complaints->posted_user_id;
        $complainted_id = $complaints -> complained_user_id;
        $complainant = $this->userModel->getNamebyuserid($complaints->posted_user_id);
        $complainant_type = $this->userModel->getUsertype($complaints->posted_user_id);
        $complainee = $this->userModel->getNamebyuserid($complaints->complained_user_id);
        $complainee_type = $this->userModel->getUsertype($complaints->complained_user_id);
        $this->complaintModel->viewedcomplain($complaintID);

        $data = [
            'nav' => 'complaint',
            'title' => 'Complaints',
            'complaints' => $complaints,
            'complainant' => $complainant,
            'complainant_type' => $complainant_type,
            'complainee' => $complainee,
            'complainee_type' => $complainee_type,
            'jsfile' => 'admin_complaint.js',
            'complainantid' => $posted_id,
            'complaineeid' => $complainted_id
        ];
        $this->view('admin/complaintview', $data);

    }
    public function viewcomplainresolved($complaintID)
    {

        $complaints = $this->complaintModel->getcomplaintbyid($complaintID);
        $posted_id = $complaints->posted_user_id;
        $complainted_id = $complaints -> complained_user_id;
        $complainant = $this->userModel->getNamebyuserid($complaints->posted_user_id);
        $complainant_type = $this->userModel->getUsertype($complaints->posted_user_id);
        $complainee = $this->userModel->getNamebyuserid($complaints->complained_user_id);
        $complainee_type = $this->userModel->getUsertype($complaints->complained_user_id);
        $this->complaintModel->viewedcomplain($complaintID);

        $data = [
            'nav' => 'complaint',
            'title' => 'Complaints',
            'complaints' => $complaints,
            'complainant' => $complainant,
            'complainant_type' => $complainant_type,
            'complainee' => $complainee,
            'complainee_type' => $complainee_type,
            'jsfile' => 'admin_complaint.js',
            'complainantid' => $posted_id,
            'complaineeid' => $complainted_id
        ];
        $this->view('admin/complaintviewresolved', $data);

    }

    public function rejectauser(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $username = "";
            $usermail = trim($_POST['email']);
            $reason = trim($_POST['reason']);
            $id = $this->userModel->getuseridbyemail($usermail);
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
            'nav' => 'sellers',
            'title' => 'Delete a Product Seller ?',
            'jsfile' => 'admin_sellers.js'

            ];

        $this->view('admin/sellerdeleteconfirmation',$data);

    }

//    delete an advisor

    public function deleteaadviser($id){

        $data = [

            'id' => $id,
            'nav' => 'advisors',
            'title' => 'Delete a Advisor ?',
            'jsfile' => 'admin_advisors.js'

        ];

        $this->view('admin/advisordeleteconfirmation',$data);

    }

    public function viewuserfromnotification($id){
        $useremail =  $this -> userModel -> getemailbyuserid($id);
        $usertype = $this -> userModel -> getusertypebyemail($useremail);


        if($usertype == "seller")
        {
            $this -> viewsellernonregistered($id);
        }
        elseif ($usertype == "advisor")
        {
            $this -> viewadvisor($id);
        }

    }
    public function deleteacomplain($id){
       if( $this -> complaintModel -> deletecomplaint($id)){
           redirect('admins/complains');
       }
       else{
           die('Error occured');
       }


    }

    public function resolvecomplain($id){
        if( $this -> complaintModel -> resolvecomplaint($id)){
            redirect('admins/complains');
        }
        else{
            die('Error occured');
        }

    }
    public function resolvedcomplains(){
        $complaints = $this->complaintModel->getresolvedAllComplaints();

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
        $this->view('admin/resolvedcomplains', $data);


    }

    public function viewcomplaineduser($id){
        $useremail =  $this -> userModel -> getemailbyuserid($id);
        $usertype = $this -> userModel -> getusertypebyemail($useremail);


        if($usertype == "seller")
        {

            $this -> viewseller($id);
        }
        elseif ($usertype == "advisor")
        {
            $this -> viewadvisor($id);
        }
        else{
            $this -> viewcustomer($id);
        }

    }


    public function viewnewcategoryrequest($id){

        $result = $this -> productcatModel -> getnewcategoryrequestsbyreqid($id);

        $data = [
            'reqid'=> $id,
            'request' => $result,
            'nav' => 'categories',
            'title' => 'Product categories',
            'jsfile' => 'admin_reqnewcategories.js'
        ];

        $this->view('admin/viewnewcategoryrequest',$data);

    }

    public function newproductcategories_markasdone($id){
        $result = $this -> productcatModel -> markasdone($id);
        if($result){
            redirect('admins/newproductcategories');
        }
        else{
            die('error occured!');
        }

    }
    public function newproductcategories_markasrejected($id){
        $result = $this -> productcatModel -> markasrejected($id);
        if($result){
            redirect('admins/newproductcategories');
        }
        else{
            die('error occured!');
        }

    }

    public function userdelete($id){

        $email = $this-> userModel -> getemailbyuserid($id);

        $data = [
            'nav' => 'sellers',
            'title' => 'Delete a user',
            'email' => $email,
            'jsfile' => 'admin_userdelete.js'

        ];

        $this -> view('admin/delete_an_user',$data);



    }

    public function userdeleteconfirm(){

            if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $email = trim($_POST['email']);
                $reason = trim($_POST['reason']);


//             user type
                $usertype = $this -> userModel -> getusertypebyemail($email);

//                user ID
                $userID = $this ->userModel -> getuseridbyemail($email);

//                user Name
                $username = $this -> userModel -> getNamebyuserid($userID);


                if($usertype == "seller") {
                    $sellerName = ($this ->sellerModel -> getSellerDetails($userID))->shop_name;
                    $this->sellerModel->delete_seller($userID);

                 // Send message to confirmed customers
                    $results = $this->sellerModel->sellerconfirmedorders($userID);
                    $mailer1 = new Mailer();
                    foreach ($results as $res) {
                        $cusid = $res->customer_id;
                        $customerEmail = $this->userModel->getemailbyuserid($cusid);
                        $customerName = $this->userModel->getNamebyuserid($cusid);
                        $emailsent = $mailer1->sendSellerRemovalNotification($customerName, $customerEmail, $sellerName, $reason);
                        if(!$emailsent){
                            die("Error occured!");
                        }
                    }
                    $mailer1 = null;
                }

                elseif($usertype == "advisor"){
                    $this -> advisorModel -> delete_advisor($userID);
                }else
                {
                   $this -> customerModel -> deletecustomer($userID);
                }


//                sent email with reason
                $emailsent = $this -> mailer ->sendUserDeletingMessage($username,$email,$reason);


                if($emailsent){
                    redirect('admins/home');
                }


            }


    }





}
