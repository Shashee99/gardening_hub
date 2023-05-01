 <?php require_once APPROOT . '/views/inc/incAdvisor/inchat_head.php'; ?>
 <!-- chat for problem -->

          <div class="chat-contener">
             <?php require_once APPROOT . '/views/inc/incAdvisor/navbar.php'; ?>
               <div class="chat-contener-2">
                    <?php require_once APPROOT . '/views/inc/incAdvisor/sidebar.php'; ?>
                        <div class="chat-content">
                        <?php foreach ($data as $problems) { ?>
                                <div class="chat-pot">
                                      <div class="user-problem">
                                         <div class="user-profile">
                                             <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $problems['customerpp'] ; ?>" alt="" >
                                            <div>
                                                <h5>Name : <?= $problems['name'];?> </h5>
                                                <h6><?= $problems['date'];?></h6>
                                                <h6>Category : <?= $problems['category'] ; ?></h6>
                                            </div>
                                         </div>

                                      </div>
                                        <div class="content-problem">
                                                <h3><u><?= $problems['title'] ; ?></u> </h3>
                                                <p><?= $problems['content'] ; ?></p>
                                        </div>
                                        <div class="image-problem">
                                                <?php foreach ($problems['photos'] as $row){ 
                                                ?>
                                                <div class=" image-plants"><img src="<?= URLROOT; ?>/img/upload_images/problem_photo/<?= $row ; ?> " class="preview-image" alt="" ></div>
                                               <?php 
                                                 }
                                                ?>
                                        </div>
                                        <div class="reply-view">
                                               <ul>
                                                <li><a style="text-decoration: none " href="<?=URLROOT?>/advisors/problem_chat_openoneproblem/<?= $problems['id'];?>"><i class="fa-regular fa-comment"></i>Reply</a></li>
                                               </ul>
                                        </div>

                                </div>
                        <?php } ?>
                                                                         
                        </div>
                       




                </div>   







          </div>
 <script>
     // Get all the image elements with the specified class
     var images = document.querySelectorAll('.preview-image');

     // Loop through each image element
     images.forEach(function(image) {
         // Create a modal element
         var modal = document.createElement('div');
         modal.classList.add('modal');
         document.body.appendChild(modal);

         // Create an image element inside the modal
         var modalImage = document.createElement('img');
         modalImage.src = image.src;
         modal.appendChild(modalImage);

         // Add a click event listener to the image element
         image.addEventListener('click', function() {
             modal.classList.add('open');
         });

         // Add a click event listener to the modal element to close it
         modal.addEventListener('click', function() {
             modal.classList.remove('open');
         });
     });


 </script>



 <?php require_once APPROOT . '/views/inc/incAdvisor/inchat_footer.php'; ?>