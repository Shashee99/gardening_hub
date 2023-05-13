<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="userlist flex">

    <div class="userlist-usercard">
        <div class="user">
            <h2>Customers</h2>
            <h1 class="usercount" id="customers"><?= count($data['customers']);?></h1>
        </div>
        <div class="userphoto">
            <img src="<?= URLROOT; ?>/img/admin/customers.png" alt="">
        </div>
    </div>
    <div class="userlist-usercard">
        <div class="user">
            <h2>Sellers</h2>
            <h1 class="usercount" id="sellers"><?= count($data['sellers']);?></h1>
        </div>
        <div class="userphoto" style="margin-left: 20px">
            <img src="<?= URLROOT; ?>/img/admin/sellers.png" alt="">
        </div>
    </div>
    <div class="userlist-usercard">
        <div class="user">
            <h2>Advisors</h2>
            <h1 class="usercount" id="advisors"><?= count($data['advisors']);?></h1>
        </div>
        <div class="userphoto" style="margin-left: 30px">
            <img src="<?= URLROOT; ?>/img/admin/advisor.png" alt="">
        </div>
    </div>
</div>
<hr>



<div class="newcategoryreq ">
    <div class="newcategoryreq-texts">
        <h3>New Category Requests</h3>
        <p><small>Category request form customers</small></p>
    </div>
    <h3><?= count($data['newcatrequests']);?></h3>
</div>
<hr>

<div class="newcategoryreq ">
    <div class="newcategoryreq-texts">
        <h3>New Seller Requests</h3>
        <p><small>Go to new sellers and approve them!</small></p>
    </div>
    <h3><?= count($data['newsellers']);?></h3>
</div>
<hr>

<div class="newcategoryreq ">
    <div class="newcategoryreq-texts">
        <h3>New Advisor Requests</h3>
        <p><small>Go to new advisors and approve them!</small></p>
    </div>
    <h3><?= count($data['newadvisors']);?></h3>
</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
