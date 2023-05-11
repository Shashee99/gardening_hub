<?php

    class Reviews extends Controller
    {
        private $ratingModel;
        private $sellerModel;

        public function __construct()
        {
            $this->ratingModel = $this->model('Review');
            $this->sellerModel = $this->model('Seller');
        }
        public function addProductReviewRating($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'product_id' => $id,
                    'customer_id' => $_SESSION['cus_id'],
                    'rating' => trim($_POST['rating']),
                    'review' => trim($_POST['review'])
                ];
                if($this->ratingModel->addProductRating($data))
                {
                    redirect('products/viewOneProduct/'.$id);
                }
                else
                {
                    
                }

            }
        }
        public function addSellerReviewRating($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $sellerdetails = $this->sellerModel->getSellerDetails($id);
                $top_rated_products = $this->ratingModel->topRatedProducts($id);
                $seller_license = $this->sellerModel->sellerLicense($id);
                $reviews = $this->ratingModel->getsASellerReview($id);
                $rating = $this->ratingModel->getASellerRating($id);

                $data = [
                    'seller_id' => $id,
                    'customer_id' => $_SESSION['cus_id'],
                    'review' => trim($_POST['review']),
                    'service' => ($_POST['service']),
                    'products' => ($_POST['products']),
                    'overall' => ($_POST['overall']),
                    'seller' => $sellerdetails,
                    'top_products' => $top_rated_products,
                    'license' => $seller_license,
                    'reviews' => $reviews,
                    'rating' => $rating,
                    'err' => '',
                    'complain_err' => '',
                ];

                if(empty($data['service']) || empty($data['products']) || empty($data['overall']) )
                {
                    $data['err'] = "Please select rating for all option";
                }
                if(empty($data['review']))
                {
                    $data['err'] = "Please add review";
                }

                if(empty($data['err']))
                {
                    if($this->ratingModel->addSellerRating($data))
                    {
                        redirect('sellers/sellerDetails/'.$id);
                    }
                }
                else
                {
                    $this->view('customers/sellerProfile',$data);
                }

                
            }    
        }
    }