<?php

    class Products extends Controller
    {
        private $productModel;
        private $categoryModel;
        private $ratingModel;

        public function __construct()
        {
            $this->productModel = $this->model('Product');
            $this->categoryModel = $this->model('ProductCategory');
            $this->ratingModel = $this->model('Review');

        }
        public function viewProducts()
        {
            $categories = $this->categoryModel->categorydetails();
            $productDetails = $this->productModel->productdetails();
            $ratings = $this->ratingModel->overallRatingOfAllProduct();
            
            $data = [
                'category' => $categories,
                'products' => $productDetails,
                'ratings' => $ratings
            ];
            $this->view('customers/products', $data);
        }
        public function viewOneProduct($id)
        {
            $productDetails = $this->productModel->getaProductDetails($id);
            $reviewDetails = $this->ratingModel->getAproductReviewRating($id);
            $ratingDetails = $this->ratingModel->overallRatingOfProduct($id);

            $data = [
                'product' => $productDetails,
                'review' => $reviewDetails,
                'rating' => $ratingDetails
            ];
            $this->view('customers/oneproductdetails',$data);
            
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
                ];

                $this->productModel->addProductToWislist($data);
                flash('item_add_successfuly', 'You item added successfuly to the wishlist');
                redirect('Products/viewProducts');

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
        public function filterProducts()
        {
            $category = $_GET['category'];
            $sub_category = $_GET['sub-category'];
            $price = $_GET['price'];

            $result = $this->productModel->filterProducts($category, $sub_category, $price);

            $arr = array();

            foreach($result as $products)
            {
                $arr[] = array(
                    'product_no' => $products->product_no,
                    'photo' => $products->image,
                    'title' => $products->title,
                    'seller' => $products->shop_name,
                    'quantity' => $products->quantity,
                    'price' => $products->price
                );
            }
            echo json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        public function isAddedProductReview()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $cus_id = $_POST['cus_id'];
                $pro_id = $_POST['product_id'];

                if($this->ratingModel->isAddedProductReview($pro_id, $cus_id))
                {
                    echo json_encode("true", JSON_UNESCAPED_UNICODE);
                }
                else
                {
                    echo json_encode("false", JSON_UNESCAPED_UNICODE);
                }

            }
        }
                    
    }
