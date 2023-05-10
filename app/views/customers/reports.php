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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/reports.css">

</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">

    </div>

    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>

</body>
</html>