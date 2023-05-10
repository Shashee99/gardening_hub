<?php

    class Advisors extends Controller
    {
        private $advisorModel;

        public function __construct()
        {
            // if (!isAdvisorLogin()) {
            //     if(!isset($_SESSION['cus_id']))
            //     {
            //         redirect('users/login');
            //     }

            // }

            if (!isAdvisorLogin()) {
                if(!isset($_SESSION['cus_id']) && !isset($_SESSION['user_id'])&& $_SESSION['advisor_id'])
                {
                    redirect('users/login');
                }

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

        }
      //add tecno lod view--------------
      public function addtecno(){
       // $category =  $_GET['category'];
       // print_r($category);
        $data = array();
        $problems = $this->advisorModel->giveTecno($_SESSION['advisor_id']);
        
        foreach($problems as $rows)
        {
            $problem_photos = array();
            $photos = $this->advisorModel->tecnoPhotosById($rows->no);
            foreach($photos as $photo)
            {
                $problem_photos[] = $photo->imge;
                // $problem_photos[] = $photo->imge;
            }
            $data[] = array
            (
                'title'=> $rows->title,
                'catagory'=>$rows->category,
                'content'=>$rows->content,
                'date'=>$rows->date,
                'no'=>$rows->no,
                'photos' => $problem_photos,
                
            );

        }

      // echo json_encode($data, JSON_UNESCAPED_UNICODE);

       $this->view('advisor/addtecno',$data);

      }

      //add tecnohlogy for preview--------------
      public function item_add(){

        if($_SERVER['REQUEST_METHOD']=='POST'){


           //sanities data
           $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $additem=[
             'title'=> trim($_POST['title']),
             'catagory'=>trim($_POST['category']),
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
           //die($id);
        if($_SERVER['REQUEST_METHOD']=='POST'){

            //die($id);
            //sanities data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $additem=[
              'title'=> trim($_POST['title']),
              'catagory'=>trim($_POST['category']),
              'content'=>trim($_POST['content']), 
              'no'=>$id,     
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
                    $this->view('advisor/tecnoUpdate',$additem);
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
                //die($additem['no']);

            
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
        
       if($_SERVER['REQUEST_METHOD']=='POST'){
       
         
         $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         $getProfile_data=[
            'userName'=>trim($_POST['user']),
            'fullName'=>trim($_POST['fname']),
            'email'=>trim($_POST['email']),
            'mobile'=>trim($_POST['mobile']),
            'location'=>trim($_POST['address']),
            'brithday'=>trim($_POST['date']),
            'about_me'=>trim($_POST['about']),
            'poto_pp'=>$_FILES['profile']['name'],
            'userName_error'=>'',
            'fullName_error'=>'',
            'email_error'=>'',
            'mobile_error'=>'',
            'location_error'=>'',
            'brithday_error'=>'',
            'about_error'=>'',
            'poto_pp_error'=>''

          ];

          
          //validate user name
          if(empty($getProfile_data['userName'])){
            $getProfile_data['userName_error']='*user name is empty';
          }elseif(4>strlen($getProfile_data['userName'])){
           
            $getProfile_data['userName_error']='*user name should be between 4 and 9 character';
          }
          //validate full name
          if(empty($getProfile_data['fullName'])){
            $getProfile_data['fullName_error']='*full name is empty';
          }
          //validate email
          if(empty($getProfile_data['email'])){
            $getProfile_data['email_error']='*email is empty';
          }elseif(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $getProfile_data['email'])){
            $getProfile_data['email_error']='*Invalid email or email type';
          }
          //mobile number validate
          if(empty($getProfile_data['mobile'])){
            $getProfile_data['mobile_error']='*mobile number is empty';
          }
          elseif(!preg_match("/^[0]{1}+[1-9]{1}+[0-9]{8}$/", $getProfile_data['mobile'])){
            $getProfile_data['mobile_error'] = '*Invalid mobile number';
          }
          //validate location
          if(empty($getProfile_data['location'])){
            $getProfile_data['location_error']='*location is empty';
          }
          //validate date
          if (empty($getProfile_data['brithday'])) {
            $getProfile_data['brithday_error'] = '*Please enter birthday';
        } elseif ((date("Y") - 15) < date("Y", strtotime($getProfile_data['brithday'])) || (date("Y") - 100) > date("Y", strtotime($getProfile_data['brithday']))) {
            $getProfile_data['brithday_error'] = '*Birthday should be bettween ' . (date("Y") - 100) . ' and ' . (date("Y") - 15);
        }
        //validate about me
        if(empty($getProfile_data['about_me'])){
            $getProfile_data['about_error']='*Please enter about me';
        }elseif(strlen($getProfile_data['about_me'])>25){
            $getProfile_data['about_error']='*about me should be lessthan 25 character';
        }
        //validate photo
            $type = array('png', 'jpg', 'jpeg');
            $img_type = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
            
            if (empty($getProfile_data['poto_pp'])) {
                $getProfile_data['poto_pp_error'] = 'Please select a photo';
            } elseif ($_FILES['profile']['size'] > 2097152) {
                $getProfile_data['poto_pp_error'] = 'Image size should be less than 2Mb';
            } elseif ($img_type != $type[0] && $img_type != $type[1] && $img_type != $type[2]) {
                $getProfile_data['poto_pp_error'] = 'Image type should be png or jpeg or jpg';
            }

            if(empty($getProfile_data['userName_error'])&& empty( $getProfile_data['fullName_error'])&& empty( $getProfile_data['email_error'])&& empty( $getProfile_data['mobile_error'])&& empty($getProfile_data['location_error'])&& empty($getProfile_data['brithday_error'])&& empty( $getProfile_data['brithday_error'])&& empty( $getProfile_data['about_error'])&& empty( $getProfile_data['poto_pp_error'])){
                      
                $tmp_name = $_FILES['profile']['tmp_name'];
                $img_type = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
                $new_img = uniqid('IMG-', true) . '.' . $img_type;
                $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/advisor_pp/' . $new_img;
                if (!move_uploaded_file($tmp_name, $img_upload_path)) {
                    die("File not upload");
                }

                $getProfile_data['poto_pp'] = $new_img;
                $_SESSION['advisor_photo_path']=$new_img;

                if($this->advisorModel->editProfile($getProfile_data)){
                    
                    redirect('advisors/viewHomePage');
                }else{
                   // die();
                }



            }else{

                $getData=$this->advisorModel->getProfile();
                $Profile_data=[
                    'userName'=>$getData->userName,
                    'fullName'=>$getData->name,
                    'email'=>$getData->email,
                    'mobile'=>$getData->tel_no,
                    'location'=>$getData->address,  
                    'brithday'=>$getData->dob,
                    'about_me'=>$getData->about_me,
                    'poto_pp'=>$getData->photo,
                    'userName_error'=>$getProfile_data['userName_error'],
                    'fullName_error'=>$getProfile_data['fullName_error'],
                    'email_error'=>$getProfile_data['email_error'],
                    'mobile_error'=>$getProfile_data['mobile_error'],
                    'location_error'=>$getProfile_data['location_error'],
                    'brithday_error'=>$getProfile_data['brithday_error'],
                    'about_error'=>$getProfile_data['about_error'],
                    'poto_pp_error'=>$getProfile_data['poto_pp_error']
        
                  ];
               

                $this->view('advisor/advisor_profile',$Profile_data);


            }




       }else{
          
          $getData=$this->advisorModel->getProfile();
          $getProfile_data=[
            'userName'=>$getData->userName,
            'fullName'=>$getData->name,
            'email'=>$getData->email,
            'mobile'=>$getData->tel_no,
            'location'=>$getData->address,
            'brithday'=>$getData->dob,
            'about_me'=>$getData->about_me,
            'poto_pp'=>$getData->photo,
            'userName_error'=>'',
            'fullName_error'=>'',
            'email_error'=>'',
            'mobile_error'=>'',
            'location_error'=>'',
            'brithday_error'=>'',
            'about_error'=>'',
            'poto_pp_error'=>''

          ];

          $this->view('advisor/advisor_profile',$getProfile_data);

       } 


     }

     //test-------------------
    //  public function getCategories(){
    //     //$category=$_POST['category'];
    //     //echo $category;
    //    // $this->addtecno('cat');
    //   // print_r($cat);
    // //    if($cat!=null){
    // //      $category=$cat;

    // //    }else{
    // //      $category="all";
    // //    }

    //  $data = array();
    //  //$problems = $this->advisorModel->giveTecno($_SESSION['advisor_id'],$category);
    //  //get categroy
    //  $getcategory=$this->advisorModel->getCategory($_SESSION['advisor_id']);
    //  print_r($getcategory);
    //  //print_r($category);
    // // print_r($cat);
    //  foreach($getcategory as $rows)
    //  {
    //     //  $problem_photos = array();
    //     //  $photos = $this->advisorModel->tecnoPhotosById($rows->no);
    //     //  foreach($photos as $photo)
    //     //  {
    //     //      $problem_photos[] = $photo->imge;
    //     //      // $problem_photos[] = $photo->imge;
    //     //  }
    //      $data[] = array
    //      (
    //         //  'title'=> $rows->title,
    //          'catagory'=>$rows->category,
    //         //  'content'=>$rows->content,
    //         //  'date'=>$rows->date,
    //         //  'no'=>$rows->no,
    //         //  'photos' => $problem_photos,
             
    //      );

    //  }
    // //print_r($data);
    //  echo(json_encode($data));



    // //$this->view('advisor/addtecno',$data);


    //  }





    }