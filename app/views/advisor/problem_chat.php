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
                                         <div class="user-profile"><img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $problems['customerpp'] ; ?>" alt="" ><h5>Name : <?= $problems['name'];?> </h5><h5><?= $problems['date'];?></h5></div>
                                           <ul>
                                                
                                                 <li><h4>category:bonzzy</h4></li>
                                                 <li><h4>all rady reply</h4></li>
                                                 
                                           </ul>
                                      </div>
                                        <div class="content-problem">
                                                <h5>title: plants</h5>
                                                <p>saafdgdfgfbvb hutyjgjjjjjjjjjjnhg ery sddddddddddddddfd fdfgs sdgggfdghdf asfasadfrfewt etewter
                                                tgytrutryutyyujtyuty rtrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr trrrrrrrrrrrrrrrrrrrrrr
                                                </p>
                                        </div>
                                        <div class="image-problem">
                                                <?php foreach ($problems['photos'] as $row){ 
                                                ?>
                                                <div class="image-plants"><img src="<?= URLROOT; ?>/img/upload_images/problem_photo/<?= $row ; ?>" alt="" ></div>
                                               <?php 
                                                 }
                                                ?>
                                        </div>
                                        <div class="reply-view">
                                               <ul>
                                                <li><a href="<?=URLROOT?>/advisors/problem_chat_openoneproblem/<?= $problems['id'];?>">Reply...</a></li>
                                                <li><a href="">view reply...</a></li>
                                               </ul>
                                        </div>

                                </div>
                        <?php } ?>
                                                                         
                        </div>
                       




                </div>   







          </div>




 <?php require_once APPROOT . '/views/inc/incAdvisor/inchat_footer.php'; ?>