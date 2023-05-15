<?php
class Complaints extends Controller {

    private $complaintModel;
    private $sellerModel;
    private $reviewModel;

    public function __construct(){

        $this->complaintModel = $this->model('Complaint');
        $this->sellerModel = $this->model('Seller');
        $this->reviewModel = $this->model('Review');
    }
    //view all complains 
    public function allnewcomplaints(){
        $tabledata = $this->complaintModel->getAllComplaints();//call the model get the all complains
        $tabledata = json_encode($tabledata);
        echo $tabledata;
        exit();
    }
    //add complain for seller
    public function addComplainForSeller($id)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $sellerdetails = $this->sellerModel->getSellerDetails($id);
            $top_rated_products = $this->reviewModel->topRatedProducts($id);
            $seller_license = $this->sellerModel->sellerLicense($id);
            $reviews = $this->reviewModel->getsASellerReview($id);
            $rating = $this->reviewModel->getASellerRating($id);

            $data = [
                'complain' =>trim($_POST['content']),
                'complain_err' => '',
                'seller' => $sellerdetails,
                'top_products' => $top_rated_products,
                'license' => $seller_license,
                'reviews' => $reviews,
                'rating' => $rating,
                'err' => ''
            ];
            //validation part
            if(empty($data['complain']))
            {
                $data['complain_err'] = "Please enter your complain";
            }


            $imagecount = count($_FILES['complains']['name']);
            $type = array ('png', 'jpg', 'jpeg');

            if($imagecount>3)
            {
               $data['complain_err'] = 'Can not upload more than 3 images';
            }
            if($_FILES["complains"]["error"] == UPLOAD_ERR_OK)
            {
                foreach($_FILES['complains']['name'] as $key => $value)
                {
                    $img_name = $_FILES['complains']['name'][$key];
                    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    

                    if($img_type != $type[0]  && $img_type != $type[1] && $img_type != $type[2])
                    {
                            $data['complain_err'] = 'Image type should be png or jpeg or jpg'; 
                            break;
                    }

                }
            }
            
            $photo = array();

            if(empty($data['complain_err']))
            {
                    foreach($_FILES['complains']['name'] as $key => $value)
                    {
                         $img_name = $_FILES['complains']['name'][$key];
                         $tmp_name = $_FILES['complains']['tmp_name'][$key];
                         $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
                         $new_img = uniqid('IMG-',true).'.'.$img_type;
                         $img_upload_path = 'C:/xampp/htdocs/gardening_hub/public/img/upload_images/complains/'.$new_img;
                         move_uploaded_file($tmp_name,$img_upload_path);
                         array_push($photo,$new_img);
                    }
               
                if($this->complaintModel->addComplainForSeller($data, $photo))
                {
                    redirect('sellers/sellerDetails/'.$id);
                }
            }
            else
            {
                $this->view('customers/sellerProfile', $data);
            }

        }
        
    }
    //ajax support function  for filter complains
    public function isaddedcomplain($id)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $result = $this->complaintModel->isaddedcomplainforseller($id);
            echo json_encode($result, JSON_UNESCAPED_UNICODE); 
        }
    }


}