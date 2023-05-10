<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/RegistrationPages/advisorRegister.css">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/advisor/navbar_2.css">
    <title><?php echo SITENAME;?></title>
</head>
<body>
   

  <div class="contener">
     <?php require_once APPROOT.'/views/inc/incAdvisor/navbar_2.php';?> 
     <div class="contener-2">
         <div class="imge-1">
              <div class="pic-1"><img  style=" width: 200px; height: 400px; border-radius: 15px;" src="../public/img/advisor/man_1.jpg" alt=""></div>
         </div>

           <div class="from">
                <div class="hedar"><span> Sign up </span></div>
                  <div class="from-div">
                     <form action="<?php echo URLROOT;?>/users/advisorRegister" method="post" enctype="multipart/form-data">

                                <div class="input-box">
                                    <span>Full Name</span>
                                        <input class="type-input" type="text" name="fname"   placeholder="Enter your full name" value="<?php echo $data['fullname']; ?>" >
                                        <div class="error">
                                             <span><?php echo  $data['fullname_err'] ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>User Name</span>
                                        <input class="type-input" type="text" name="user"   placeholder="Enter your user name" value="<?php echo $data['user_name'] ; ?>" >
                                        <div class="error">
                                             <span><?php echo  $data['user_name_err'] ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>Address</span>
                                        <input class="type-input" type="text" name="address"   placeholder="Enter your Address " value="<?php echo $data['address']; ?>" >
                                        <div class="error">
                                             <span><?php echo $data['address_err'] ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>ID Number</span>
                                        <input class="type-input" type="text" name="id_no"   placeholder="Enter your ID number "  value="<?php echo $data['nic'] ; ?>" >
                                        <div class="error">
                                             <span><?php echo   $data['nic_err'] ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>Brithday</span>
                                        <input class="type-input" type="date" name="dob"   placeholder="Enter your ID number "  value="<?php echo $data['dob']; ?>" >
                                        <div class="error">
                                             <span> <?php echo   $data['dob_err']  ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>Mobile Number</span>
                                        <input class="type-input" type="text" name="mobile"   placeholder="Enter your mobile number "   value="<?php echo$data['phone'] ; ?>"  >
                                        <div class="error">
                                             <span><?php echo $data['phone_err'] ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>Email</span>
                                        <input class="type-input" type="text" name="email"   placeholder="Enter your email "  value="<?php echo $data['email']; ?>"  >
                                        <div class="error">
                                             <span><?php echo  $data['email_err'] ;?></span>
                                         </div>
                                 </div>


                                 <div class="input-box">
                                    <span>Password</span>
                                        <input class="type-input" type="password" name="pass"   placeholder="Enter your password "   value="<?php echo $data['password']; ?>" >
                                        <div class="error">
                                             <span> <?php echo  $data['password_err'] ;?></span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                    <span>Confirm Password</span>
                                        <input class="type-input" type="password" name="cpass"   placeholder="Enter your  password again "  value="<?php echo $data['cpassword']; ?>" >
                                        <div class="error">
                                             <span> <?php echo   $data['cpassword_err'] ;?> </span>
                                         </div>
                                 </div>

                                 <div class="input-box">
                                          <span>Qualification</span>
                                          <textarea  class="type-input" id="" name="qulafication" rows="5" cols="50"  placeholder="write your qualification"  value="<?php echo $data['qualification'] ; ?>" ></textarea>

                                             <div class="error">
                                                <span><?php echo  $data['qulification_err'] ;?> </span>
                                             </div>
                                        </div>
                                        <div class="input-box">
                                          <span>Profile photo</span>
                                           <input class="type-input" type="file" name="poto"   placeholder="Enter your pp " value="<?php echo $data['pp']  ; ?>"  >
                                          <div class="error">
                                             <span> <?php echo  $data['pp_err'] ;?> </span>
                                          </div>
                                         
                                        </div>

                                        <div class="input-box">
                                          <span>Qualification photo</span>
                                           <input class="type-input" type="file" name="photos[]"   placeholder="Enter your email "  multiple   >
                                          <div class="error">
                                             <span><?php echo    $data['qualifi_poto_err'] ;?> </span>
                                          </div>
                                         
                                        </div>

                                        <div class="but">
                                           <div class="button">
                                             <input class="type-button" type="submit" value="register">
                                           </div>
                                          
                                     </div>



                     </form>


                  </div>


           </div>

             <div class="imge-2">
                <div class="pic-2"><img  style=" width: 200px; height: 400px;border-raius:15px; border-radius: 15px;"  src="../public/img/advisor/man_2.jpg" alt=""></div>
             </div>


     </div>
      

  </div>






</body>
</html>