<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="approvals">

    <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">All Advisors</h3>
            <h1 class="font700" id="regadcount"><?= count($data['registeredAdvisors']);?></h1>
        </div>
        <div class="searcharea flex">
            <input type="text" name="searchbyadviosrregistered" id="searchbyadviosrregistered" class="searchbox" placeholder="Search by Name" onkeyup="searchbyregisteredseller();">
            <div class="searchbtn bglightgray">
                <img src="<?= URLROOT; ?>/img/admin/icon/search.png" alt="" width="30px" height="25px" class="searchicon">
            </div>
        </div>


    </div>
    <hr>

    <div class="sortarea flex parentwidth">
        <a href="<?= URLROOT; ?>/admins/newadvisors" class="sortbtn flex bglightgray text-decoration-none position-relative" style="width: 220px;height: 50px">
            <img src="<?= URLROOT; ?>/img/admin/icon/addcat.png" alt="" width="15px" height="15px">
            <p class="font500" style="font-size: 15px">New Advisor Requests</p>
            <div id="newadvisorcountnoti" class="<?=  count($data['newadvisors']) == 0 ? 'hidden' : ''  ?>"><h5 id="notiadvisor"><?= count($data['newadvisors'])?></h5></div>
        </a>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
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

            <tbody id="advisorstableregistered">
            <?php if (count($data['registeredAdvisors']) > 0) : ?>
                <?php $i = 1; ?>
                <?php foreach ($data['registeredAdvisors'] as $row) : ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row -> name ?></td>
                        <td><?php echo $row -> nic_no ?></td>
                        <td><?php echo $row -> email ?></td>
                        <td><?php echo $row -> tel_no ?></td>
                        <td><div class="seller-action flex"><a href="<?=URLROOT;?>/admins/viewadvisorregistered/<?= $row -> advisor_id;?>" class="view"> View </a></div></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" style="text-align:center;">No advisors found.</td>
                </tr>
            <?php endif; ?>
            </tbody>

        </table>

    </div>

</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
