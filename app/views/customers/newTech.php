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

    <div class="rest" id="blur">
        <div class="new-tech-option">
            <div class="cat-option">
                <select name="category" id="category">
                    <option value="">All</option>
                    <option value="Bonzzai">Bonzzai</option>
                    <option value="Hybrid Plantation">Hybrid Plantation</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
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
                            <p><?= nl2br($row['content']); ?></p>
                        </div><br>
                        <div class="tech-photos">
                            <?php
                                
                                foreach($row['tech_photos'] as $row1)
                                {
                                ?>
                                    <img src="<?= URLROOT; ?>/img/upload_images/new_tech_photos/<?= $row1 ; ?>" alt="">
                                <?php   
                                }
                                ?>
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
    </div>
    <script src="<?php echo URLROOT; ?>/js/customer/newTechFilter.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>



</body>
</html>