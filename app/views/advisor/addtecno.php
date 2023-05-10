
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
                <div class="addtecno-div" >
                    <div class="filter-itemadd">
                      <div class="add-item-div"><a href="<?php echo URLROOT.'/advisors/item_add';?>"><i class="fa-solid fa-layer-group"></i>Add Item</a></div>
                        <div class="add-item-div">
                                <select name='category'  id="category"  class="type-cetagory"  >
                                 <option value="null" >all categorys</option>
                                 <option value="vegetable">Vegetable</option>
                                 <option value="fruits">Fruits</option>
                                 <option value="flowers">Flowers</option>
                                </select>

                        </div>
                       
                     </div>
                        <!-- make card------------------- -->
                    <div class="crad">
                      <?php foreach($data as $tecdata) { ?>
                          <div class="card-data-filed" id="tecno-details">
                                  <!-- <div class="hide-dive"></div> -->
                               <div class="profile">
                                    <div class="headear">
                                        <div class="div-profile"><div class='pp'><img style=' width: 70px; height: 70px; border-radius: 50px;'src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?php echo $_SESSION['advisor_photo_path']; ?>" alt=""></div></div>
                                        <div class="category-filed">
                                            <div><span style=' font-weight:500 ;'>Name:<?php echo $_SESSION['advisor_name'];?></span></div>
                                            <div><span><?=$tecdata['date']?> :9.25</span></div>
                                            <div><span  style=' font-weight:500 ;'>category: <?=$tecdata['catagory']?></span></div>
                                        </div>
                                    </div>
                                    <div class="title"><span><?=$tecdata['title']?></span></div>
                                       
                                    <div class="content"><p><?=$tecdata['content']?></p></div>
                                    <div class="photo">
                                        <?php
                                            foreach($tecdata['photos'] as $row1){
                                                    
                                         ?>
                                         <div class="potos"><img class='poto' src="<?= URLROOT; ?>/img/upload_images/advisor_tecno/<?= $row1 ; ?>" alt=""></div>
                                      <?php   
                                        }
                                       ?>          
                               
                                    </div>
                                      
                                    <div class="but">
                                        <div class="update"><a href="<?=URLROOT?>/advisors/updateTecnhology/<?= $tecdata['no'];?>"><i class="fa-solid fa-pen-to-square"></i>Update</a></div>
                                        <div class="update"><a href="<?=URLROOT?>/advisors/tecnoDelete/<?= $tecdata['no'];?>"><i class="fa-solid fa-eye-slash"></i>Delete</a></div>
                                        
                                    </div>
                                   
                               </div>
         
                               
                               

                          </div>
                           
                          <?php } ?>

                      </div>
                           

                 </div>
                

              </div>         



    </div>  




<?php require_once APPROOT.'/views/inc/incAdvisor/infootertecno.php';?>


<!-- <div class="addtecno-div" >
                    <div class="add-item-div"><a href="<?php echo URLROOT.'/advisors/item_add';?>"><i class="fa-solid fa-layer-group"></i>Add Item</a></div>
                      
                 </div> -->

                 <!-- <i class="fa-solid fa-arrow-up-from-bracket"></i> -->

                 <!-- <div class="photo">
                                        <?php
                                            foreach($tecdata['photos'] as $row1){
                                                    
                                         ?>
                                         <div class="potos"><img class='poto' src="<?= URLROOT; ?>/img/upload_images/advisor_tecno/<?= $row1 ; ?>" alt=""></div>
                                      <?php   
                                        }
                                       ?>          
                               
                               </div> -->