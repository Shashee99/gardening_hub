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

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
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
                    <option value="">All Prices</option>
                    <option value="100">Upto Rs.100.00</option>
                    <option value="500">Upto Rs.500.00</option>
                    <option value="1000">Upto Rs.1000.00</option>
                    <option value="2000">Upto Rs.2000.00</option>
                    <option value="5000">Upto Rs.5000.00</option>
                    <option value="Other">Above Rs.5000.00</option>
                </select>
            </div>
        </div>

        <div class="product-wraper">
            <div class="products-details">

                <?php foreach($data['products'] as $products) { ?>
                    <div class="product">
                        <a href="">
                            <img src="<?= URLROOT; ?>/img/upload_images/product_cover_photo/<?= $products->image; ?>" alt="">
                        </a>
                        <h4><?= $products->title; ?></h4>
                        <h5><?= $products->shop_name; ?></h5>
                        <p>Available : <?= $products->quantity; ?></p>
                        <h4>Price Rs.<?= $products->price; ?></h4>
                        <div class="product-add">
                            <input type="submit" name="add-btn" value="Add to Wishlist">
                        </div>




                    </div>
                <?php } ?>
            </div>
        </div>

    </section>

    <script src="<?php echo URLROOT; ?>/js/customer/getSubCategory.js"></script>

</body>
</html>
