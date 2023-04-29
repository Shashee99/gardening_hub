<?php
class ProductCategories extends Controller{
    private $categoryModel;
    public function __construct()
    {
        $this->categoryModel = $this->model('ProductCategory');

    }
    public function viewAll(){
        $tabledata = $this->categoryModel->getAllCategories();
        $tabledata =json_encode($tabledata);
        echo $tabledata;
        exit();
    }
    public function insert(){
        $cat = $_POST['category'];
        $subcat = $_POST['subcategory'];

//        add new categories to table
        $result = $this->categoryModel->insertcat($cat,$subcat);
        if ($result){
            // Clear the category and subcategory variables from the $_POST array
            unset($_POST['category']);
            unset($_POST['subcategory']);
        }else{
            die("something went wrong");
        }
    }


    public function update(){
        $id=$_POST['id'];
        $cat = $_POST['cat'];
        $subcat = $_POST['subcat'];

        $result = $this->categoryModel->updatecat($id,$cat,$subcat);
        if ($result){
            echo "Updated Succefully!";
            unset($_POST['id']);
            unset($_POST['cat']);
            unset($_POST['subcat']);
        }else{
            die("something went wrong");
        }
    }

    public function delete(){
        $id = $_POST['id'];
        $result = $this->categoryModel->delete($id);
        if ($result){
            echo "Deleted Succefully";
            unset($_POST['id']);
        }else{
            die("something went wrong");
        }

    }
    public function getsubcategory(){
        $cat = $_POST['category'];
        $result = $this->categoryModel->subcategory($cat);

        if ($result){
            echo json_encode($result);
            unset($_POST['category']);
        }else{
            die("something went wrong");
        }
    }

    public function searchcategoriesbyname(){
        if(isset($_POST['searchcategory'])){
            $text = $_POST['searchcategory'];
            $dataset = $this->categoryModel -> searchbycatname($text);
            echo json_encode($dataset);
            unset($_POST['searchcategory']);
            exit();
        }
        else{
            $tabledata = $this->categoryModel->getAllCategories();
            $tabledata =json_encode($tabledata);
            echo $tabledata;
            exit();

        }
    }


}