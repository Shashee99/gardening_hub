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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/otherHarvest.css">

</head>
<body>
    
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest" >
        <div class="options">
            <div class="btn" id="btn1">
                <a href="<?= URLROOT;?>/harvests/viewAddMyHarvest">MY Harvest</a>
            </div>
            <div class="btn" id="btn2">
                <a href="<?= URLROOT;?>/harvests/otherHarvests">Other Harvest</a>
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
        <div class="other-harvest-wrap">
            <?php
            if($data)
            {
                foreach($data as $row)
                {
                ?>
                    <div class="harvest">
                        <div class="part1">
                            <div class="photo">
                                <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $row['cus_photo'] ?>" alt="">
                            </div>
                            <div class="date">
                                <h5><?= $row['cus_name']; ?></h5>
                                <h6><?= $row['date']; ?></h6>
                                <p>Category : <?= $row['category']; ?></p>
                            </div>
                        </div>
                        <h3><?= $row['title']; ?></h3>
                        <div class="content">
                            <p><?= $row['description']; ?></p>
                        </div>
                        <div class="last">

                            <div class="images">
                                <?php
                                // print_r($data['harvest_photo']);
                                //die();
                                foreach($row['harvest_photo'] as $row1)
                                {
                                    // print_r($row1);
                                    // die();
                                ?>
                                    <img src="<?= URLROOT; ?>/img/upload_images/harvest_photo/<?= $row1 ; ?>" alt="">
                                <?php
                                    
                                }
                                ?>
                            </div>
                            
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
    <script src="<?php echo URLROOT; ?>/js/customer/OtherHarvestFilter.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>

</body>
</html>