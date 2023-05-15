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
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data = [
                        'seller_id' => $id,
                        'customer_id' => $_SESSION['cus_id'],
                        'review' => trim($_POST['review']),
                        'service' => $_POST['service'],
                        'products' => $_POST['products'],
                        'overall' => $_POST['overall']
                    ];

                    if($this->ratingModel->addSellerRating($data))
                    {
                        redirect('sellers/sellerDetails/'.$id);
                    }
                    else
                    {
                        
                    }
            }
                
        }
    }