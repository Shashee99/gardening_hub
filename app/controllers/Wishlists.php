<?php

    class Wishlists extends Controller
    {
        private $wishlistModel;

        public function __construct()
        {
            $this->wishlistModel = $this->model('Wishlist');
        }
        public function viewWishlist()
        {
            $wishlist = $this->wishlistModel->customerWishlistDetails();
            $data =[
                'wislist' => $wishlist
            ];
            $this->view('customers/wishlist',$data);
        }
        public function filterwishlist()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                $status = $_POST['state'];

                $result = $this->wishlistModel->filterWishlist($fromDate,$toDate,$status);

                $arr = array();

                foreach($result as $wishlist)
                {
                    $arr[] = array 
                    (
                        'wishlist_id' => $wishlist->wishlist_id,
                        'product_no' => $wishlist->product_no,
                        'image' => $wishlist->image,
                        'order_date_time' => $wishlist->order_date_time,
                        'title' => $wishlist->title,
                        'count' => $wishlist->count,
                        'seller_id' => $wishlist->seller_id,
                        'shop_name' => $wishlist->shop_name,
                        'status' => $wishlist->status,
                        'status_msg' => $wishlist->status_msg
                    );
                }

                echo json_encode($arr, JSON_UNESCAPED_UNICODE);

            }
        }
    }