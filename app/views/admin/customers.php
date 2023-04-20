<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="approvals">


    <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">All Product Customers</h3>
            <h1 class="font700" id="cuscount"></h1>
        </div>
        <div class="searcharea flex">
            <input type="text" name="searchcat" id="searchbyname" class="searchbox" placeholder="Search by name" onkeyup="searchbyname();">
        </div>


    </div>
    <hr>


    <br>
    <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
        <table class="usertable" >
            <thead>
            <tr>
                <th><b>#</b></th>
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Gramasewa division</b></th>
                <th><b>Divisional Secretary</b></th>
                <th><b>Telephone</b></th>
                <th><b>Action</b></th>
            </tr>
            </thead>

            <tbody id="customersall">

            </tbody>
        </table>

    </div>

</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
