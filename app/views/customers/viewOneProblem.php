<?php
    if (!isset($_SESSION['cus_id']))
    {
        redirect('users/login');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/viewOneProblem.css">


</head>

<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">
        <div class="one-problem-card" >
            <div class="customer-problem">
                <div class="user-info">
                    <div class="photo">
                        <img src="<?= URLROOT; ?>/public/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                    </div>
                    <div class="name-date-time">
                        <h5><?= $_SESSION['cus_name']; ?></h5>
                        <h6><?= $data['date']; ?></h6>

                    </div>
                </div>
                <h3><?= $data['title']; ?></h3>
                <div class="problem-content">
                    <p>
                        <?= $data['content']; ?>
                    </p><br>

                </div>
                <?php
                        if(!empty($data['photos']))
                        {
                        ?>
                            <div class="problem-image">
                            <?php
                            foreach($data['photos'] as $row1)
                            {
                            ?>
                                <img src="<?= URLROOT; ?>/img/upload_images/problem_photo/<?= $row1 ; ?>" alt="">
                            <?php   
                            }
                            ?>
                        </div>
                        <?php
                        }
                        ?>
            
            </div>
            <?php
            foreach($data['reply'] as $rep)
            {
                ?>
                <div class="user-reply">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?=$rep->photo ?>" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5><?=$rep->name ?></h5>
                            <h6><?=$rep->date ?>  <?=$rep->time ?></h6>
                        </div>
                    </div>
                    <div class="reply-content">
                        <p>
                            <?=$rep->reply ?>
                        </p><br>

                    </div>
                </div><br>
                <?php
            }
            ?>
        </div>
    </div>
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>

</body>
</html>
