<?php

    class AgriCenters extends Controller
    {
        private $agriModel;

        public function __construct()
        {
            $this->agriModel = $this->model('AgriCenter');
        }
        public function viewAgriCenters()
        {
            $this->view('customers/agricenters');
        }
    }