<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
    <div class="approvals">

        <div class="category parentwidth flex">
            <div class="category-item1 flex">
                <h3 class="font600">New Advisors</h3>
                <h1 class="font700" id="newadcount"><?= count($data['newadvisors'])?></h1>
            </div>
            <div class="searcharea flex">
                <input type="text" name="searchbyadviosrunregistered" id="searchbyadviosrunregistered" class="searchbox" placeholder="Search Category" onkeyup="searchbyunregisteredadvisor();">
                <div class="searchbtn bglightgray">
                    <img src="<?= URLROOT; ?>/img/admin/icon/search.png" alt="" width="30px" height="25px" class="searchicon">
                </div>
            </div>


        </div>
        <hr>

        <div class="sortarea flex parentwidth">
            <a href="<?= URLROOT; ?>/admins/advisors" class="sortbtn flex bglightgray text-decoration-none" style="width: 200px;height: 50px">
                <img src="<?= URLROOT; ?>/img/admin/icon/backbtn.png" alt="" width="15px" height="15px">
                <p class="font500" style="font-size: 15px">Back to Advisors</p>
            </a>

        </div>
        <hr>
        <br>
        <div class="seller-table-area" style="border: 1px solid black;overflow-x: scroll;">
            <table class="usertable">
                <thead>
                <tr>
                    <th><b>#</b></th>
                    <th><b>Name</b></th>
                    <th><b>NIC</b></th>
                    <th><b>Email</b></th>
                    <th><b>Mobile Phone</b></th>
                    <th><b>Action</b></th>
                </tr>
                </thead>

                <tbody id="advisorstableunregistered">
                <?php if (count($data['newadvisors']) > 0) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['newadvisors'] as $row) : ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row -> name ?></td>
                            <td><?php echo $row -> nic_no ?></td>
                            <td><?php echo $row -> email ?></td>
                            <td><?php echo $row -> tel_no ?></td>
                            <td> <div class="seller-action flex">
                                    <a href="<?=URLROOT;?>/admins/viewadvisor/<?= $row -> advisor_id;?>" class="view"> View </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">No new advisors found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>

        </div>

    </div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>