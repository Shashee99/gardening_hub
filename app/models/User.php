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
        public function customerRegister($data)
        {
            $sql = "INSERT INTO user (email,password,type) VALUES (:email, :pass, :type)";
            $this->db->query($sql);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':pass', $data['password']);
            $this->db->bind(':type', 'customer');

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

    }