<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="approvals">
        <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">All Product Sellers</h3>
            <h1 class="font700" id="sellCount"></h1>
        </div>
        <div class="searcharea flex">
            <input type="text" name="searchbyshopnameregistered" id="searchbyshopnameregistered" class="searchbox" placeholder="Search by Shop Name" onkeyup="searchbyregisteredshopname();">
            <div class="searchbtn bglightgray">
                <img src="<?= URLROOT; ?>/img/admin/icon/search.png" alt="" width="30px" height="25px" class="searchicon">
            </div>
        </div>


    </div>
    <hr>

    <div class="sortarea flex parentwidth">
        <a href="<?= URLROOT; ?>/admins/newsellers" class="sortbtn flex bglightgray text-decoration-none position-relative" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/addcat.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">New Sellers Request</p>
            <div id="newsellercountnoti"><h5 id="notiseller"></h5></div>
        </a>
        <div class="sortbtn flex bglightgray" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/sort.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">Filter search</p>
        </div>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black">
        <table class="table-sellers parentwidth">
            <thead>
            <tr>
                <th>#</th>
                <th>Shop Name</th>
                <th>Owner</th>
                <th>Email</th>
                <th>Mobile Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="registeredsellerstable">
            <?php $i =1; ?>
            <?php foreach ($data['sellers'] as $row) : ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row -> shop_name ?></td>
                    <td><?php echo $row -> owner_name ?></td>
                    <td><?php echo $row -> email ?></td>
                    <td><?php echo $row -> tel_no ?></td>
                    <td> <div class="seller-action flex"> <a href="<?=URLROOT;?>/admins/viewseller/<?= $row -> seller_id;?>"" class="view"> View </a> <div class="delete"> Delete </div> </div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
