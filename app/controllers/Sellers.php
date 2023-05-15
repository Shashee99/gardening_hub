<?php
class Sellers extends Controller
{
    private $sellerModel;
    private $reviewMoel;
    private $categoryModel;
    private $wishlistModel;

    public function __construct()
    {
        if (!isSelleerLoggedIn()) {
            if (!isset($_SESSION['cus_id'])) {
                redirect('users/login');
            }
        }

        $this->sellerModel = $this->model('Seller');
        $this->categoryModel = $this->model('ProductCategory');
        $this->reviewMoel = $this->model('Review');
        $this->wishlistModel = $this->model('Wishlist');

    }

    public function dashboard()
    {
        //Get item details
        $itemData = $this -> sellerModel ->getItemData();
        //Get category data
        $catData = $this -> sellerModel -> getCatData();
        //Get notification data
        $notificationData = $this -> sellerModel -> getNotificationCount();
        // $ratingStarData = $this -> sellerModel -> getratingStarData();



        $data = [
            'itemData' => $itemData,
            'catData' => $catData,
            'notificationData' => $notificationData
        ];

        // Load view with data contain in 'data' array
        $this->view('seller/dashboard', $data);
    }

    public function add1()
    {
        error_reporting(E_ERROR | E_PARSE);
        //Check for post request
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
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
                'validate_period' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'validate_period_err' => '',
                'cat_err' => '',
                'err_symbol' => ''
            ];

            if (empty($data['selected_category']) && empty($data['selected_subcategory'])) {
                $data['cat_err'] = 'Please enter Ctegory and Subcategory';
                
                $data['err_symbol'] = "\u{f06a}";
            }

            if (empty($data['cat_err'])) {
                $this->view('seller/add2', $data);
            } else {
                $this->view('seller/add1', $data);
            }
            
        } else {

            $data = [
                'category' => $this->categoryModel->categorydetails(),
                'subcategory' => '',
                'title' => '',
                'quantity' => '',
                'description' => '',
                'validate_period' => '',
                'price' => '',
                'title_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'validate_period_err' => '',
                'cat_err' => '',
                'err_symbol' => ''

            ];
            $this->view('seller/add1', $data);
        }


    }

    public function add2()
    {
        error_reporting(E_ERROR | E_PARSE);
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'product_id' => '',
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
                'unitvalue' => trim($_POST['unitvalue']),
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'validate_period' => trim($_POST['validate_period']),
                'title_err' => '',
                'validate_period_err' => '',
                'cat_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'image' => '',
                'image_err' => '',
                'unitvalue_err',
                'err_symbol1' => '',
                'err_symbol2' => '',
                'err_symbol3' => '',
                'err_symbol4' => '',
                'err_symbol5' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter product title';
                $data['err_symbol1'] = "\u{f06a}";
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
                $data['err_symbol3'] = "\u{f06a}";
            } elseif (!is_numeric($data['quantity'] )) {
                $data['quantity_err'] = 'Quantity should be a number';
                $data['err_symbol3'] = "\u{f06a}";
            }

            if (empty($data['price'])) {
                $data['price_err'] = 'Please enter product price';
                $data['err_symbol4'] = "\u{f06a}";
            } elseif (!is_numeric($data['price'] )){
                $data['price_err'] = 'Price should be a number';
                $data['err_symbol4'] = "\u{f06a}";
            }

            if (empty($data['unitvalue'])) {
                $data['unitvalue_err'] = 'Please enter individual product unit';
                $data['err_symbol2'] = "\u{f06a}";
            }

            if (empty($data['validate_period'])) {
                $data['validate_period_err'] = 'Please enter validate period';
                $data['err_symbol5'] = "\u{f06a}";
            }

            if (empty($data['title_err']) && empty($data['quantity_err']) && empty($data['price_err']) && empty($data['unitvalue_err']) && empty($data['validate_period_err'])) {

//                price_err$this -> sellerModel -> add2($data);
//                redirect('sellers/add3');
                $this->view('seller/add3', $data);
            } else {

                $this->view('seller/add2', $data);
            }
        } else {
            $data = [
                'product_id' => '',
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'unitvalue' => trim($_POST['unitvalue']),
                'quantity' => trim($_POST['quantity']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'validate_period' => trim($_POST['validate_period']),
                'title_err' => '',
                'validate_period_err' => '',
                'cat_err' => '',
                'quantity_err' => '',
                'unitvalue_err' => '',
                'price_err' => '',
                'image' => '',
                'image_err' => '',
                'err_symbol1' => '',
                'err_symbol2' => '',
                'err_symbol3' => '',
                'err_symbol4' => '',
                'err_symbol5' => ''
            ];

            $this->view('seller/add2', $data);
        }
    }

    public function recentlyaddedsellers()
    {
        $dataset = $this->sellerModel->recentlyaddedsellers();
        $data = json_encode($dataset);
        echo $data;
        exit();
    }


    public function sellerDetails($id)
    {
        $sellerdetails = $this->sellerModel->getSellerDetails($id);
        $top_rated_products = $this->reviewMoel->topRatedProducts($id);
        $seller_license = $this->sellerModel->sellerLicense($id);
        $reviews = $this->reviewMoel->getsASellerReview($id);
        $rating = $this->reviewMoel->getASellerRating($id);
        $data = [
            'seller' => $sellerdetails,
            'top_products' => $top_rated_products,
            'license' => $seller_license,
            'reviews' => $reviews,
            'rating' => $rating,
            'complain_err' => '',
            'err' => ''
        ];
        $this->view('customers/sellerProfile', $data);
    }


    public function add3()
    {
        //Check for POST
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestinatio = PUBROOT . '/public/img/upload_images/product_cover_photo/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestinatio);

            //Process form
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $product_id = ($this->categoryModel->getproductid($_POST['cat'], $_POST['subcat']))->product_id;


            //Init data
            $data = [
                'product_id' => $product_id,
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
                'title' => trim($_POST['title']),
                'quantity' => trim($_POST['quantity']),
                'unitvalue' => trim($_POST['unitvalue']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'validate_period' => trim($_POST['validate_period']),
                'image' => $fileNameNew,
                'image_err' => '',
                'validate_period_err' => '',
                'unitvalue_err' => '',
                'photo_err' => '',
                'err_symbol1' => '',
                'err_symbol2' => '',
            ];
            $filesname = array_filter($_FILES['cover_photos']['name']);
            $filecount = count($_FILES['cover_photos']['name']);
            $totsize = 0;

            if ($filecount == 0) {
                $data['photo_err'] = "Please select at least one image";
                $data['err_symbol2'] = "\u{f06a}";
            } elseif ($filecount > 4) {
                $data['photo_err'] = 'Can not upload more than 4 images';
                $data['err_symbol2'] = "\u{f06a}";
            }

            $type = array('png', 'jpg', 'jpeg');

            $allowedTypes = [
                'image/png' => 'png',
                'image/jpeg' => 'jpg',
                'application/pdf' => 'pdf'
            ];

            if ($fileSize === 0) {
                $data['image_err'] = 'Please attach Product Licens';
                $data['err_symbol1'] = "\u{f06a}";
            } elseif ($fileSize > 10000000) {
                $data['image_err'] = 'File is too large';
                $data['err_symbol1'] = "\u{f06a}";
            } elseif (!in_array($fileType, array_keys($allowedTypes))) {
                $data['image_err'] = 'File not allowed';
                $data['err_symbol1'] = "\u{f06a}";
            }
            $photo = array();
            foreach ($_FILES['cover_photos']['name'] as $key => $value) {
                $img_name = $_FILES['cover_photos']['name'][$key];
                $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $totsize += $_FILES['cover_photos']['size'] [$key];


                if ($img_type != $type[0] && $img_type != $type[1] && $img_type != $type[2] && $img_type != '') {
                    $data['photo_err'] = 'Image type should be png or jpeg or jpg';
                    $data['err_symbol2'] = "\u{f06a}";
                    break;
                }

            }

            if ($totsize > 8388608) {
                $data['photo_err'] = 'Images size should be less than 8MB';
                $data['err_symbol2'] = "\u{f06a}";
            }

            //Make sure errors are empty
            if (empty($data['image_err']) && empty($data['photo_err'])) {
                foreach ($_FILES['cover_photos']['name'] as $key => $value) {
                    $img_name = $_FILES['cover_photos']['name'][$key];
                    $tmp_name = $_FILES['cover_photos']['tmp_name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $new_img = uniqid('IMG-', true) . '.' . $img_type;
                    $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/product_photos/' . $new_img;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    array_push($photo, $new_img);
                }

                if ($this->sellerModel->addProductDetails($data, $photo)) {
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
                'photo' => '',
                'image_err' => '',
                'photo_err' => '',
                'err_symbol1' => '',
                'err_symbol2' => '',
                'selected_category' => $_POST['cat'],
                'selected_subcategory' => $_POST['subcat'],
            ];

            //Load view
            $this->view('seller/add3', $data);

        }
    }

    public function add4()
    {

        $this->view('seller/add4');

    }

    public function allregsellers()
    {
        $tabledata = $this->sellerModel->all_registered_sellers();
        $tabledata = json_encode($tabledata);
        echo $tabledata;
        exit();
    }

    public function allnewsellers()
    {
        $tabledata = $this->sellerModel->get_non_registered_sellers();
        $tabledata = json_encode($tabledata);
        echo $tabledata;
        exit();
    }

    public function show($id)
    {

        $itemData = $this -> sellerModel -> getItemById($id);
        $productImg = $this -> sellerModel -> getProductImages($id); 
        $reviewData = $this -> sellerModel -> getReviewData($id);

        $data = [
            'itemData' => $itemData,
            'productImg' => $productImg,
            'reviewData' => $reviewData
        ];


        $this->view('seller/show', $data);
    }

    public function order(){

        $orderData = $this -> sellerModel -> getOrderData();
        $cancleorderData = $this -> sellerModel -> getcancleOrderData();
        $conformorderData = $this -> sellerModel -> getconformOrderData();
        $completeeorderData = $this -> sellerModel -> getcompleteOrderData();
        $data =[
            'orderData' => $orderData,
            'conformorderData' => $conformorderData,
            'cancleorderData' => $cancleorderData,
            'completeeorderData' => $completeeorderData
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

            if (!empty($data['confirm'])) {
                $data['confirmation'] = 1;
            } else {
                $data['confirmation'] = 0;
            }

            if (!empty($data['complete'])) {
                $data['completeness'] = 1;
            } else {
                $data['completeness'] = 0;
            }
        }

        $this->view('seller/order', $data);
    }

    public function searchbynames_registeredseller()
    {


        if (isset($_POST['searchbynames_registeredseller'])) {
            $text = $_POST['searchbynames_registeredseller'];
            $dataset = $this->sellerModel->searchuserbyname_registeredsellers($text);
            echo json_encode($dataset);
            unset($_POST['searchbynames_registeredseller']);
            exit();
        } else {
            $tabledata = $this->sellerModel->all_registered_sellers();
            $tabledata = json_encode($tabledata);
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


    public function order_conf()
    {
        $item = $_POST['item'];
        $result = $this->sellerModel->order_conf($item);
        if ($result) {
            echo "Confirm Suceccfully";
        }
    }

    public function order_cancel() {
        $product_no = $_POST['cancel_item'];
        $cancel_reason = $_POST['cancel_reason'];
        $result = $this->sellerModel->order_cancel($product_no, $cancel_reason);
        if ($result) {
            echo "Confirm Suceccfully";
        }
    }


    public function order_complete() {
        $product_no = $_POST['compelete_item'];
        $result = $this->sellerModel->order_complete($product_no);
        if ($result) {
            echo "Confirm Suceccfully";
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestinatio = PUBROOT . '/public/img/upload_images/product_cover_photo/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestinatio);

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // $product_id = ($this ->categoryModel->getproductid( $_POST['cat'], $_POST['subcat']))->product_id ;
            $productImg = $this->sellerModel->getProductImages($id);
            $itemData = $this->sellerModel->getItemById($id);
            $data1 = [
                // 'product_id' => $product_id,
                'id' => $id,
                'title' => trim($_POST['title']),
                'price' => trim($_POST['price']),
                'quantity' => trim($_POST['quantity']),
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

            if ($fileSize == 0) {
                $data1['image'] = $itemData->image;
            } elseif ($fileSize > 10000000) {
                $data1['image_err'] = 'Image is too large';
            } elseif (!in_array($fileType, array_keys($allowedTypes))) {
                $data1['image_err'] = 'File not allowed';
            }

            $filesname = array_filter($_FILES['cover_photos']['name']);
            $multifileSize = sizeof($_FILES['cover_photos']['name']);
            $filecount = count($_FILES['cover_photos']['name']);
            $totsize = 0;


            if (empty($filesname)) {
                $this->sellerModel->updateProductDetails($data1);
                redirect('sellers/dashboard');

            } else {

                if ($filecount > 4) {
                    $data1['photo_err'] = 'Can not upload more than 4 images';
                }

                $type = array('png', 'jpg', 'jpeg');

                $photo = array();
                foreach ($_FILES['cover_photos']['name'] as $key => $value) {
                    $img_name = $_FILES['cover_photos']['name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $totsize += $_FILES['cover_photos']['size'] [$key];


                    if ($img_type != $type[0] && $img_type != $type[1] && $img_type != $type[2]) {
                        $data1['photo_err'] = 'Image type should be png or jpeg or jpg';
                        break;
                    }

                }

                if ($totsize > 8388608) {
                    $data1['photo_err'] = 'Images size should be less than 8MB';
                }

                //Make sure errors are empty
                if (empty($data1['image_err']) && empty($data1['photo_err'])) {
                    // var_dump("Dddgfdg");
                    // exit();
                    foreach ($_FILES['cover_photos']['name'] as $key => $value) {
                        $img_name = $_FILES['cover_photos']['name'][$key];
                        $tmp_name = $_FILES['cover_photos']['tmp_name'][$key];
                        $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                        $new_img = uniqid('IMG-', true) . '.' . $img_type;
                        $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/product_photos/' . $new_img;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        array_push($photo, $new_img);
                    }

                    if ($this->sellerModel->updateProductDetails_withCoverPhotos($data1, $photo)) {
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
            $itemData = $this->sellerModel->getItemById($id);
            $productImg = $this->sellerModel->getProductImages($id);
            if ($itemData->seller_id != $_SESSION['user_id']) {
                redirect('sellers/dashboard');
            }
            $data = [
                'id' => $id,
                'title' => $itemData->title,
                'price' => $itemData->price,
                'quantity' => $itemData->quantity,
                'description' => $itemData->description,
                'image' => $itemData->image,
                'productImg' => $productImg,
                'image_err' => '',
                'photo_err' => ''
            ];

            $this->view('seller/update', $data);
        }


    }

    public function delete_item()
    {
        $delete_item_id = $_POST['delete_item_id'];
        $this->sellerModel->delete($delete_item_id);
        header('Location: /gardening_hub/sellers/dashboard');

    }

    public function radio_select(){
    $radio_value = $_POST['category'];
    $selected_radio_items = $this -> sellerModel -> getSelectedRadioItems($radio_value);
    // $selected_radio_cat = $this -> sellerModel -> getSelectedRadioCats($radio_value);

    $data = array();
    
    foreach($selected_radio_items as $item)
    {
        $product_no = $item -> product_no;
        $image = $item -> image;
        $title = $item -> title;
        $price = $item -> price;
        $quantity = $item -> quantity;
        $total_rating = $item -> total_rating;

        $data[] = array(
            'product_no' => $product_no,
            'image' => $image,
            'title' => $title,
            'price' => $price,
            'quantity' => $quantity,
            'total_rating' => $total_rating
        );
    }
    
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function request_category(){
    if($_SERVER ['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'items' => $_POST['items'],
            'description' => $_POST['description']
        ];

        if($this -> sellerModel -> addNewCategory($data)){
            redirect('sellers/dashboard');
        } else{
            $this->view('seller/request_category');
        }
    } else {
        $data = [
            'items' => '',
            'description' => ''
        ];
        $this->view('seller/request_category');
    }
    }

    public function genarate_report(){

        $this -> view('seller/genarate_report');
    }

    public function genarate_pdf(){

        $reportData = $this -> sellerModel -> getreportData();
        $totalIncome = $this -> sellerModel -> gettotalIncome();
        $data = [
            'reportData' => $reportData,
            'totalIncome' => $totalIncome
        ];
        $this -> view('seller/genarate_pdf', $data);
    }

    public function genarate_pdf_download(){

        $reportData = $this -> sellerModel -> getreportData();
        $totalIncome = $this -> sellerModel -> gettotalIncome();
        $data = [
            'reportData' => $reportData,
            'totalIncome' => $totalIncome
        ];
        $this -> view('seller/genarate_pdf', $data);
    }

    public function deleteseller($id)
    {

        if ($id == 0000) {
            redirect('admins/sellers');
        }


    }
    public function isaddedreview()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $seller_id = $_POST['seller_id'];

            $result = $this->reviewMoel->isAddedSellerReview($seller_id);
            $result2 = $this->wishlistModel->isCustomerPurchaseProduct($seller_id);
            if($result)
            {
                echo json_encode("true1", JSON_UNESCAPED_UNICODE); 
            }
            elseif(!$result2)
            {
                echo json_encode("true2", JSON_UNESCAPED_UNICODE); 
            }
            else
            {
                echo json_encode("false", JSON_UNESCAPED_UNICODE); 
            }

        }
        

    }


    public function sellerprofile() {

        $profileData = $this -> sellerModel -> getProfileData();

        $data = [
            'profileData' => $profileData
        ];
        $this -> view('seller/sellerprofile', $data);
    }


}

