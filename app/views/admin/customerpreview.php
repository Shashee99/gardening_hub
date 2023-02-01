<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
    <br>
    <a href="<?= URLROOT;?>/admins/customers" class="backbutton">Back</a>
    <br> <br>
    <hr>
<div class="userdetails parentwidth">

    <div class="userimage" >
        <img class="userimage" src="<?= URLROOT ;?>/img/upload_images/customer_pp/<?=$data['customerinfo']->photo?>" alt="userimg" width="100%" height="100%">
    </div>

    <div class="userinfo">

        <ul class="userinfo-list">
            <li><b>Name of the Customers : </b> <?=$data['customerinfo'] -> name; ?></li>
            <li><b>Mobile Phone : </b> <?=$data['customerinfo'] -> tel_no; ?></li>
            <li><b>E-mail : </b> <?=$data['customerinfo'] -> email; ?></li>
            <li><b>NIC : </b> <?=$data['customerinfo'] -> nic_no; ?></li>
            <li><b>E-mail : </b> <?=$data['customerinfo'] -> email; ?></li>
            <li><b>Birthday : </b> <?=$data['customerinfo'] -> bod; ?></li>
            <li><b>Address : </b> <?=$data['customerinfo'] -> address; ?></li>
            <li><b>Gramasewa division : </b> <?=$data['customerinfo'] -> gramasewa_division; ?></li>
            <li><b>Divisional Secretary : </b> <?=$data['customerinfo'] -> divisional_secretary; ?></li>
            <li class="flex" style="justify-content: space-evenly">
                <div class="view" >Edit</div>
                <div class="delete" >Remove</div>
            </li>
        </ul>


    </div>
</div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>