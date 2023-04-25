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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/OtherProgress.css">
</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="filter-options">
            <div class="btn" id="btn1">
                    <a href="<?= URLROOT; ?>/progresses/viewMyProgress">MY Progress</a>
            </div>
            <div class="btn" id="btn2">
                <a href="<?= URLROOT; ?>/progresses/viewOtherProgress">Other's Progress</a>
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
        
        <div class="Other-progress-wrapper"> 
        <?php
            if(!empty($data))
            {
                foreach($data as $row)
                {
                ?>      
            <div class="other-progress-card">
                <div class="part1">
                    <div class="photo">
                        <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $row['cus_photo']; ?>" alt="">
                    </div>
                    <div class="date">
                        <h5><?= $row['cus_name']; ?></h5>
                        <h6><?= $row['date']; ?></h6>
                        <p>Category : <?php echo $row['category']; ?></p>
                    </div>
                </div>
                <h3><?php echo $row['title']; ?></h3>
                <div class="content">
                    <p><?php echo $row['description']; ?></p>
                </div>
                <div class="last">

                    <div class="images">
                        <?php
                        foreach($row['progress_photo'] as $row1)
                        {
                        ?>
                            <img src="<?= URLROOT; ?>/img/upload_images/progress_photo/<?php echo $row1['name']; ?>" alt="">
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


    </section>

</body>
</html>