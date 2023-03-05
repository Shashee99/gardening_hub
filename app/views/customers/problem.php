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

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="problem-filter">
            <select name="category" id="category">
                <option value="">All</option>
                <option value="Bonzzai">Bonzzai</option>
                <option value="Hybrid Plantation">Hybrid Plantation</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="problem-add">
            <div class="border">
                <a href="<?= URLROOT; ?>/problems/addProblems">Add a new problem</a>
            </div>
        </div>
        <?php flash("problem_add_successfuly"); ?>
        <div class="problem-wraper">

            <?php foreach ($data['problems'] as $problems) { ?>
                <div class="problem-card">
                    <div class="problem">
                        <div class="user-info">
                            <div class="photo">
                                <img src="<?= URLROOT; ?>/public/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                            </div>
                            <div class="name-date-time">
                                <h5><?= $_SESSION['cus_name']; ?></h5>
                                <h6><?= $problems->date_time; ?></h6>

                            </div>
                        </div>
                        <h3><?= $problems->title; ?></h3>
                        <div class="problem-content">
                            <p>
                                <?= $problems->content; ?>
                            </p><br>

                        </div>
                        <a href="<?= URLROOT; ?>/problems/viewOneProblem/<?= $problems->problem_id; ?>">Replies ...</a><br>

                    </div>
                </div>
            <?php } ?>

        
        </div>

    </section>

</body>
</html>
