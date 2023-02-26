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
        public function viewOneProduct($id)
        {
            $this->view('customers/oneproductdetails');
            
        }
        public function addProductToWishlist($product_id)
        {
            $product_details = $this->productModel->getaProductDetails($product_id);
            // print_r($product_details);
            // die();


            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // var_dump($_POST['no_of_items']);
                // die();
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'product_id' => $product_id,
                    'count' =>  (int)trim($_POST['no_of_items']),
                    'Products_details' => $product_details,
                    'count_err' => ''
                ];
                if(empty($data['count']))
                {
                    $data['count_err'] = 'Please enter amonut that do you want from that product';
                }
                elseif($data['count'] >= $product_details->quantity)
                {
                    $data['count_err'] = 'You can not get more than '.$product_details->quantity.' items';
                }
                if(empty($data['count_err']))
                {
                    $this->productModel->addProductToWislist($data);
                    redirect('Products/viewProducts');
                }
                else
                {
                    $this->view('customers/addproduct',$data);
                }

            }
            else
            {
                $data = [
                    'product_id' => $product_id,
                    'count' => '',
                    'count_err' => ''
                ];
                $this->view('customers/addproduct',$data);
            }   
        }
                    
    }
