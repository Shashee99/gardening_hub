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
                <div class="rating-button">
                    <button id="review-btn" value="<?= $data['seller']->seller_id ; ?>">Add an Review</button>
                    <span id="error-msg">Allready added Review</span>
                </div>
                <div class="review-rating-add">
                    <form action="<?= URLROOT;?>/reviews/addProductReviewRating/" method="POST">
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
                
            </div>
        </div>
        
    </section>
    <script src="<?php echo URLROOT; ?>/js/customer/sellerReviewAdd.js"></script>
</body>
</html>