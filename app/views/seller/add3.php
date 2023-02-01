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
            background: url("assets/logo.png");
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
            background: rgba(251, 248, 243, 0.65);
            border-radius: 20px 20px 0px 0px;
            z-index: -4;
        }
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
            grid-gap: 20px;
            grid-template-columns: 60% 40%;
        }
        .inputgroup label{
            font-family: 'Work Sans';
            font-style: normal;
            font-weight: 400;
            font-size: 32px;
            line-height: 38px;
            display: flex;
            align-items: center;
            letter-spacing: -0.02em;

            color: #000000;
        }

        input[type="text"]{
            width: 90%;
            height: 50px;
            font-size: 45px;
        }
        #description{
            height: 150px;
        }
        .additem3{
            display: block;
            position: relative;
            top: 35px;
        }

        .photoarea{
            width: 1100px;
            height: 300px;
            position: relative;
            top: 10px;
            border: 4px dashed #00A778;
            display: flex;
        }
        .photoarea>div{
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .photoarea div:nth-child(1){
            flex-grow: 1;
        }
        .photoarea div:nth-child(2){
            flex-grow: 5;
        }
        #coverphoto{
            position: relative;
         border-right:4px dashed #00A778;
            flex-grow: 1;

        }
        .samplephotoare{
            flex-grow: 9;
            position: relative;
        }
        #image,#cover_photo{
            display: none;
        }
        .photoarea>*>label{
            padding: 20px 10px;
            width: max-content;
            height: max-content;
            border: 1px solid #00A778;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 20px;
            letter-spacing: 0.01em;
        }
        .photoarea>*>label>i{
            margin-top: 12px;
            font-size: 50px;
            text-align: center;
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

      <section class="additem3" id="additem3">
                    <h3>Add item photos (Max 10)</h3>
                    <form action="<?php echo URLROOT; ?>/sellers/add3" method="post" class="imageForm" enctype="multipart/form-data">


                        <input type="text" name="cat" value="<?= $data['category']?>" hidden>
                        <input type="text" name="subcat" value="<?= $data['subcategory']?>" hidden>
                        <input type="text" name="title" value="<?= $data['title']?>" hidden>
                        <input type="text" name="quantity" value="<?= $data['quantity']?>" hidden>
                        <input type="text" name="description" value="<?= $data['description']?>" hidden>
                        <input type="text" name="price" value="<?= $data['price']?>" hidden>

                <div class="photoarea">
                
                    <div id="coverphoto">
                        <label for="image"><i class="fa-solid fa-upload"></i><br>Cover Photo</label>
                        <input type="file" name="image" id="image"><br>
                        <p class="error image_err" style="color:red"> <?php echo '* '.$data['image_err']; ?> </p>
                    </div>
                    <div class="samplephotoare">
                        <label for="cover_photo"><i class="fa-solid fa-upload"></i><br>Other Photo</label>
                        <input type="file" name="cover_photos[]" id="cover_photo" multiple>
                        <p class="error photo_err" style="color:red"> <?php echo '* '.$data['photo_err']; ?> </p>
                        <br>
                    </div>
                </div>
                <div>
                    <input type="button" class="button btn2" id="prev2" value="Previous">
                    <input type="submit" class="button btn2" name="save_user" id="fin" value="Finish"><br>
                </div>
                
            
            </form>
            </section>
    </main>

</div>

</body>

</html>