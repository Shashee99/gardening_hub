 <nav class="nav-bar">
      <div class="barnd-logo"><img src="../public/img/advisor/logo.png" alt=""> </div>

            <div class="profile-logout-function">
                <a href="<?php echo URLROOT;?>/advisors/profileUpdate"> <div class="profil"><img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?php echo $_SESSION['advisor_photo_path']; ?>" alt=""></div></a>
                 <div class="logout"><h6><?= $_SESSION['advisor_name'] ?></h6></div>
            </div>



 </nav>