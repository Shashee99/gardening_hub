<?php

    class Reports extends Controller
    {
        private $reportModel;
        public function __construct()
        {
            $this->reportModel = $this->model('Report');
        }
        public function viewreports()
        {
            $this->view('customers/reports');
        }
    }
