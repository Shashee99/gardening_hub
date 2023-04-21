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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

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
            <div class="rating-display">
                <?php 
                    $num_full_stars = floor($data['rating']->rate);

                    $num_half_stars = ceil($data['rating']->rate - $num_full_stars);

                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $num_full_stars) {
                          echo '<i class="fa fa-star"></i>';
                        } else {
                          echo '<i class="fa fa-star inactive"></i>';
                        }
                    }
                    if ($num_half_stars > 0) 
                    {
                        echo '<i class="fa fa-star-half-o"></i>';
                        $num_empty_stars = 4 - $num_full_stars - $num_half_stars;
                    } 
                    else 
                    {
                        $num_empty_stars = 5 - $num_full_stars;
                    }
                      
                    for ($i = 1; $i <= $num_empty_stars; $i++) {
                        echo '<i class="fa fa-star-o inactive"></i>';
                    }
                      
                      echo '<span class="num-ratings">(' . $data['rating']->count . ' ratings)</span>';
                ?>
            </div>
        </div>
        <div class="right-side">
            <div class="part-one">
                <div class="description">
                    <h3>Description</h3>
                    <p><?= $data['product']->description; ?></p>
                </div>
                <div class="review-rating-add">
                    <form action="<?= URLROOT;?>/reviews/addProductReviewRating/<?= $data['product']->product_no;?>" method="POST">
                        <div class="rating">
                            <input type="radio" name="rate" id="rate-5" value="5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4" value="4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3" value="3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2" value="2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1" value="1">
                            <label for="rate-1" class="fas fa-star"></label>                      
                            
                        </div>        

                        <div class="textarea">
                            <textarea cols="30" placeholder="Describe your experience.." name="review"></textarea>
                        </div>
                        <div class="btn">
                            <button type="submit">Post</button>
                        </div>
                    </form>

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
                    <?php foreach($data['review'] as $rows)
                    {
                    ?>
                        <div class="review">
                            <div class="user-info">
                                <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $rows->photo;?>" alt="">
                                <h4><?= $rows->name;?></h4>
                            </div>
                            <p><?= $rows->review;?></p>
                        </div>
                    <?php     
                    }
                    ?>
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