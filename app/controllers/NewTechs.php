<?php

class NewTechs extends Controller
{
    private $techModel;
    private $advisorModel;

    public function __construct()
    {
        $this->techModel = $this->model('NewTech');
        $this->advisorModel = $this->model('Advisor');
    }
    public function viewNewTech()
    {
        $data = array();
        $result = $this->techModel->newtechnologies();

        foreach($result as $technology)
        {
            $id = $technology->no;
            $date = $technology->date;
            $title = $technology->title;
            $cat = $technology->category;
            $content = $technology->content;
            $advisor_id = $technology->advisor_id;
            $advisor_details = $this->advisorModel->advisorDetails($advisor_id);
            $advisor_name = $advisor_details->name;
            $advisor_photo = $advisor_details->photo;

            $data[] = array
            (
                'advisor_name' => $advisor_name,
                'advisor_photo' => $advisor_photo,
                'cat' => $cat,
                'date' => $date,
                'title' => $title,
                'content' => $content
            );

        }

        $this->view('customers/newTech', $data);
    }
    public function filterNewTech()
    {
        if(isset($_POST['category']))
        {
            $category = $_POST['category'];
            $data = array();

            if($category === "")
            {
                $result = $this->techModel->newtechnologies();

            }
            else
            {
                $result = $this->techModel->newtechnologiesByCat($category);
            }

            foreach($result as $technology)
            {
                $id = $technology->no;
                $date = $technology->date;
                $title = $technology->title;
                $cat = $technology->category;
                $content = $technology->content;
                $advisor_id = $technology->advisor_id;
                $advisor_details = $this->advisorModel->advisorDetails($advisor_id);
                $advisor_name = $advisor_details->name;
                $advisor_photo = $advisor_details->photo;

                $data[] = array
                (
                    'advisor_name' => $advisor_name,
                    'advisor_photo' => $advisor_photo,
                    'cat' => $cat,
                    'date' => $date,
                    'title' => $title,
                    'content' => $content
                );

            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
    }
}