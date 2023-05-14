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
            <table>
                <tr><td><b>Name of the Customers </td><td>: </b> <?=$data['customerinfo'] -> name; ?></td></tr>
                <tr><td><b>Mobile Phone </td><td>: </b> <?=$data['customerinfo'] -> tel_no; ?></td></tr>
                <tr><td><b>NIC </td><td>: </b> <?=$data['customerinfo'] -> nic_no; ?></td></tr>
                <tr><td><b>E-mail </td><td>: </b> <?=$data['customerinfo'] -> email; ?></td></tr>
                <tr><td><b>Birthday </td><td>: </b> <?=$data['customerinfo'] -> bod; ?></td></tr>
                <tr><td><b>Address </td><td>: </b> <?=$data['customerinfo'] -> address; ?></td></tr>
                <tr><td><b>Gramasewa division </td><td>: </b> <?=$data['customerinfo'] -> gramasewa_division; ?></td></tr>
                <tr><td><b>Divisional Secretary </td><td>: </b> <?=$data['customerinfo'] -> divisional_secretary; ?></td></tr>
                <tr>
                    <td>
                       <div class="flex" style="justify-content: space-evenly">
                           <div onclick="deletecustomer(<?=$data['customerinfo']  -> customer_id; ?>);" class="delete" >Remove</div>
                       </div>
                   </td>
              </tr>
            </table>

        </ul>


    </div>
</div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>