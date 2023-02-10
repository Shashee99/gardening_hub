<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="userlist">

    <div class="userlist-usercard">
        <div class="user">
            <h3>Customers</h3>
            <h1 class="usercount" id="cuscount"></h1>
        </div>
        <div class="userphoto">
            <img src="<?= URLROOT; ?>/img/admin/customers.png" alt="">
        </div>
    </div>
    <div class="userlist-usercard">
        <div class="user">
            <h3>Sellers</h3>
            <h1 class="usercount" id="sellCount"></h1>
        </div>
        <div class="userphoto" style="margin-left: 20px">
            <img src="<?= URLROOT; ?>/img/admin/sellers.png" alt="">
        </div>
    </div>
    <div class="userlist-usercard">
        <div class="user">
            <h3>Advisors</h3>
            <h1 class="usercount" id="regadcount"></h1>
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

    <div class="advisorcards">

        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT; ?>/img/admin/users/avi.jpg" alt=""
                     style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Danusha Deshan</p>
            <p>Kurunagala</p>
        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT; ?>/img/admin/users/member-1.png" alt=""
                     style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Nilshan Deemantha</p>
            <p>Galle</p>
        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT; ?>/img/admin/users/member-2.png" alt=""
                     style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Avishka Sathyanjana</p>
            <p>Nugegoda</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT; ?>/img/admin/users/member-3.png" alt=""
                     style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Avishka Sathyanjana</p>
            <p>Nugegoda</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT; ?>/img/admin/users/member-4.png" alt=""
                     style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Avishka Sathyanjana</p>
            <p>Nugegoda</p>

        </div>
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

    <div class="advisorcards">

        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/member-5.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Avishka Sathyanjana</p>
            <p>Nugegoda</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/member-6.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Viraj pushpakumara</p>
            <p>Nugegoda</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/member-7.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Saman kumara</p>
            <p>kirulapana</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/member-8.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Deepamal perera</p>
            <p>Wijerama</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/photo1.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Kimuthu Kisal</p>
            <p>Gampaha</p>

        </div>
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

    <div class="advisorcards">

        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/photo2.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Isuru Heshan</p>
            <p>Nugegoda</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/photo3.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Osura Viduranga</p>
            <p>Homagama</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/photo4.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Pasindu </p>
            <p>Homagama</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/photo5.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Rahal Balangoda</p>
            <p>Kottawa</p>

        </div>
        <div class="advisorcards-card">
            <div class="advisorimg">
                <img src="<?= URLROOT;?>/img/admin/users/photo6.png" alt="" style="width: 100%; height: 100%; border-radius: 100%">
            </div>
            <p>Ramith Rodrigo</p>
            <p>Ja ela</p>

        </div>
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

