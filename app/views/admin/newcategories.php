<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>

<div class="sortarea flex parentwidth">
<div class="tableoptions">
    <div class="tboption"><i class="fas fa-inbox"></i> All</div>
    <div class="tboption"><i class="fas fa-hourglass-end"></i> Pending</div>
    <div class="tboption"><i class="far fa-check-circle"></i> Done</div>
    <div class="tboption"><i class="fas fa-ban"></i> Cancelled</div>
</div>
</div>
<hr>
<div class="cattablearea parentwidth">
    <table class="cattable">
        <thead>
        <th>#</th>
        <th>Seller</th>
        <th>Request Date</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        <tbody id="categoryTable">
        <tr>
            <td>1</td>
            <td>
               <div class="profileandname">
                   <img class="reqprofileimage" src="http://localhost/gardening_hub/img/upload_images/seller_pp/img-seller63d434d6d2ffe9.57590165.jpg" alt="userimg" width="30px" height="30px">
                   <h5>Namggggggggggggggg  gggggggggge</h5>
               </div>
            </td>
            <td>2022.02.03</td>
            <td>Pending</td>
            <td><a class="view">View</a></td>
        </tr>
        </tbody>
    </table>
</div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
