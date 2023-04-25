<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<h2>Registered users in the system.</h2>
<div class="userlist">

    <div class="userlist-usercard">
        <div class="user">
            <h3>Customers</h3>
            <h1 class="usercount" id="customers"></h1>
        </div>
        <div class="userphoto">
            <img src="<?= URLROOT; ?>/img/admin/customers.png" alt="">
        </div>
    </div>
    <div class="userlist-usercard">
        <div class="user">
            <h3>Sellers</h3>
            <h1 class="usercount" id="sellers"></h1>
        </div>
        <div class="userphoto" style="margin-left: 20px">
            <img src="<?= URLROOT; ?>/img/admin/sellers.png" alt="">
        </div>
    </div>
    <div class="userlist-usercard">
        <div class="user">
            <h3>Advisors</h3>
            <h1 class="usercount" id="advisors"></h1>
        </div>
        <div class="userphoto" style="margin-left: 30px">
            <img src="<?= URLROOT; ?>/img/admin/advisor.png" alt="">
        </div>
    </div>
</div>
<hr>
<div class="newAdvisors">
    <div class="newAdvisors-usercount">
        <h2>New Advisors</h2>
        <h4>Request</h4>
        <h4 id="newadcount"></h4>
    </div>

    <div class="advisorcards" id="latestadvisors">



    </div>

    <div class="afteradvisors">
        <p> Click see more to view all Advisors</p>
        <div class="seemore">
            <h4>See more</h4>
        </div>
    </div>

    <hr>

</div>
<div class="newAdvisors">
    <div class="newAdvisors-usercount">
        <h2>New Sellers</h2>
        <h4>Request</h4>
        <h4 id="newsellCount"></h4>
    </div>

    <div class="advisorcards" id="latestsellers">



    </div>

    <div class="afteradvisors">
        <p> Click see more to view all Sellers</p>
        <div class="seemore">
            <h4>See more</h4>
        </div>
    </div>

    <hr>

</div>
<div class="newAdvisors">
    <div class="newAdvisors-usercount">
        <h2>Customers</h2>

    </div>
    <div class="advisorcards" id="latestcustomers">



    </div>

    <div class="afteradvisors">
        <p> Click see more to view all Sellers</p>
        <div class="seemore">
            <h4>See more</h4>
        </div>
    </div>

    <hr>

</div>

<div class="newcategoryreq">
    <div class="newcategoryreq-texts">
        <h3>New Category Requests</h3>
        <p><small>Category request form customers</small></p>
    </div>
    <h3>25</h3>
</div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>

