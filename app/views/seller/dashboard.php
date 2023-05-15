<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<div class="container">
    <main>
        <div class="productmenu">
            <div class="order_info_part">
                <button class="button" id="cusorderdb" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/order';"> Customers Orders</button>
                <div id="noti">
                    <button id="noti_butn" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/order';">
                        <h3 id="noti_count"><?php echo $data['notificationData'][0] -> num_noti; ?></h3>
                    </button>
                </div>
            </div>
            <div class="catgeories">
                <h4>Categories</h4>
                <ul class="catlist">
                    <li class="dddd"><input type="radio" class="all_items" name="ch1" id="ch1" value="" checked><span class="checkmark"></span>All</li>
                    
                    <?php foreach($data['catData'] as $cat_data) : ?>
                        <li class="dddd"><input type="radio" class="select_cat" name="ch1" id="select_cat" value="<?php echo $cat_data -> product_category; ?>"><span class="checkmark"></span><?php echo $cat_data -> product_category; ?></li>
                        
                    <?php endforeach; ?>
                </ul>

            </div>
            <button class="button" id="genreport" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/genarate_report';">Income Overview</button>

        </div>
        <div class="products">

            <div class="itemgrid">
                <div class="itemcard">
                    <h4 id="additemname">Add item</h4>
                    <a href="<?php echo URLROOT; ?>/sellers/add1">
                    <i id="add" class="fa-solid fa-circle-plus"></i>
                    </a><br>
                </div>
                
                <?php foreach($data['itemData'] as $item_data) : ?>
                    <div class="sampleitem">
                    <div class="delete_alert" id="<?php echo $item_data -> product_no .'delete_alert' ?>">
                        <p id="delete_msg">Do you want to permanetly delete this item</p>
                        <div class="icons">
                            <button class="cr_btn" btn_id="<?php echo $item_data -> product_no .'correct' ?>" type="submit">
                                <i id="correct" class="fa-solid fa-circle-check"></i>
                            </button>
                            <button class="cr_btn" btn_id="<?php echo $item_data -> product_no .'worng' ?>">
                                <i id="wrong" class="fa-solid fa-circle-xmark"></i>
                            </button>
                        </div>
                    </div>
                        <div class="sampleimg">
                            <a href="<?php echo URLROOT."/sellers/show/". $item_data -> product_no ?>">
                                <img src="<?=URLROOT;?>/img/upload_images/product_cover_photo/<?=$item_data->image;?>" alt="Image"> 
                            </a>
                        </div>
                        <div class="first">
                            <h4 id="itemname"><?php echo $item_data -> title; ?></h4>
                            <div class="RatingStars" id="<?php echo $item_data -> product_no?>">
                                <div class="stars-outer-below">
                                    <h5 id="num_ratings_bolow" class="num_ratings_bolow"><?php 
                                        $retrive_data = $item_data -> total_rating;
                                        $insert_data = ($retrive_data*10000)/10000;
                                        echo $insert_data; ?>
                                    </h5>
                                    <div class="stars-inner-below"></div>
                                </div>
                            </div>
                        </div>
                        <div class="second">
                            <div class="price">
                                <span>Rs. <stron><?php echo $item_data -> price; ?></stron></span>
                            </div>
                            <div class="avi">
                                <h6>Available <?php echo '('.$item_data -> quantity - $item_data -> sold_quantity.')' ?></h6>
                            </div>
                        </div>
                        <div class="operations">
                            <button class="opbtn" btn_id="<?php echo $item_data -> product_no .'update' ?>"
                            onclick="window.location.href='<?php echo URLROOT.'/sellers/update/'. $item_data -> product_no ?>';">Update</button>
                            <button class="opbtn del" type="submit" btn_id="<?php echo $item_data -> product_no.'delete' ?>">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>


<script>

    $("button").click(function(){
        var t = $(this).attr('btn_id');
        if(t.includes('delete')) {
            var delete_item_id = t.replace('delete', '');
            var delete_msg = delete_item_id.concat("delete_alert");
            let del = document.getElementById(delete_msg);
            del.classList.add("show_delete_alert");
        } else if(t.includes('correct')){
            var delete_item_id = t.replace('correct', '');
            var request = new XMLHttpRequest();
            var url = "http://localhost/gardening_hub/sellers/delete_item";
            var method = "POST";
            request.open(method, url, true);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.send("delete_item_id=" + delete_item_id);
            // alert(delete_item_id);
            window.location.reload();
        } else if(t.includes('worng')){
            var delete_item_id = t.replace('worng', '');
            var delete_msg = delete_item_id.concat("delete_alert");
            let del = document.getElementById(delete_msg);
            del.classList.add("hide_delete_alert");
            window.location.reload();
        }
    })

    let change_area = document.querySelector(".itemgrid");

    document.addEventListener('DOMContentLoaded', function () {
    var radioButtons = document.querySelectorAll('.select_cat');
    // console.log(radioButtons);
    radioButtons.forEach(function (radio) {
    radio.addEventListener("change", function () {
    var radioValue = document.querySelector('.select_cat:checked').value;
    // alert(radioValue);

      let httpRequest = new XMLHttpRequest();
      httpRequest.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                let response = JSON.parse(this.responseText);
                let search_result = "";
                console.log(response);
                if(response.length == 0)
                {
                    search_result += `
                        <div>
                            <div id='notfoundback'></div>
                            <img src="http://localhost/gardening_hub/img/seller/notfound.png" alt="Image" class='abdsampleitem' >
                            <h2 id='notfound_text'>Items can not found</h2>
                        </div>
                    `;
                }
                else
                {
                    for(let item of response){
                        search_result += `
                        <div class="sampleitem">
                        <div class="delete_alert" id="${item.product_no}delete_alert">
                        <p id="delete_msg">Do you want to permanetly delete this item</p>
                        <div class="icons">
                            <button class="cr_btn" btn_id="${item.product_no}correct" type="submit">
                                <i id="correct" class="fa-solid fa-circle-check"></i>
                            </button>
                            <button class="cr_btn" btn_id="${item.product_no}worng">
                                <i id="wrong" class="fa-solid fa-circle-xmark"></i>
                            </button>
                        </div>
                    </div>
                        <div class="sampleimg">
                            <a href="http://localhost/gardening_hub/sellers/show/${item.product_no}">
                            
                                <img src="http://localhost/gardening_hub/img/upload_images/product_cover_photo/${item.image}" alt="Image"> 
                                
                            </a>
                        </div>
                        <div class="first">
                            <h4 id="itemname">${item.title}</h4>
                            <div class="RatingStars" id="${item.product_no}">
                                <div class="stars-outer-below">
                                    <h5 id="num_ratings_bolow" class="num_ratings_bolow">
                                        ${((item.total_rating*1).toFixed(1))}
                                    </h5>
                                    <div class="stars-inner-below" style = "width : ${((item.total_rating*1).toFixed(1))*20}%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="second">
                            <div class="price">
                                <span>Rs. <stron>${item.price}</stron></span>
                            </div>
                            <div class="avi">
                                <h6>Available(${item.quantity})</h6>
                            </div>
                        </div>
                        <div class="operations">
                            <button class="button" btn_id="${item.product_no}update"
                            onclick="window.location.href='http://localhost/gardening_hub/sellers/update/${item.product_no}';">Update</button>
                            
                            <button class="button del" type="submit" btn_id="${item.product_no}delete">Delete</button>
                        </div>
                    </div>
                        `;
                    }
                }
                change_area.innerHTML = search_result;
            };
        }
        httpRequest.open('POST', "http://localhost/gardening_hub/sellers/radio_select", true);
        httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        httpRequest.send("category="+radioValue);
        // alert(radioValue);
    });
  });
});

        let selected_radio = document.querySelector(".all_items");
        selected_radio.addEventListener("change", function(){
            window.location.reload();
        });



// ---------------------------- Notification Hide ---------------------------//


let noti_count = document.getElementById("noti_count").innerHTML;
let noti_hidden = document.getElementById("noti");
//console.log(noti_count);
if(noti_count == 0){
    noti_hidden.classList.add("hide_noti");
}


// ----------------------------- Itemcard Rating Stars ------------------------//


// select all .RatingStars classes and save to star array
const star = document.querySelectorAll(".RatingStars");
console.log(star);
const stars_id = [];
// Add the id value of each selected classes to the array stars_id
for(let i=0; i<star.length; i++){
    const arr_val = star[i].id;
    stars_id.push(arr_val);
}

// select all h5 tag classes
const star_count = document.getElementsByTagName("h5");
const star_counts = [];
// Add value of each selected h5 tag to the array star_counts
for(let i=0; i<star_count.length; i++){
    const arr_content_num = star_count[i].textContent;
    //Convert to float value and convert to 1st place decimal number
    const arr_content_num_float = parseFloat(arr_content_num).toFixed(1);
    console.log(arr_content_num_float);
    star_counts.push(arr_content_num_float);
}

document.addEventListener('DOMContentLoaded', getRatings);


function getRatings(){
    for(let star_count in star_counts){
        // make rating value as percentage
        const starPercentage = `${(star_counts[star_count]/5) * 100}%`;
        console.log(starPercentage);
        const find = document.getElementById(stars_id[star_count]);
        // add that percentage value as with of 'stars-inner-below' class
        (find.childNodes[1].children[1]).style.width = starPercentage;
        find.childNodes[1].childNodes[1].innerHTML = "( "+star_counts[star_count]+" )";
    }
}
</script>

    <?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>