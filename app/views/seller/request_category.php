<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<div class="adding_area">
    <div class="image_container">
        <img src="<?= URLROOT; ?>/img/seller/im2.png" alt="" id="requimg">
    </div>
    <div class="input_container">
        <i id="add_category_cancle_icon" class="fa-regular fa-circle-xmark" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/add1';"></i>
        <form action="<?= URLROOT; ?>/sellers/request_category" method="POST">
            <label for="items" class="requlbl">Enter the names of your Items</label>
            <textarea class="textarea_request" name="items" id="items" cols="20" rows="3"></textarea>
            <label for="description" class="requlbl">Enter the description of your Items</label>
            <textarea class="textarea_request" name="description" cols="20" rows="5"></textarea>
            <input type="submit" value="Request" id="req_btn" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/dashboard';">
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>