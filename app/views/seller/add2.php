<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>
    <style>

    .additem2 {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 25px;
    border-radius: 4px;
    box-shadow: 2px 2px 5px 1px #ececec;
    margin: 40px auto 0px;
    }
    .additem2 #itemdis {
        font-size: 18px;
        color: #333;
        font-weight: 500;
        text-align: center;
        position: relative;
        justify-content: center;
        padding: 15px 0px;
    }
    .additem2 .form {
    margin-top: 30px;
    }
    .form .input-box {
    width: 100%;
    margin-top: 20px;
    }
    .input-box label {
    color: #333;
    }
    .form :where(.input-box input, .select-box) {
    position: relative;
    height: 50px;
    width: 100%;
    outline: none;
    font-size: 13px;
    color: #282A3A;
    margin-top: 8px;
    border: 1px solid #00A778;
    border-radius: 4px;
    padding: 0 15px;
    }

    input[type="text"]::placeholder {
        color: #00A778;
    }
    .input-box input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }
    .form .column {
    display: flex;
    column-gap: 15px;
    }

    .address :where(input, .select-box) {
    margin-top: 15px;
    }
    .select-box select {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    color: #00A778;
    font-size: 13px;
    }

    .buton{
        margin: auto;
        display: flex;
        justify-content: center;
    }

    #description{
        display: flex;
        width: 100%;
        border: 1px solid #00A778;
        border-radius: 4px;
        padding: 15px 15px;
        margin-top: 8px;
        font-size: 13px;
        font-family: Arial, Helvetica, sans-serif;
    }

    #description:focus {
        border: 1px solid #00A778;
        outline: none;
    }

    #description::placeholder {
        color: #00A778;
    }

    #err2{
    display: flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    left: 20px;
    position: relative;
}

#cat_err2 {
    /* text-align: center; */
    border: none;
    /* margin: 60px auto 0px auto; */
    width: fit-content;
    height: 35px;
    padding: 8px;
    border-radius: 4px;
    font-size: 14px;
    color: red;
    /* background-color: #FFD6D5; */
    letter-spacing: 1px;
}

#symbol_err2{
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    /* margin: auto; */
    position: relative;
    /* top: 5.5px; */
    /* left: 5px; */
    right: 10px;
    font-size: 20px;
    color: red;
}
    </style>


<!-- ---------------------------- Progress Bar---------------------------- -->

<div class="progressbar">
        <ul class="ulpro">
            <li class="ulli">
                <div class="progress one">
                    <i class="icon uil fa-solid fa-carrot"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Select Category</p>
            </li>
            <li class="ulli">
                <div class="progress two">
                    <i class="icon uil fa-solid fa-pen"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Add Product Details</p>
            </li>
            <li class="ulli">
                <div class="progress three">
                    <i class="icon uil fa-solid fa-image"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Add Images</p>
            </li>
            <li class="ulli">
                <div class="progress four">
                    <i class="icon uil fa-solid fa-thumbs-up"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Completed</p>
            </li>
        </ul>

    </div>

<!-- --------------------------------------------------------------------- -->


<section  class="additem2" id="additem2">
        <h3 id="itemdis">Product Details</h3>
        <form action="<?php echo URLROOT; ?>/sellers/add2" method="post" class="form">
            <input type="text" name="cat" id="cat" value="<?= $data['selected_category'] ;?>  "hidden>
            <input type="text" name="subcat" id="subcat" value="<?= $data['selected_subcategory'];?>  " hidden>
            <div class="input-box">
                <label for="title">Product Name</label>
                <input type="text" name="title" id="title" value="<?php echo $data['title']; ?>" placeholder="Enter Product name">
                <!-- <p style="color:red" class="error title_err"> <?php echo $data['title_err']; ?> </p>   -->
                <div  id="err2">
                    <p  id="symbol_err2"><?php echo $data['err_symbol1']; ?></p>
                    <p class="error title_err" id="cat_err2"><?php echo $data['title_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="10" rows="6" placeholder="Enter description"><?php echo $data['description']; ?></textarea>
                <!-- <input type="text" name="description" id="description" value="<?php echo $data['description']; ?>" placeholder="Enter description"> -->
            </div>
            <div class="column">
                <div for="unit" class="input-box">
                <label for="unitvalue">Unit</label>
                <div class="select-box">
                    <select name="unitvalue" size="1" >
                        <option value="" hidden>Individual Product Units</option>
                        <option value="plant">Plant</option>
                        <option value="item">Item</option>
                        <option value="weight">Weight</option>
                        <option value="packet">Packet</option>
                    </select>
                    <div  id="err2">
                        <p  id="symbol_err2"><?php echo $data['err_symbol2']; ?></p>
                        <p class="error title_err" id="cat_err2"><?php echo $data['unitvalue_err']; ?> </p>
                    </div>
                </div>
                </div>
                <div class="input-box">
                    <label for="quantity">Quantity</label><br>
                    <input type="text" name="quantity" id="quantity" value="<?php echo $data['quantity']; ?>" placeholder="Enter quantity">
                    <!-- <p style="color:red"  class="error quantity_err"> <?php echo $data['quantity_err']; ?> </p> -->
                    <div  id="err2">
                        <p  id="symbol_err2"><?php echo $data['err_symbol3']; ?></p>
                        <p class="error title_err" id="cat_err2"><?php echo $data['quantity_err']; ?> </p>
                    </div>
                </div>
            </div>

            <div class="input-box">
                <label for="validate_period">Validate period</label><br>
                <input type="text" name="validate_period" id="validate_period" value="<?php echo $data['validate_period']; ?>" placeholder="Enter validate period">
                <!-- <p style="color:red" class="error validate_period_err"> <?php echo $data['validate_period_err']; ?> </p> -->
                <div  id="err2">
                    <p  id="symbol_err2"><?php echo $data['err_symbol5']; ?></p>
                    <p class="error title_err" id="cat_err2"><?php echo $data['validate_period_err']; ?> </p>
                </div>
            </div>

            <div class="input-box">
                <label for="price">Price</label><br>
                <input type="text" name="price" id="price" value="<?php echo $data['price']; ?>" placeholder="Enter price">
                <!-- <p style="color:red" class="error price_err"> <?php echo $data['price_err']; ?> </p> -->
                <div  id="err2">
                    <p  id="symbol_err2"><?php echo $data['err_symbol4']; ?></p>
                    <p class="error title_err" id="cat_err2"><?php echo $data['price_err']; ?> </p>
                </div>
            </div>
            <div class="buton">
                <input type="submit" class="btn_nxt" id="btn_nxt_add1"></input>
            </div>
        </form>
</section>

<script>



</script>
