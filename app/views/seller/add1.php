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

<div class="add1main">
    <div class="bgimg">
        <img id="add1img" src="<?= URLROOT; ?>/img/seller/im1.png" alt="">
    </div>
    <div class="contentadd1">
        <form action="<?= URLROOT; ?>/sellers/add1" method="POST">
        <div class="opdrop">
            <div class="option1">
                <select name="category" id="category" size="1" onchange="makeSubmenu(this.value)">
                    <option value="" disabled selected>Choose Category</option>
                    <?php foreach ($data['category'] as $cat) { ?>

                        <option value=<?php echo $cat->product_category; ?>><?php echo $cat->product_category; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="option2">
                <select id="categorySelect" name="subcat" size="1" onchange="fillprogressbar()">
                    <option value="" disabled selected>Choose Subcategory</option>
                    <option></option>
                </select>
            </div>
        </div>
            <div class="errrr">
                <p  id="symbol_err"><?php echo $data['err_symbol']; ?></p>
                <p class="error title_err" id="cat_err"><?php echo $data['cat_err']; ?> </p>
            </div>
            <div id="btn_area">

                <div class="buton">
                    <input type="submit" class="btn_nxt" id="btn_nxt_add1"></input>
                </div>
                
            </div><br><br>
            
        </form>
        <div id="btn_area">
            <div class="buton" id="req_buton">
                <button class="req_cat" id="req_cat" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/request_category';">Request for new categorys</button>
                <div class="req_msg">
                    <p>If you do not have a sutable category in the list, Then you can requset for a new category name that related for your items. We wish to 
                        Complete your request soon and inform it through a e-mail. Please wait little while. Thankyou. </p>
                </div>
            </div>   
        </div>
        
    </div>
</div>







<script type="text/javascript">
    function makeSubmenu(value) {

        let category = value;
        console.log(category);
        var ajax = new XMLHttpRequest();
        


        ajax.open("POST", "http://localhost/gardening_hub/ProductCategories/getsubcategory", true);
        ajax.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                // document.getElementById("catCount").innerText = data.length;
                // console.log(data[0]);
                console.log(data);
                var html = "";
                for (var a = 0; a < data.length; a++) {

                    html += `<option value =\" ${data[a].sub_category} \">${data[a].sub_category}</option>`;

                    // console.log(html);
                }

                document.getElementById("categorySelect").innerHTML = html;
            }
        };
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.send("category=" + category);

        // if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
        // else {
        //     var citiesOptions = "";
        //     for (categoryId in subcategory[value]) {
        //         citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
        //     }
        //     document.getElementById("categorySelect").innerHTML = citiesOptions;
        // }

        

    }

    function fillprogressbar(){
        const one = document.querySelector(".one");
        const two = document.querySelector(".two");
        const three = document.querySelector(".three");
        const four = document.querySelector(".four");
        // one.onclick = function() {
        one.classList.add("active");
        two.classList.remove("active");
        three.classList.remove("active");
        four.classList.remove("active");
        five.classList.remove("active");
    }

    // function displaySelected() {
    //     var country = document.getElementById("category").value;
    //     var city = document.getElementById("categorySelect").value;
    //     if(!((country.length === 0) && (city.length === 0))) {
    //         document.getElementById("btn_btn").disabled = true;

    //     } else {
    //         document.getElementById("btn_btn").disabled = true;
    // }


    // function resetSelection() {
    //     document.getElementById("category").selectedIndex = 0;
    //     document.getElementById("categorySelect").selectedIndex = 0;
    // }


    // ---------------------------------------------------------//
    // --------------- Progress Bar ----------------------------//

    
    // const five = document.querySelector(".five");

//     one.onclick = function() {
//         one.classList.add("active");
//         two.classList.remove("active");
//         three.classList.remove("active");
//         four.classList.remove("active");
//         five.classList.remove("active");
//     }

//     two.onclick = function() {
//         one.classList.add("active");
//         two.classList.add("active");
//         three.classList.remove("active");
//         four.classList.remove("active");
//         five.classList.remove("active");
//     }
//     three.onclick = function() {
//         one.classList.add("active");
//         two.classList.add("active");
//         three.classList.add("active");
//         four.classList.remove("active");
//         five.classList.remove("active");
//     }
//     four.onclick = function() {
//     one.classList.add("active");
//     two.classList.add("active");
//     three.classList.add("active");
//     four.classList.add("active");
//     five.classList.remove("active");
// }
</script>
<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>