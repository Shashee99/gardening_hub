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
<section id="side">
        <div class="logo">
            <img src="<?php echo URLROOT; ?>/img/customer/logo2.png " alt="logo">
        </div>
        <div class="items">
            <li><img src="<?php echo URLROOT; ?>/img/customer/dashboard.png" alt=""><a href="<?php echo URLROOT; ?>/customers/viewHomePage">Dashboard</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/product.png" alt=""><a href="<?php echo URLROOT; ?>/products/viewProducts">Products</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/wishlist.png" alt=""><a href="<?php echo URLROOT; ?>/wishlists/viewWishlist">Wishlist</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/advisor.png" alt=""><a href="./advisor.php">Advisors</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/agri_center.png" alt=""><a href="./agricenter.php">Agri Centers</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/harvest.png" alt=""><a href="<?php echo URLROOT; ?>/harvests/viewAddMyHarvest">Harvest</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/progress.png" alt=""><a href="<?php echo URLROOT; ?>/progresses/viewMyProgress">Progress</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/problem.png" alt=""><a href="<?php echo URLROOT; ?>/problems/viewProblems">Problem Forum</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/chat.png" alt=""><a href="./chat.php">Chat Forum</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/new.png" alt=""><a href="<?php echo URLROOT; ?>/newTechs/viewNewTech">Technologies</a></li>
            <li><img src="<?php echo URLROOT; ?>/img/customer/report.png" alt=""><a href="./report.php">Reports</a></li>

        </div>

    </section>
</body>
</html>