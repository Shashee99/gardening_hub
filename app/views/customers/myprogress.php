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
        <div class="progress-add">
            <a href="<?= URLROOT; ?>/progresses/addProgress">
                <div class="progress-border">
                    Add Progress +
                </div>
            </a>
        </div>
        
        <div class="my-progress-wrapper"> 
        <?php
            if($data['progress'])
            {
                foreach($data['progress'] as $row)
                {
                ?>      
            <div class="my-progress-card">
                <div class="part1">
                    <div class="photo">
                        <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?php echo $_SESSION['cus_photo_path']; ?>" alt="">
                    </div>
                    <div class="date">
                        <h5><?php echo $_SESSION['cus_name']; ?></h5>
                        <h6><?php echo $row->started_date; ?></h6>
                        <p>Category : <?php echo $row->category; ?></p>
                    </div>
                </div>
                <h3><?php echo $row->title; ?></h3>
                <div class="content">
                    <p><?php echo $row->content; ?></p>
                </div>
                <div class="last">

                    <div class="images">
                        <!-- <?php
                        foreach($data['harvest_photo'] as $row1)
                        {
                                    
                            if($row1->harvest_id == $row->harvest_id)
                            {
                            ?>
                                <img src="<?= URLROOT; ?>/img/upload_images/harvest_photo/<?php echo $row1->name; ?>" alt="">
                            <?php
                            }
                        }
                        ?> -->
                    </div>
                    <div class="option-button">
                        <div class="delete-button">
                            <form action="<?= URLROOT; ?>/harvests/deletHarvest/<?= $row->harvest_id; ?>" method="POST">
                                <input type="submit" value="Delete">
                            </form>                
                        </div>
                        <div class="edit-button">
                            <form action="#">
                            <input type="submit" value="Update">
                            </form>
                        </div>
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