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
    <title>Problems</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/problem.css">
</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest" id="blur">
        <div class="problem-filter">
            <select name="category" id="category">
                <option value="">All</option>
                <option value="Bonzzai">Bonzzai</option>
                <option value="Hybrid Plantation">Hybrid Plantation</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="problem-add">
            <div class="border" onclick="problemaddModel();">
                <a href="<?= URLROOT; ?>/problems/addProblems">Add a new problem</a>
            </div>
        </div>
        <?php flash("problem_add_successfuly"); ?>
        <div class="problem-wraper">
        <?php foreach ($data as $problems) { ?>
                <div class="problem-card">
                    <div class="problem">
                        <div class="user-info">
                            <div class="photo">
                                <img src="<?= URLROOT; ?>/public/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                            </div>
                            <div class="name-date-time">
                                <h5><?= $_SESSION['cus_name']; ?></h5>
                                <h6><?= $problems['date']; ?></h6>

                            </div>
                        </div>
                        <h3><?= $problems['title']; ?></h3>
                        <div class="problem-content">
                            <p>
                                <?= $problems['content']; ?>
                            </p><br>

                        </div>
                        <div class="problem-image">
                                <?php
                                foreach($problems['photos'] as $row1)
                                {
                                ?>
                                    <img src="<?= URLROOT; ?>/img/upload_images/problem_photo/<?= $row1 ; ?>" alt="">
                                <?php   
                                }
                                ?>
                        </div>
                        
                        <a href="<?= URLROOT; ?>/problems/viewOneProblem/<?= $problems['id']; ?>">
                            <div class="reply-link">
                                <img src="<?= URLROOT; ?>/img/customer/reply.png" alt="">
                                <img id="green" src="<?= URLROOT; ?>/img/customer/reply_1.png" alt="">
                                <span>Replies...</span>
                            </div>
                        </a><br>

                    </div>
                </div>
            <?php } ?>

        
        </div>

        </div>
        <script src="http://localhost/gardening_hub/js/customer/menu-bar-toogle.js"></script>

</body>
</html>
