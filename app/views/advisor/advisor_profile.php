<?php

if(!isset(($_SESSION['advisor_id']))){

 redirect('users/login');

}


?>


<?php require_once APPROOT.'/views/inc/incAdvisor/incprofile.php';?> 




            <div class="contener">
                 <div class="contener-2">
                     <div class="profile-data-view">
                          <div class="profile-name">
                               <div class="profile"> <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?php echo $data['poto_pp']; ?>" alt="" style=" width: 120px;height: 120px;border-radius: 90px;"></div>
                                <div class="name"><div class="fulname"><label for=""><?php echo $data['userName'];?> </label></div></div>
                          </div>
                           <div class="ditales">
                               <div class="value"><div><label for="" style="color:black; font-weight: 600;">Full Name:</label> </div><div><label for=""><?php echo $data['fullName'];?> </label></div></div>
                    
                               <div class="value"><div><label for=""  style="color:black; font-weight: 600;" >email:</label> </div><div><label for=""><?php echo $data['email'];?></label></div></div>
                               
                               <div class="value"><div><label for=""  style="color:black; font-weight: 600;">Mobile:</label> </div><div><label for=""><?php echo $data['mobile'];?></label></div></div>
                               
                               <div class="value"><div><label for=""  style="color:black; font-weight: 600;">Location:</label> </div><div><label for=""><?php echo $data['location'];?></label></div></div>

                               <div class="value"><div><label for=""  style="color:black; font-weight: 600;">Brithday:</label> </div><div><label for=""><?php echo $data['brithday'];?></label></div></div>
                           </div>
                     </div>
                        <div class="updata-div">
                             <div class="hedare"><div><span>Update Profile</span></div></div>
                                <div class="form-div">
                                  <form action=" <?php echo URLROOT.'/advisors/profileUpdate';?>" method="POST" enctype="multipart/form-data">
                                       <div class="input-box">
                                          <span>Full Name</span>
                                          <input class="type-input" type="text" name="fname" id=""  placeholder="Enter your name" value="<?php echo $data['fullName'];?>" readonly>
                                             <div class="error">
                                                <span><?php echo $data['fullName_error'];?> </span>
                                             </div>
                                        </div>

                                        <div class="input-box">
                                          <span>Address</span>
                                          <input class="type-input" type="text" name="address" id=""   placeholder="Enter your Address" value="<?php echo $data['location'];?>">
                                             <div class="error">
                                                <span> <?php echo $data['location_error'];?></span>
                                             </div>
                                        </div>

                                        
                                        <div class="input-box">
                                          <span>User Name</span>
                                          <input class="type-input" type="text" name="user" id=""   placeholder="Enter your user name" value="<?php echo $data['userName'];?>">
                                             <div class="error">
                                                <span> <?php echo $data['userName_error'];?> </span>
                                             </div>
                                        </div>

                                        
                                        <div class="input-box">
                                          <span>Email</span>
                                          <input class="type-input" type="text" name="email" id=""   placeholder="Enter your email" value="<?php echo $data['email'];?>">
                                             <div class="error">
                                                <span><?php echo $data['email_error'];?> </span>
                                             </div>
                                        </div>

                                        <div class="input-box">
                                          <span>Mobile number</span>
                                          <input class="type-input" type="text" name="mobile" id=""   placeholder="Enter your mobile number" value="<?php echo $data['mobile'];?>">
                                             <div class="error">
                                                <span><?php echo $data['mobile_error'];?> </span>
                                             </div>
                                        </div>

                                        <div class="input-box">
                                          <span>Brithday</span>
                                          <input class="type-input" type="date" name="date" id=""  value="<?php echo $data['brithday'];?>">
                                             <div class="error">
                                                <span><?php echo $data['brithday_error'];?> </span>
                                             </div>
                                        </div>

                                        <div class="input-box">
                                          <span>About me</span>
                                          <textarea  class="type-input" id="" name="about" rows="4" cols="50"  placeholder="write about yourself" value="<?php echo $data['about_me'];?>"></textarea>

                                             <div class="error">
                                                <span><?php echo $data['about_error'];?> </span>
                                             </div>
                                        </div>

                                        
                                        <div class="input-box">
                                          <span>Profile photo</span>
                                          <input class="type-input" type="file" name="profile" id=""   placeholder="Enter your mobile number"   value="<?php echo $data['poto_pp'];?>" >
                                             <div class="error">
                                                <span><?php echo $data['poto_pp_error'];?> </span>
                                             </div>
                                        </div>
                                        <div class="but">
                                           <div class="button">
                                             <input class="type-button" type="submit" value="save chenge">
                                           </div>
                                           <a href="<?php echo URLROOT.'/advisors/viewHomePage';?>">
                                           <div class="cancel">
                                               <div class="cancel-data"><label for="">cancel data</label></div>
                                              </div>
                                            </div>  
                                        </a>


                                    </form>
                                </div>


                        </div>
                       
                </div>
            </div>







<?php require_once APPROOT.'/views/inc/incAdvisor/incprofile_footer.php';?>