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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/sellerProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="title">
            <h2>Seller Profile</h2>
        </div>
        <div class="seller-details">
            <div class="left-side">
                <div class="image">
                    <a href="<?= URLROOT; ?>/sellers/my/<?= $data['seller']->seller_id ; ?>">
                        <img src="<?= URLROOT; ?>/img/upload_images/seller_pp/<?= $data['seller']->photo; ?>" alt="">
                    </a>
                    
                </div>
                <div class="top-rated-products">
                    <h3>Top Rated Products</h3>
                    <div class="products">
                        <?php foreach($data['top_products'] as $products){
                        ?>
                            <img src="<?= URLROOT; ?>/img/upload_images/Product_cover_photo/<?= $products->image; ?>" alt="">
                        <?php    
                        }
                        ?>
                    </div>
                </div>
                <h4>Ratings</h4>
                <div class="seller_rating">

                    <div class="rating">
                        <span>Customer Service</span>
                        <h5>( <?= round($data['rating']->service_rate,1);?> )</h5>
                    </div>
                    <div class="rating">
                        <span>Products</span>
                        <h5>( <?= round($data['rating']->products_rate,1);?> )</h5>
                    </div>
                    <div class="rating">
                        <span>Overall</span>
                        <h5>( <?= round($data['rating']->overall,1);?> )</h5>
                    </div>
                </div>
                <div class="rating-button">
                    <button id="review-btn" value="<?= $data['seller']->seller_id ; ?>">Add an Review</button>
                    <span id="error-msg">Allready added Review</span>
                    <span id="error-msg2">You should purchase a product from seller to add an review</span>
                    <span id="error-msg3"><?= $data['err'];?></span>
                </div>
                <div class="review-rating-add">
                    <form action="<?= URLROOT;?>/reviews/addSellerReviewRating/<?= $data['seller']->seller_id ; ?>" method="POST">
                        <div class="rating">
                            <span>Customer Service : </span>
                            <input type="radio" name="service" id="service-5" value="5">
                            <label for="service-5" class="fas fa-star"></label>
                            <input type="radio" name="service" id="service-4" value="4">
                            <label for="service-4" class="fas fa-star"></label>
                            <input type="radio" name="service" id="service-3" value="3">
                            <label for="service-3" class="fas fa-star"></label>
                            <input type="radio" name="service" id="service-2" value="2">
                            <label for="service-2" class="fas fa-star"></label>
                            <input type="radio" name="service" id="service-1" value="1">
                            <label for="service-1" class="fas fa-star"></label>                      
                            
                        </div> 
                        <div class="rating">
                            <span>Products : </span>
                            <input type="radio" name="products" id="products-5" value="5">
                            <label for="products-5" class="fas fa-star"></label>
                            <input type="radio" name="products" id="products-4" value="4">
                            <label for="products-4" class="fas fa-star"></label>
                            <input type="radio" name="products" id="products-3" value="3">
                            <label for="products-3" class="fas fa-star"></label>
                            <input type="radio" name="products" id="products-2" value="2">
                            <label for="products-2" class="fas fa-star"></label>
                            <input type="radio" name="products" id="products-1" value="1">
                            <label for="products-1" class="fas fa-star"></label>                      
                            
                        </div> 
                        <div class="rating">
                            <span>Overall : </span>
                            <input type="radio" name="overall" id="overall-5" value="5">
                            <label for="overall-5" class="fas fa-star"></label>
                            <input type="radio" name="overall" id="overall-4" value="4">
                            <label for="overall-4" class="fas fa-star"></label>
                            <input type="radio" name="overall" id="overall-3" value="3">
                            <label for="overall-3" class="fas fa-star"></label>
                            <input type="radio" name="overall" id="overall-2" value="2">
                            <label for="overall-2" class="fas fa-star"></label>
                            <input type="radio" name="overall" id="overall-1" value="1">
                            <label for="overall-1" class="fas fa-star"></label>                      
                            
                        </div>                

                        <div class="textarea">
                            <textarea cols="30" placeholder="Describe your experience.." name="review"></textarea>
                        </div>
                        <div class="btn">
                            <button id="add" type="submit">Post</button>
                            <a href="<?= URLROOT; ?>/sellers/sellerDetails/<?=$data['seller']->seller_id ; ?>">
                                <button id="cancel" type="button">Cancel</button>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
            <div class="right-side">
                <div class="seller-info">
                    <span>Shop Name</span>
                    <input type="text" value="<?= $data['seller']->shop_name; ?>" readonly>
                </div>
                <div class="seller-info">
                    <span>Owner Name</span>
                    <input type="text" value="<?= $data['seller']->owner_name; ?>" readonly>
                </div>
                <div class="seller-info">
                    <span>Email</span>
                    <input type="text" value="<?= $data['seller']->email; ?>" readonly>
                </div>
                <div class="seller-info">
                    <span>Address of Shop</span>
                    <input type="text" value="<?= $data['seller']->address; ?>" readonly>
                </div>
                <div class="seller-info">
                    <span>Telephone No</span>
                    <input type="text" value="0<?= $data['seller']->tel_no; ?>" readonly>
                </div>
                <div class="certificate">
                    <div class="br-certificate">
                        <span>Buisness Registration </span>
                        <img src="<?= URLROOT; ?>/img/upload_images/seller_doc/<?= $data['seller']->br_photo; ?>" id="br_photo" width="100px" object-fit="cover" >

                    </div>
                    <div class="other-certificate">
                        <span>Other licens and certificates </span>
                        <div class="images">
                            <?php foreach($data['license'] as $license){
                            ?>
                                <img src="<?= URLROOT; ?>/img/upload_images/seller_doc/<?= $license->name; ?>" alt="">
                            <?php    
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="complain">
                    <div class="complain_add_btn">
                        <button id="complain_btn" value="<?=$data['seller']->seller_id ; ?>">Add a Complain</button>
                        <span id="complain_err"><?=$data['complain_err']; ?></span>
                    </div>
                    
                    <div class="complain_form">
                        <form action="<?= URLROOT; ?>/complaints/addComplainForSeller/<?=$data['seller']->seller_id ; ?>" method="POST" enctype="multipart/form-data">
                            <span>Your compalin</span>
                            <textarea name="content" id="" cols="30" rows="10" placeholder="Enter your complain ......"></textarea>
                            <span>Add some evidance(images) if you have</span>
                            <input type="file" name="complains[]" id="" multiple>
                            <div class="complain-submit_btn">
                                <button type="submit">Add</button>
                                <button type="button">Cancel</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="reviews">
                    <h4>Reviews</h4>
                    <div class="cus_reviews">
                        <?php foreach($data['reviews'] as $rows)
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
        
    </section>
    <script src="<?php echo URLROOT; ?>/js/customer/sellerReviewAdd.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/complainAddForSeller.js"></script>
    <script>
        var img = document.getElementById("br_photo");

        img.addEventListener("click", function() {
            if (img.requestFullscreen) {
                img.requestFullscreen();
            } else if (img.webkitRequestFullscreen) { /* Safari */
                img.webkitRequestFullscreen();
            } else if (img.msRequestFullscreen) { /* IE11 */
                img.msRequestFullscreen();
            }
        });
    </script>
</body>
</html>