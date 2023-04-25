<?php 

    class Progresses extends Controller
    {
        private $progressModel;
        private $cusModel;

        public function __construct()
        {
            $this->progressModel = $this->model('Progress');
            $this->cusModel = $this->model('Customer');
        }
        public function viewMyProgress()
        {
            $result = $this->progressModel->viewMyProgress($_SESSION['cus_id']);
            //$result = $this->haervestModel->allOtherHarvest();
            foreach($result as $progress)
            {
                $progress_id = $progress->progress_id;
                $title = $progress->title;
                $content = $progress->content;
                $date = $progress->started_date;
                $update_date = $progress->updated_date;
                $cat = $progress->category;

                $photos = $this->progressModel->progressPhotosbyId($progress_id);
                $progress_photo = array();

                foreach($photos as $photo)
                {
                    $progress_photo[] = $photo->name;
                }

                $data[] = array 
                (
                    'progress_id' => $progress_id,
                    'title' => $title,
                    'description' => $content,
                    'date' => $date,
                    'up_date' => $update_date,
                    'category' => $cat,
                    'progress_photo' => $progress_photo
                );
            }

            $this->view('customers/myprogress', $data);
        }
        public function viewOtherProgress()
        {
            $result = $this->progressModel->viewOtherProgress($_SESSION['cus_id']);
            
            foreach($result as $progress)
            {
                $progress_id = $progress->progress_id;
                $title = $progress->title;
                $content = $progress->content;
                $date = $progress->started_date;
                $update_date = $progress->updated_date;
                $cat = $progress->category;
                $cus_details = $this->cusModel->getCustomerDetails($progress->customer_id);
                $cus_name = $cus_details->name;
                $cus_photo = $cus_details->photo;

                $photos = $this->progressModel->progressPhotosbyId($progress_id);
                $progress_photo = array();

                foreach($photos as $photo)
                {
                    $progress_photo[] = $photo->name;
                }

                $data[] = array 
                (
                    'progress_id' => $progress_id,
                    'title' => $title,
                    'description' => $content,
                    'date' => $date,
                    'up_date' => $update_date,
                    'category' => $cat,
                    'cus_name' => $cus_name,
                    'cus_photo' => $cus_photo,
                    'progress_photo' => $progress_photo
                );
            }
            $this->view('customers/otherProgress', $data);
        }
        public function deleteprogress($id)
        {
            $this->progressModel->deleteprogress($id);
            redirect('progresses/viewMyProgress');
        }
        public function addProgress()
        {
            $data = [
                'title' => '',
                'category' => '',
                'progress' => '',
                'photo' => '',
                'title_err' => '',
                'category_err' => '',
                'progress_err' => '',
                'photo_err' => ''
            ];


            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data['title'] = $_POST['title'];
                $data['category'] = $_POST['category'];
                $data['progress'] = $_POST['progress'];

                // $data = [
                //     'title' => $_POST['title'],
                //     'category' => $_POST['category'],
                //     'progress' => $_POST['progress'],
                //     'photo' => '',
                //     'title_err' => '',
                //     'category_err' => '',
                //     'progress_err' => '',
                //     'photo_err' => ''
                // ];

                // Validation part
                if(empty($data['title']))
                {
                    $data['title_err'] = "Please enter a topic for your cultivation progress";
                }
                if(empty($data['progress']))
                {
                    $data['progress_err'] = "Please enter your cultivation progress details";
                }
                if(empty($data['category']))
                {
                    $data['category_err'] = "Plese select a category which your progress belongs to";
                }

                $photoname = array_filter($_FILES['photos']['name']);
                $photocount = count($_FILES['photos']['name']);
                $type = array ('png', 'jpg', 'jpeg');
                $totsize = 0;
                $photo = array();

                if(empty($photoname))
                {
                    $data['photo_err'] = "Please select at least one image";
                }
                elseif( $photocount>5)
                {
                    $data['photo_err'] = 'Can not upload more than 5 images';
                }

                foreach($_FILES['photos']['name'] as $key => $value)
                {
                    $img_name = $_FILES['photos']['name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $totsize += $_FILES['photos']['size'] [$key];

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

                if(empty($data['title_err']) && empty($data['progress_err']) && empty($data['category_err']) && empty($data['photo_err']) )
                {
                    foreach($_FILES['photos']['name'] as $key => $value)
                    {
                        $img_name = $_FILES['photos']['name'][$key];
                        $tmp_name = $_FILES['photos']['tmp_name'][$key];
                        $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
                        $new_img = uniqid('IMG-',true).'.'.$img_type;
                        $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/progress_photo/'.$new_img;
                        move_uploaded_file($tmp_name,$img_upload_path);
                        array_push($photo,$new_img);
                    }
                    if($this->progressModel->addProgress($data,$photo))
                    {
                        flash('progress_add_successfuly', 'You Cultivation progress added successfuly');
                        redirect('progresses/viewMyProgress');
                    }
                    else
                    {

                    }
                }
                else
                {
                    $this->view('customers/addProgress', $data);
                }

            }

            
            $this->view('customers/addProgress',$data);
        }
        public function updateProgress($id)
        {
            $data = [
                'id' => '',
                'title' => '',
                'progress' => '',
                'photo' => '',
                'uploaded_photos' => '',
                'category' => '',
                'add_date' => '',
                'update_date' => '',
                'title_err' => '',
                'progress_err' => '',
                'photo_err' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data['title'] = $_POST['title'];
                $data['progress'] = $_POST['progress'];
                $data['id'] = $id;

                if(empty($data['title']))
                {
                    $data['title_err'] = "Please enter a topic for your cultivation progress";
                }
                if(empty($data['progress']))
                {
                    $data['progress_err'] = "Please enter your cultivation progress details";
                }

                if(empty($data['title_err']) && empty($data['progress_err']) && empty($data['photo_err']) )
                {
                    if($this->progressModel->updateProgress($data))
                    {
                        flash('progress_update_successfuly', 'You Cultivation progress updated successfuly');
                        redirect('progresses/viewMyProgress');
                    }
                    else
                    {

                    }
                }
            }
            else
            {
                $propgressDetails = $this->progressModel->viewAProgress($id);

                $data['title'] = $propgressDetails->title;
                $data['category'] = $propgressDetails->category;
                $data['progress'] = $propgressDetails->content;
                $data['add_date'] = $propgressDetails->started_date;
                $data['update_date'] = $propgressDetails->updated_date;
                $data['id'] = $propgressDetails->progress_id;
                $data['uploaded_photos'] = $this->progressModel->oneProgressPhoto($id);

                $this->view('customers/updateProgress',$data);
            }

            
        }
    }