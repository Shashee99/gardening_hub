<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <title>Administrator</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/admin/admin_main.css">
</head>
<body>
<div class="sidebar">
    <div class="photo">
        <img src="<?= URLROOT;?>/img/admin/logo.png" alt="" class="photologo">
    </div>
    <div class="navlinks">
        <ul>
            <li class="<?php echo (($data['nav']=='home') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/admins/home" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/window.png" alt="">
                    <p class="navtex">Dashboad</p>
                </a>

            </li>
            <li  class="<?php echo (($data['nav']=='customers') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/admins/customers" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/person.png" alt="">
                    <p class="navtex">Customers</p>
                </a>

            </li>
            <li  class="<?php echo (($data['nav']=='sellers') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/admins/sellers" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/storefront.png" alt="">
                    <p class="navtex">Sellers</p>
                </a>

            </li>
            <li  class="<?php echo (($data['nav']=='advisors') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/admins/advisors" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/local_library.png" alt="">
                    <p class="navtex">Advisors</p>
                </a>

            </li>
            <li  class="<?php echo (($data['nav']=='categories') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/admins/productcategories" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/sell.png" alt="">
                    <p class="navtex">Product Categories</p>
                </a>

            </li>
            <li  class="<?php echo (($data['nav']=='complain') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/admins/complains" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/comment.png" alt="">
                    <p class="navtex">Complaints</p>
                </a>

            </li>
            <li  class="<?php echo (($data['nav']=='logout') ? 'liactive' : '')?>">

                <a href="<?php echo URLROOT;?>/users/logout" class="navlinkcontain">
                    <img src="<?= URLROOT;?>/img/admin/icon/logout.png" alt="">
                    <p class="navtex">Log out</p>
                </a>

            </li >

        </ul>
    </div>
</div>
<div class="rightbar">
    <div class="navbar">
        <div class="nav-container">
            <h1 class="sidebarheader"><?php echo $data['title'];?></h1>
            <div class="profiles" >
                <div class="notiout"  id="notbtn">
                    <img src="<?= URLROOT;?>/img/admin/icon/Icon-color.png" alt="" class="bell">
                    <div class="notibellcount" id="bellnoti"><h5 id="numofnotifications"></h5></div>
                </div>

                <div class="profileinfo">
                    <h3>Admin</h3>
                    <div class="admindp">
                        <img src="<?= URLROOT;?>/img/admin/admindp.png" alt="" class="adminavatar">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr class="navsplitter">
    <div class="contain">

