<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>


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
                <input type="text" name="title" id="title" value="<?php echo $data['title']; ?>" placeholder="Enter Product name" onchange="checkInput()">
                <!-- <p style="color:red" class="error title_err"> <?php echo $data['title_err']; ?> </p>   -->
                <div  id="err2">
                    <p  id="symbol_err2"><?php echo $data['err_symbol1']; ?></p>
                    <p class="error title_err" id="cat_err2"><?php echo $data['title_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="10" rows="6" placeholder="Enter description" onchange="checkInput()"><?php echo $data['description']; ?></textarea>
                <!-- <input type="text" name="description" id="description" value="<?php echo $data['description']; ?>" placeholder="Enter description"> -->
            </div>
            <div class="column">
                <div for="unit" class="input-box">
                <label for="unitvalue">Unit</label>
                <div class="select-box">
                    <select name="unitvalue" size="1" id="unitvalue" onchange="checkInput()">
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
                    <input type="text" name="quantity" id="quantity" value="<?php echo $data['quantity']; ?>" placeholder="Enter quantity" onchange="checkInput()">
                    <!-- <p style="color:red"  class="error quantity_err"> <?php echo $data['quantity_err']; ?> </p> -->
                    <div  id="err2">
                        <p  id="symbol_err2"><?php echo $data['err_symbol3']; ?></p>
                        <p class="error title_err" id="cat_err2"><?php echo $data['quantity_err']; ?> </p>
                    </div>
                </div>
            </div>

            <div class="input-box">
                <label for="validate_period">Validate period</label><br>
                <input type="text" name="validate_period" id="validate_period" value="<?php echo $data['validate_period']; ?>" placeholder="Enter validate period" onchange="checkInput()">
                <!-- <p style="color:red" class="error validate_period_err"> <?php echo $data['validate_period_err']; ?> </p> -->
                <div  id="err2">
                    <p  id="symbol_err2"><?php echo $data['err_symbol5']; ?></p>
                    <p class="error title_err" id="cat_err2"><?php echo $data['validate_period_err']; ?> </p>
                </div>
            </div>

            <div class="input-box">
                <label for="price">Price</label><br>
                <input type="text" name="price" id="price" value="<?php echo $data['price']; ?>" placeholder="Enter price" onchange="checkInput()">
                <!-- <p style="color:red" class="error price_err"> <?php echo $data['price_err']; ?> </p> -->
                <div  id="err2">
                    <p  id="symbol_err2"><?php echo $data['err_symbol4']; ?></p>
                    <p class="error title_err" id="cat_err2"><?php echo $data['price_err']; ?> </p>
                </div>
            </div>
            <div class="buton">
                <input type="submit" class="btn_nxt" id="btn_nxt_add1" value="Next"></input>
            </div>
        </form>
</section>

<script>

    window.onload = function(){
        const one = document.querySelector(".one");
        one.classList.add("active");
    }


    function checkInput(){
        const two = document.querySelector(".two");
        var title = (document.getElementById("title")).value.trim();
        // console.log(title);
        var description = (document.getElementById("description")).value.trim();
        // console.log(description);
        var unitvalue = (document.getElementById("unitvalue")).value.trim();
        // console.log(unitvalue);
        var quantity = (document.getElementById("quantity")).value.trim();
        var validate_period = (document.getElementById("validate_period")).value.trim();
        var price = (document.getElementById("price")).value.trim();

        if((title != "") && (description != "") && (unitvalue != "") && (quantity != "") && (validate_period != "") && (price != "")){
            
            two.classList.add("active");
        } else {
            two.classList.remove("active");
        }
    }


</script>
