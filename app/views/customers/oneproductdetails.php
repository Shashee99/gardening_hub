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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/oneproduct.css">
</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="left-side">
            <h2><?= $data['product']->title; ?></h2>
            <div class="product-cover-photo">
                <img src="<?= URLROOT; ?>/img/upload_images/product_cover_photo/<?= $data['product']->image; ?> " alt="">
            </div>
            <h4>Price : Rs.<?= $data['product']->price; ?>.00</h4>
            <h3>Available Quantity</h3>
            <h3><?= $data['product']->quantity; ?></h3>
        </div>
        <div class="right-side">
            <div class="part-one">
                <div class="description">
                    <h3>Description</h3>
                    <p><?= $data['product']->description; ?></p>
                </div>
                <div class="review-rating-add">

                </div>
            </div>
            <div class="Part-two">
                <img src="<?= URLROOT; ?>/img/customer/brinjall.jfif" alt="">
                <img src="<?= URLROOT; ?>/img/customer/brinjall.jfif" alt="">
                <img src="<?= URLROOT; ?>/img/customer/brinjall.jfif" alt="">
                <img src="<?= URLROOT; ?>/img/customer/brinjall.jfif" alt="">

            </div>
            <div class="part-three">
                <h3>Reviews</h3>
                <div class="user-reviews">
                    <div class="review">
                        <div class="user-info">
                            <img src="<?= URLROOT; ?>/img/customer/profile.jpeg" alt="">
                            <h4>Nilshan Deemantha</h4>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident necessitatibus iusto minus facere 
                            doloremque hic quae repellat. Perferendis soluta nihil et. Qui voluptate,
                            id rerum voluptates minima ipsum quia assumenda.
                        </p>
                    </div>
                    <div class="review">
                        <div class="user-info">
                            <img src="<?= URLROOT; ?>/img/customer/profile.jpeg" alt="">
                            <h4>Nilshan Deemantha</h4>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident necessitatibus iusto minus facere 
                            doloremque hic quae repellat. Perferendis soluta nihil et. Qui voluptate,
                            id rerum voluptates minima ipsum quia assumenda.
                        </p>
                    </div>
                </div>
                

            </div>
            
        </div>
        
    </section>
    
</body>
</html>