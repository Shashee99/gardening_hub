<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<!--new category request all -->
<div class="sortarea flex parentwidth">
<div class="tableoptions">
    <a href="<?= URLROOT;?>/admins/newproductcategories"  class="tboption" style=" background-color: var(--gray);"> <i class="fas fa-inbox" ></i> All</a>
    <a href="<?= URLROOT;?>/admins/newproductcategories_pending" class="delete-green tboption"> <i class="fas fa-hourglass-end" style="color:var(--green)"></i> Pending</a>
    <a href="<?= URLROOT;?>/admins/newproductcategories_done"  class="delete-blue tboption"> <i class="far fa-check-circle" style="color:var(--blue)"></i> Done</a>
    <a href="<?= URLROOT;?>/admins/newproductcategories_cancelled"  class="delete tboption"> <i class="fas fa-ban"  style="color:var(--red)"></i> Canceled</a>
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
                    <td><a href="<?= URLROOT;?>/admins/viewnewcategoryrequest/<?php echo $row->req_id ?>" class="view">View</a></td>
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
