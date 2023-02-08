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
    <title>My Progress</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/myprogress.css">
</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="filter-options">
            <div class="btn" id="btn1">
                    <a href="<?= URLROOT; ?>/progresses/viewMyProgress">MY Harvest</a>
            </div>
            <div class="btn" id="btn2">
                <a href="#">Other Harvest</a>
            </div>
        
            <div class="selectcat">
                <select name="category" id="category">
                    <option value="">All</option>
                    <option value="vegetable">Vegetable</option>
                    <option value="fruits">Fruits</option>
                    <option value="flowers">Flowers</option>
                </select>
            </div>
        </div>
        <div class="progress-add">
            <a href="<?= URLROOT; ?>/progresses/addProgress">
                <div class="progress-border">
                    Add Progress +
                </div>
            </a>
        </div>
        
            


    </section>

</body>
</html>