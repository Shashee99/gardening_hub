<?php

    class Problems extends Controller
    {
        private $problemModel;

        public function __construct()
        {
            $this->problemModel = $this->model('Problem');
        }
        //customer view his  reply message
        public function viewProblems()
        {
            $data = array();
            $problems = $this->problemModel->givenUserProblems($_SESSION['cus_id']);
            foreach($problems as $rows)
            {
                $problem_photos = array();
                $photos = $this->problemModel->problemPhotosById($rows->problem_id);
                foreach($photos as $photo)
                {
                    $problem_photos[] = $photo->image;
                }
                $data[] = array
                (
                    'id' => $rows->problem_id,
                    'date' => $rows->date_time,
                    'title' => $rows->title ,
                    'content' => $rows->content,
                    'photos' => $problem_photos
                );

            }
            $this->view('customers/problem', $data);
        }
        //view one problem by customer id
        public function viewOneProblem($id)
        {
            $problems = $this->problemModel->getAproblem($id);
            $replies = $this ->problemModel ->getreplyfromcustomerid($id);
            $problem_photos = array();
            $photos = $this->problemModel->problemPhotosById($problems->problem_id);
                foreach($photos as $photo)
                {
                    $problem_photos[] = $photo->image;
                }
                $data = 
                [
                    'id' =>$problems->problem_id,
                    'date' => $problems->date_time,
                    'title' =>$problems->title ,
                    'content' => $problems->content,
                    'photos' => $problem_photos,
                    'reply' => $replies
                ];

            // print_r($data);
            // die();

            $this->view('customers/viewOneProblem',$data);
        }
        //customer add new problm 
        public function addProblems()
        {

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
    
                    'title'=> trim($_POST['title']),
                    'problem' => trim($_POST['problem']),
                    'photos' => '',
                    'category' => trim($_POST['category']),
                    'category_err' => '',
                    'problem_err' => '',
                    'title_err' => '',
                    'photo_err' => ''
                ];
                //validate data part

                if(empty($data['title']))
                {
                    $data['title_err'] = "Please enter a topic for your problem";
                }
                if(empty($data['problem']))
                {
                    $data['problem_err'] = "Please enter your problem";
                }
                if(empty($data['category']))
                {
                    $data['category_err'] = "Plese select a category which your problem belongs to";
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
                elseif( $photocount>4)
                {
                    $data['photo_err'] = 'Can not upload more than 4 images';
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

                if(empty($data['title_err']) && empty($data['problem_err']) && empty($data['category_err']) && empty($data['photo_err']) )
                {
                    foreach($_FILES['photos']['name'] as $key => $value)
                    {
                        $img_name = $_FILES['photos']['name'][$key];
                        $tmp_name = $_FILES['photos']['tmp_name'][$key];
                        $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
                        $new_img = uniqid('IMG-',true).'.'.$img_type;
                        $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/problem_photo/'.$new_img;
                        move_uploaded_file($tmp_name,$img_upload_path);
                        array_push($photo,$new_img);
                    }
                    if($this->problemModel->addProblem($data,$photo))
                    {
                        flash('problem_add_successfuly', 'You problem added successfuly');
                        redirect('problems/viewProblems');
                    }
                    else
                    {

                    }
                }
                else
                {
                    $this->view('customers/addProblem', $data);
                }


                // $this->view('customers/addProblem', $data);

            }

            $data = [
                'title'=> '',
                'problem' => '',
                'photos' => '',
                'category' => '',
                'category_err' => '',
                'problem_err' => '',
                'title_err' => '',
                'photo_err' =>''
            ];
            $this->view('customers/addProblem', $data);
        }
        public function deletProblem($id)
        {
            $this->problemModel->deleteProblem($id);
            flash('progress_Delete_successfuly', 'You Cultivation problen deleted successfuly');
            redirect('problems/viewProblems');
        }

    }