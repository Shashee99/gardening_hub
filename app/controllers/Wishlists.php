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
            $this->view('customers/wishlist');
        }
    }