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
        margin: auto;
        height: 100%;
    }

    .image_container{
        width: 50%;
        border: 1px solid black;
        
    }

    .input_container{
        width: 50%;
        border: 1px solid black;
        text-align: center;
        padding-top: 70px;
    }

    textarea{
        width: 95%;
        margin: 20px 0px;
        padding: 20px;
        border-radius: 10px;
        font-size: 20px;
    }

    textarea:focus{
        outline: none;
    }

    #req_btn{
        width: 150px;
        height: 35px;
        border-radius: 10px;
        margin-bottom: 50px;
    }

</style>
<div class="adding_area">
    <div class="image_container">

    </div>
    <div class="input_container">
        <form action="<?= URLROOT; ?>/sellers/request_category" method="POST">
            <label for="items">Enter the names of your Items</label>
            <textarea name="items" id="items" cols="20" rows="3"></textarea>
            <label for="description">Enter the description of your Items</label>
            <textarea name="description" id="description" cols="20" rows="5"></textarea>
            <input type="submit" value="Request" id="req_btn">
        </form>
    </div>
</div>
    

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>