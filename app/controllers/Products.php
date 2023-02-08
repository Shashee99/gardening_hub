<?php

    class Products extends Controller
    {
        private $productModel;
        private $categoryModel;

        public function __construct()
        {
            $this->productModel = $this->model('Product');
            $this->categoryModel = $this->model('ProductCategory');

        }
        public function viewProducts()
        {
            $categories = $this->categoryModel->categorydetails();
            $productDetails = $this->productModel->productdetails();
            $data = [
                'category' => $categories,
                'products' => $productDetails
            ];
            $this->view('customers/products', $data);
        }
    }
