<?php

    class Problems extends Controller
    {
        private $problemModel;

        public function __construct()
        {
            $this->problemModel = $this->model('Problem');
        }
        public function viewProblems()
        {
            $problems = $this->problemModel->givenUserProblems($_SESSION['cus_id']);
            $data = [
                'problems' => $problems
            ];
            $this->view('customers/problem', $data);
        }
        public function viewOneProblem($id)
        {
            $problem = $this->problemModel->getAproblem($id);
            $data = [
                'problem' => $problem,
                'reply' => ''
            ];
            $this->view('customers/viewOneProblem',$data);
        }
        public function addProblems()
        {

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
    
                    'title'=> trim($_POST['title']),
                    'problem' => trim($_POST['problem']),
                    'photos' => trim($_POST['title']),
                    'category' => trim($_POST['category']),
                    'category_err' => '',
                    'problem_err' => '',
                    'title_err' => ''
                ];

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

                if(empty($data['title_err']) && empty($data['problem_err']) && empty($data['category_err']) )
                {
                    if($this->problemModel->addProblem($data))
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
    }