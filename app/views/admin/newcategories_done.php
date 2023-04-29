<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<!--new category request all -->
<div class="sortarea flex parentwidth">
<div class="tableoptions">
    <a href="<?= URLROOT;?>/admins/newproductcategories"  class="tboption"> <i class="fas fa-inbox"></i> All</a>
    <a href="<?= URLROOT;?>/admins/newproductcategories_pending" class="tboption"> <i class="fas fa-hourglass-end"></i> Pending</a>
    <a href="<?= URLROOT;?>/admins/newproductcategories_done"  class="tboption"> <i class="far fa-check-circle"></i> Done</a>
    <a href="<?= URLROOT;?>/admins/newproductcategories_cancelled"  class="tboption"> <i class="fas fa-ban"></i> Cancelled</a>
</div>
</div>
<hr>
<div class="cattablearea parentwidth">
    <table class="cattable">
        <thead>
        <th>#</th>
        <th>Seller</th>
        <th>Request Date</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        <tbody id="categoryTable">
        <?php if (count($data['newrequsets']) > 0) : ?>
            <?php $i = 1; ?>
            <?php foreach ($data['newrequsets'] as $row) : ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td>
                        <div class="profileandname">
                            <img class="reqprofileimage" src="http://localhost/gardening_hub/img/upload_images/seller_pp/<?php echo $row -> photo ?>" alt="userimg" width="30px" height="30px">
                            <h5><?php echo $row -> shop_name ?></h5>
                        </div>
                    </td>
                    <td><?php echo $row -> date ?></td>
                    <td><?php echo $row -> status ?></td>
                    <td><a class="view">View</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" style="text-align:center;">No records found.</td>
            </tr>
        <?php endif; ?>
        </tbody>

    </table>
</div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
