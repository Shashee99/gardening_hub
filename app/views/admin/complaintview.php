<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div>
    <br>
    <a href="<?= URLROOT;?>/admins/complains" class="backbutton">Back</a>
    <br> <br>
</div>
<hr>

<div class="position-relative">

    <div class="userinfo-complain">
        <ul class="complaint-list">
            <li><b>Complaint Reference : </b> <?= $data['complaints'] -> complian_no ?>  </li>
            <li><b>Complaint Date : </b> <?= $data['complaints'] -> complain_date ?> </li>
            <li><b>Complainant Name : </b> <?= $data['complainant']?> </li>
            <li><b>Complainant_type : </b> <?= $data['complainant_type']?> </li>
            <li><b>Complainee Name : </b> <?= $data['complainee']?></li>
            <li><b>Complainee_type : </b> <?= $data['complainee_type']?></li>
            <li><b>Problem </b> <div style="width: 400px; height: 100px; overflow: scroll;"><?= $data['complaints']-> complain ?></div></li>
            <li><b>Photos </b>
            <div class="complainphotos">
                <div class="complainphotos_1"><img src="<?=URLROOT;?>/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>
<!--                <div class="complainphotos_1"><img src="--><?//=URLROOT;?><!--/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>-->
<!--                <div class="complainphotos_1"><img src="--><?//=URLROOT;?><!--/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>-->
<!---->
<!--                <div class="complainphotos_1"><img src="--><?//=URLROOT;?><!--/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>-->

            </div>
            </li>
            <li>
                <div class= "inneroption parentwidth">
                    <a class="delete-green parentwidth" style="text-decoration: none" href="<?=URLROOT;?>/admins/viewcomplaineduser/<?=$data['complainantid'];?>">View Complainant Profile</a>
                    <a class="delete-green parentwidth" style="text-decoration: none"href="<?=URLROOT;?>/admins/viewcomplaineduser/<?=$data['complaineeid'];?>">View Complainanee Profile</a>
                    <a class="delete-blue parentwidth" style="text-decoration: none"href="<?=URLROOT;?>/admins/resolvecomplain/<?= $data['complaints'] -> complian_no ?>">Mark as Resolved</a>
                    <a class="delete parentwidth" style="text-decoration: none"href="<?=URLROOT;?>/admins/deleteacomplain/<?= $data['complaints'] -> complian_no ?>">Delete</a>
                </div>
            </li>

        </ul>
    </div>

</div>



<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
