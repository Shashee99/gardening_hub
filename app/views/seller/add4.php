<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add item</title>
    <style>

        body{
            background: linear-gradient(259.77deg, rgba(255, 195, 113, 0.8) 6.57%, rgba(255, 95, 109, 0.8) 100%);

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
            height: 70vh;
            width: 100%;
            bottom: 0;
            border-radius: 20px 20px 0px 0px;
            z-index: -4;
            background: #FBF8F3;
            opacity: 0.65;
        }
        main{
            position: relative;
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
           
            width: 320px;
            /* height: auto; */
            height: 300px;
            /* height: max-content; */
            background-repeat: no-repeat;
            background-size: 100%;
            margin-top: 0px;
            margin-bottom: 30px;
          
        }

        .btn1 {
            background-color: #00A778;
            color: green;
            border-radius: 50px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 23px 0px 0px 0px;
            cursor: pointer;
            text-decoration:none;
            border-radius: 10px;
            border: none;
            color: white;
            text-align: center;
            padding: 15px 30px;
            cursor: pointer;
            font-family: 'Source Sans 3';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;    
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
            <section class="done" id="done">
                <div class="centerdiv">
                    <div class="imgsucces">
                        <img src="<?php echo URLROOT; ?>/img/seller/succes.png" width = "100%" height ="100%" alt="">
                    </div>
                    <h4 class="succestxt">
                        Your item was succesfully added!
                    </h4>
                    <!-- <input type="button" class="button" value="View your item"> -->
                    <a href="<?php echo URLROOT; ?>/sellers/dashboard" class="btn1">View your item</a>
                </div>
            </section>
</body>

</html>