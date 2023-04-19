<?php

    class Advisors extends Controller
    {
        private $advisorModel;

        public function __construct()
        {

            if (!isAdvisorLogin()) {
                redirect('users/login');
            }

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
        //view home page------------------------
        public function viewHomePage()
        {
            $home=[];
            $this->view('advisor/home',$home);
        }
        //--------------------------------------
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

        public function deleteadvisors($id){

            if($id == 0000){
                redirect('admins/advisors');
            }
            else{
                $this -> advisorModel -> delete_advisor($id);
                redirect('admins/advisors');
            }



        }
      //add tecno lod view--------------
      public function addtecno(){
  
        $addtecno=[];
    
       $this->view('advisor/addtecno',$addtecno);
    
      }

      //add tecnohlogy for preview--------------
      public function item_add(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
           //sanities data
           $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $additem=[
             'title'=> trim($_POST['title']),
             'catagory'=>trim($_POST['catagory']),
             'content'=>trim($_POST['content']), 
             'date'=>$_POST['date'],      
             'title_error' =>'',
             'catagory_error' =>'',
             'content_error'=>'',
             'date_error'=>''
            ];
         //validate title---
          if(empty($additem['title'])){
            $additem['title_error']='*enter your title'; 
          }
         //validate catagory-----
         if(empty($additem['catagory'])){
            $additem['catagory_error']='*enter your catagory'; 
          }
        //validate content--------
        if(empty($additem['content'])){
            $additem['content_error']='*content is empty'; 
          }

         //validate date--------- 
         if(empty($additem['date'])){
            $additem['date_error']='*date  is empty'; 
          }
        //this data put data base-------    
        if(empty($additem['title_error'])&& empty($additem['catagory_error']) && empty($additem['content_error'])){
              //die('sucsse');

              redirect('advisors/addtecno');

        }else{
           $this->view('advisor/item_add',$additem);
        }


        }else{
            $additem=[
                'title'=> '',
                'catagory'=>'',
                'content'=>'', 
                'date'=>'',      
                'title_error' =>'',
                'catagory_error' =>'',
                'content_error'=>'',
                'date_error'=>''
               ];
           
               $this->view('advisor/item_add',$additem);

        }



      }



        
    }