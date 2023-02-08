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
    <title>Wishlist</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/wishlist.css">

</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="wislist-option">
            <div class="date-filter">
                <div class="from-to">
                    <h4>From</h4>
                    <input type="date" value="">
                </div>
                <div class="from-to">
                    <h4>To</h4>
                    <input type="date" value="">
                </div>
            </div>
            <div class="filter-option">
                <div class="options">
                    <p>Pending</p>
                    <input type="checkbox" name="pending">
                </div>
                <div class="options">
                    <p>Confrimed</p>
                    <input type="checkbox" name=confirm">
                </div>
                <div class="options">
                    <p>Rejected</p>
                    <input type="checkbox" name="rejected">
                </div>
                <div class="options">
                    <p>Completed</p>
                    <input type="checkbox" name="completed">
                </div>
                <div class="options">
                    <p>Not Completed</p>
                    <input type="checkbox" name="not-completed">
                </div>
            </div>
        </div>
        <div class="wishlist-table">
            <table>
                <thead>
                <th>No</th>
                <th>Date & Time</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Seller</th>
                <th>Status</th>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>2020/10/01 10.53</td>
                    <td>Composte 5kg</td>
                    <td>3</td>
                    <td>Fresh Shop</td>
                    <td>Completed</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>
