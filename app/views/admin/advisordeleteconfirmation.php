<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>

<div class="confirmationbox">
     <h3>Are you sure want to Delete?</h3>
<br>
    <div class="yesorno flex parentwidth">
        <a href="<?= URLROOT; ?>/advisors/deleteadvisors/<?= $data['id'] ?>" class="view">Yes</a>
        <a href="<?= URLROOT; ?>/advisors/deleteadvisors/0000" class="delete">No</a>
    </div>


</div>




<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
