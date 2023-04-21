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
              <table>
                  <tr><td><b>Name of the Seller</b></td> <td>: <?=$data['sellerinfo'] -> owner_name; ?></tr></td>
                  <tr><td><b>Name of the Shop </b></td><td>: <?=$data['sellerinfo'] -> shop_name; ?></tr></td>
                  <tr><td><b>Mobile Phone </b></td><td>: <?=$data['sellerinfo'] -> tel_no; ?></tr></td>
                  <tr><td><b>E-mail </b></td> <td>: <?=$data['sellerinfo'] -> email; ?></tr></td>
                  <tr><td><b>Shop Address  </b></td> <td>: <?=$data['sellerinfo'] -> address; ?></tr></td>
                  <tr><td><b>BR no  </b> </td> <td>: <?=$data['sellerinfo'] -> br_no; ?></tr></td>
                  <tr><td><b>BR Document </b> </td> <td>: <a href="<?= URLROOT;?>/img/upload_images/seller_doc/<?=$data['sellerinfo'] -> br_photo; ?>" download><?=$data['sellerinfo'] -> br_photo; ?></a></tr></td>
              </table>
                <br>
                  <div class="flex" style="justify-content:space-evenly">
                      <td><a href="<?=URLROOT;?>/admins/deleteaSeller/<?= $data['sellerinfo'] ->seller_id;?>" class="delete" >Remove</a></td>
                  </div>

            </ul>


        </div>
    </div>

    <div>
        <h2>No of Complaints for this seller : <?= count($data['complaints']);?></h2>
        <br>
        <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
            <table class="usertable">
                <thead>
                <tr>
                    <th> <b>From</b> </th>
                    <th><b>Complaint Date</b></th>
                    <th><b>Reason</b></th>
                </tr>
                </thead>
                <?php foreach ($data['complaints'] as $row) : ?>
                    <tr style="border: 1px solid black">
                        <td><?php echo $row -> posted_user_id ?></td>
                        <td><?php echo $row -> complain_date ?></td>
                        <td><?php echo $row -> complain ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>