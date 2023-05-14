<?php

    class Pages extends Controller
    {
        public function __construct()
        {
            //$this->postModel = $this->model('Post');
        }
        public function index()
        {
            $this->view('index',['title' =>'Welcome']);
        }
        public function home()
        {
            $data = [
              'title' => 'Home',
            ];
           
            $this->view('pages/home', $data);
        }

        public function advisors(){
            $data = [
                'title' => 'Advisors'
            ];
            $this->view('pages/advisors', $data);
        }
      
        public function Customers()
        {
            $data = [
              'title' => 'Customers'
            ];
      
            $this->view('pages/customers', $data);
        }
        public function sellers(){
            $data = [
                'title' => 'Sellers'
            ];
            $this->view('pages/sellers',$data);
        }
        public function signup(){
            $data = [
                'title' => 'Sign up'
            ];
            $this->view('pages/signup',$data);
        }
    } 