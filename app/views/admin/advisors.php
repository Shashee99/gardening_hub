<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="approvals">

    <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">All Advisors</h3>
            <h1 class="font700" id="regadcount"></h1>
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
        <a href="<?= URLROOT; ?>/admins/newadvisors" class="sortbtn flex bglightgray text-decoration-none" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/addcat.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">New Advisor Requests</p>
        </a>
        <div class="sortbtn flex bglightgray" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/sort.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">Filter search</p>
        </div>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
        <table class="table-sellers parentwidth">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Mobile Phone</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="advisorstableregistered">
            <?php $i = 1; ?>
            <?php foreach ($data['registeredAdvisors'] as $row) : ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row -> name ?></td>
                    <td><?php echo $row -> nic_no ?></td>
                    <td><?php echo $row -> email ?></td>
                    <td><?php echo $row -> tel_no ?></td>
                    <td> <div class="seller-action flex"><a href="<?=URLROOT;?>/admins/viewadvisor/<?= $row -> advisor_id;?>"" class="view"> View </a> <div class="delete"> Delete </div> </div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
