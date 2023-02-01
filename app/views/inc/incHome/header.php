<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view<port"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/LandingPage/landing_page_main.css">
    <title><?php echo $data['title'];?></title>


</head>
<body>
<header>
    <div class="navbar">
        <div class="container bgtransparent">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/landingPage/log.png" alt="logo" width="100%" height="100%">
            </div>
            <div class="navs">
                <ul>
                    <li class=""><a class="fontgreen" href="<?php echo URLROOT; ?>/pages/index">
                            <div class="icon"><img src="<?php echo URLROOT; ?>/img/landingPage/Vector.png" alt=""
                                                   width="100%" height="100%"></div>
                            Home</a></li>
                    <li class=""><a href="<?php echo URLROOT; ?>/pages/product">
                            <div class="icon"><img src="<?php echo URLROOT; ?>/img/landingPage/Vector (1).png" alt=""
                                                   width="100%" height="100%"></div>
                            Products</a></li>
                    <li class=""><a href="<?php echo URLROOT; ?>/pages/index">
                            <div class="icon"><img src="<?php echo URLROOT; ?>/img/landingPage/Vector (4).png" alt=""
                                                   width="100%" height="100%"></div>
                            Advisors</a></li>
                    <li class=""><a href="<?php echo URLROOT; ?>/pages/about">
                            <div class="icon"><img src="<?php echo URLROOT; ?>/img/landingPage/Vector (3).png" alt=""
                                                   width="100%" height="100%"></div>
                            About</a></li>
                </ul>
            </div>
            <div class="signup flex">
                <a href="<?php echo URLROOT; ?>/pages/signup" class="btn">Sign up</a>
                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn_green">Log in</a>
            </div>
        </div>
    </div>

</header>