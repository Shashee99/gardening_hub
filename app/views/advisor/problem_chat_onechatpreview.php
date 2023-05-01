 <?php require_once APPROOT . '/views/inc/incAdvisor/incheadare_reply.php'; ?>
             

           <div class="reply-contener">
                 <?php require_once APPROOT.'/views/inc/incAdvisor/navbar.php';?> 
                 
                 <div class="contener2">
                     <?php require_once APPROOT.'/views/inc/incAdvisor/sidebar.php';?>
                     <div class="chat-content">
                                <div class="chat-pot">
                                      <div class="problem">
                                          <div class="user-profile">
                                              <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $data['customerpp'] ; ?>" alt="" >
                                              <div>
                                                  <h5>Name : <?= $data['name'];?> </h5>
                                                  <h6><?= $data['date'];?></h6>
                                                  <h6>Category : <?= $data['category'] ; ?></h6>
                                              </div>
                                          </div>
                                          <div class="content-problem">
                                              <h3><u><?= $data['title'] ; ?></u> </h3>
                                              <p><?=$data['content'];?></p>

                                          </div>
                                          <div class="image-problem">
                                              <?php foreach ($data['photos'] as $row){
                                                  ?>
                                                  <div class=" image-plants"><img src="<?= URLROOT; ?>/img/upload_images/problem_photo/<?= $row ; ?> " class="preview-image" alt="" ></div>
                                                  <?php
                                              }
                                              ?>
                                          </div>
                                      </div>
                                      <div id="replybox" class="reply">
                                          <?php if (count($data['reply']) === 0) { ?>
                                              <p style="margin-left: 20px"><i>There are no replies for this problem.</i></p>
                                          <?php } else { ?>
                                              <?php foreach ($data['reply'] as $row) { ?>
                                                  <div class="reply-section">
                                                      <div class="replyview">
                                                          <div class="replyprofile">
                                                              <img src="http://localhost/gardening_hub/img/upload_images/advisor_pp/<?=$row -> photo;?>" width ="30px" height = "30px" style="border-radius: 100%" alt="">
                                                          </div>
                                                          <div class="replyandreplyname">
                                                              <h6 class="replier">Name : <?=$row -> name ?></h6>
                                                              <h6 class="replier"><?=$row -> dateandtime ?></h6>
                                                              <p class="replytext"><?=$row -> reply ?></p>
                                                          </div>
                                                      </div>
                                                  </div>
                                              <?php } ?>
                                          <?php } ?>


                                      </div>

                                    <form action="<?=URLROOT;?>/advisors/problem_chat_openoneproblem/<?=$data['id'];?>" method="POST" >
                                        <div class="replybox">
                                            <div>
                                                <input width="100%" type="text" id="replybox" name="prompt" placeholder="Enter the reply here">
                                                <button class="sentbtn">
                                                    Reply
                                                </button>
                                            </div>
                                            <span class="errormessageforprompt"><?= $data['errormsg'];?></span>
                                        </div>
                                    </form>

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


 <?php require_once APPROOT . '/views/inc/incAdvisor/incfooter_reply.php'; ?>