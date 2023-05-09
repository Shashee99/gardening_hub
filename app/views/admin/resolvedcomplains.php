<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>

<div class="approvals">
    <div class="category parentwidth ">

        <a href="<?= URLROOT; ?>/admins/complains" class="sortbtn flex bglightgray text-decoration-none position-relative" style="width: 220px;height: 50px">
            <p class="font500" style="font-size: 15px"> < Back to complains</p>
        </a>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
        <table class="usertable">
            <thead>
            <tr>
                <th><b>RefID </b> </th>
                <th><b>Complaint Date</b></th>
                <th><b>From</b></th>
                <th><b>To</b></th>
                <th><b>Action</b></th>

            </tr>
            </thead>
            <tbody>
            <?php if (empty($data['complaints'])) : ?>
                <tr>
                    <td colspan="5">No complaints to display.</td>
                </tr>
            <?php else : ?>
                <?php foreach ($data['complaints'] as $row) : ?>
                    <tr>
                        <td><?php echo $row->complian_no ?></td>
                        <td><?php echo $row->complain_date ?></td>
                        <td><?php echo $row->posted_user_id ?></td>
                        <td><?php echo $row->complained_user_id ?></td>
                        <td>
                            <div class="seller-action flex">
                                <a href="<?= URLROOT ?>/admins/viewcomplainresolved/<?php echo $row->complian_no ?>" class="view"> View </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>

        </table>

    </div>

</div>
<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
