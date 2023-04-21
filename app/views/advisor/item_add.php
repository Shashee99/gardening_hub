<?php require_once APPROOT.'/views/inc/incAdvisor/item_add_head.php';?>

      <div class="contener">
            <h3>Add new tecnhology</h3>
         
            <form action=" <?php echo URLROOT.'/advisors/item_add';?> "   enctype="multipart/form-data"  method="post">
                  <div class="input-fild-style">
                      <label for=" ">Title:</label>
                      <input type="text" name="title" id="title" placeholder=Title>
                      <label for=" "> <?php echo $data['title_error'];  ?></label>

                    </div>
                
                 <div class="input-fild-style">
                      <label for="">Catagory:</label>
                      <input type="text" name="catagory" id="title" placeholder=Catagory>
                      <label for=""><?php echo $data['catagory_error'];  ?> </label>

                    </div>

               

                <div class="input-fild-style">
                      <label for="">Images:</label>
                      <input type="file"  name="photos[]"  onchange="preview()"  multiple>
                      <label for=""> <?php echo $data['photo_error'];  ?></label>

                   
                   </div>

                <div class="input-fild-style">
                      <label for="">Content:</label>
                      <textarea name="content" id="content" cols="30" rows="5"></textarea>
                      <label for=""> <?php echo $data['content_error'];  ?></label>

                    </div>
                    
               
                   <div class="input-fild-style"> <button type="submit" name='submit'>save</button></div>   
                  
                               <!-- item add form  -->

              </form>







       </div>


<?php require_once APPROOT.'/views/inc/incAdvisor/item_add_footer.php';?>