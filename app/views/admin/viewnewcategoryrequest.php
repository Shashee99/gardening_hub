<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div class="req-uestcontainer">
    <div class="req-description">
        <div class="req-shopname">
            <p> <strong>Shop name : </strong><?= $data['request'] -> shop_name ?></p>
            <p> <strong>Request date and time : </strong><?= $data['request'] -> date ?></p>
            <p> <strong>Items  : </strong><?= $data['request'] -> items ?></p>
            <p> <strong><u>Description</u></strong><br><?= $data['request'] -> description ?></p><br>
            <div class="reqactions parentwidth">
                <a class="view parentwidth">Add new type</a>
                <a class="view parentwidth">Back</a>
                <a class="delete">Reject</a>
            </div>
        </div>
    </div>
</div>

<form action="#" method="POST" id="catform">
    <div class="modal hidden">
        <button class="close-modal">&times;</button>
        <br>
        <h3>Enter new category</h3>
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
<div class="overlay hidden"></div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
