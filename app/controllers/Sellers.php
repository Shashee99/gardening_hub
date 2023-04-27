<?php
class Sellers extends Controller{
    private $sellerModel;
    private $reviewMoel;
    private $categoryModel;
    private $wishlistModel;
    public function __construct()
    {
        if (!isSelleerLoggedIn()) {
            if(!isset($_SESSION['cus_id']))
            {
                redirect('users/login');
            }
        }

        $this->sellerModel = $this->model('Seller');
        $this -> categoryModel = $this ->model('ProductCategory');
        $this->reviewMoel = $this->model('Review');
        $this->wishlistModel = $this->model('Wishlist');

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
        error_reporting(E_ERROR | E_PARSE);
        if($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'product_id' => '',
                'selected_category' => trim($_POST['category']),
                'selected_subcategory' => trim($_POST['subcat']),
                'category' => $this->categoryModel->categorydetails(),
                'subcategory' => '',
                'title' => '',
                'quantity' => '',
                'description' => '',
                'price' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'cat_err' => ''
            ];

            if(empty($data['selected_category']) && empty($data['selected_subcategory'])){
                $data['cat_err'] = '* Please enter Ctegory and Subcategory';
            }
            if(empty($data['cat_err'])){
                $this->view('seller/add2',$data);
            }
            else {
                $this->view('seller/add1',$data);
            }
        } 
        else{

            $data = [
                'category' => $this->categoryModel->categorydetails(),
                'subcategory' => '',
                'title' => '',
                'quantity' => '',
                'description' => '',
                'price' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'cat_err' => ''

            ];
            $this->view('seller/add1',$data);
        }




    }

    public function add2() {
        error_reporting(E_ERROR | E_PARSE);
        if($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'product_id' => '',
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'title_err' => '',
                'cat_err' => '',
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
                'product_id' => '',
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'title_err' => '',
                'cat_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'image' => '',
                'image_err' => ''
            ];

            $this->view('seller/add2', $data);
        }
    }

    public function recentlyaddedsellers(){
        $dataset = $this -> sellerModel -> recentlyaddedsellers();
        $data = json_encode($dataset);
        echo $data;
        exit();
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
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'image' => $fileNameNew,
                // There is a mistake................................
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
                'photo_err' => '',
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
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
                'product_no' => $_POST['product_no'],
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

    public function order_conf() {
        $item = $_POST['item'];
        $result = $this -> sellerModel->order_conf($item);
        if ($result){
            echo "Confirm Suceccfully";
        }
    }

    public function order_cancel() {
        $product_no = $_POST['cancel_item'];
        $cancel_reason = $_POST['cancel_reason'];
        $result = $this -> sellerModel->order_cancel($product_no, $cancel_reason);
        if ($result){
            echo "Confirm Suceccfully";
        }
    }

    // public function update($id) {
    //     $itemData = $this -> sellerModel -> getItemById($id);
    //     $productImg = $this -> sellerModel -> getProductImages($id);
    // public function update($id) {
    //     $itemData = $this -> sellerModel -> getItemById($id);
    //     $productImg = $this -> sellerModel -> getProductImages($id); 

    //     $data = [
    //         'itemData' => $itemData,
    //         'productImg' => $productImg,
    //         'image_err' => '',
    //         'photo_err' => ''
    //     ]; 

    //     $this->view('seller/update', $data);
    // }

    public function update($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

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

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // $product_id = ($this ->categoryModel->getproductid( $_POST['cat'], $_POST['subcat']))->product_id ;
            $productImg = $this -> sellerModel -> getProductImages($id);
            $itemData = $this -> sellerModel -> getItemById($id);
            $data1 = [
                // 'product_id' => $product_id,
                'id' => $id,
                'title' => trim($_POST['title']),
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'seller_id' => $_SESSION['user_id'],
                'image' => $fileNameNew,
                'productImg' => $productImg,
                'image_err' => '',
                'photo_err' => ''    
            ];

            $allowedTypes = [
                'image/png' => 'png',
                'image/jpeg' => 'jpg',
                'application/pdf' => 'pdf'
            ];

            if($fileSize === 0) {
                // $data1['image_err'] = 'Please attach Image';
                $data1['image'] = $itemData -> image;
            } elseif($fileSize > 10000000){
                $data1['image_err'] = 'Image is too large';
            } elseif(!in_array($fileType, array_keys($allowedTypes))){
                $data1['image_err'] = 'File not allowed';
            }

            $filesname = array_filter($_FILES['cover_photos']['name']);
            $multifileSize = sizeof($_FILES['cover_photos']['name']) ;
            $filecount = count($_FILES['cover_photos']['name']);
            $totsize = 0;

            

            if($multifileSize == 0)
            {
                $data1['photo_err'] = 'Used the previous images';
            }

            else {

                if($filecount>4)
                {
                    $data1['photo_err'] = 'Can not upload more than 4 images';
                }

                $type = array ('png', 'jpg', 'jpeg');

                $photo = array();
                foreach($_FILES['cover_photos']['name'] as $key => $value)
                {
                    $img_name = $_FILES['cover_photos']['name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $totsize += $_FILES['cover_photos']['size'] [$key];


                    if($img_type != $type[0]  && $img_type != $type[1] && $img_type != $type[2])
                    
                    {
                        $data1['photo_err'] = 'Image type should be png or jpeg or jpg';
                        break;
                    }

                }

                if($totsize > 8388608)
                {
                    $data1['photo_err'] = 'Images size should be less than 8MB';
                }

                //Make sure errors are empty
                if(empty($data1['image_err']) && empty($data1['photo_err'])){
                    foreach($_FILES['cover_photos']['name'] as $key => $value) {
                        $img_name = $_FILES['cover_photos']['name'][$key];
                        $tmp_name = $_FILES['cover_photos']['tmp_name'][$key];
                        $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                        $new_img = uniqid('IMG-', true) . '.' . $img_type;
                        $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/product_photos/' . $new_img;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        array_push($photo, $new_img);
                    }

                    if($this -> sellerModel -> updateProductDetails($data1,$photo)) { 
                        redirect('sellers/dashboard');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('seller/update', $data1);
                }
            }

    } else {
        $itemData = $this -> sellerModel -> getItemById($id);
        $productImg = $this -> sellerModel -> getProductImages($id);
        if($itemData -> seller_id != $_SESSION['user_id']){
            redirect('sellers/dashboard');
        }
        $data = [
            'id' => $id,
            'title' => $itemData -> title,
            'price' => $itemData -> price,
            'description' => $itemData -> description,
            'image' => $itemData -> image,
            'productImg' => $productImg,
            'image_err' => '',
            'photo_err' => ''
        ]; 

        $this->view('seller/update', $data);
    }

    
}

public function delete_item(){
    echo("nhghcnhhgcmh");
    $delete_item_id = $_POST['delete_item_id'];
    $this->sellerModel->delete($delete_item_id);
    header('Location: /gardening_hub/sellers/dashboard');

    }

public function radio_select(){
    $radio_value = $_POST['category'];
    $selected_radio_items = $this -> sellerModel -> getSelectedRadioItems($radio_value);
    // $selected_radio_cat = $this -> sellerModel -> getSelectedRadioCats($radio_value);
    
    foreach($selected_radio_items as $item)
    {
        $product_no = $item -> product_no;
        $image = $item -> image;
        $title = $item -> title;
        $price = $item -> price;

        $data[] = array(
            'product_no' => $product_no,
            'image' => $image,
            'title' => $title,
            'price' => $price
        );
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

public function request_category(){
    if($_SERVER ['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

    $data = [
        
    ];
}

}


