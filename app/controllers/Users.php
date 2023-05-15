<?php

class Users extends Controller
{
    private $userModel;
    private $customerModel;
    private $advisorModel;
    private $sellerModel;
    private $notiModel;
    private $mailModel;

    public function __construct()
    {
        // Load the user model
        $this->userModel = $this->model('User');
        $this->customerModel = $this->model('Customer');
        $this->advisorModel = $this->model('Advisor');
        $this->sellerModel = $this->model('Seller');
        $this->notiModel = $this->model('Notification');
        $this->mailModel = new Mailer();
    }

    public function customerRegister()
    {

        // Check for POST request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process the form data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Sign Up',
                'name' => trim($_POST['name']),
                'address' => trim($_POST['address']),
                'confirm_pass' => trim($_POST['confirm_pass']),
                'id' => trim($_POST['nic']),
                'bod' => trim($_POST['birthday']),
                'gs' => trim($_POST['gs_division']),
                'mobile' => trim($_POST['phone']),
                'email' => trim($_POST['mail']),
                'ds' => trim($_POST['dv_sec']),
                'user_name' => trim($_POST['user_name']),
                'password' => trim($_POST['password']),
                'photo' => $_FILES['photo']['name'],
                'name_err' => '',
                'address_err' => '',
                'confirm_pass_err' => '',
                'id_err' => '',
                'bod_err' => '',
                'gs_err' => '',
                'mobile_err' => '',
                'email_err' => '',
                'ds_err' => '',
                'user_name_err' => '',
                'password_err' => '',
                'photo_err' => '',
                'privacy_err' => ''
            ];
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            } elseif (strlen($data['name']) < 5) {
                $data['name_err'] = 'Name should at least 5 characters';
            }

            if (empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter passowrd';
            } elseif (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
                $data['password_err'] = 'Password length should be between 8 and 20';
            } elseif (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $data['password'])) {
                $data['password_err'] = 'Password should contain at least one lowercase, uppercase, digit and special character';
            }

            if (empty($data['confirm_pass'])) {
                $data['confirm_pass_err'] = 'Please confirm passowrd';
            } else {
                if ($data['password'] != $data['confirm_pass']) {
                    $data['confirm_pass_err'] = 'Passwords don\'t match';
                }
            }
            if (empty($data['id'])) {
                $data['id_err'] = 'Please enter id no';
            } elseif (strlen($data['id']) != 10 && strlen($data['id']) != 12) {
                $data['id_err'] = 'Id number length should not matched';
            } elseif (!preg_match("/^[1-9]{1}+[0-9]{8}+[vV]{1}$/", $data['id']) && !preg_match("/^[1-2]{1}+[0-9]{11}$/", $data['id'])) {
                $data['id_err'] = 'Invalid id number';
            }

            if (empty($data['bod'])) {
                $data['bod_err'] = 'Please enter birthday';
            } elseif ((date("Y") - 15) < date("Y", strtotime($data['bod'])) || (date("Y") - 100) > date("Y", strtotime($data['bod']))) {
                $data['bod_err'] = 'Birthday should be bettween ' . (date("Y") - 100) . ' and ' . (date("Y") - 15);
            }

            if (empty($data['gs'])) {
                $data['gs_err'] = 'Please enter gramasewa division';
            }

            if (empty($data['mobile'])) {
                $data['mobile_err'] = 'Please enter mobile number';
            } elseif (!preg_match("/^[0]{1}+[1-9]{1}+[0-9]{8}$/", $data['mobile'])) {
                $data['mobile_err'] = 'Invalid mobile number';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $data['email'])) {
                $data['email_err'] = 'Invalid email or email type';
            }

            if (empty($data['ds'])) {
                $data['ds_err'] = 'Please enter divisional secretary';
            }

            if (empty($data['user_name'])) {
                $data['user_name_err'] = 'Please enter user name';
            } elseif (strlen($data['user_name']) < 6) {
                $data['user_name_err'] = 'User name should be at least 6 characters';
            } elseif ($this->userModel->findUser($data['user_name'])) {
                $data['user_name_err'] = 'User name is already exits';
            }

            $type = array('png', 'jpg', 'jpeg');
            $img_type = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
            


            if (empty($data['photo'])) {
                $data['photo_err'] = 'Please select a photo';
            } elseif ($_FILES['photo']['size'] > 2097152) {
                $data['photo_err'] = 'Image size should be less than 2Mb';
            } elseif ($img_type != $type[0] && $img_type != $type[1] && $img_type != $type[2]) {
                $data['photo_err'] = 'Image type should be png or jpeg or jpg';
            }

            if (empty($data['privacy'])) {
                $data['privacy_err'] = 'Please accept the privacy policy';
            }

            if (empty($data['name_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_pass_err']) && empty($data['id_err']) && empty($data['mobile_err'])
                && empty($data['bod_err']) && empty($data['gs_err']) && empty($data['email_err']) && empty($data['ds_err']) && empty($data['user_name_err']) && empty($data['photo_err'])) {
                //die('Success');
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Photo upload
                $tmp_name = $_FILES['photo']['tmp_name'];
                $img_type = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
                $new_img = uniqid('IMG-', true) . '.' . $img_type;
                $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/customer_pp/' . $new_img;
                if (!move_uploaded_file($tmp_name, $img_upload_path)) {
                    die("File not upload");
                }

                $data['photo'] = $new_img;

                // Register a user
                if ($this->userModel->customerRegister($data)) {
                    flash('register_success', 'You are successfuly registered.');
                    redirect('users/login');
                } else {
                    die('Can not register user, something went wrong');
                }
            } else {
                $this->view('users/customerRegister', $data);
            }


        } else {
            // Load register form
            $data = [
                'title' => 'Sign Up',
                'name' => '',
                'address' => '',
                'confirm_pass' => '',
                'id' => '',
                'bod' => '',
                'gs' => '',
                'mobile' => '',
                'email' => '',
                'ds' => '',
                'user_name' => '',
                'password' => '',
                'photo' => '',
                'privacy' => '',
                'name_err' => '',
                'address_err' => '',
                'confirm_pass_err' => '',
                'id_err' => '',
                'bod_err' => '',
                'gs_err' => '',
                'mobile_err' => '',
                'email_err' => '',
                'ds_err' => '',
                'user_name_err' => '',
                'password_err' => '',
                'photo_err' => '',
                'privacy_err' => ''
            ];
            $this->view('users/customerRegister', $data);
        }


    }

    public function sellerRegister()
    {
        //Check for POST
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

            $fileName = $_FILES['pro_li']['name'];
            $fileTmpName = $_FILES['pro_li']['tmp_name'];
            $fileSize = $_FILES['pro_li']['size'];
            $fileError = $_FILES['pro_li']['error'];
            $fileType = $_FILES['pro_li']['type'];


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestinatio = PUBROOT . '/public/img/upload_images/seller_doc/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestinatio);

            //Process form
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'name' => trim($_POST['name']),
                'shop_name' => trim($_POST['shop_name']),
                'address' => trim($_POST['address']),
                'br_num' => trim($_POST['br_num']),
                'mo_num' => trim($_POST['mo_num']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'pro_li' => $fileNameNew,
                'seller_image' => $_FILES['shopimage']['name'],
                'name_err' => '',
                'shop_name_err' => '',
                'address_err' => '',
                'br_num_err' => '',
                'mo_num_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'pro_li_err' => '',
                'seller_image_err' => '',
                'es1' => '',
                'es2' => '',
                'es3' => '',
                'es4' => '',
                'es5' => '',
                'es6' => '',
                'es7' => '',
                'es8' => '',
                'es9' => '',
                'es10' => ''

            ];
            //Validate name
            if (empty($data['name'])) {
                $data['name_err'] = ' Please enter name';
                $data['es1'] = "\u{f06a}";
            }

            //Validate shop name
            if (empty($data['shop_name'])) {
                $data['shop_name_err'] = 'Please enter shop name';
                $data['es2'] = "\u{f06a}";
            }

            //Validate address
            if (empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
                $data['es3'] = "\u{f06a}";
            }

            //Validate BR number
            if (empty($data['br_num'])) {
                $data['br_num_err'] = 'Please enter BR number';
                $data['es4'] = "\u{f06a}";
            }

            //Validate Mobile number
            if (empty($data['mo_num'])) {
                $data['mo_num_err'] = 'Please enter Mobile number';
                $data['es5'] = "\u{f06a}";
            } elseif (!preg_match("/^[0]{1}+[1-9]{1}+[0-9]{8}$/", $data['mo_num'])) {
                $data['mo_num_err'] = 'Invalid Mobile number';
                $data['es5'] = "\u{f06a}";
            }

            //Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
                $data['es6'] = "\u{f06a}";
            } elseif(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $data['email'])){
                $data['email_err'] = 'Invalid email';
                $data['es6'] = "\u{f06a}";  
            } else {
                //Check email
                if ($this->userModel->findUser($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                    $data['es6'] = "\u{f06a}";
                }
            }
//validate shop image
            $type = array('png', 'jpg', 'jpeg');
            $filetype = strtolower(pathinfo($_FILES['shopimage']['name'], PATHINFO_EXTENSION));


            if (empty($data['seller_image'])) {
                $data['seller_image_err'] = 'Please select a photo';
                $data['es7'] = "\u{f06a}";
            } elseif ($_FILES['shopimage']['size'] > 2097152) {

                $data['seller_image_err'] = 'Image size should be less than 2mb';
                $data['es7'] = "\u{f06a}";
            } elseif ($filetype != $type[0] && $filetype != $type[1] && $filetype != $type[2]) {
                $data['seller_image_err'] = 'Image type should be png,jpg or jpeg';
                $data['es7'] = "\u{f06a}";

            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
                $data['es8'] = "\u{f06a}";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
                $data['es8'] = "\u{f06a}";
            }

            //Validate confirm_password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
                $data['es9'] = "\u{f06a}";
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password do not match';
                    $data['es9'] = "\u{f06a}";
                }
            }

            $allowedTypes = [
                'image/png' => 'png',
                'image/jpeg' => 'jpg',
                'application/pdf' => 'pdf'
            ];

            if ($fileSize === 0) {
                $data['pro_li_err'] = 'Please attach Product Licens';
                $data['es10'] = "\u{f06a}";
            } elseif ($fileSize > 10000000) {
                $data['pro_li_err'] = 'File is too large';
                $data['es10'] = "\u{f06a}";
            } elseif (!in_array($fileType, array_keys($allowedTypes))) {
                $data['pro_li_err'] = 'File not allowed';
                $data['es10'] = "\u{f06a}";
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) &&
                empty($data['shop_name_err']) && empty($data['address_err']) && empty($data['br_num_err']) && empty($data['mo_num_err']) && empty($data['pro_li_err']) && empty($data['seller_image_err'])) {
                //Validated

                //Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $tmpName = $_FILES['shopimage']['tmp_name'];
                $newimagename = uniqid('img-seller', true) . '.' . $filetype;

                $imageuploadpath = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/seller_pp/' . $newimagename;
                move_uploaded_file($tmpName, $imageuploadpath);
                $data['seller_image'] = $newimagename;
                //Register User
                if ($this->userModel->sellerRegister($data)) {

                    flash('register_success', 'Registration received. Pending admin approval. Please check your email for updates. Thank you.');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                //Load view with errors
                $this->view('users/sellerRegister', $data);
            }

        } else {
            //Init data

            $data = [
                'name' => '',
                'shop_name' => '',
                'address' => '',
                'br_num' => '',
                'mo_num' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'pro_li' => '',
                'name_err' => '',
                'shop_name_err' => '',
                'address_err' => '',
                'br_num_err' => '',
                'mo_num_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'pro_li_err' => '',
                'seller_image_err' => '',
                'es1' => '',
                'es2' => '',
                'es3' => '',
                'es4' => '',
                'es5' => '',
                'es6' => '',
                'es7' => '',
                'es8' => '',
                'es9' => '',
                'es10' => ''
            ];

            //Load view
            $this->view('users/sellerRegister', $data);

        }
    }

    public function advisorRegister()
    {
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'password' => trim($_POST['pass']),
                'cpassword'=>trim($_POST['cpass']),
                'fullname' => trim($_POST['fname']),
                // 'user_name'=>trim($_POST['user']),
                'address' => trim($_POST['address']),
                'nic' => trim($_POST['id_no']),
                'dob'=>trim($_POST['dob']),
                'phone' => trim($_POST['mobile']),
                'email' => trim($_POST['email']),
                'qualification' => trim($_POST['qulafication']),
                'pp' => $_FILES['poto']['name'],
                'qualifi_poto'=>'',
                'password_err'=>'',
                'cpassword_err'=>'',
                'fullname_err'=>'',
                // 'user_name_err'=>'',
                'address_err'=>'',
                'nic_err'=>'',
                'dob_err'=>'',
                'phone_err'=>'',
                'email_err' => '',
                'qulification_err'=>'',
                'pp_err'=>'',
                'qualifi_poto_err'=>''

            ];
            //validate password
            if (empty($data['password'])) {
                $data['password_err'] = '*Please enter passowrd';
            } elseif (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
                $data['password_err'] = '*Password length should be between 8 and 20';
            } elseif (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $data['password'])) {
                $data['password_err'] = '*Password should contain at least one lowercase, uppercase, digit and special character';
            }

            //validate conforme password
            if (empty($data['cpassword'])) {
                $data['cpassword_err'] = '*Please confirm passowrd';
            } else {
                if ($data['password'] != $data['cpassword']) {
                    $data['cpassword_err'] = '*Passwords don\'t match';
                }
            }
            //validate full name
            if (empty($data['fullname']))
            {
                $data['fullname_err'] = '*Please enter name';
            }  
            // } elseif (strlen($data['fullname']) > 10) {
            //     $data['fullname_err'] = '*Name should at least 15 characters';
            // }
            //validate user name
            if (empty($data['user_name'])) {
                $data['user_err'] = '*Please enter name';
            } elseif (strlen($data['user_name']) > 5) {
                $data['user_err'] = '*Name should at least 5 characters';
            }
            //validate address
            if(empty($data['address'])){
                $data['address_err']='*please enter address';
            }
            //validate nic
            if (empty($data['nic'])) {
                $data['nic_err'] = '*Please enter id no';
            } elseif (strlen($data['nic']) != 10 && strlen($data['nic']) != 12) {
                $data['nic_err'] = '*Id number length should not matched';
            } elseif (!preg_match("/^[1-9]{1}+[0-9]{8}+[vV]{1}$/", $data['nic']) && !preg_match("/^[1-2]{1}+[0-9]{11}$/", $data['nic'])) {
                $data['nic_err'] = '*Invalid id number';
            }
            //validate dob
            if (empty($data['dob'])) {
                $data['dob_err'] = '*Please enter birthday';
            } elseif ((date("Y") - 15) < date("Y", strtotime($data['dob'])) || (date("Y") - 100) > date("Y", strtotime($data['dob']))) {
                $data['dob_err'] = '*Birthday should be bettween ' . (date("Y") - 100) . ' and ' . (date("Y") - 15);
            }
            //mobile number
            if (empty($data['phone'])) {
                $data['phone_err'] = '*Please enter mobile number';
            } elseif (!preg_match("/^[0]{1}+[1-9]{1}+[0-9]{8}$/", $data['phone'])) {
                $data['phone_err'] = '*Invalid mobile number';
            }
            //validate email

            if (empty($data['email'])) {
                $data['email_err'] = '*Please enter email';
            } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $data['email'])) {
                $data['email_err'] = '*Invalid email or email type';
            }
            if ($this->userModel->findUser($data['email'])) {
                $data['email_err'] = "*Email already exits";
            }
            //qualification
            if(empty($data['qualification'])){
                $data['qualification_err']='*pleas enter qualification';
            }elseif(strlen($data['qualification'])>150){
                $data['qualification_err']='*qualification should at least 150 characters';
            }

                 //validate photo----------------    
                 $photoname = array_filter($_FILES['photos']['name']);
                 $photocount = count($_FILES['photos']['name']);
                 $type = array ('pdf', 'jpg', 'jpeg');
                 $totsize = 0;
                 $photo = array();
     
                 if(empty($photoname))
                 {
                     $data['qualifi_poto_err'] = "*Please select at least one image";
                 }
                 elseif( $photocount>1)
                 {
                     $data['qualifi_poto_err'] = '*Can not upload more than 1 PDF';
                 }
     
                 foreach($_FILES['photos']['name'] as $key => $value)
                 {
                     $img_name = $_FILES['photos']['name'][$key];
                     $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                     $totsize += $_FILES['photos']['size'] [$key];
     
                     if($img_type != $type[0])
                     {
                         $data['qualifi_poto_err'] = '*Image type should be png or jpeg or jpg'; 
                         break;
                     }
     
                 }
                 if($totsize > 8388608)
                 {
                     $data['photo_error'] = '*Images size should be less than 8MB';
                 }

                 //validate pp
                 if(empty($data['pp'])){
                    $data['pp_err']='*please enter your profile photo';
                 }

                 $img_name = $_FILES['poto']['name'];
                 $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                 //$totsize += $_FILES['photos']['size'];
 
                 if($img_type != $type[0]  && $img_type != $type[1] && $img_type != $type[2])
                 {
                     $data['pp_err'] = '*Image type should be png or jpeg or jpg'; 
                    
                 }
 
                 //die();

            if (empty($data['email_err'])&& empty( $data['password_err'])&& empty($data['cpassword_err'] )&& empty( $data['fullname_err'])&& empty( $data['address_err'])&& empty(  $data['nic_err'])&& empty($data['dob_err'])&& empty( $data['phone_err'])&& empty( $data['qualification_err'])&& empty( $data['qualifi_poto_err'] )&& empty( $data['pp_err']) ) {
                //Hashing password
                
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Photo upload
                $tmp_name = $_FILES['poto']['tmp_name'];
                $img_type = strtolower(pathinfo($_FILES['poto']['name'], PATHINFO_EXTENSION));
                $new_img = uniqid('IMG-', true) . '.' . $img_type;
                $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/advisor_pp/' . $new_img;
                move_uploaded_file($tmp_name, $img_upload_path);
                $data['pp'] = $new_img;

                $photo = array();

                foreach ($_FILES['photos']['name'] as $key => $value) {

                    $img_name1 = $_FILES['photos']['name'][$key];
                    $tmp_name1 = $_FILES['photos']['tmp_name'][$key];
                    $img_type1 = strtolower(pathinfo($img_name1, PATHINFO_EXTENSION));
                    $new_img1 = uniqid('', true) . '.' . $img_type1;
                    $img_upload_path1 = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/Advisor_Qualification_docs/' . $new_img1;
                    move_uploaded_file($tmp_name1, $img_upload_path1);
                    array_push($photo, $new_img1);
                }

                if ($this->userModel->advisorRegister($data,$photo)) {
                    flash('register_success', 'Registration received. Pending admin approval. Please check your email for updates. Thank you.');
                    redirect('users/login');
                } else {
                    $this->view('users/advisorRegister', $data);
                }
            } else {
                $this->view('users/advisorRegister', $data);
            }


        } else {
            $data = [
                'password' =>'',
                'cpassword'=>'',
                'fullname' =>'',
                // 'user_name'=>'',
                'address' => '',
                'nic' => '',
                'dob'=>'',
                'phone' => '',
                'email' => '',
                'qualification' =>'',
                'pp' =>'',
                'qualifi_poto'=>'',
                'password_err'=>'',
                'cpassword_err'=>'',
                'fullname_err'=>'',
                // 'user_name_err'=>'',
                'address_err'=>'',
                'nic_err'=>'',
                'dob_err'=>'',
                'phone_err'=>'',
                'email_err' => '',
                'qulification_err'=>'',
                'pp_err'=>'',
                'qualifi_poto_err'=>''

            ];

            $this->view('users/advisorRegister', $data);
        }

    }

    public function verify()
    {
        // Check for POST request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process the form data
            $data = [
                'title' => 'Fill following fields to be verified!',
                'u_name' => trim($_POST['u_name']),
                'pass' => trim($_POST['pass']),
                'verify' => (int)trim($_POST['verify']),
                'verify_err' => '',
                'u_name_err' => '',
                'pass_err' => ''
            ];

            if (empty($data['u_name'])) {
                $data['u_name_err'] = 'Please enter Email';
            } elseif (!$this->userModel->findUser($data['u_name'])) {
                $data['u_name_err'] = 'No user found';
            }
            if (empty($data['pass'])) {
                $data['pass_err'] = 'Please enter password';
            }
            if (empty($data['verify'])) {
                $data['verify_err'] = 'Please enter Verification code';
            }
            $hashedpw = '';
            $usertype = '';
            $userstate = '';
            $logged_user = '';
            $vericode = '';

            if (!empty($data['u_name'])) {
                $hashedpw = $this->userModel->getuserhashedpasswordbyemail($data['u_name']);
                $usertype = $this->userModel->getusertypebyemail($data['u_name']);
                $vericode = $this->userModel->getuserverificationcodebyemail($data['u_name']);
                $userstate = $this->userModel->getuserstatebyemail($data['u_name']);
                $logged_user = $this->userModel->findUser($data['u_name']);
            }

            if (!password_verify($data['pass'], $hashedpw)) {
                $data['pass_err'] = "Incorrect Password";
            }
            if ($data['verify'] != $vericode) {
                $data['verify_err'] = "Incorrect Verification Code";
            }

            if (empty($data['u_name_err']) && empty($data['pass_err']) && empty($data['verify_err'])) {
//                $state = $this->userModel->verify($data['u_name'],$data['pass'],$data['verify']);

                if ($usertype == 'seller') {
                    if ($userstate === 0) {
                        $this->userModel->setuserasregistered($data['u_name']);
                        $seller_details = $this -> sellerModel->getSellerDetails($logged_user->user_id);
                        $this->createSellerSession($logged_user, $seller_details);
                    } elseif ($logged_user->user_state === 2) {
                        $data['u_name_err'] = 'Your user account has been deleted';
                        $this->view('users/login', $data);
                    } else {
                        $data['u_name_err'] = 'Your registration is pending';
                        $this->view('users/login', $data);
                    }
                }
                if ($usertype == 'advisor') {
                    if ($userstate === 0) {
                        $this->userModel->setuserasregistered($data['u_name']);
                        $advisor_details = $this->advisorModel->advisorDetails($logged_user->user_id);
                        $this->createAdvisorSession($advisor_details);
                    } elseif ($userstate === 2) {
                        $data['u_name_err'] = 'Your user account has been deleted';
                        $this->view('users/login', $data);
                    } else {
                        $data['u_name_err'] = 'Your registration is pending';
                        $this->view('users/login', $data);
                    }

                }
            } else {
                $this->view('users/verify', $data);
            }


        } else {
            $data = [
                'title' => 'Fill following fields to be verified!',
                'u_name' => '',
                'pass' => '',
                'u_name_err' => '',
                'pass_err' => '',
                'verify' => '',
                'verify_err' => ''
            ];
            $this->view('users/verify', $data);
        }
    }

    public function login()
    {

        // Check for POST request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process the form data
            $data = [
                'title' => 'Sign In',
                'u_name' => trim($_POST['u_name']),
                'pass' => trim($_POST['pass']),
                'u_name_err' => '',
                'pass_err' => ''
            ];

            if (empty($data['u_name'])) {
                $data['u_name_err'] = 'Please enter user name';
            } elseif (!$this->userModel->findUser($data['u_name'])) {
                $data['u_name_err'] = 'No user found';
            }
            if (empty($data['pass'])) {
                $data['pass_err'] = 'Please enter passowrd';
            }

            if (empty($data['u_name_err']) && empty($data['pass_err'])) {
                // die('Success');
                $logged_user = $this->userModel->login($data['u_name'], $data['pass']);
                // print_r($logged_user);
                // die();

                if ($logged_user) {

                    if ($logged_user->type === 'customer') {
                        if ($logged_user->user_state === 1) {
                            $customer_details = $this->customerModel->getCustomerDetails($logged_user->user_id);
                            $this->creatCusSession($logged_user, $customer_details);
                            redirect('customers/viewHomePage');
                        } elseif ($logged_user->user_state === 2) {
                            $data['u_name_err'] = 'Your user account has been deleted';
                            $this->view('users/login', $data);
                        }


                    } elseif ($logged_user->type === 'admin') {
                        $this->createUserSession($logged_user);


                    } elseif ($logged_user->type === 'seller') {
                        
                        // var_dump($logged_user->user_state);
                        // die();

                        if ($logged_user->user_state == 1) {
                            $seller_details = $this -> sellerModel->getSellerDetails($logged_user->user_id);
                            $this->createSellerSession($logged_user, $seller_details);
                        } elseif ($logged_user->user_state == 2) {
                            $data['u_name_err'] = 'Your user account has been deleted';
                            $this->view('users/login', $data);
                        } else {
                            $data['u_name_err'] = 'Your registration is pending';
                            $this->view('users/login', $data);
                        }
                    } elseif ($logged_user->type == 'advisor') {
                        if ($logged_user->user_state == 1) {
                            // print_r($logged_user->user_id);
                            // die();
                            $advisor_details = $this->advisorModel->advisorDetails($logged_user->user_id);
                            $this->createAdvisorSession($advisor_details);
                            // redirect('Advisor/viewHomePage');
                        } elseif ($logged_user->user_state === 2) {
                            $data['u_name_err'] = 'Your user account has been deleted';
                            $this->view('users/login', $data);
                        } else {
                            $data['u_name_err'] = 'Your registration is pending';
                            $this->view('users/login', $data);
                        }
                    }


                } else {
                    $data['pass_err'] = 'Incorrecte passowrd';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }


        } else {
            $data = [
                'title' => 'Sign In',
                'u_name' => '',
                'pass' => '',
                'u_name_err' => '',
                'pass_err' => ''
            ];
            $this->view('users/login', $data);
        }
    }

    public function creatCusSession($data, $customer_details)
    {

        $_SESSION['cus_id'] = $data->user_id;
        $_SESSION['cus_name'] = $customer_details->name;
        $_SESSION['cus_photo_path'] = $customer_details->photo;
        $_SESSION['customer'] = 1;

    }

    public function createUserSession($user)
    {

        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->user_name;
        $_SESSION['user_type'] = $user->usertype;
        $_SESSION['admin'] = 1;
        redirect('admins/home');

    }

    public function createSellerSession($user, $seller_details)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['seller_name'] =  $seller_details->owner_name;
        $_SESSION ['seller_profile_image'] = $seller_details->photo;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['seller'] = 1;
        redirect('sellers/dashboard');
    }
    public function createAdvisorSession($details)
    {
        $_SESSION['advisor_id'] = $details->advisor_id;
        $_SESSION['advisor_name'] = $details->name;
        $_SESSION['advisor_photo_path'] = $details->photo;
        $_SESSION['advisor'] = 1;
        redirect('advisors/addtecno');
    }


    public function logout()
    {

        if ($_SESSION['customer'] == 1) {
            unset($_SESSION['cus_id']);
            unset($_SESSION['cus_name']);
            unset($_SESSION['cus_photo_path']);
            unset($_SESSION['customer']);
            session_destroy();
            redirect('users/login');
        }
        if ($_SESSION['admin'] == 1) {
            unset($_SESSION['admin']);
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            session_destroy();
            redirect('users/login');
        }

        if ($_SESSION['seller'] == 1) {

            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['seller']);
            session_destroy();
            redirect('users/login');

        }

        if ($_SESSION['advisor'] == 1) {

            unset($_SESSION['advisor_id']);
            //unset($_SESSION['user_email']);
            unset($_SESSION['advisor']);
            session_destroy();
            redirect('users/login');

        }


    }

//    forget password implementing


    public function forgetpassword()
    {

//        $this -> view('users/forgetpassword',$data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process the form data
            $data = [
                'title' => 'Reset Password',
                'u_name' => trim($_POST['u_name']),
                'u_name_err' => '',
                'pass_err' => ''
            ];

            if (empty($data['u_name'])) {
                $data['u_name_err'] = 'Please enter user name';
            } elseif (!$this->userModel->findUser($data['u_name'])) {
                $data['u_name_err'] = 'No user found';
            }elseif($this ->userModel -> getuserstatebyemail($data['u_name']) == 2){
                $data['u_name_err'] = 'This user account has been deleted from the system!';
            }

            if (empty($data['u_name_err'])) {

//                send verification for pw reset
                //        generating the verification code
                $verification_code = substr(uniqid(rand()), 0, 6);
                $username = "";
                $this->userModel->insertpwreset($data['u_name'], $verification_code);

                if ($this->mailModel->sendverificationforpwreset($username, $data['u_name'], $verification_code)) {

//                    $data = [
//                        'title' => 'Reset Password',
//                        'u_name' => trim($_POST['u_name']),
//                        'new_pass' => '',
//                        're_pass' => '',
//                        'pass_err1' => '',
//                        'pass_err2' => '',
//                        'verifycode' => '',
//                        'verifycode_err' => ''
//
//                    ];
//                    $this->view('users/newpassword', $data);
                    $usermail = $data['u_name'];
                    $userid = $this->userModel->getuseridbyemail($usermail);

                    $location = 'users/newpassword/'.$userid;
                    redirect($location);

                }


            } else {
                $this->view('users/forgetpassword', $data);
            }


        } else {
            $data = [
                'title' => 'Reset Password',
                'u_name' => '',
                'pass' => '',
                'u_name_err' => '',
                'pass_err' => '',
            ];
            $this->view('users/forgetpassword', $data);
        }


    }


    public function newpassword($id)
    {

//        $this -> view('users/forgetpassword',$data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $email = $this ->userModel -> getemailbyuserid($id);
            // Process the form data
            $data = [
                'title' => 'Reset Password',
                'new_pass' => trim($_POST['new_pass']),
                're_pass' => trim($_POST['re_pass']),
                'verifycode' => (int)trim($_POST['verifycode']),
                'verifycode_err' => '',
                'pass_err1' => '',
                'pass_err2' => '',
                'userid' => $id
            ];


            if (empty($data['new_pass'])) {
                $data['pass_err1'] = 'Please enter your new password';
            }
            if (empty($data['verifycode'])) {
                $data['verifycode_err'] = 'Please enter your Verication Code check your email!';
            }

            if (empty($data['re_pass'])) {
                $data['pass_err1'] = 'Please enter your new password';
            }

            if (empty($data['re_pass']) && !empty($data['new_pass'])) {
                $data['pass_err1'] = 'Enter password again';
            }

            if ($data['re_pass'] != $data['new_pass']) {
                $data['pass_err1'] = 'Password didn\'t match';
                $data['pass_err2'] = 'Password didn\'t match';
            }
            if (empty($data['pass_err1']) && empty($data['pass_err2'])) {

//                check validity of the verification code
                $verificationcodefromdb = $this->userModel->getpasswordresetcodebyemail($email);
                if ($data['verifycode'] == $verificationcodefromdb) {

                    $newpw = $data['new_pass'];
                    if ($this->userModel->changepw($email, $newpw)) {
                        $this->view('users/done');
                    } else {
                        $this->view('users/newpassword', $data);
                    }

                } else {
                    $data = [
                        'verifycode_err' => 'Password Reset Code',
                        'verifycode_err' => '',
                        'pass_err1' => '',
                        'pass_err2' => ''
                    ];

                    $this->view('users/newpassword', $data);

                }

            } else {
                $this->view('users/newpassword', $data);
            }


        } else {
            $data = [
                'title' => 'Reset Password',
                'new_pass' => '',
                're_pass' => '',
                'pass_err1' => '',
                'pass_err2' => '',
                'verifycode' => '',
                'verifycode_err' => '',
                'userid' => $id
            ];
            $this->view('users/newpassword', $data);
        }


    }


}