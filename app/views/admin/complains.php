<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>

<div class="approvals">
    <div class="category flex parentwidth ">
        <div class="category-item1 flex">
            <h3 class="font600">Number of complains</h3>
            <h1 class="font700" id="complaintcount"></h1>
        </div>
        <a href="<?= URLROOT; ?>/admins/resolvedcomplains" class="sortbtn flex bglightgray text-decoration-none position-relative" style="width: 220px;height: 50px">
            <img src="<?= URLROOT; ?>/img/admin/icon/resolve.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 15px">Resolved Complains</p>
        </a>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
        <table class="usertable">
            <thead>
            <tr>
                <th><b>#</b> </th>
                <th><b>Complaint Date</b></th>
                <th><b>From</b></th>
                <th><b>To</b></th>
                <th><b>Action</b></th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['complaints'] as $row) : ?>
                <tr>
                    <td><?php echo $row -> complian_no  ?></td>
                    <td><?php echo $row -> complain_date ?></td>
                    <td><?php echo $row -> posted_user_id ?></td>
                    <td><?php echo $row -> complained_user_id ?></td>
                    <td> <div class="seller-action flex"> <a href="<?=URLROOT;?>/admins/viewcomplain/<?php echo $row -> complian_no  ?>" class="view"> View </a>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>
<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
