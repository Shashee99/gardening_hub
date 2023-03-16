<?php

    class Reviews extends Controller
    {
        private $ratingModel;

        public function __construct()
        {
            $this->ratingModel = $this->model('Review');
        }
        public function addProductReviewRating($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'product_id' => $id,
                    'customer_id' => $_SESSION['cus_id'],
                    'rating' => trim($_POST['rate']),
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
    }