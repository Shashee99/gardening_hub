<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div>
    <br>
    <a href="<?= URLROOT;?>/admins/complains" class="backbutton">Back</a>
    <br> <br>
</div>
<hr>

<div>
    <div class="userinfo">
        <ul class="complaint-list">
            <li><b>Complaint Reference : </b> <?= $data['complaints'] -> complian_no ?>  </li>
            <li><b>Complaint Date : </b> <?= $data['complaints'] -> complain_date ?> </li>
            <li><b>Complainant Name : </b> <?= $data['complainant']?> </li>
            <li><b>Complainant_type : </b> <?= $data['complainant_type']?> </li>
            <li><b>Complainee Name : </b> <?= $data['complainee']?></li>
            <li><b>Complainee_type : </b> <?= $data['complainee_type']?></li>
            <li><b>The matter : </b> <?= $data['complaints']-> complain ?></li>
        </ul>
    </div>

</div>



<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
