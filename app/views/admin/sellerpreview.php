<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
    <br>
    <a href="<?= URLROOT;?>/admins/sellers" class="backbutton">Back</a>
    <br> <br>
    <hr>
    <div class="userdetails parentwidth">

        <div class="userimage" >
            <img class="userimage" src="<?= URLROOT ;?>/img/upload_images/seller_pp/<?=$data['sellerinfo']->photo?>" alt="userimg" width="100%" height="100%">
        </div>

        <div class="userinfo">

            <ul class="userinfo-list">
                <li><b>Name of the Seller : </b> <?=$data['sellerinfo'] -> owner_name; ?></li>
                <li><b>Name of the Shop : </b> <?=$data['sellerinfo'] -> shop_name; ?></li>
                <li><b>Mobile Phone : </b> <?=$data['sellerinfo'] -> tel_no; ?></li>
                <li><b>E-mail : </b> <?=$data['sellerinfo'] -> email; ?></li>
                <li><b>Shop Address : </b> <?=$data['sellerinfo'] -> address; ?></li>
                <li><b>BR no:   </b> <?=$data['sellerinfo'] -> br_no; ?></li>
                <li><b>BR documentation:   </b> <?=$data['sellerinfo'] -> br_photo; ?></li>

                <li class="flex" style="justify-content:space-evenly">
                    <a href="<?= URLROOT;?>/admins/sellerApprove/<?=$data['sellerinfo'] -> seller_id?>" class="view" >Approve</a>
                    <div class="delete" >Reject</div>
                </li>
            </ul>


        </div>
    </div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>