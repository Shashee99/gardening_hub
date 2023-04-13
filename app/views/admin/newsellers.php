<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="approvals">

    <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">New Product Sellers</h3>
            <h1 class="font700" id="newsellCount"></h1>
        </div>
        <div class="searcharea flex">
            <input type="text" name="searchbyshopnameunregistered" id="searchbyshopnameunregistered" class="searchbox" placeholder="Search Category" onkeyup="searchbyunregisteredshopname();">
            <div class="searchbtn bglightgray">
                <img src="<?= URLROOT; ?>/img/admin/icon/search.png" alt="" width="30px" height="25px" class="searchicon">
            </div>
        </div>


    </div>
    <hr>

    <div class="sortarea flex parentwidth">
        <a href="<?= URLROOT; ?>/admins/sellers" class="sortbtn flex bglightgray text-decoration-none" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/backbtn.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">Back to sellers</p>

        </a>
        <div class="sortbtn flex bglightgray" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/sort.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">Filter search</p>
        </div>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black">
        <table class="usertable">
            <thead>
            <tr>
                <th><b>#</b></th>
                <th><b>Shop Name</b></th>
                <th><b>Owner</b></th>
                <th><b>Email</b></th>
                <th><b>Mobile Phone</b></th>
                <th><b>Action</b></th>
            </tr>
            </thead>
            <tbody id="unregisteredsellerstable">
            <?php foreach ($data['newsellers'] as $row) : ?>
            <tr>
                <td><?php echo $row -> seller_id ?></td>
                <td><?php echo $row -> shop_name ?></td>
                <td><?php echo $row -> owner_name ?></td>
                <td><?php echo $row -> email ?></td>
                <td><?php echo $row -> tel_no ?></td>
                <td> <div class="seller-action flex"> <a href="<?=URLROOT;?>/admins/viewsellerregistered/<?= $row -> seller_id;?>" class="view"> View </a> <a href="<?= URLROOT;?>/admins/rejectseller/<?= $row -> seller_id;?>" class="delete"> Delete </a> </div></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
