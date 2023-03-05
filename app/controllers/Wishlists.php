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
    }