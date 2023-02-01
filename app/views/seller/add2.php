<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add item</title>
    <link rel="stylesheet" href="./assets/fonts/css/all.css">
    <style>

        body{
            background-color: #00A778;

        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }
        .container{
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            z-index: 12;
        }

        /*nav bar styling*/
        .logo{
            background: url("<?php echo URLROOT; ?>img/logo.png");
            width: 158px;
            height: 148px;

        }
        #navul{
            list-style: none;
            display: flex;
            padding: 55px 0px
        }
        ul>li>a{

            font-family: 'Source Sans 3';
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            letter-spacing: 0.08em;
            text-decoration: none;
            padding: 10px;
            margin-right: 10px;

            color: #000000;
        }
        ul>li>a:hover{
            border-bottom: 5px solid #EAFFD0 ;
        }
        nav{
            display: flex;
        }
        body::after{
            content: "";
            position: absolute;
            height: 80vh;
            width: 100%;
            bottom: 0;
            background-color: white;
            border-radius: 20px 20px 0px 0px;
            background: rgba(251, 248, 243, 0.65);
            z-index: -4;

        }

        /* main::before {
            content: url("<?php echo URLROOT; ?>img/img1.png");
            z-index: -10;
            left: 10;
        } */
                main{
            position: relative;
        }

        /*progressive bar*/
        .progressivebar{
            color: white;
        }
        form>ul{
            list-style: none;
            display: flex;
            justify-content: space-around;

        }
        form>*>li{

            font-family: 'Mulish';
            font-style: normal;
            font-weight: 800;
            font-size: 13px;
            position: relative;
            letter-spacing: 4px;


        }
        form>*>li:nth-child(1){
            color: var(--bgcolor,rgba(31,252,4,0.87));
        }
        form>*>li:nth-child(2){
            color: var(--bgcolor0,white);
        }
        form>*>li:nth-child(3){
            color: var(--bgcolor1,white);
        }
        form>*>li:nth-child(1):before{
            left: 35px;
            display: block;
            position: relative;
            font: var(--fa-font-solid);
            font-weight: 900;
            /* right: -16px; */
            font-size: 40px;
            content: "\f055";
            color: var(--bgcolor,rgba(31,252,4,0.87));
        }
        form>*>li:nth-child(2):before{
            color: var(--bgcolor0,white);
            left: 35px;
            display: block;
            position: relative;
            font: var(--fa-font-solid);
            font-weight: 900;
            /* right: -16px; */
            font-size: 40px;
            content: "\f784";
        }
        form>*>li:nth-child(3):before{
            color: var(--bgcolor,white);
            left: 9px;
            display: block;
            position: relative;
            font: var(--fa-font-solid);
            font-weight: 900;
            /* right: -16px; */
            font-size: 40px;
            content: "\f030";
        }
        form>*>li:nth-child(1):after{
            content: '';
            width: 351px;
            /* height: 1px; */
            border-top: 2px dashed ;
            border-color:var(--bgcolor0,white);
            position: absolute;
            top: 20px;
            z-index: -1;
            left: 71px;
        }
        form>*>li:nth-child(2):after {
            content: '';
            width: 336px;
            /* height: 1px; */
            border-top: 2px dashed;
            border-color:var(--bgcolor1,white);
            position: absolute;
            top: 20px;
            z-index: -1;
            left: 71px;
        }
        .additem1{

            position: relative;
            top: 50px;
        }
        .checklist-inner{
            font-family: 'Work Sans';
            font-style: normal;
            font-weight: 400;
            font-size: 30px;

            align-items: center;
            letter-spacing: -0.02em;
        }
        .additem1>h3{
            margin-bottom: 20px;
            font-family: 'Work Sans';
            font-style: normal;
            font-weight: 700;
            font-size: 34px;
            line-height: 40px;
            letter-spacing: -0.02em;
        }
        .checklist{
            padding: 10px 20px;
           display: flex;
            justify-content: space-around;
            border: 2px solid #00A778;

        }
        input[type='checkbox']{
            width: 30px;
            height: 30px;
        }
        .checklistgroup{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 20px;
        }
        .buttonarea{
            display: flex;
            justify-content: space-around;
        }
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #00A778;
            border: none;
            color: white;
            text-align: center;
            padding: 15px 30px;
            cursor: pointer;
            margin: 23px 0px 0px 0px;
            font-family: 'Source Sans 3';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            border-radius: 10px;
        }
        button:hover{
          background-color: #008284;
        }
        .btn2:hover{
            background-color: #008284;
        }

        /*add item 2  styling*/
        .additem2{

            position: relative;
            top: 50px;
        }
        .inputgroup{
            display: grid;
            grid-gap: 30px;
            grid-template-columns: 60% 40%;
        }
        .inputgroup label{
            font-family: 'Work Sans';
            font-style: normal;
            font-weight: 200;
            font-size: 25px;
            line-height: 38px;
            display: flex;
            align-items: center;
            letter-spacing: -0.02em;

            color: #000000;
        }

        input[type="text"]{
            width: 90%;
            height: 50px;
            font-size: 20px;
            border-radius: 10px;
            background: rgba(239, 239, 239, 0.7);
            border: 0.833333px dashed #00A778;
        }
        #description{
            height: 150px;
        }
        .additem3{
            display: none;
            position: relative;
            top: 35px;
        }
        
        .centerdiv{
            text-align:center ;
            align-items: center;
            width: max-content;
            height: max-content;
            position: absolute;
            margin: auto;
            top: 280px;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .done
        {
            width:1200px;
            height:400px;
            position: relative;
        }
        .imgsucces{
            background: url(assets/succes.png);
            width: 350px;
            /* height: auto; */
            height: 270px;
            /* height: max-content; */
            background-repeat: no-repeat;
            background-size: 100%;


        }

        .btn{
            background-color: white;
            color: green;
            padding: 5px 10px;
            border-radius: 50px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            text-decoration:none;
            margin-left: 500px;
        }
    </style>
</head>

<body>

<div class="container">
    <nav>
        <div class="logo"></div>
        <div class="navs">
            <ul id="navul">
                <li><a href="<?php echo URLROOT; ?>">Home</a></li>
                <li><a href="<?php echo URLROOT; ?>pages/about">About</a></li>
                <li><a href="<?php echo URLROOT; ?>pages/contactus">Contact Us</a></li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                <li><li><a href="<?php echo URLROOT; ?>users/logout" class="btn">Logout</a></li></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main>
    <form action="<?php echo URLROOT; ?>/sellers/add2" method="post">
            <section class="additem2" id="additem2">
                <div class="inputgroup">
                <form action="<?php echo URLROOT; ?>/sellers/add2" method="post" >
                    <input type="text" name="cat" value="<?= $data['selected_category'] ;?>  "hidden>
                    <input type="text" name="subcat" value="<?= $data['selected_subcategory'];?>  " hidden>
        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" value="<?php echo $data['title']; ?>">
            <p style="color:red" class="error title_err"> <?php echo '* '.$data['title_err']; ?> </p>
            
        </div>
        <div>
            <label for="quantity">Quantity</label><br>
            <input type="text" name="quantity" id="quantity" value="<?php echo $data['quantity']; ?>">
            <p style="color:red"  class="error quantity_err"> <?php echo '* '.$data['quantity_err']; ?> </p>
        </div>
        <div>
            <label for="description">Description</label><br>
            <input type="text" name="description" id="description" value="<?php echo $data['description']; ?>">
        </div>

        <div>
            <label for="price">Price</label><br>
            <input type="text" name="price" id="price" value="<?php echo $data['price']; ?>">
            <p style="color:red" class="error price_err"> <?php echo '* '.$data['price_err']; ?> </p>
            <input type="button" class="button btn2" id="prev" value="Previous">

            <a href="<?php echo URLROOT; ?>/sellers/add3" class="btn1" id="btn" type="submit">
                <input type="submit" class="button btn2" id="nxt2" value="Next">
            </a>
        </div>
        <div>
            
        </div>
    </form>

                </div>
            </section>
            </form>
    </main>

</div>

</body>

</html>