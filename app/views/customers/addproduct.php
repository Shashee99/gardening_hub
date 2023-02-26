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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/addproduct.css">

</head>

<body>
    <div class="count-get-modal" id="delete-modal">
        <div class="modal-content">
            <p>Number of items do you want to need?</p>
            <div class="modal-buttons">
                <form action="<?= URLROOT;?>/products/addProductToWishlist/<?= $data['product_id']; ?> " method="POST">
                    <input type="text" name="product_id" value="<?= $data['product_id']; ?>" hidden>
                    <input type="text" name="no_of_items" id="<?php echo (!empty($data['count_err'])) ? 'invalid' : 'input-field'; ?>">
                    <div class="error">
                        <span><?= $data['count_err']; ?></span>
                    </div>
                    <div class="button-div">
                        <input type="submit" value="Add" id="add-button">
                
                        <a href="<?= URLROOT;?>/products/viewProducts">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>