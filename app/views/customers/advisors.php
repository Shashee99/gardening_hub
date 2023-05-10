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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/advisor.css">
</head>
<body>
    
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">

        <div class="advisor-filter-option">
            <div class="cat-option">
                <select name="category" id="category">
                    <option value="">All</option>
                    <option value="Bonzzai">Bonzzai</option>
                    <option value="Hybrid Plantation">Hybrid Plantation</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="advisor-wrapper">

        <?php foreach($data['advisor_details'] as $row)
            {
            ?>
                <div class="advisor-card">
                <div class="part1">
                    <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $row->photo; ?>" alt="">
                    <div class="name-rating">
                        <h3><?= $row->name; ?></h3>
                    </div>
                </div>
                <div class="part2">
                    <div class="address">
                        <img src="<?= URLROOT; ?>/img/customer/location.png" alt="">
                        <p><?= $row->address; ?></p>
                    </div>
                    <div class="phone-no">
                        <img src="<?= URLROOT; ?>/img/customer/telephone.png" alt="">
                        <h3><?= $row->tel_no; ?></h3>
                    </div>
                </div>
                <div class="showmore">
                    <a href="<?= URLROOT; ?>/advisors/advisorDetails/<?= $row->advisor_id; ?>">Show more...</a>
                </div>
            </div>
            <?php
            }
            ?>
            
        </div>

    </div>

    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>

</body>
</html>