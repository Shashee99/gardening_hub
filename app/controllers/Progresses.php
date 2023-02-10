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
            $progress_details = $this->progressModel->viewMyProgress($_SESSION['cus_id']);
            $data = [
                'progress' => $progress_details
            ];
            $this->view('customers/myprogress', $data);
        }
        public function viewOtherProgress()
        {
            $progress_details = $this->progressModel->viewOtherProgress($_SESSION['cus_id']);
            $data = [
                'progress' => $progress_details
            ];
            $this->view('customers/otherProgress', $data);
        }
    }