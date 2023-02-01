<?php 

   class Harvests extends Controller
   {
        private $haervestModel ;
        private $cusModel;

        public function __construct()
        {
            $this->haervestModel = $this->model('Harvest');
            $this->cusModel = $this->model('Customer');
         }
        public function viewAddMyHarvest ()
        {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

               $data = [
                  'title' => trim($_POST['title']),
                  'category' => trim($_POST['category']),
                  'description' => trim($_POST['description']),
                  'photos' =>'',
                  'harvest' => $this->haervestModel->allMyHarvest(),
                  'harvest_photo' => $this->haervestModel->harvestPhotos(),
                  'title_err' => '',
                  'category_err' => '',
                  'description_err' => '',
                  'photo_err' => ''
               ];

               if(empty($data['title']))
               {
                  $data['title_err'] = 'Please enter a title';
               }
               if(empty($data['category']))
               {
                  $data['category_err'] = 'Please select a category';
               }
               if(empty($data['description']))
               {
                  $data['description_err'] = 'Please enter a description';
               }
               $filesname = array_filter($_FILES['photos']['name']);
               $filecount = count($_FILES['photos']['name']);
               $type = array ('png', 'jpg', 'jpeg');
               $totsize = 0;

               if(empty($filesname))
               {
                  $data['photo_err'] = "Please select at least one image";
               }
               elseif($filecount>4)
               {
                  $data['photo_err'] = 'Can not upload more than 4 images';
               }

               foreach($_FILES['photos']['name'] as $key => $value)
               {
                  $img_name = $_FILES['photos']['name'][$key];
                  $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                  $totsize += $_FILES['photos']['size'] [$key];
                  $photo = array();

                  if($img_type != $type[0]  && $img_type != $type[1] && $img_type != $type[2])
                  {
                     $data['photo_err'] = 'Image type should be png or jpeg or jpg'; 
                     break;
                  }

               }
               if($totsize > 8388608)
               {
                  $data['photo_err'] = 'Images size should be less than 8MB';
               }


               if(empty($data['title_err']) && empty($data['category_err']) && empty($data['description_err'])
                  && empty($data['photo_err']) )
               {
                  foreach($_FILES['photos']['name'] as $key => $value)
                  {
                     $img_name = $_FILES['photos']['name'][$key];
                     $tmp_name = $_FILES['photos']['tmp_name'][$key];
                     $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
                     $new_img = uniqid('IMG-',true).'.'.$img_type;
                     $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/harvest_photo/'.$new_img;
                     move_uploaded_file($tmp_name,$img_upload_path);
                     array_push($photo,$new_img);
                  }
                  if($this->haervestModel->add($data, $photo))
                  {
                     redirect('harvests/viewAddMyHarvest');
                     // $this->view('customers/myHarvest', $data);
                  }
               }
               else
               {
                  $this->view('customers/myHarvest', $data);
               }



            }
            else
            {
               $data = [
                  'title' => '',
                  'category' => '',
                  'description' => '',
                  'photos' =>'',
                  'harvest' => $this->haervestModel->allMyHarvest(),
                  'harvest_photo' => $this->haervestModel->harvestPhotos(),
                  'title_err' => '',
                  'category_err' => '',
                  'description_err' => '',
                  'photo_err' => ''
               ];
               $this->view('customers/myHarvest', $data);
            }
            
        }

        public function addHarvest()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    
                ];

            }
            else
            {

            }
        }
        public function filterHarvest ()
        {
            if(isset($_POST['category']))
            {
               $category = $_POST['category'];
         
               if($category === "")
               {
                  $arr = array();

                  $result = $this->haervestModel->allMyHarvest();

                  foreach($result as $harvest)
                  {
                     $harvest_id = $harvest->harvest_id;
                     $title = $harvest->title;
                     $content = $harvest->description;
                     $date = $harvest->date;
                     $cat = $harvest->category;

                     $photos = $this->haervestModel->harvestPhotosbyId($harvest_id);
                     $harvest_photo = array();

                     foreach($photos as $photo)
                     {
                        $harvest_photo[] = $photo->name;
                     }
                     $arr[] = array 
                        (
                           'cus_name' => $_SESSION['cus_name'],
                           'photo_path' => $_SESSION['cus_photo_path'],
                           'title' => $title,
                           'date' => $date,
                           'description' => $content,
                           'category' => $cat,
                           'photo' => $harvest_photo
                        );
                  }
               }
               else
               {
                  $arr = array();

                  $result = $this->haervestModel->allMyHarvestbyCategoey($category);

                  foreach($result as $harvest)
                  {
                     $harvest_id = $harvest->harvest_id;
                     $date = $harvest->date;
                     $title = $harvest->title;
                     $content = $harvest->description;
                     $cat = $harvest->category;

                     $photos = $this->haervestModel->harvestPhotosbyId($harvest_id);
                     $harvest_photo = array();

                     foreach($photos as $photo)
                     {
                        $harvest_photo[] = $photo->name;
                     }
                     $arr[] = array 
                        (
                           'cus_name' => $_SESSION['cus_name'],
                           'photo_path' => $_SESSION['cus_photo_path'],
                           'date' => $date,
                           'title' => $title,
                           'description' => $content,
                           'category' => $cat,
                           'photo' => $harvest_photo
                        );
                  }
               }
            
               echo json_encode($arr, JSON_UNESCAPED_UNICODE);
            } 
         }
         public function otherHarvests()
         {

            $data = array();
            $result = $this->haervestModel->allOtherHarvest();
            foreach($result as $harvest)
            {
               $harvest_id = $harvest->harvest_id;
               $title = $harvest->title;
               $content = $harvest->description;
               $date = $harvest->date;
               $cat = $harvest->category;
               $cus_details = $this->cusModel->getCustomerDetails($harvest->customer_id);
               $cus_name = $cus_details->name;
               $cus_photo = $cus_details->photo;

               $photos = $this->haervestModel->harvestPhotosbyId($harvest_id);
               $harvest_photo = array();

               foreach($photos as $photo)
               {
                  $harvest_photo[] = $photo->name;
               }

               $data[] = array 
               (
                  'title' => $title,
                  'description' => $content,
                  'date' => $date,
                  'category' => $cat,
                  'cus_name' => $cus_name,
                  'cus_photo' => $cus_photo,
                  'harvest_photo' => $harvest_photo
               );
            }

            $this->view('customers/otherHarvest', $data);
         }
         public function filterOtherHarvest ()
         {
            if(isset($_POST['category']))
            {
               $category = $_POST['category'];
         
               if($category === "")
               {
                  $arr = array();

                  $result = $this->haervestModel->allOtherHarvest();

                  foreach($result as $harvest)
                  {
                     $harvest_id = $harvest->harvest_id;
                     $title = $harvest->title;
                     $content = $harvest->description;
                     $date = $harvest->date;
                     $cat = $harvest->category;
                     $cus_details = $this->cusModel->getCustomerDetails($harvest->customer_id);
                     $cus_name = $cus_details->name;
                     $cus_photo = $cus_details->photo;

                     $photos = $this->haervestModel->harvestPhotosbyId($harvest_id);
                     $harvest_photo = array();

                     foreach($photos as $photo)
                     {
                        $harvest_photo[] = $photo->name;
                     }
                     $arr[] = array 
                        (
                           'cus_name' => $cus_name,
                           'photo_path' => $cus_photo,
                           'title' => $title,
                           'date' => $date,
                           'description' => $content,
                           'category' => $cat,
                           'photo' => $harvest_photo
                        );
                  }
               }
               else
               {
                  $arr = array();

                  $result = $this->haervestModel->allOtherHarvestbyCategoey($category);

                  foreach($result as $harvest)
                  {
                     $harvest_id = $harvest->harvest_id;
                     $date = $harvest->date;
                     $title = $harvest->title;
                     $content = $harvest->description;
                     $cat = $harvest->category;
                     $cus_details = $this->cusModel->getCustomerDetails($harvest->customer_id);
                     $cus_name = $cus_details->name;
                     $cus_photo = $cus_details->photo;

                     $photos = $this->haervestModel->harvestPhotosbyId($harvest_id);
                     $harvest_photo = array();

                     foreach($photos as $photo)
                     {
                        $harvest_photo[] = $photo->name;
                     }
                     $arr[] = array 
                        (
                           'cus_name' => $cus_name,
                           'photo_path' => $cus_photo,
                           'date' => $date,
                           'title' => $title,
                           'description' => $content,
                           'category' => $cat,
                           'photo' => $harvest_photo
                        );
                  }
               }
            
               echo json_encode($arr, JSON_UNESCAPED_UNICODE);
            }

         }
      
   }
