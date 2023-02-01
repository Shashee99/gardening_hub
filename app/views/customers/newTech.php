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
    <title>New Technologies</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/newTech.css">

</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section  class="rest" id="blur">
        <div class="new-tech-wraper">

            <?php 
            if($data)
            {
                foreach($data as $row)
                {
                ?>
                    <div class="new_technology">
                        <div class="part1">
                            <div class="photo">
                                <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $row['advisor_photo']; ?>" alt="">
                            </div>
                            <div class="date">
                                <h5><?= $row['advisor_name']; ?></h5>
                                <h6><?= $row['date']; ?></h6>
                                <p>Category : <?= $row['cat']; ?></p>
                            </div>
                        </div>
                        <h3><?= $row['title']; ?></h3>
                        <div class="content">
                            <p><?= $row['content']; ?></p>
                        </div><br>
            
                    </div>
                    <?php
                }
            }
            else
            {
                echo "<div class='empty_record' >";
                echo "<h2>Rsecords Not Found</h2>";
                echo "</div>";
            }
            
            ?>
        </div>
    </section>

</body>
</html>