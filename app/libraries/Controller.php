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
        public function is_within_10km($lat1, $lon1, $lat2, $lon2) 
        {
            // Convert latitude and longitude to radians
            $lat1 = deg2rad($lat1);
            $lon1 = deg2rad($lon1);
            $lat2 = deg2rad($lat2);
            $lon2 = deg2rad($lon2);
            
            // Radius of the earth in km
            $R = 6371;
            
            // Calculate the distance using the Haversine formula
            $dlat = $lat2 - $lat1;
            $dlon = $lon2 - $lon1;
            $a = sin($dlat/2) * sin($dlat/2) + cos($lat1) * cos($lat2) * sin($dlon/2) * sin($dlon/2);
            $c = 2 * atan2(sqrt($a), sqrt(1-$a));
            $distance = $R * $c;
            
            // Check if the distance is less than or equal to 5km
            if ($distance <= 10) {
                return true;
            } else {
                return false;
            }
        }

    }