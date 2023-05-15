<?php


?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/sidebar.css">
    </head>
    <body>
        <div class="logo">
            <img src="<?php echo URLROOT; ?>/img/customer/logo2.png " alt="">
        </div>
            
        <div class="navigation">
            <div class="item" id="item1">
                <li>
                    <a href="<?php echo URLROOT; ?>/customers/viewHomePage">
                        <img src="<?php echo URLROOT; ?>/img/customer/dashboard1.png" alt="">
                        <span class="title">Home Page</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item2">
                <li>
                    <a href="<?php echo URLROOT; ?>/products/viewProducts">
                        
                        <img src="<?php echo URLROOT; ?>/img/customer/box.png" alt="">
                        <span class="title">Products</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item3">
                <li>
                    <a href="<?php echo URLROOT; ?>/wishlists/viewWishlist">
                        
                        <img src="<?php echo URLROOT; ?>/img/customer/shopping-cart1.png" alt="">
                        
                        <span class="title">Wishlist</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item4">
                <li>
                    <a href="<?php echo URLROOT; ?>/progresses/viewMyProgress">
                    
                        <img src="<?php echo URLROOT; ?>/img/customer/goal1.png" alt="">
                        
                        <span class="title">Progress</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item5">
                <li>
                    <a href="<?php echo URLROOT; ?>/harvests/viewAddMyHarvest">
                        
                        <img src="<?php echo URLROOT; ?>/img/customer/harvest1.png" alt="">
                        
                        <span class="title">Harvest</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item6">
                <li>
                    <a href="<?php echo URLROOT; ?>/problems/viewProblems">
                    
                        <img src="<?php echo URLROOT; ?>/img/customer/doubts-button.png" alt="">
                    
                        <span class="title">Problems</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item7">
                <li>
                    <a href="<?php echo URLROOT; ?>/advisors/viewAdvisors">
                    
                        <img src="<?php echo URLROOT; ?>/img/customer/advisor1.png" alt="">
                        
                        <span class="title">Advisors</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item8">
                <li>
                    <a href="<?php echo URLROOT; ?>/agriCenters/viewAgriCenters">

                        <img src="<?php echo URLROOT; ?>/img/customer/warehouse1.png" alt="">
                    
                        <span class="title">Agri Centers</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item9">
                <li>
                        <a href="<?php echo URLROOT; ?>/chats/chatforum">
                        
                            <img src="<?php echo URLROOT; ?>/img/customer/chat1.png" alt="">
                            
                            <span class="title">Chat Forum</span>
                        </a>
                    </li>
            </div>
            <div class="item" id="item10">
                <li>
                    <a href="<?php echo URLROOT; ?>/newTechs/viewNewTech">
                        
                        <img src="<?php echo URLROOT; ?>/img/customer/sustainable-energy1.png" alt="">
                        
                        <span class="title">Technologies</span>
                    </a>
                </li>
            </div>
            <div class="item" id="item11">
                <li>
                    <a href="<?php echo URLROOT; ?>/reports/viewreports">
        
                        <img src="<?php echo URLROOT; ?>/img/customer/stats.png" alt="">
                        
                        <span class="title">Reports</span>
                    </a>
                </li>
            </div>

        </div>
        <div class="top-bar">
            <div class="menu">
                <img src="<?php echo URLROOT; ?>/img/customer/menu3.png" alt="">
            </div>
            <div class="items">
                <h3><?= $_SESSION['cus_name']; ?></h3>
                <div class="p-photo">
                    <a href="<?= URLROOT; ?>/customers/myprofile/<?= $_SESSION['cus_id']; ?>">
                        <img src="<?php echo URLROOT; ?>/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                    </a>
                </div>
                <a href="<?= URLROOT;?>/users/logout">
                    <img src="<?php echo URLROOT; ?>/img/customer/log-out.png" alt="">
                </a>
            </div>
            
        </div>

        
        



    

    </body>

    
</html>