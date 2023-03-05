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

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="one-problem-card" >
            <div class="customer-problem">
                <div class="user-info">
                    <div class="photo">
                        <img src="<?= URLROOT; ?>/public/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                    </div>
                    <div class="name-date-time">
                        <h5><?= $_SESSION['cus_name']; ?></h5>
                        <h6><?= $data['problem']->date_time; ?></h6>

                    </div>
                </div>
                <h3><?= $data['problem']->title; ?></h3>
                <div class="problem-content">
                    <p>
                        <?= $data['problem']->content; ?>
                    </p><br>

                </div>
            </div>
            <div class="user-reply">
                <div class="user-info">
                    <div class="photo">
                        <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                    </div>
                    <div class="name-date-time">
                        <h5>Nilshan Deemantha</h5>
                        <h6>2022-12-12</h6>
                        <h6>10.10 PM</h6>

                    </div>
                </div>
                <div class="reply-content">
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                        Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                    </p><br>

                </div>
            </div>
        </div>
    </section>
</body>
</html>
