<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<style>

        body{
            background: linear-gradient(249.92deg, #0BAB64 12.2%, #3BB78F 99.01%);

        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }

        main{
            position: relative;
        }
        .checked {
            color: orange;
        }
        .sampleimg{
            width: 90%;
            height: 50%;
            border-radius: 10px;
            overflow: hidden;
            margin: 5px auto;
            background-size: 100% 100%;
        }

        .sampleimg > a> img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .itemcard{
            border: 2px dashed #00A778;
            cursor: pointer;
        }
        .itemcard,.sampleitem{
            width: 180px;
            height: 250px;

            align-content: center;
            text-align: center;
            border-radius: 10px;
            background-color:rgba(178,161,167,0.47);
         }
        .sampleitem{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding-bottom: 4px;
        }

        .delete_alert{
            width: 180px;
            height: 250px;
            align-content: center;
            text-align: center;
            border-radius: 10px;
            background-color:rgba(178,161,167,0.47);
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding-bottom: 4px;
            z-index: 100;
            position: absolute;
            backdrop-filter: blur(20px);
            visibility: hidden;
        }

        #delete_msg{
            padding: 10px;
            margin-top: 20px;
            color: #e5e5e5;
            font-weight: 1000;
        }

        .show_delete_alert {
            visibility: visible;
        }

        .hide_delete_alert {
            visibility: hidden;
        }

        main{
            display: flex;
            gap:20px;


        }
        .productmenu{
            padding: 20px 50px;
            flex-grow: 1;
            border: 1px solid white;
            border-radius: 10px 10px 10px 10px;
            background-color: #FBF8F3;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 550px;
        }
        .products{
            /* flex-grow: 10; */
            border: 1px solid white;
            padding: 20px 32px 20px 50px;
            border-radius: 10px 10px 10px 10px;
            background-color: #FBF8F3;
            height: 550px;

        }
        .itemgrid{
            
            display: grid;
            grid-gap:10px ;
            grid-template-columns: repeat(4, 1fr);
            overflow: scroll;
            overflow-x: hidden;
            height: 510px;
            padding-right: 15px;
        }
        .itemcard i{
            font-size: 40px;
            margin: 95px auto 5px auto;
            color: #00A778;
        }
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #00A778;
            border: 2px solid #00A778;
            color: white;
            text-align: center;
            cursor: pointer;
            font-family: 'Source Sans 3';
            font-style: normal;
            padding: 5px 10px;
            margin-top: 3px;

        }
        .price{
            font-size: 20px;
            font-weight: 900;
        }
        .del{
            background-color:rgba(178,161,167,0.47);
            border: 2px solid #ff253a;
            color: black;
        }
        .catlist{
            list-style: none;
            display: grid;
            grid-gap: 10px;
            overflow: scroll;
            overflow-x: hidden;
            padding: 0px;
            height: 220px;
        }
        .catgeories{
            background-color:rgba(178,161,167,0.47);
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0px;
        }
        .catgeories h4{
            margin: 10px 0px 20px 0px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            align-items: center;
        }
        .catlist input{
            margin-right: 10px;
            width: 20px;
        }
        .catlist li{
            font-size: 20px;
            margin: 7px;
        }
        #cusorder,#genreport{
            width: 100%;
            padding :20px 30px;
            font-size: 20px;
            height: 70px;
        }
        #genreport{
            background-color: white;
            color: black;
        }

        .add{
            background-color: white;
            color: green;
            padding: 5px 20px;
            border-radius: 100%;
            text-align: center;
            display: inline-block;
            font-size: 50px;
            margin: 10px 10px;
            cursor: pointer;
            text-decoration:none;
            font-weight: 900;
        }

        .itemgrid::-webkit-scrollbar {
            width: 15px;
        }

        .itemgrid::-webkit-scrollbar-track {
            background: #FFFFFF;
            border-radius: 100vw;
        }

        .itemgrid::-webkit-scrollbar-thumb {
            background: #1d976cb2;
            border-radius: 100vw;
            border: 3px solid #FFFFFF;
            padding: 10px;
        }

        .catlist::-webkit-scrollbar {
            width: 15px;
        }

        .catlist::-webkit-scrollbar-track {
            background: #FFFFFF;
            border-radius: 100vw;
        }

        .catlist::-webkit-scrollbar-thumb {
            background: #1d976cb2;
            border-radius: 100vw;
            border: 3px solid #FFFFFF;
            padding: 10px;
        }

        i{
            font-size: 40px;
            padding: 15px;
        }

        #correct{
            color: #00A778;
            cursor: pointer;
        }
        
        #wrong{
            color: #ff4c4c;
            cursor: pointer;
        }

        .cr_btn{
            border:none;
            background: none;
        }

        i#correct:hover, i#correct:active {font-size: 350%;}
        i#wrong:hover, i#wrong:active {font-size: 350%;}

    </style>


<div class="container">
    <main>
        <div class="productmenu">
            <button class="button" id="cusorder" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/order';"> Customers Orders</button>
            <div class="catgeories">
                <h4>Categories</h4>
                <ul class="catlist">
                    <li class="dddd"><input type="radio" class="all_items" name="ch1" id="ch1" value="" checked>All</li>
                    <span class="checkmark"></span>
                    <?php foreach($data['catData'] as $cat_data) : ?>
                        <li class="dddd"><input type="radio" class="select_cat" name="ch1" id="select_cat" value="<?php echo $cat_data -> product_category; ?>"><?php echo $cat_data -> product_category; ?></li>
                        <span class="checkmark"></span>
                    <?php endforeach; ?>
                </ul>

            </div>
            <input type="button" class="button" id="genreport" value="View Genarate Report">

        </div>
        <div class="products">

            <div class="itemgrid">
                <div class="itemcard">
                    <br><br>Add item<br><br>
                    <a href="<?php echo URLROOT; ?>/sellers/add1" class="add">+</a><br>
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
                        <h4><?php echo $item_data -> title; ?></h4>
                        <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                       
                        <div class="price">
                            <span>Price <stron><?php echo $item_data -> price; ?></stron></span>
                        </div>
                        <div class="operations">
                            <button class="button" btn_id="<?php echo $item_data -> product_no .'update' ?>"
                            onclick="window.location.href='<?php echo URLROOT.'/sellers/update/'. $item_data -> product_no ?>';">Update</button>
                            <button class="button del" type="submit" btn_id="<?php echo $item_data -> product_no.'delete' ?>">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script>

    // function ajax(div){
    //     var delete_item_id = div.getAttribute("btn_id");
    //     console.log(delete_item_id);
    //     var ajax = new XMLHttpRequest();
    //     ajax.onreadystatechange=function(){
    //         if(this.readyState==4 && this.status==200){
    //             console.log(this.responseText);
    //         }
    //     }
    //     ajax.open("POST","../sellers/delete");
    //     ajax.send("delete_item_id" + delete_item_id)


    // }
    $("button").click(function(){
        var t = $(this).attr('btn_id');
        if(t.includes('delete')) {
            var delete_item_id = t.replace('delete', '');
            var delete_msg = delete_item_id.concat("delete_alert");
            let del = document.getElementById(delete_msg);
            del.classList.add("show_delete_alert");
            // var request = new XMLHttpRequest();
            // var url = "http://localhost/gardening_hub/sellers/delete_item";
            // var method = "POST";
            // request.open(method, url, true);
            // request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // request.send("delete_item_id=" + delete_item_id);
            // alert(delete_item_id);
            // window.location.reload();
        } else if(t.includes('correct')){
            var delete_item_id = t.replace('correct', '');
            var request = new XMLHttpRequest();
            var url = "http://localhost/gardening_hub/sellers/delete_item";
            var method = "POST";
            request.open(method, url, true);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.send("delete_item_id=" + delete_item_id);
            alert(delete_item_id);
            window.location.reload();
        } else if(t.includes('worng')){
            var delete_item_id = t.replace('worng', '');
            var delete_msg = delete_item_id.concat("delete_alert");
            let del = document.getElementById(delete_msg);
            del.classList.add("hide_delete_alert");
            window.location.reload();
        }
    })

    // $("button").click(function(){
    //     var t = $(this).attr('btn_id');
    //     if(t.includes('delete')) {
    //         var delete_item_id = t.replace('delete', '');
    //         // var delete_msg = delete_item_id.concat("delete_alert");
    //         var request = new XMLHttpRequest();
    //         var url = "http://localhost/gardening_hub/sellers/delete_item";
    //         var method = "POST";
    //         request.open(method, url, true);
    //         request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //         request.send("delete_item_id=" + delete_item_id);
    //         alert(delete_item_id);
    //         window.location.reload();
    //     }
    // })


    // $(document).ready(function(){
    //     $('.radio').click(function(){
    //         var radio_value = $('.radio:checked').val();
    //         alert(radio_value);
    //         var request = new XMLHttpRequest();
    //         var url = "http://localhost/gardening_hub/sellers/radio_select";
    //         var method = "POST";
    //         request.open(method, url, true);
    //         request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //         request.send("radio_value=" + radio_value);
    //     });
    // })
    
    // let selected_radio = document.querySelector(".all_items");
    // let change_area = document.querySelector(".itemgrid");

    // selected_radio.addEventListener("change", function()
    // {
    //     let httpRequest = new XMLHttpRequest();
    //     let selected_category = this.value;

    //     httpRequest.onreadystatechange = function()
    //     {
    //         if(this.readyState == 4 && this.status == 200)
    //         {
    //             let response = JSON.parse(this.responseText);
    //             let search_result = "";
    //             if(response.length == 0)
    //             {
    //                 search_result += `
    //                     <div class='empty_record' >
    //                         <h2>Items can not found</h2>
    //                     </div>
    //                 `;
    //             }
    //             else
    //             {
    //                 for(let item of response){
    //                     search_result += `
    //                     <div class="sampleitem">
    //                 <div class="delete_alert" id="${item.product_no}delete_alert">
    //                     <p id="delete_msg">Do you want to permanetly delete this item</p>
    //                     <div class="icons">
    //                         <button class="cr_btn" btn_id="${item.product_no}correct" type="submit">
    //                             <i id="correct" class="fa-solid fa-circle-check"></i>
    //                         </button>
    //                         <button class="cr_btn" btn_id="${item.product_no}worng">
    //                             <i id="wrong" class="fa-solid fa-circle-xmark"></i>
    //                         </button>
    //                     </div>
    //                 </div>
    //                     <div class="sampleimg">
    //                         <a href="http://localhost/gardening_hub/sellers/show/${item.product_no}">
                            
    //                             <img src="http://localhost/gardening_hub/sellers/show/${item.image}" alt="Image"> 
    //                         </a>
    //                     </div>
    //                     <h4>${item.title}h4>
                        
    //                     <div class="ratings">
    //                         <span class="fa fa-star checked"></span>
    //                         <span class="fa fa-star checked"></span>
    //                         <span class="fa fa-star checked"></span>
    //                         <span class="fa fa-star"></span>
    //                         <span class="fa fa-star"></span>
    //                     </div>
                       
    //                     <div class="price">
    //                         <span>Price <stron>${item.price}</stron></span>
    //                     </div>
    //                     <div class="operations">
    //                         <button class="button" btn_id="${item.price}update"
    //                         onclick="window.location.href='http://localhost/gardening_hub/sellers/update/${item.product_no}';">Update</button>
                            
    //                         <button class="button del" type="submit" btn_id="${item.product_no}delete">Delete</button>
    //                     </div>
    //                 </div>
    //                     `;
    //                 }
    //             }
    //             container.innerHTML = search_result;
    //         };
    //     }
    //     httpRequest.open('POST', "http://localhost/gardening_hub/sellers/radio_select", true);
    //     httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    //     httpRequest.send("category="+selected_category);
    //     alert(selected_category);
    // });

    let change_area = document.querySelector(".itemgrid");

    document.addEventListener('DOMContentLoaded', function () {
    var radioButtons = document.querySelectorAll('.select_cat');
    console.log(radioButtons);
    radioButtons.forEach(function (radio) {
    radio.addEventListener("change", function () {
      var radioValue = document.querySelector('.select_cat:checked').value;
    //   alert(radioValue);

      let httpRequest = new XMLHttpRequest();
      httpRequest.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                let response = JSON.parse(this.responseText);
                let search_result = "";
                if(response.length == 0)
                {
                    search_result += `
                        <div class='empty_record' >
                            <h2>Items can not found</h2>
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
                        <h4>${item.title}</h4>
                        
                        <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                       
                        <div class="price">
                            <span>Price <stron>${item.price}</stron></span>
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

</script>

    <?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>