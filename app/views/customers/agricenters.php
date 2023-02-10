<?php
    if(!isset($_SESSION['cus_id']))
    {
        redirect('users/login');
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/agricenter.css">
</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">

        <div class="search-bar">
            <div class="search-img">
                <img src="<?= URLROOT; ?>/img/customer/search.png" alt="">
            </div>
            <input type="text" placeholder="Search">
        </div>

    </section>
    
</body>
</html>