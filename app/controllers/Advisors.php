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
            $this ->problemModel = $this -> model('Problem');
            $this -> categoryModel = $this -> model('ProductCategory');
         
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

        $data = array();
        $problems = $this->advisorModel->giveTecno($_SESSION['advisor_id']);
        foreach($problems as $rows)
        {
            $problem_photos = array();
            $photos = $this->advisorModel->tecnoPhotosById($rows->no);
            foreach($photos as $photo)
            {
                $problem_photos[] = $photo->imge;
                //die('add postoss');
            }
            $data[] = array
            (
                'title'=> $rows->title,
                'catagory'=>$rows->category,
                'content'=>$rows->content,
                'date'=>$rows->date,
                'no'=>$rows->no,
                'photos' => $problem_photos
            );

        }
        
       
    
       $this->view('advisor/addtecno',$data);
    
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
             'title_error' =>'',
             'catagory_error' =>'',
             'content_error'=>'',
             'photo_error'=>''
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

          //validate photo----------------    
            $photoname = array_filter($_FILES['photos']['name']);
            $photocount = count($_FILES['photos']['name']);
            $type = array ('png', 'jpg', 'jpeg');
            $totsize = 0;
            $photo = array();

            if(empty($photoname))
            {
                $additem['photo_error'] = "*Please select at least one image";
            }
            elseif( $photocount!=4)
            {
               // die($photocount);
                $additem['photo_error'] = '*plese uplod 4 images';
            }

            foreach($_FILES['photos']['name'] as $key => $value)
            {
                $img_name = $_FILES['photos']['name'][$key];
                $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $totsize += $_FILES['photos']['size'] [$key];

                if($img_type != $type[0]  && $img_type != $type[1] && $img_type != $type[2])
                {
                    $additem['photo_error'] = '*Image type should be png or jpeg or jpg'; 
                    break;
                }

            }
            if($totsize > 8388608)
            {
                $additem['photo_error'] = '*Images size should be less than 8MB';
            }



            //this data put data base-------    
            if(empty($additem['title_error'])&& empty($additem['catagory_error']) && empty($additem['content_error'])&& empty($additem['photo_error'])){
               
                foreach($_FILES['photos']['name'] as $key => $value)
                {
                    $img_name = $_FILES['photos']['name'][$key];
                    $tmp_name = $_FILES['photos']['tmp_name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
                    $new_img = uniqid('IMG-',true).'.'.$img_type;
                    $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/advisor_tecno/'.$new_img;
                    move_uploaded_file($tmp_name,$img_upload_path);
                    array_push($photo,$new_img);
                }

                if($this->advisorModel->addTecno($additem,$photo)){
                    flash('add_new_tecno_successfuly', 'You tecno added successfuly');
                    redirect('advisors/addtecno');
                }else{

                }

               

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
                'photo_error'=>''

               ];
           
               $this->view('advisor/item_add',$additem);

        }



      } 

    //   update and delete tecno-----
    function updateTecnhology($id){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){

            // die($id);
            //sanities data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $additem=[
              'title'=> trim($_POST['title']),
              'catagory'=>trim($_POST['catagory']),
              'content'=>trim($_POST['content']),      
              'title_error' =>'',
              'catagory_error' =>'',
              'content_error'=>'',
              'photo_error'=>''
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
 
           //validate photo----------------    
             $photoname = array_filter($_FILES['photos']['name']);
             $photocount = count($_FILES['photos']['name']);
             $type = array ('png', 'jpg', 'jpeg');
             $totsize = 0;
             $photo = array();
 
             if(empty($photoname))
             {
                 $additem['photo_error'] = "*Please select at least one image";
             }
             elseif( $photocount>4)
             {
                 $additem['photo_error'] = '*Can not upload more than 4 images';
             }
 
             foreach($_FILES['photos']['name'] as $key => $value)
             {
                 $img_name = $_FILES['photos']['name'][$key];
                 $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                 $totsize += $_FILES['photos']['size'] [$key];
 
                 if($img_type != $type[0]  && $img_type != $type[1] && $img_type != $type[2])
                 {
                     $additem['photo_error'] = '*Image type should be png or jpeg or jpg'; 
                     break;
                 }
 
             }
             if($totsize > 8388608)
             {
                 $additem['photo_error'] = '*Images size should be less than 8MB';
             }
 
 
 
             //this data put data base-------    
             if(empty($additem['title_error'])&& empty($additem['catagory_error']) && empty($additem['content_error'])&& empty($additem['photo_error'])){
                
                 foreach($_FILES['photos']['name'] as $key => $value)
                 {
                     $img_name = $_FILES['photos']['name'][$key];
                     $tmp_name = $_FILES['photos']['tmp_name'][$key];
                     $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
                     $new_img = uniqid('IMG-',true).'.'.$img_type;
                     $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/advisor_tecno/'.$new_img;
                     move_uploaded_file($tmp_name,$img_upload_path);
                     array_push($photo,$new_img);
                 }
                
 
                 if($this->advisorModel->tecnoUpdate($additem,$photo,$id)){
                     flash('add_new_tecno_successfuly', 'You tecno added successfuly');
                     redirect('advisors/addtecno');
                 }else{
 
                 }
 
                
 
             }else{
             $this->view('advisor/tecnoUpdate',$additem);
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
                 'no'=>$id,
                 'photo_error'=>''
 
                ];

            
                $this->view('advisor/tecnoUpdate',$additem);
            }
 
    }
    // delete  add new technology ------------------

    function tecnoDelete($id){
          if($this->advisorModel->tecnoDelete($id)){
            redirect('advisors/addtecno');
          }else{
            die("is not delete");
          }
      


    }

    public function advisorDetails($id)
    {
            $this->view('customers/advisorProfile');
    }

    // chat function ------------------------------------
      public function problem_chat(){
         $categories = $this->categoryModel->categorydetails();
         $problems = $this->problemModel ->viewallProblem();

         foreach($problems as $rows)
            {
                $problem_photos = array();
                $photos = $this->problemModel->problemPhotosById($rows->problem_id);
                foreach($photos as $photo)
                {
                    $problem_photos[] = $photo->image;
                }
                $data[0][] = array
                (
                    'id' => $rows->problem_id,
                    'name' => $rows->name,
                    'date' => $rows->date_time,
                    'title' => $rows->title ,
                    'content' => $rows->content,
                    'photos' => $problem_photos,
                    'category' => $rows->category,
                    'customerpp' => $rows  -> photo
                );

            }
         $data[1]['category_details'] = $categories;
         $this->view('advisor/problem_chat',$data);
 

      }

      public function problem_chat_openoneproblem($id){

          if($_SERVER['REQUEST_METHOD']=='POST'){

              $problems = $this->problemModel->getAproblemwithcusinfo($id);
              $replies = $this -> problemModel -> getadvisorreplyforproblemid($id);
              $problem_photos = array();
              $photos = $this->problemModel->problemPhotosById($id);
              foreach($photos as $photo)
              {
                  $problem_photos[] = $photo->image;
              }
              $data =
                  [
                      'id' =>$problems->problem_id,
                      'date' => $problems->date_time,
                      'title' =>$problems->title ,
                      'name' => $problems->name,
                      'content' => $problems->content,
                      'photos' => $problem_photos,
                      'reply' => $replies,
                      'customerpp' => $problems -> photo,
                      'cusid'=> $problems -> customer_id,
                      'errormsg'=>''
                  ];

//              check whether the advisor can reply or not

//              maximum number of advisors for a post is 5 and each advisor only able to provide replies for a post are 3 times

              $numofadvisors = ($this ->problemModel -> get_num_of_repliedadvisorsforaproblem($id))->num_of_advisors;
              $numofrepliedtimes = ($this ->problemModel -> get_num_of_times_advisor_repliedforaproblem($id,$_SESSION['advisor_id']))->num_of_replies;

              if($numofadvisors >= 5 || $numofrepliedtimes >= 3){
                  if($numofadvisors >= 5){
                      $data['errormsg'] ="Sorry you can't reply for this problem ";
                      $this->view('advisor/problem_chat_onechatpreview',$data);
                  }
                  else{
                      $data['errormsg'] = "Maximum number of replies limit reached! ";
                      $this->view('advisor/problem_chat_onechatpreview',$data);
                  }

              }
              else{
                  //sanities data
                  $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                  $replyfromadvisor = trim($_POST['prompt']);
                  unset($_POST['prompt']);
                  $this->problemModel -> insertreply($id,$replyfromadvisor,$data['cusid'],$_SESSION['advisor_id']);

                  redirect('advisors/problem_chat');

              }




          }
          else{

              $problems = $this->problemModel->getAproblemwithcusinfo($id);
              $replies = $this -> problemModel -> getadvisorreplyforproblemid($id);
              $problem_photos = array();
              $photos = $this->problemModel->problemPhotosById($id);
              foreach($photos as $photo)
              {
                  $problem_photos[] = $photo->image;
              }
              $data =
                  [
                      'id' =>$problems->problem_id,
                      'date' => $problems->date_time,
                      'title' =>$problems->title ,
                      'name' => $problems->name,
                      'category'=> $problems ->category,
                      'content' => $problems->content,
                      'photos' => $problem_photos,
                      'reply' => $replies,
                      'customerpp' => $problems -> photo,
                      'cusid'=> $problems -> customer_id,
                      'errormsg'=>''
                  ];

             $this->view('advisor/problem_chat_onechatpreview',$data);

          }


     }

     public function filterproblems(){

            $rornot = $_POST['replied'];
            $category = $_POST['category'];

            $advisor  = $_SESSION['advisor_id'];
            if($rornot == 'allproblem'){

//                $result = $this -> problemModel -> getproblemswithcategoryandadvisorsid($category," ");
                echo json_encode($category);

            }
            else{

//                $result =  $this -> problemModel -> getproblemswithcategoryandadvisorsid($category,$advisor);
                echo json_encode($rornot);
            }

     }

    
     
     //update advisor profile-------------------------------
    
     function profileUpdate(){
        $satat=0;//idintify post or normel
       if($_SERVER['REQUEST_METHOD']=='POST'){
         $satat=1;
         $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         $getProfile_data=[
            'userName'=>trim($_POST['user']),
            'fullName'=>trim($_POST['fname']),
            'email'=>trim($_POST['email']),
            'mobile'=>trim($_POST['mobile']),
            'location'=>trim($_POST['address']),
            'brithday'=>trim($_POST['date']),
            'qulification'=>trim($_POST['qulification']),
            'poto_pp'=>'',
            'userName_error'=>'',
            'fullName_error'=>'',
            'email'=>'',
            'mobile_erroe'=>'',
            'location_erroe'=>'',
            'brithday_error'=>'',
            'qulification_error'=>'',
            'poto_pp_error'=>''

          ];

          
          //validate user name
          if(empty($getProfile_data['userName'])){
            $getProfile_data['userName_error']='*user name is empty';
          }elseif(4<strlen($getProfile_data['userName'])&& strlen($getProfile_data['userName'])<9){
            $getProfile_data['userName_error']='*user name should be between 4 and 9 character';
          }

       }else{
          $satat=2;
          $getData=$this->advisorModel->editProfile($satat);
          $getProfile_data=[
            'userName'=>$getData->userName,
            'fullName'=>$getData->name,
            'email'=>$getData->email,
            'mobile'=>$getData->tel_no,
            'location'=>$getData->address,
            'brithday'=>$getData->dob,
            'qulification'=>$getData->qualification,
            'poto_pp'=>$getData->photo

          ];

          $this->view('advisor/advisor_profile',$getProfile_data);

       } 


     }





    }