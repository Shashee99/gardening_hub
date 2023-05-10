<?php
    iF(!isset($_SESSION['cus_id']))
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
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/customer/profile.css">
</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">
        <div class="title">
            <h2>My Profile</h2>
        </div>
        <div class="customer_info">
            <div class="first">
                <div class="pp">
                    <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                </div>
                <h4><?= $data['cus_details']->name; ?></h4>
                <span><?= $data['cus_details']->email; ?></span>

                <input type="file" id="profile_photo">
                <div class="btn">
                    <label for="profile_photo"> Update Profile Photo</label>

                </div>

            </div>
            <div class="second">
                <div class="details">
                    <span>Name</span>
                    <input type="text" value="<?= $data['cus_details']->name; ?>" readonly>
                </div>
                <div class="details">
                    <span>Email</span>
                    <input type="text" value="<?= $data['cus_details']->email; ?>" readonly>
                </div>
                <div class="details">
                    <span>Address</span>
                    <input type="text" value="<?= $data['cus_details']->address; ?>" readonly>
                </div>
                <div class="details">
                    <span>NIC</span>
                    <input type="text" value="<?= $data['cus_details']->nic_no; ?>" readonly>
                </div>
                <div class="details">
                    <span>Birthday</span>
                    <input type="text" value="<?= $data['cus_details']->bod; ?>" readonly>
                </div>
                <div class="details">
                    <span>Mobile</span>
                    <input type="text" value="<?= $data['cus_details']->tel_no; ?>" readonly>
                </div>
            </div>
            <div class="third">
                xth g rgsth jyj uk rzgrghesgk grliethsd
            </div>
        </div>

    </div>
    
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>

    
</body>
</html>