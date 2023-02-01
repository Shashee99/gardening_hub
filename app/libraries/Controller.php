<?php 

// Base controller calss
    class Controller
    {
        // Load paticular model file and create a instance and return it
        public function model($model)
        {
            require_once '../app/models/'.$model.'.php';

            return new $model();
        }

        // Load paticular view file
        public function view($view, $data=[])
        {
            if(file_exists('../app/views/'.$view.'.php'))
            {
                require_once '../app/views/'.$view.'.php';
            }
            else
            {
                die('View doesn\'t exist');
            }
        }
    }