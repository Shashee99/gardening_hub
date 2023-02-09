<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>

<div class="approvals">


    <div class="category parentwidth ">
        <div class="category-item1 flex">
            <h3 class="font600">Number of complains</h3>
            <h1 class="font700" id="cuscount"></h1>
        </div>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
        <table class="table-sellers parentwidth">
            <thead>
            <tr>
                <th>Complaint Reference  </th>
                <th>Complaint Date</th>
                <th>From</th>
                <th>To</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['complaints'] as $row) : ?>
                <tr>
                    <td><?php echo $row -> complian_no  ?></td>
                    <td><?php echo $row -> complain_date ?></td>
                    <td><?php echo $row -> posted_user_id ?></td>
                    <td><?php echo $row -> complained_user_id ?></td>
                    <td> <div class="seller-action flex"> <a href="<?=URLROOT;?>/admins/viewcomplain/<?php echo $row -> complian_no  ?>" class="view"> View </a> <div class="delete"> Delete </div> </div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>
<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
