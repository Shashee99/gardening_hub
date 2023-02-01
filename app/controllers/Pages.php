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
      
        public function about()
        {
            $data = [
              'title' => 'About Us'
            ];
      
            $this->view('pages/about', $data);
        }
        public function product(){
            $data = [
                'title' => 'Products'
            ];
            $this->view('pages/product',$data);
        }
        public function signup(){
            $data = [
                'title' => 'Sign up'
            ];
            $this->view('pages/signup',$data);
        }
    } 