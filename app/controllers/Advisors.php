<?php

    class Advisors extends Controller
    {
        private $advisorModel;

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
        public function viewHomePage()
        {
            $this->view('advisor/homepage');
        }
        public function viewAdvisors()
        {
            $details = $this->advisorModel->all_registered_advisors();
            $data = [
                'advisor_details' => $details
            ];
            $this->view('customers/advisors',$data);
        }

        public function searchbynames_registeredadvisor(){


            if(isset($_POST['searchbynames_registeredadvisor'])){
                $text = $_POST['searchbynames_registeredadvisor'];
                $dataset = $this->advisorModel -> searchuserbyname_registeredadvisor($text);
                echo json_encode($dataset);
                unset($_POST['searchbynames_registeredadvisor']);
                exit();
            }
            else{
                $tabledata = $this->advisorModel->all_registered_advisors();
                $tabledata =json_encode($tabledata);
                echo $tabledata;
                exit();

            }

        }
        public function searchbynames_unregisteredadvisor(){

            if(isset($_POST['searchbynames_unregisteredadvisor'])){
                $text = $_POST['searchbynames_unregisteredadvisor'];
                $dataset = $this->advisorModel -> searchuserbyname_unregisteredadvisor($text);
                echo json_encode($dataset);
                unset($_POST['searchbynames_unregisteredadvisor']);
                exit();
            }
            else{
                $tabledata = $this->advisorModel->get_non_registered_advisors();
                $tabledata = json_encode($tabledata);
                echo $tabledata;
                exit();

            }

        }
        public function recentlyaddedadvisors(){

            $dataset = $this -> advisorModel -> recentlyaddedadvisors();
            $data = json_encode($dataset);
            echo $data;
            exit();

        }
         
        public function advisorDetails($id)
        {
            $this->view('customers/advisorProfile');
        }

        
    }