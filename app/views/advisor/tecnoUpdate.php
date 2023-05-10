<?php require_once APPROOT.'/views/inc/incAdvisor/item_add_head.php';?>

<div class="contener">
         <?php require_once APPROOT.'/views/inc/incAdvisor/navbar.php';?>    

            <div class="contener-2">
            <?php require_once APPROOT.'/views/inc/incAdvisor/sidebar.php';?> 
               <div class="item_add_files">
                  <div class="form">
                        <div class="form-layout">
                              <div class="title"><span>Enter your new technology</span></div>
                              <div class="inpu-filed-div">
                              <form action="<?= URLROOT; ?>/advisors/updateTecnhology/<?php echo $data['no'];?>" method="post"  enctype="multipart/form-data">
                                         <div class="input-box">
                                            <span>Topic new technology</span>
                                             <input class="type-input" type="text" name="title" id=""  placeholder="Entenr your technology" value="<?php echo $data['title'];  ?>">
                                             <div class="error">
                                                <span><?php echo $data['title_error'];  ?></span>
                                             </div>
 
                                        </div>
                                        <div class="input-box">
                                            <span>Select your category</span>
                                            <select name='category' class="type-cetagory"   value="<?php echo $data['catagory'];  ?>" >
                                                <option value="" selected hidden>select category</option>
                                                <option value="vegetable">Vegetable</option>
                                                <option value="fruits">Fruits</option>
                                                <option value="flowers">Flowers</option>
                                           </select>
                                             <div class="error">
                                                <span><?php echo $data['catagory_error'];  ?> </span>
                                             </div>
                                          </div>  

                                          <div class="input-box">
                                             <span>Enter your content</span>
                                              <textarea  class="type-content"  name="content"    placeholder="Enter your content" ></textarea>
                                             <div class="error">
                                                <span><?php echo $data['content_error'];  ?></span>
                                             </div>
                                        </div>
                                        <div class="input-box">
                                            <span>Enter your technology photo</span>
                                            <input type="file"  class="type-input"  name="photos[]"  onchange="preview()"  multiple >
                                             <div class="error">
                                                <span> <?php echo $data['photo_error'];  ?></span>
                                             </div>
 
                                        </div>

                                        <div class="buttons">
                                            <div class="submit-btn">
                                                <input type="submit" value="ADD">
                                            </div>
                                            <div class="cancele-btn">
                                                <a href="<?php echo URLROOT.'/advisors/addtecno';?>">
                                                <input type="button" value="Cancele">
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



<?php require_once APPROOT.'/views/inc/incAdvisor/item_add_footer.php';?>