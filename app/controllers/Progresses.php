<?php 

    class Progresses extends Controller
    {
        private $progressModel;

        public function __construct()
        {
            $this->progressModel = $this->model('Progress');
        }
        public function viewMyProgress()
        {
            $this->view('customers/myprogress');
        }
    }