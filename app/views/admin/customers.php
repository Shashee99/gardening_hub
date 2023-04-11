<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="approvals">


    <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">All Product Customers</h3>
            <h1 class="font700" id="cuscount"></h1>
        </div>
        <div class="searcharea flex">
            <input type="text" name="searchcat" id="searchbyname" class="searchbox" placeholder="Search by name" onkeyup="searchbyname();">
            <div class="searchbtn bglightgray">
                <img src="<?= URLROOT; ?>/img/admin/icon/search.png" alt="" width="30px" height="25px" class="searchicon">
            </div>
        </div>


    </div>
    <hr>

    <div class="sortarea parentwidth">

        <div class="sortbtn flex bglightgray" style="width: 300px;height: 60px">
            <img src="<?= URLROOT; ?>/img/admin/icon/sort.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">Filter search</p>
        </div>

    </div>
    <hr>
    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
        <table class="table-sellers parentwidth" >
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Gramasewa division</th>
                <th>Divisional Secretary</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="customersall">

            </tbody>
        </table>

    </div>

</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
