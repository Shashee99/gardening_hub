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
            $details = $this->agriModel->agricenters();
            $data = [
                'agricenter' => $details
            ];
            $this->view('customers/agricenters',$data);
        }
    }