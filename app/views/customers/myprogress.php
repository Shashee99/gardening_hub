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

    <div class="confirm-progress-delete-popup" id="delete-modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this Progress?</p>
            <div class="modal-buttons" id="modal-button">
                <button id="confirm-delete">Yes</button>
                <button id="cancel-delete">No</button>
            </div>
        </div>
    </div>

    <div class="rest">
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

        <?php flash("progress_add_successfuly"); ?>
        <?php flash("progress_update_successfuly"); ?>
        
        <div class="my-progress-wrapper"> 
        <?php
            if(!empty($data))
            {
                foreach($data as $row)
                {
                ?>      
            <div class="my-progress-card">
                <div class="part1">
                    <div class="photo">
                        <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?php echo $_SESSION['cus_photo_path']; ?>" alt="">
                    </div>
                    <div class="date">
                        <h5><?php echo $_SESSION['cus_name']; ?></h5>
                        <h6><?php echo $row['date']; ?></h6>
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
                            <img src="<?= URLROOT; ?>/img/upload_images/progress_photo/<?= $row1; ?>" alt="">
                        <?php
                        }
                        ?>
                    </div>
                         
                </div>
                <div class="option-button">
                    <div class="delete-button">
                        <button class="delete_buttons" data-progressID="<?= $row['progress_id']; ?>">DELETE</button>                    
                    </div>
                    <div class="edit-button">
                        <form action="<?= URLROOT; ?>/progresses/updateProgress/<?= $row['progress_id']; ?>">
                        <input type="submit" value="Update">
                        </form>
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

    <script src="<?php echo URLROOT; ?>/js/customer/delete_progress_modal.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/progressfilter.js"></script>

    


</body>
</html>