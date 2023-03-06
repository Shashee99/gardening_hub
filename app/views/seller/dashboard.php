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
        
    </style>


<div class="container">
    <main>
        <div class="productmenu">
            <button class="button" id="cusorder" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/order';"> Customers Orders</button>
            <div class="catgeories">
                <h4>Categories</h4>
                <ul class="catlist">
                    <li><input type="radio" class="radio" name="ch1" id="ch1" value="" checked>All</li>
                    <?php foreach($data['catData'] as $cat_data) : ?>
                        <li><input type="radio" class="radio" name="ch1" id="ch1" value="<?php echo $cat_data -> product_category; ?>"><?php echo $cat_data -> product_category; ?></li>
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
                            <button class="button del" btn_id="<?php echo $item_data -> product_no .'delete' ?>">Delete</button>
                            <!-- <input type="button" class="button" value="Update" btn_id="<?php echo $item_data -> product_no .'update' ?>">
                            <input type="button" class="button del" value="Delete" btn_id="<?php echo $item_data -> product_no .'delete' ?>"> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.radio').click(function(){
            var radio_value = $('.radio:checked').val();
            
            if(radio_value != '') {
                load_content("all", radio_value);
            }
            else {
                load_content();
            }
            load_content();
        });
    })

    function load_content(type, radio_value) {
        $.ajax({
            url: "http://localhost/gardening_hub/Seller",
            method: "POST",
            data: {type: type, radio_value: radio_value},
            success: function(data) {
                $('tbody').html(data);
            }
        });
    }
</script>

    <?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>