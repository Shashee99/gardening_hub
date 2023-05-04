<?php

    class User
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function findUser($email)
        {
            $sql = "SELECT * FROM user WHERE email = :email";
            $this->db->query($sql);
            $this->db->bind(':email', $email);

            $row = $this->db->singleRecord();

            if($this->db->rowCount() > 0)
            {
                return $row;
            }
            else
            {
                return false;
            }
        }

        public function userregister($email){
            $this ->db -> query('UPDATE user SET user_state = 1 WHERE email = :email');
            $this ->db-> bind(':email',$email);
            $this -> db -> execute();

        }

        public function customerRegister($data)
        {
            $sql = "INSERT INTO user (email,password,type,user_state) VALUES (:email, :pass, :type,:state)";
            $this->db->query($sql);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':pass', $data['password']);
            $this->db->bind(':type', 'customer');
            $this->db->bind(':state', 1);

            if($this->db->execute())
            {
                $sql1 = "SELECT * FROM user WHERE email = :email";
                $this->db->query($sql1);
                $this->db->bind(':email', $data['email']);

                $row1 = $this->db->singleRecord();

                if($this->db->rowCount() > 0)
                {
                    $sql2 = "INSERT INTO customer (customer_id, name, nic_no, email, bod, address, gramasewa_division, divisional_secretary, tel_no, photo) 
                            VALUES (:cus_id, :name, :id, :email, :bod, :address, :gs, :ds, :mobile, :photo)";

                    $this->db->query($sql2);
                    $this->db->bind(':cus_id', $row1->user_id);
                    $this->db->bind(':name', $data['name']);
                    $this->db->bind(':id', $data['id']);
                    $this->db->bind(':email', $data['email']);
                    $this->db->bind(':bod', $data['bod']);
                    $this->db->bind(':address', $data['address']);
                    $this->db->bind(':gs', $data['gs']);
                    $this->db->bind(':ds', $data['ds']);
                    $this->db->bind(':mobile', $data['mobile']);
                    $this->db->bind(':photo', $data['photo']);

                    if($this->db->execute())
                    {
                        return true;
                    }
                    else
                    {
                        $sql3 = "DELETE FROM user WHERE user_id = :user_id ";
                        $this->db->query($sql3);
                        $this->db->bind(':user_id', $row1->user_id);
                        $this->db->execute();

                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
        }
        public function sellerRegister($data) {
            $result1 = $this -> db -> query('INSERT INTO user (email,password,type) VALUES (:email, :password,:type)');

            $this -> db -> bind(':email', $data['email']);
            $this -> db -> bind(':password', $data['password']);
            $this -> db -> bind(':type','seller');
            $this->db->execute();
            $this -> db -> query('SELECT * FROM user ORDER BY user_id DESC LIMIT 1');
            $result = $this->db->singleRecord();


            $cus_id =intval($result->user_id);

            $this -> db -> query('INSERT INTO seller (seller_id, shop_name, owner_name, address, br_no, tel_no,email, br_photo,photo)
             VALUES(:seller_id, :shop_name, :name, :address, :br_num, :mo_num, :email, :br_photo,:photo)');
            //Bind values
            $this -> db -> bind(':seller_id', $cus_id);
            $this -> db -> bind(':name', $data['name']);
            $this -> db -> bind(':shop_name', $data['shop_name']);
            $this -> db -> bind(':address', $data['address']);
            $this -> db -> bind(':br_num', $data['br_num']);
            $this -> db -> bind(':mo_num', $data['mo_num']);

            $this -> db -> bind(':email', $data['email']);
            $this -> db -> bind(':br_photo', $data['pro_li']);
            $this -> db -> bind(':photo', $data['seller_image']);

            //Execute
            if($this -> db -> execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function advisorRegister($data,$photo)
        {
            $sql = 'INSERT INTO user (email,password,type,user_state) VALUES (:email, :password,:type,:state)';
            $this->db->query($sql);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':type', 'advisor');
            $this->db->bind(':state', 0);

            if($this->db->execute())
            {
                $sql1 = "SELECT * FROM user WHERE email = :email";
                $this->db->query($sql1);
                $this->db->bind(':email', $data['email']);

                $row1 = $this->db->singleRecord();

                if($this->db->rowCount() > 0)
                {
                    $sql2 = "INSERT INTO advisor (advisor_id,name,address,email,nic_no,tel_no,qualification,photo,is_registered) 
                            VALUES (:id,:name,:address,:mail,:nic,:tel,:qualification,:photo,:status)";

                    $this->db->query($sql2);
                    $this->db->bind(':id', $row1->user_id);
                    $this->db->bind(':name', $data['fullname']);
                    $this->db->bind(':address', $data['address']);
                    $this->db->bind(':mail',$data['email']);
                    $this->db->bind(':nic',$data['nic']);
                    $this->db->bind(':tel',$data['phone']);
                    $this->db->bind(':qualification',$data['qualification']);  
                    $this->db->bind(':photo',$data['pp']);
                    $this->db->bind(':status',0); 
                    
                    if($this -> db -> execute()) 
                    {
                        foreach($photo as $rows)
                        {
                            $sql3 = "INSERT INTO advisor_document (advisor_id,name) VALUES (:id,:photo)";
                            $this->db->query($sql3);
                            $this->db->bind(':id', $row1->user_id);
                            $this->db->bind(':photo', $rows );

                            if($this -> db -> execute())
                            {
                                continue;
                            }
                            else
                            {
                                return false;
                            }
                        }
                        
                        return true;

                    } 
                    else 
                    {
                        $sql3 = "DELETE FROM user WHERE user_id = :user_id ";
                        $this->db->query($sql3);
                        $this->db->bind(':user_id', $row1->user_id);
                        $this->db->execute();

                        return false;
                    }

                }

            }
            else
            {
                return false;
            }

        }

        public function login($email, $password)
        {
            $sql = "SELECT * FROM user WHERE email = :email";
            $this->db->query($sql);
            $this->db->bind(':email', $email);

            $row = $this->db->singleRecord();
            $hashPass = $row->password;

            if(password_verify($password, $hashPass))
            {
                return   $row;
            }
            else
            {
                return false;
            }
        }
        public function verify($email, $password,$verification_code)
        {
            $sql = "SELECT * FROM user WHERE email = :email";
            $this->db->query($sql);
            $this->db->bind(':email', $email);

            $row = $this->db->singleRecord();
            $hashPass = $row->password;
            $verifi = (int)$row -> verification_code;


            if(password_verify($password, $hashPass))
            {
                return   true;
            }
            else
            {
                return false;
            }
        }



        public function getUsertype($id){
            $this -> db -> query('SELECT type FROM user WHERE user_id = :id');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();

            if($row->type = 'seller'){
                return 'seller';
            }
            elseif($row->type = 'customer'){
                return 'customer';
            }
            else {
                return 'advisor';
            }
        }

        public function getNamebyuserid($id){
            $this -> db -> query('SELECT type FROM user WHERE user_id = :id');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();
            $type = $row -> type;
            if($type == 'seller'){
                $this -> db -> query('SELECT `seller_id`, `shop_name`, `owner_name`, `address`, `br_no`, `tel_no`, `email`, `photo`, `br_photo`, `is_registered` FROM `seller` WHERE `seller_id` = :id');
                $this ->db ->bind(':id',$id);
                $seller = $this -> db -> singleRecord();
                $name = $seller->shop_name;
            }
            elseif($type == 'advisor'){
                $this -> db -> query('SELECT name FROM advisor WHERE advisor_id = :id');
                $this ->db ->bind(':id',$id);
                $advisor = $this -> db -> singleRecord();
                $name = $advisor->name;
            }
            else{
                $this -> db -> query('SELECT name FROM customer WHERE customer_id = :id');
                $this ->db ->bind(':id',$id);
                $customer = $this -> db -> singleRecord();
                $name =  $customer->name;
            }
            return $name;
        }

        public function getemailbyuserid($id){

            $this -> db -> query('SELECT * FROM user WHERE user_id = :id');
            $this ->db ->bind(':id',$id);
            $result = $this -> db -> singleRecord();
            return $result->email;

        }

        public function insertverificationcode($id,$code){

            $this -> db -> query('UPDATE user SET verification_code = :code WHERE user_id = :id');
            $this -> db -> bind(':code',$code);
            $this -> db -> bind(':id',$id);
            $this->db->execute();


        }
        public function insertpwreset($id,$code){

            $this -> db -> query('UPDATE user SET password_reset_code = :code WHERE email = :id');
            $this -> db -> bind(':code',$code);
            $this -> db -> bind(':id',$id);
            $this->db->execute();


        }

        public function getusertypebyemail($email){
            $this -> db -> query('SELECT * FROM user WHERE email = :email');
            $this ->db ->bind(':email',$email);
            $result = $this -> db -> singleRecord();
            $email =  $result->type;
            return $email;
        }
        public function getuserverificationcodebyemail($email){
            $this -> db -> query('SELECT * FROM user WHERE email = :email');
            $this ->db ->bind(':email',$email);
            $result = $this -> db -> singleRecord();
            $code =  $result->verification_code;
            return $code;
        }
        public function getuserhashedpasswordbyemail($email){
            $this -> db -> query('SELECT * FROM user WHERE email = :email');
            $this ->db ->bind(':email',$email);
            $result = $this -> db -> singleRecord();
            $code =  $result->password;
            return $code;
        }
        public function getuserstatebyemail($email){
            $this -> db -> query('SELECT * FROM user WHERE email = :email');
            $this ->db ->bind(':email',$email);
            $result = $this -> db -> singleRecord();
            $code =  $result->user_state;
            return $code;
        }
        public function getpasswordresetcodebyemail($email){
            $this -> db -> query('SELECT * FROM user WHERE email = :email');
            $this ->db ->bind(':email',$email);
            $result = $this -> db -> singleRecord();
            $code =  $result->password_reset_code;
            return $code;
        }

        public function setuserasregistered($email){
            $this ->db -> query('UPDATE user SET user_state = 1 WHERE email = :email');
            $this ->db-> bind(':email',$email);
            $this -> db -> execute();
        }

        public function changepw($email,$newpw){
            $hashnew = password_hash($newpw,PASSWORD_DEFAULT);

            $this ->db -> query('UPDATE user SET password = :newpw WHERE email = :email');
            $this ->db-> bind(':email',$email);
            $this ->db-> bind(':newpw',$hashnew);
            $this -> db -> execute();
            return true;
        }

        public function getuseridbyemail($email){
            $this -> db -> query('SELECT * FROM user WHERE email = :email');
            $this ->db ->bind(':email',$email);
            $result = $this -> db -> singleRecord();
            $code =  $result->user_id;
            return $code;
        }


        public function deleteuserbyid($id){
            $this ->db -> query('DELETE FROM user WHERE user_id = :id;');
            $this ->db-> bind(':id',$id);
            $this -> db -> execute();
            return true;
       }


    }