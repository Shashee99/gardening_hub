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

        .sampleimg > img {
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
        }
        .products{
            flex-grow: 10;
            border: 1px solid white;
            padding: 20px 50px;
            border-radius: 10px 10px 10px 10px;
            background-color: #FBF8F3;

        }
        .itemgrid{
            overflow: scroll;
            display: grid;
            grid-gap:10px ;
            grid-template-columns: repeat(4, 1fr);
            overflow-x: hidden;

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


        }
        .catgeories{
            background-color:rgba(178,161,167,0.47);
            border-radius: 10px;
            padding: 20px;
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
            height: 20px;
        }
        .catlist li{
            font-size: 20px;
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
        
    </style>


<div class="container">
    <main>
        <div class="productmenu">
            <input type="button" class="button" id="cusorder" value="Cutomer Orders">
            <div class="catgeories">
                <h4>Categories</h4>
                <ul class="catlist">
                    <li><input type="checkbox" name="ch1" id="ch1">Plants</li>
                    <li><input type="checkbox" name="ch2" id="ch2">Gardening</li>
                    <li><input type="checkbox" name="ch3" id="ch3">Seeds</li>
                    <li><input type="checkbox" name="ch4" id="ch4">Others</li>
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
                            <img src="<?=URLROOT;?>/img/upload_images/product_cover_photo/<?=$item_data->image;?>" alt="Image">
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
                            <input type="button" class="button" value="Update">
                            <input type="button" class="button del" value="Delete">
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>

    <?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>