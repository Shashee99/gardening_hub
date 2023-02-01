<?php

    class Advisors extends Controller
    {
        public function __construct()
        {
            $this->advisorModel = $this->model('Advisor');
        }
        public function allregadvisors(){
            $tabledata = $this->advisorModel->all_registered_advisors();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();
        }
        public function allnewadvisors(){
            $tabledata = $this->advisorModel->get_non_registered_advisors();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();
        }

        
    }