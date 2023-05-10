<?php

    class Advisor
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
        public function advisorDetails($id)
        {
            $sql = "SELECT * FROM advisor WHERE advisor_id = :id AND isDeleted = 0;";
            $this->db->query($sql);
            $this->db->bind(':id',$id);
            $result = $this->db->singleRecord();
            return $result;
        }
        public function get_non_registered_advisors(){
            $this->db->query('SELECT * FROM `advisor` WHERE is_registered = 0 AND isDeleted = 0;');
            $dataset = $this->db->resultSet();
            return $dataset;
        }

        public function all_registered_advisors(){
            $this -> db ->query('SELECT * FROM `advisor` WHERE is_registered = 1 AND isDeleted = 0;');
            $dataset = $this->db->resultSet();
            return $dataset;
        }

        public function getAdvisorName ($id){
            $this -> db -> query('SELECT name FROM advisor WHERE advisor_id = :id AND isDeleted = 0;');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();

            return $row->name;
        }

        public function getAdvisordetails($id){
            $this -> db -> query('SELECT * FROM advisor WHERE advisor_id = :id AND isDeleted = 0;');
            $this ->db ->bind(':id',$id);
            $row = $this -> db -> singleRecord();

            return $row;
        }

        public function searchuserbyname_registeredadvisor($name){
            $search_term = $name . '%';
            $this -> db -> query('SELECT * FROM `advisor` WHERE `name` LIKE :search_term AND is_registered = 1 AND isDeleted = 0;');
            $this ->db ->bind(':search_term',$search_term);
            $dataset = $this->db->resultSet();
            return $dataset;

        }
        public function searchuserbyname_unregisteredadvisor($name){
            $search_term = $name . '%';
            $this -> db -> query('SELECT * FROM `advisor` WHERE `name` LIKE :search_term AND is_registered = 0 AND isDeleted = 0;');
            $this ->db ->bind(':search_term',$search_term);
            $dataset = $this->db->resultSet();
            return $dataset;

        }

        public function recentlyaddedadvisors()
        {
            $this -> db -> query('SELECT * FROM advisor WHERE is_registered = 0 AND isDeleted = 0 ORDER BY advisor_id DESC LIMIT 5; ');
            $dataset = $this -> db-> resultSet();
            return $dataset;
        }

        public function delete_advisor($id){

            $this -> db -> query('UPDATE advisor SET isDeleted = 1 WHERE advisor_id = :id;');
            $this -> db -> bind(':id', $id);
            $this->db->execute();
            $this -> db -> query('UPDATE user SET user_state = 2 WHERE user_id = :id;');
            $this -> db -> bind(':id', $id);
            $this->db->execute();
        }
        
        public function addTecno($data,$photo){
             $sql='INSERT INTO  new_technology(category,date,title,content,advisor_id )VALUES(
              :catagory,:date,:title,:content,:advisor_id
            )';

             $this->db->query($sql);
             $this->db->bind(':catagory', $data['catagory']);
             $this->db->bind(':date',date('y/m/d'));
             $this->db->bind(':title',$data['title']);
             $this->db->bind(':content',$data['content']);
             $this->db->bind(':advisor_id',$_SESSION['advisor_id']);

           if($this->db->execute()){
                
                $sql1 = "SELECT * FROM new_technology WHERE advisor_id = :advisor_id ORDER BY no DESC LIMIT 1";
                $this->db->query($sql1);
                $this->db->bind(':advisor_id', $_SESSION['advisor_id'] );
                $row1 = $this->db->singleRecord();

                if($this->db->rowCount() > 0)
                {
                    foreach($photo as $rows)
                    {
                        $sql2 = "INSERT INTO tecpoto (no, imge)
                                VALUES (:no, :image)";
                        $this->db->query($sql2);
                        $this->db->bind(':no',$row1->no);
                        $this->db->bind(':image', $rows);
                        $this->db->execute();

                    }

                      return true; 

                }else{
                    return false;
                }

           }else{
              return false;

           }



        }

        public function giveTecno($advisor_id){
            // SELECT new_technology.no,new_technology.category,new_technology.date,new_technology.content,new_technology.title,
            // tecpoto.imge FROM new_technology INNER JOIN tecpoto ON new_technology.no=tecpoto.no;
            //print_r($category);
           
                //print_r($category);
                $sql='SELECT * FROM new_technology WHERE advisor_id= :advisor_id ';
                $this->db->query($sql);
                $this->db->bind(':advisor_id',$advisor_id);
               // $this->db->bind(':category',$category);
               return $this->db->resultSet();
 

            //  }else{
            //      //print_r($category);

            //     $sql='SELECT * FROM new_technology WHERE advisor_id= :advisor_id AND category=:category';
            //     $this->db->query($sql);
            //     $this->db->bind(':advisor_id',$advisor_id);
            //     $this->db->bind(':category',$category);
            //     return $this->db->resultSet();

            //  }

              

        }
         //get category ------------------------
         public function getCategory($advisor_id){
            $sql_cat='SELECT category FROM new_technology WHERE advisor_id=:advisor_id';
            $this->db->qurey($sql_cat);
            $this->db->bind(':advisor_id',$advisor_id);
            return $this->db->resultSet();
         }

        // we can get potos by this function--------
        public function tecnoPhotosById($no){
            $sql = "SELECT * FROM tecpoto WHERE no = :no";
            $this->db->query($sql);
            $this->db->bind(':no', $no);
            return $this->db->resultSet();


        }

        //update tecnhology  ---------------------------------
        function tecnoUpdate($data,$photo,$id){
             //die($id);
              $sql='UPDATE new_technology SET category =:catagory,date=:date,title=:title,content=:content WHERE advisor_id=:advisor_id AND no=:id';
             $this->db->query($sql);
             $this->db->bind(':catagory', $data['catagory']);
             $this->db->bind(':date',date('y/m/d'));
             $this->db->bind(':title',$data['title']);
             $this->db->bind(':content',$data['content']);
             $this->db->bind(':id',$id);
             $this->db->bind(':advisor_id',$_SESSION['advisor_id']);
          
              if($this->db->execute()){

               
                      
                  $sql1='SELECT * FROM tecpoto WHERE no=:id';
                  $this->db->query($sql1);
                  $this->db->bind(':id',$id);
                  $rowImage=$this->db->resultSet();
                  // die("sucsse");
                  $imagecount=0; 
                  $photoArray=count($photo);
                  $beforPhoto=count($rowImage); 
                //   $rowcount=count($rowImage);
                  //die($photoArray);
                
                  

                 foreach($rowImage as $pic){
                    if($imagecount<$photoArray){
                        $sql_2='UPDATE tecpoto SET imge=:image WHERE no=:id AND img_id=:img_id';
                        $this->db->query($sql_2);
                        $this->db->bind(':img_id',$pic->img_id);
                        $this->db->bind(':image',$photo[$imagecount]);
                        $this->db->bind(':id',$id);
                        $this->db->execute();
                        ++$imagecount;
                    }


                 }

                //  if($beforPhoto<$photoArray){
                //     foreach($photo as $rows)
                //     { 
                //         ++$imagecount;
                //         if( $photoArray>$imagecount){
                //             $sql3 = "INSERT INTO tecpoto (no, imge)
                //                     VALUES (:no, :image)";
                //             $this->db->query($sql3);
                //             $this->db->bind(':no',$id);
                //             $this->db->bind(':image', $rows[$imagecount]);
                //             $this->db ->execute();
                //         }
                //     }

                //  }


                  return true;     

              }else{
                return false;
              }


        }
       //tecno delete --------------------------------
       function tecnoDelete($id){
        $sqlDelete='DELETE FROM new_technology WHERE no=:id';
        $this->db->query($sqlDelete);
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

       }

       //edit profile-----------------------------------
      function getProfile(){
        $sql_getdata="SELECT * FROM advisor WHERE advisor_id=:advisor_id";
        $this->db->query($sql_getdata);
        $this->db->bind(':advisor_id',$_SESSION['advisor_id']);
        $this->db->execute();
        return $this->db->singleRecord();

      }

      function  editProfile($getProfile_data){

          $sql_update_advisor='UPDATE advisor SET name=:fullName,address=:location,email=:email
          ,tel_no=:mobile,photo=:poto_pp,userName=:userName,dob=:birthday,about_me=:about_me
           WHERE advisor_id=:id';
          $this->db->query($sql_update_advisor);
          $this->db->bind(':fullName',$getProfile_data['fullName']);
          $this->db->bind(':location',$getProfile_data['location']);
          $this->db->bind(':email',$getProfile_data['email']);
          $this->db->bind(':mobile',$getProfile_data['mobile']);
          $this->db->bind(':poto_pp',$getProfile_data['poto_pp']);
          $this->db->bind(':userName',$getProfile_data['userName']);
          $this->db->bind(':birthday',$getProfile_data['brithday']);
          $this->db->bind(':about_me',$getProfile_data['about_me']);
          $this->db->bind(':id',$_SESSION['advisor_id']);
          if($this->db->execute()){
          
            return true;
          }else{
            die("data is not update");
          }



        

      }



    }

    