<?php
class Admins extends Controller {
    public function __construct(){
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->adminModel = $this->model('Admin');
        $this ->customerModel = $this ->model('Customer');
    }
    public function home(){
        $data = [
            'nav'=>'home',
            'title'=>'Dashboard'
        ];
        $this->view('admin/home',$data);
    }
    public function productcategories(){
        $data = [
            'nav'=>'categories',
            'title'=>'Product Categories'
        ];
        $this->view('admin/productcategories',$data);
    }
    public function customers(){
        $customer = $this->customerModel->get_all_customers();
        $data = [
            'nav'=>'customers',
            'title'=>'Customers',
            'customers'=>$customer
        ];
        $this->view('admin/customers',$data);
    }
    public function sellers(){
        $sellers = $this->adminModel->all_registered_sellers();
        $data = [
            'nav'=>'Sellers',
            'title'=>'Product Sellers',
            'sellers' => $sellers
        ];
        $this->view('admin/sellers',$data);
    }
    public function complains(){
        $data = [
            'nav'=>'complain',
            'title'=>'Complains'
        ];
        $this->view('admin/Complains',$data);
    }
    public function advisors(){
        $advisors = $this->adminModel->all_registered_advisors();
        $data = [
            'nav'=>'advisors',
            'title'=>'Agricultural Advisors',
            'registeredAdvisors' =>$advisors
        ];
        $this->view('admin/advisors',$data);
    }
    public function reports(){
    $data = [
        'nav'=>'report',
        'title'=>'Reports'
    ];
    $this->view('admin/reports',$data);
}

    public function newsellers(){
        $newsellers = $this->adminModel->get_non_registered_sellers();
        $data = [
            'nav'=>'New sellers',
            'title'=>'Product Sellers',
            'newsellers' => $newsellers
        ];
        $this->view('admin/newsellers',$data);
    }

    public function newadvisors(){
        $newadvisors = $this->adminModel->get_non_registered_advisors();
        $data = [
            'nav'=>'New advisors',
            'title'=>'New Agricultural Advisors',
            'newadvisors' =>$newadvisors
        ];
        $this->view('admin/newadvisors',$data);
    }
    public function viewcustomer($id){
        $customerinfo = $this ->customerModel->getCustomerDetails($id);
        $data = [
            'nav'=>'customers',
            'title'=>'Customers',
            'customerinfo'=>$customerinfo
        ];
        $this->view('admin/customerpreview',$data);
    }

}
