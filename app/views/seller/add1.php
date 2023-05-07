<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>


<div class="add1main">
    <div class="bgimg">
        <img id="add1img" src="<?= URLROOT; ?>/img/seller/add1cat.png" alt="">
    </div>
    <div class="contentadd1">
        <form action="<?= URLROOT; ?>/sellers/add1" method="POST">
            <div class="option1">
                <select name="category" id="category" size="1" onchange="makeSubmenu(this.value)">
                    <option value="" disabled selected>Choose Category</option>
                    <?php foreach ($data['category'] as $cat) { ?>

                        <option value=<?php echo $cat->product_category; ?>><?php echo $cat->product_category; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="option2">
                <select id="categorySelect" name="subcat" size="1">
                    <option value="" disabled selected>Choose Subcategory</option>
                    <option></option>
                </select>
            </div>


            <div id="btn_area">
                
                <div class="buton">
                    <input type="submit" class="btn_nxt" id="btn_nxt"></input>
                </div>
                
            </div><br><br>
            <p style="color:red" class="error title_err" id="cat_err"> <?php echo $data['cat_err']; ?> </p>
        </form>
        <div id="btn_area">
            <div class="buton">
                <button class="req_cat" id="req_cat" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/request_category';">Request for new categorys</button>
            </div>
        </div>
        
    </div>
</div>







<script type="text/javascript">
    function makeSubmenu(value) {

        let category = value;
        // console.log(category);
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
</script>
<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>