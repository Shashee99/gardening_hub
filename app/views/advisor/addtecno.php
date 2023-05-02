
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
                    <div class="add-item-div"><a href="<?php echo URLROOT.'/advisors/item_add';?>"><i class="fa-solid fa-layer-group"></i>Add Item</a></div>
                       <div style="overflow-y:auto;margin-left:3rem;width:90%;height:70%">
                          <?php foreach($data as $tecdata) { ?>
                            <div class="card" style="box-shadow:rgba(0,0,0,0.24) 3px 3px 8px;border-radius:8px;margin-left:2%;margin-top:2%;height:90%;width:95%;background-color:#C4EDC9">
                                <div class="profileRow" style="display:flex;align-items:center;width:100%;height:14%">
                                    <div class="profileImage" style="margin-left:2.5%;width:3em;height:3em;border-radius:3em;background-color:red"><img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?php echo $_SESSION['advisor_photo_path']; ?>" alt="" style="width:3em;height:3em;border-radius:3em "></div>
                                    <div class="category" style="margin-left:32%"> <label style="font-family:calibri;font-weight:800;font-size:20px">Category:<?=$tecdata['catagory']?></label></div>
                                    <div class="date" style="margin-left:13rem"> <label style="font-family:calibri;font-weight:800;font-size:12px">date:<?=$tecdata['date']?></label></div>
                                </div>
                                <div class="titleRow" style="width:100%;height:7%"><label style="font-family:calibri;font-size:1.4em;margin-left:2.5%">Tile:<?=$tecdata['title']?></label></div>
                                <div class="contentRow" style="display:flex;justify-content:center;width:100%;height:30%"><div class="textContent" style="BORDER-RADIUS:8PX;width:95%;height:100%;background-color:#9dbda0;padding-inline: 2rem;"> <p  style="word-wrap:break-word"><?=$tecdata['content']?></p></div></div>
                                               
                                <div class="imageRow" style="align-items:center;display:flex;flex-direction:row;justify-content: space-around;width:100%;height:30%;margin-top:1%">
                                                <?php
                                                    foreach($tecdata['photos'] as $row1){
                                                    
                                                ?>
                                                   <div class="imageContainer" style="height:100px;width:100px;background-color:black;"><img class='poto' src="<?= URLROOT; ?>/img/upload_images/advisor_tecno/<?= $row1 ; ?>" alt=""   style="height:100px;width:100px"></div>
                                                <?php   
                                                }
                                                ?> 
                                </div>
                                <div class="buttonRow" style="display:flex;flex-direction:row;;width:100%;height:12%;margin-top:1rem">
                                    <div  class="cardtButton" style="width:20%;height:80%">
                                    <a href="<?=URLROOT?>/advisors/updateTecnhology/<?= $tecdata['no'];?>" style="text-decoration:none;color:black"><div style="display:flex;justify-content:center;align-items:center;border-radius:8px;width:100%;height:100%;background-color:#9dbda0;margin-left:2rem"><label style="font-family:calibri;font-size:1.5em">Update</label></div></a>
                                    </div>
                                    <div class="cardtButton" style="width:20%;height:80%">
                                    <a href="" style="text-decoration:none;color:black"><div style="display:flex;justify-content:center;align-items:center;border-radius:8px;width:100%;height:100%;background-color:#9dbda0;margin-left:34rem"><label style="font-family:calibri;font-size:1.5em">Delete</label></div></a>
                                    </div>
                                </div>
                            </div> 

                            <?php } ?>
                         </div>   

                 </div>


              </div>         



    </div>  




<?php require_once APPROOT.'/views/inc/incAdvisor/infootertecno.php';?>


