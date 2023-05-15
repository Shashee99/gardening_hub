
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
                                <select name='category' onchange="getProducts();" id="category"   class="type-cetagory"  >
                                 <option value="" >All categories</option>   
                                 <option value="Vegetable plants">Vegetable plants </option>
                                 <option value="Fruits plants">Fruits plants</option>
                                 <option value="Flowers plants">Flowers plants</option>
                                 <option value="bonsai plants">Bonzzy plants</option>
                                 <option value="Hybrid plants">Hybrid plants</option>
                                 <option value="Others plants" >Others plants</option>
                                </select>
                         </div> 
                    </div>
                        <!-- make card------------------- -->
                    <div class="crad">
                            <?php flash('add_new_tecno_successfuly');?>
                            <?php flash('add_new_tecno');?>
                            <?php flash('profile update');?>
                        <?php foreach($data as $tecdata) { ?>
                            <div class="card-data-filed" >          
                                  <!-- <div class="hide-dive"></div> -->
                                <div class="profile">
                                    <div class="headear">
                                        <div class="div-profile">
                                            <div class='pp'>
                                                <img style=' width: 70px; height: 70px; border-radius: 50px;'src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?php echo $_SESSION['advisor_photo_path']; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="category-filed">
                                            <div>
                                                <span style=' font-weight:500 ;'>Name:<?php echo $_SESSION['advisor_name'];?></span>
                                            </div>
                                            <div>
                                                <span><?=$tecdata['date']?></span>
                                            </div>
                                            <div>
                                                <span  style=' font-weight:500 ;'>category: <?=$tecdata['catagory']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title"><span><?=$tecdata['title']?></span></div>
                                       
                                    <div class="content"><p><?=$tecdata['content']?></p></div>
                                    <div class="photo">
                                        <?php
                                            foreach($tecdata['photos'] as $row1){
                                                    
                                         ?>
                                           <div class="potos"><img class='poto' src="<?= URLROOT; ?>/img/upload_images/new_tech_photos/<?= $row1 ; ?>" alt=""></div>
                                       <?php   
                                        }
                                       ?>          
                               
                                    </div>
                                      
                                    <div class="but">
                                        <div class="update"><a href="<?=URLROOT?>/advisors/updateTecnhology/<?= $tecdata['no'];?>"><i class="fa-solid fa-pen-to-square"></i>Update</a></div>
                                        <div class="update" onclick="del(<?php echo $tecdata['no']; ?>)"><span><i class="fa-solid fa-eye-slash"></i>Delete</span></div>
                                       
                                    </div>
                                                              
                           
                                </div>
         

                            </div>
                           
                        <?php } ?>
                        
                    </div>
                        <div id="backgr">
                            <div id="cancel_popup">
                                <div class="cancel_contect">
                                    <p>Are your sure to delete..</p>
                                                    
                                </div>
                                <div class="commemt-fild">
                                        <form  action="<?=URLROOT?>/newTechs/deleteTecnhology"  method="POST">
                                            <div class="input-filed"> <input type="text" name="tec_id" id="tec_id" hidden ></div>
                                            <div class="disition">
                                                <div ><input  class="delete-but" id="delete-button" type="submit" value="Delete"></div>
                                                <div >
                                                    <a href="<?=URLROOT?>/advisors/addtecno">
                                                        <input class="delete-but"  type="button" value="Cancel">
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                           

                 </div>
                

              </div>         

    </div>  


    <script>
            function del(id){
                document.getElementById("backgr").style.display="block";
                document.getElementById("cancel_popup").style.display="block";
                document.getElementById("tec_id").value=id;
               
            }
</script>



<?php require_once APPROOT.'/views/inc/incAdvisor/infootertecno.php';?>

