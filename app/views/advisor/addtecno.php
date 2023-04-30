
<?php

   if(!isset(($_SESSION['advisor_id']))){
   
    redirect('users/login');

   }


?>



<?php require_once APPROOT.'/views/inc/incAdvisor/inheadtecno.php';?>


    <div class="contener-tecno">
           <?php require_once APPROOT.'/views/inc/incAdvisor/navbar.php';?>    

            <div class="contener-tecno-2">
                 <?php require_once APPROOT.'/views/inc/incAdvisor/sidebar.php';?>
                
                 <!-- add tecno start div conterner  -->
                <div class="addtecno-div">
                    <div class="add-item-div"><a href="<?php echo URLROOT.'/advisors/item_add';?>"><i class="fa-solid fa-layer-group"></i>Add Item</a></div>
                       <div class="card">
                           <?php foreach($data as $tecdata) { ?>
                            <div class="pri-view-tecno">
                                
                                    <div class="tecno-title-profile-filed">
                                            <div class="profil-owner">
                                            <div class="imge-oner"><img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?php echo $_SESSION['advisor_photo_path']; ?>" alt=""></div>
                                                <h6><?=$tecdata['date']?> <br>time:5:30</h6>
                                            </div>
                                        <div class="title-tecno"><h3>Categoly:</h3>
                                            <h3><?=$tecdata['catagory']?></h3>
                                        </div>
                                        
                                    </div>
                                        <h5>Title: <?=$tecdata['title']?></h5>
                                        
                                        <div class="content">
                                            
                                            <p  style="word-wrap:break-word"><?=$tecdata['content']?></p>
                                        </div>
                                        

                                        <div class="tecno-poto">
                                            
                                               <?php
                                                    foreach($tecdata['photos'] as $row1){
                                                    
                                                ?>
                                                  <div><img class='poto' src="<?= URLROOT; ?>/img/upload_images/advisor_tecno/<?= $row1 ; ?>" alt=""></div>
                                                <?php   
                                                }
                                                ?>          
                                                                
                                                   
                                            </div> 
                                    
                                            <!-- <a href="">Delete...</a> -->
                                    
                                   

                                 </div>

                             <?php } ?>
                         </div>   

                 </div>


              </div>         



    </div>  




<?php require_once APPROOT.'/views/inc/incAdvisor/infootertecno.php';?>


