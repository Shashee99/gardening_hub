<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="req-uestcontainer">
    <div class="req-description">
        <div class="req-shopname">
            <p> <strong>Shop name : </strong><?= $data['request'] -> shop_name ?></p>
            <p> <strong>Request date and time : </strong><?= $data['request'] -> date ?></p>
            <p> <strong>Items  : </strong><?= $data['request'] -> items ?></p>
            <p> <strong><u>Description</u></strong><br><?= $data['request'] -> description ?></p><br>
            <div class="reqactions parentwidth">
                <a id="reqnewadd" class="view parentwidth <?php echo (($data['request']->status =='Done'|| $data['request']->status =='Canceled') ? 'disabled' : '')?>">Add new type</a>
                <a href="<?=URLROOT;?>/admins/newproductcategories" class="view parentwidth">Back</a>
                <a id="reqnewdonebutton" href="<?=URLROOT;?>/admins/newproductcategories_markasdone/<?= $data['reqid'];?>" class="view <?php echo (($data['request']->status =='Done'|| $data['request']->status =='Canceled') ? 'disabled' : '')?> parentwidth">Done</a>
                <a href="#" id="sendrejectbtn" class="delete <?php echo (($data['request']->status =='Done'|| $data['request']->status =='Canceled') ? 'disabled' : '')?>">Reject</a>
            </div>
        </div>
    </div>
</div>

<form action="#" method="POST" id="catform">
    <div class="modal hidden">
        <button class="close-modal">&times;</button>
        <br>
        <h3>Enter new category</h3>
        <input type="text" id="selleremail" value="<?= $data['selleremail']?>" disabled hidden>
        <input type="text" id="sellername" value="<?= $data['sellername']?>" disabled hidden>
        <div>
            <input type="text" name="category" id="category" class="modelinputfield" placeholder="Enter category">
            <p class="errcat"></p>
        </div>
        <div>
            <input type="text" name="category" id="subcategory" class="modelinputfield" placeholder="Enter Sub category">
            <p class="errmsgsub"></p>
        </div>
        <input type="submit" class="done"  name="add" id="addcatbuton" value="Add" >
    </div>
</form>


<div id="rejectmailbox" class="rejectmsg hidden">
    <h2>Please provide reason to reject briefly.</h2>
    <br>
    <br>
    <div class="">
        <form action="<?=URLROOT;?>/admins/userdeleteconfirm/" method="post">
            <input type="text" id="requestid" value="<?= $data['reqid'];?>" hidden>
            <label for="email" class="rejectemail">Email :</label>
            <input type="email" id="email" name="email" value="<?=$data['selleremail'];?>" style="background-color: var(--light-gray);" readonly class="rejectemail emailbox"><br><br>
            <label for="reason" class="rejectemail">Reason :</label> <br>
            <textarea class="rejectemailtextbox" id="reason" name="reason" style="width:100%;height:100px;"></textarea><br><br>

            <div class="msgcontrolbtns flex parentwidth">
                <input class="delete-blue rejectsend" type="" value="Send" id="submitsendemail">
                <input class="delete rejectsend" type="" value="Cancel" id="cancelsendemailbtn" style="width: 80px">
            </div>

        </form>

    </div>

</div>

<div class="overlay hidden"></div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
