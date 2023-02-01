<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<!-- -------------------------------------------------------------------------------------- -->

<style>

body{
    background: linear-gradient(249.92deg, #F5F7FA 12.2%, #B8C6DB 99.01%);

}
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;

}


.content {
    width: 400px;
    height: 70vh;
    display: grid;
    place-items: center;
    margin-left: 200px;
    left: 0;
    position: absolute;
    
}

main{
    position: relative;
}

.btn_nxt{
            background-color: white;
            color: green;
            padding: 5px 10px;
            border-radius: 10px;
            text-align: center;
            display: inline-block;
            font-size: 15px;
            margin: 10px 30px;
            cursor: pointer;
            text-decoration:none;
            width: 220px;
        }

#category, #categorySelect {
    width: 500px;
    height: 40px;
    border-radius: 10px;
    border: white;
    padding: 10px;
    margin: 20px;
    background: linear-gradient(249.92deg, #0BAB64 12.2%, #3BB78F 99.01%);
    opacity: 0.7;
}

#btn_area {
    display: flex;
}
.bgimg{
   opacity: 0.5;
    width: 400px;
    height: 500px;
    position: absolute;
    right: 120px;
}

</style>

<!-- ---------------------------------------------------------------------------------------- -->
<div class="bgimg">
<img width="100%" height="100%" src="<?= URLROOT;?>/img/seller/add1cat.png" alt="">
</div>
    <div class="content">
        <form action="<?= URLROOT;?>/sellers/add1" method="POST">
            <div class="option1">
                <select name="category" id="category" size="1" onchange="makeSubmenu(this.value)">
                    <option value="" disabled selected>Choose Category</option>
                    <?php foreach ($data['category'] as $cat) {?>

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
                <a href="" class="btn_nxt" id="btn_nxt">Request for new category</a>
            </div>
            <div class="buton">
                <input type="submit" class="btn_nxt" id="btn_nxt">Next</input>
            </div>
        </div>
        </form>
    </div>


    
    
    

    <script type="text/javascript">

        function makeSubmenu(value) {

            let category = value;
            // console.log(category);
            var ajax = new XMLHttpRequest();


            ajax.open("POST", "http://localhost/gardening_hub/ProductCategories/getsubcategory", true);
            ajax.onreadystatechange = function () {

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