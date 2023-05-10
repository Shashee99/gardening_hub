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

    <div class="rest">
        <div class="wislist-option">
            <div class="date-filter">
                <div class="from-to">
                    <h4>From</h4>
                    <input type="date" id="from">
                </div>
                <div class="from-to">
                    <h4>To</h4>
                    <input type="date" id="to">
                </div>
            </div>
            <div class="filter-option">
                <div class="options">
                    <p>Pending</p>
                    <input type="checkbox" name="pending" id="option1">
                </div>
                <div class="options">
                    <p>Rejected</p>
                    <input type="checkbox" name="rejected" id="option2">
                </div>
                <div class="options">
                    <p>Confrimed</p>
                    <input type="checkbox" name="confirm" id="option3">
                </div>
                <div class="options">
                    <p>Completed</p>
                    <input type="checkbox" name="completed" id="option4">
                </div>
                <div class="options">
                    <p>Not Completed</p>
                    <input type="checkbox" name="not-completed" id="option5">
                </div>
            </div>
        </div>
        <div class="wishlist-table">
            <table>
                <thead>
                <th class="fixed-column">#</th>
                <th>Ordered Date & Time</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Seller</th>
                <th>Status</th>
                <th>Status Message</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                    foreach($data['wislist'] as $row)
                    {
                    ?>
                        <tr>
                        <td class="fixed-cell">
                            <a href="<?= URLROOT; ?>/products/viewOneProduct/<?= $row->product_no; ?>">
                                <img src="<?= URLROOT; ?>/img/upload_images/product_cover_photo/<?= $row->image;  ?>" alt="">
                            </a>
                        </td>
                        <td><?= $row->order_date_time; ?></td>
                        <td><?= $row->title; ?></td>
                        <td><?= $row->count; ?></td>
                        <td>
                            <a href="<?= URLROOT; ?>/sellers/sellerDetails/<?= $row->seller_id; ?>" class="seller_name"><?= $row->shop_name; ?></a>
                        </td>
                        <td>
                            <?php
                                if($row->status === 0)
                                {
                                    echo "Pending To Confirm";
                                }
                                elseif($row->status === 1 )
                                {
                                    echo "Rejected";
                                }
                                elseif($row->status === 2)
                                {
                                    echo "Confirm & pending to Complete";
                                }
                                elseif($row->status === 3)
                                {
                                    echo "Complete";
                                }
                                else
                                {
                                    echo "Not Collected";
                                }


                            ?>
                        </td>
                        <td>
                            <?php
                                if(is_null($row->status_msg))
                                {
                                    echo "---";
                                }
                                else
                                {
                                    echo $row->status_msg;
                                }
                            ?>
                        </td>
                        <td class="last">
                            <a  class="cancel" href="">Cancel</a>
                            <a class="delete" href="">Delete</a>
                        </td>
                </tr>
                    <?php
                    }
                    ?>
               
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/filterwishlist.js"></script>

</body>
</html>
