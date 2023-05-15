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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>
    
    <div class="rest">
        <div class="product_details">
            <div class="left-side">
                <h2><?= $data['product']->title; ?></h2>
                <div class="product-cover-photo">
                    <img src="<?= URLROOT; ?>/img/upload_images/product_cover_photo/<?= $data['product']->image; ?> " alt="">
                </div>
                <h4>Unit Price : Rs.<?= $data['product']->price; ?>.00</h4>
                <h3>Available Quantity</h3>
                <h4><?= $data['product']->quantity; ?></h4>
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

                <button onclick="reviewAddModal('<?= $data['product']->product_no;?>','<?= $_SESSION['cus_id']; ?>');">Add Review</button>
                <span id="err3"></span>

                <div class="review-rating-add">
                        <form action="<?= URLROOT;?>/reviews/addProductReviewRating/<?= $data['product']->product_no;?>" method="POST">
                            <!-- <div class="rating">
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
                                
                            </div>         -->
                            <div id="rating" class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                            </div>
                            <span id="err1"></span>

                            <div class="textarea">
                                <textarea cols="30" placeholder="Describe your experience.." name="review" id="review"></textarea>
                                <span class="error"></span>
                            </div>
                            <span id="err2"></span>
                            <div class="btn">
                                <button type="submit" onclick="return validateReview();">Add</button>
                                <div class="modal-cancel" onclick="closeModal();">
                                    <h4 id="cancel">Cancel</h4>
                                </div>
                            </div>
                        </form>

                    </div>
            </div>
            <div class="right-side">
                <div class="part-one">
                    <div class="description">
                        <h3>Description</h3>
                        <p><?= $data['product']->description; ?></p>
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
                    </div>
                    

                </div>
                
            </div>
        </div>
        
    </div>

    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/productReviewAddModal.js"></script>


    
</body>
</html>