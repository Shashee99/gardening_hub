<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .adding_area{
        display: flex;
        width: 85%;
        margin: 50px auto;
        height: 100%;
        border-radius: 4px;
        box-shadow: 2px 2px 5px 1px #ececec;
    }

    .image_container{
        width: 50%;
    }

    .input_container{
        width: 50%;
        text-align: center;
        padding-top: 70px;
    }

    textarea{
        width: 95%;
        margin: 20px 0px;
        padding: 20px;
        border-radius: 4px;
        font-size: 20px;
        border: 1px solid #00A778;
    }

    textarea:focus{
        outline: none;
    }

    #req_btn{
        width: 230px;
        height: 40px;
        border: none;
        border-radius: 4px;
        background-color: #00A778;
        color: #fbfbfb;
        cursor: pointer;
        font-size: 13px;
        margin: 20px auto;
        display: block;
    }

    #requimg{
        width: 65%;
        display: flex;
        margin: auto;
    }

    .requlbl{
        color: #00A778;
        font-weight: 600px;
    }

</style>
<div class="adding_area">
    <div class="image_container">
        <img src="<?= URLROOT; ?>/img/seller/im2.png" alt="" id="requimg">
    </div>
    <div class="input_container">
        <form action="<?= URLROOT; ?>/sellers/request_category" method="POST">
            <label for="items" class="requlbl">Enter the names of your Items</label>
            <textarea name="items" id="items" cols="20" rows="3"></textarea>
            <label for="description" class="requlbl">Enter the description of your Items</label>
            <textarea name="description" id="description" cols="20" rows="5"></textarea>
            <input type="submit" value="Request" id="req_btn" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/dashboard';">
        </form>
    </div>
</div>
    

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>