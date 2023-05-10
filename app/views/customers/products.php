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
    <title>Products</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/products.css">


</head>

<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="count-get-modal" id="delete-modal">
        <div class="modal-content">
            <p>Number of items do you want to need?</p>
            <div class="modal-buttons">
                <form id="form" method="POST">
                    <input id="wishlistid" type="text" name="product_id"  hidden>
                    <input id="available" type="text" name="avilabel"  hidden>
                    <input type="text" name="no_of_items" id="input-field">
                    <div class="error">
                        <span id="add_error"></span>
                    </div>
                    <div class="button-div">
                        <input type="submit" onclick="return validatequantity(document.getElementById('input-field').value,document.getElementById('available').value)" value="Add" id="add-button">
                
                        <a onclick="closemodal()" href="#">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="rest">
        <div class="product-option">
            <div class="select-cat">
                <select name="category" id="category">
                    <option value="">All Category</option>
                    <?php foreach ($data['category'] as $category){ ?>
                        <option value="<?= $category->product_category; ?>"> <?= $category->product_category; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="select-sub-cat">
                <select name="sub-category" id="sub-cateogry">
                    <option value="">All Sub Category</option>

                </select>
            </div>
            <div class="select-price">
                <select name="price" id="price">
                    <option value="0">All Prices</option>
                    <option value="100">Upto Rs.100.00</option>
                    <option value="500">Upto Rs.500.00</option>
                    <option value="1000">Upto Rs.1000.00</option>
                    <option value="2000">Upto Rs.2000.00</option>
                    <option value="5000">Upto Rs.5000.00</option>
                    <option value="10000">Above Rs.5000.00</option>
                </select>
            </div>
        </div>

        <?php flash("item_add_successfuly"); ?>


        <div class="product-wraper">
            <div class="products-details">

                <?php foreach($data['products'] as $products) { ?>
                    <div class="product">
                        <a href="<?= URLROOT; ?>/products/viewOneProduct/<?= $products->product_no; ?>">
                            <img src="<?= URLROOT; ?>/img/upload_images/product_cover_photo/<?= $products->image; ?>" alt="">
                        </a>
                        <h4><?= $products->title; ?></h4>

                        <div class="ratings">
                            <?php
                            $found = 0;
                            foreach($data['ratings'] as $rating)
                            {
                                if($rating->product_id === $products->product_no)
                                {
                                    $rateofproduct = $rating->rate;
                                    $round_rate = round($rateofproduct,1);
                                    $full_stars = intval($round_rate);
                                    $half_star =0;
                                    for($i=0; $i<$full_stars; $i++)
                                    {
                                    ?>
                                        <img src="<?= URLROOT; ?>/img/customer/star.png" alt="">

                                    <?php
                                    }
                                    $fraction = fmod($round_rate,1);
                                    if($fraction >= 0.3 && $fraction <=0.9 && $fraction !== 0)
                                    {
                                    ?>
                                        <img src="<?= URLROOT; ?>/img/customer/rating.png" alt="">
                                    <?php
                                        $half_star =1;
                                    }
                                    $empty_star = 5-$full_stars-$half_star;
                                    for($i=0; $i<$empty_star; $i++)
                                    {
                                    ?>
                                        <img src="<?= URLROOT; ?>/img/customer/star1.png" alt="">

                                    <?php
                                    }

                                    $found = 1;
                                }
                            }

                            if($found === 0)
                            {
                            ?>
                            
                                <img src="<?= URLROOT; ?>/img/customer/star1.png" alt="">
                                <img src="<?= URLROOT; ?>/img/customer/star1.png" alt="">
                                <img src="<?= URLROOT; ?>/img/customer/star1.png" alt="">
                                <img src="<?= URLROOT; ?>/img/customer/star1.png" alt="">
                                <img src="<?= URLROOT; ?>/img/customer/star1.png" alt="">
                                
                            
                            <?php
                            }
                            ?>
                        </div>
                        <a id="seller-link" href="<?= URLROOT; ?>/sellers/sellerDetails/<?= $products->seller_id; ?>">
                            <h5><?= $products->shop_name; ?></h5>
                        </a>
                        <p>Available : <?= $products->quantity; ?></p>
                        <h5>Unit : KILO</h5>
                        <h4>Unit Price Rs.<?= $products->price; ?></h4>
                        <div class="product-add">
                            <a id="wishlitaddbtn" href="#" onclick="popupmodal('<?= $products->product_no; ?>','<?= $products->quantity; ?>')">
                                <input type="submit" name="add-btn" value="Add to Wishlist">
                            </a>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <script src="<?php echo URLROOT; ?>/js/customer/getSubCategory.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/product_filter.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/wishlistaddmodal.js"></script>



</body>
</html>
