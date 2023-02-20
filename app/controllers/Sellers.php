<?php
class Sellers extends Controller{
    private $sellerModel;
    private $categoryModel;
    public function __construct()
    {
        if (!isSelleerLoggedIn()) {
            redirect('users/login');
        }
        $this->sellerModel = $this->model('Seller');
        $this -> categoryModel = $this ->model('ProductCategory');

    }
    public function dashboard() {
        //Get item details
        $itemData = $this -> sellerModel ->getItemData();
        $catData = $this -> sellerModel -> getCatData();
        $data = [
            'itemData' => $itemData,
            'catData' => $catData
        ];

        $this -> view('seller/dashboard', $data);
    }

    public function add1() {
        if($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'selected_category' => trim($_POST['category']),
                'selected_subcategory' => trim($_POST['subcat']),
                'category' => '',
                'subcategory' => '',
                'title' => '',
                'quantity' => '',
                'description' => '',
                'price' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => ''


            ];
            $this->view('seller/add2',$data);
//            redirect('seller/add2?datas=$data');
        }
        else{

            $data = [
//                'selected_category' => trim($_POST['']),
//                'selected_subcategory' => trim($_POST['']),
                'category' => $this->categoryModel->categorydetails(),
                'subcategory' => '',
                'title' => '',
                'quantity' => '',
                'description' => '',
                'price' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => ''

            ];
            $this->view('seller/add1',$data);
        }




    }

    public function add2() {

        if($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'product_id' => '',
                'category' => $_POST['cat'],
                'subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'image' => '',
                'image_err' => ''

            ];

            if(empty($data['title'])){
                $data['title_err'] = 'Please enter product title';
            }

            if(empty($data['quantity'])){
                $data['quantity_err'] = 'Please enter quantity';
            }

            if(empty($data['price'])){
                $data['price_err'] = 'Please enter product price';
            }

            if(empty($data['title_err']) && empty($data['quantity_err']) && empty($data['price_err'])) {
//                price_err$this -> sellerModel -> add2($data);
//                redirect('sellers/add3');
                 $this -> view('seller/add3', $data);
            } else {
                $this -> view('seller/add2', $data);
            }
        } else {
            $data = [
                'title' => '',
                'quantity' => '',
                'description' => '',
                'price' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => ''
            ];

            $this->view('seller/add2', $data);
        }
    }

    public function add3() {
        //Check for POST
        if($_SERVER ['REQUEST_METHOD'] == 'POST') {

            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestinatio = PUBROOT . '/public/img/upload_images/product_cover_photo/'. $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestinatio);

            //Process form
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $product_id = ($this ->categoryModel->getproductid( $_POST['cat'], $_POST['subcat']))->product_id ;


            //Init data
            $data = [
                'product_id' => $product_id,
                'category' => $_POST['cat'],
                'subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'image' => $fileNameNew,
                'image_err' => '',
                'photo_err' => ''
            ];
            $filesname = array_filter($_FILES['cover_photos']['name']);
            $filecount = count($_FILES['cover_photos']['name']);
            $totsize = 0;

            if($filecount == 0)
            {
                $data['photo_err'] = "Please select at least one image";
            }
            elseif($filecount>4)
            {
                $data['photo_err'] = 'Can not upload more than 4 images';
            }

            $type = array ('png', 'jpg', 'jpeg');

            $allowedTypes = [
                'image/png' => 'png',
                'image/jpeg' => 'jpg',
                'application/pdf' => 'pdf'
            ];

            if($fileSize === 0) {
                $data['image_err'] = 'Please attach Product Licens';
            } elseif($fileSize > 10000000){
                $data['image_err'] = 'File is too large';
            } elseif(!in_array($fileType, array_keys($allowedTypes))){
                $data['image_err'] = 'File not allowed';
            }
            $photo = array();
            foreach($_FILES['cover_photos']['name'] as $key => $value)
            {
                $img_name = $_FILES['cover_photos']['name'][$key];
                $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $totsize += $_FILES['cover_photos']['size'] [$key];


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

            //Make sure errors are empty
            if(empty($data['image_err']) && empty($data['photo_err'])){
                foreach($_FILES['cover_photos']['name'] as $key => $value) {
                    $img_name = $_FILES['cover_photos']['name'][$key];
                    $tmp_name = $_FILES['cover_photos']['tmp_name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $new_img = uniqid('IMG-', true) . '.' . $img_type;
                    $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/product_photos/' . $new_img;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    array_push($photo, $new_img);
                }

                if($this -> sellerModel -> addProductDetails($data,$photo)) {
                    redirect('sellers/add4');
                } else {
                    die('Something went wrong');
                }
            } else {
                //Load view with errors
                $this->view('seller/add3', $data);
            }

        } else {
            //Init data

            $data = [
                'image' => '',
                'photo' =>'',
                'image_err' => '',
                'photo_err' => ''
            ];

            //Load view
            $this->view('seller/add3', $data);

        }
    }

    public function add4() {

        $this->view('seller/add4');

    }

    public function allregsellers(){
        $tabledata = $this->sellerModel->all_registered_sellers();
        $tabledata =json_encode($tabledata);
        echo $tabledata;
        exit();
    }
    public function allnewsellers(){
        $tabledata = $this->sellerModel->get_non_registered_sellers();
        $tabledata =json_encode($tabledata);
        echo $tabledata;
        exit();
    }

    public function show($id) {

        $itemData = $this -> sellerModel -> getItemById($id);
        $productImg = $this -> sellerModel -> getProductImages($id); 

        $data = [
            'itemData' => $itemData,
            'productImg' => $productImg
        ];
        

        
        $this->view('seller/show', $data);
    }

    public function order(){

        $orderData = $this -> sellerModel -> getOrderData();
        $data =[
            'orderData' => $orderData
        ];

        if($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $today = date("Y-m-d");
            $data = [
                'confirm' => $_POST['orderConfirm'],
                'cancle' => $_POST['orderCancle'],
                'complete' => $_POST['orderComplete'],
                'complete_date' => $today,
                'confirmation' => '',
                'completeness' => ''
            ];

            if(!empty($data['confirm'])) {
                $data['confirmation'] = 1;
            } else {
                $data['confirmation'] = 0;
            }

            if(!empty($data['complete'])) {
                $data['completeness'] = 1;
            } else {
                $data['completeness'] = 0;
            }
        }

        $this->view('seller/order', $data);
    }

    public function searchbynames_registeredseller(){


        if(isset($_POST['searchbynames_registeredseller'])){
            $text = $_POST['searchbynames_registeredseller'];
            $dataset = $this->sellerModel -> searchuserbyname_registeredsellers($text);
            echo json_encode($dataset);
            unset($_POST['searchbynames_registeredseller']);
            exit();
        }
        else{
            $tabledata = $this->sellerModel->all_registered_sellers();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();

        }

    }

    public function searchbynames_unregisteredseller(){


        if(isset($_POST['searchbynames_unregisteredseller'])){
            $text = $_POST['searchbynames_unregisteredseller'];
            $dataset = $this->sellerModel -> searchuserbyname_unregisteredsellers($text);
            echo json_encode($dataset);
            unset($_POST['searchbynames_unregisteredseller']);
            exit();
        }
        else{
            $tabledata = $this->sellerModel->get_non_registered_sellers();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();

        }

    }

}
