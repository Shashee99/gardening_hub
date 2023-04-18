<?php
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/navbar.css">
</head>
<body>
    <section id="interface">
        <div class="navbar">
            <div class="logout">
                <a href="<?= URLROOT;?>/users/logout">Logout</a>
            </div>
            <div class="profile">
                <a href="<?= URLROOT; ?>/customers/myprofile/<?= $_SESSION['cus_id']; ?>">
                    <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?php echo $_SESSION['cus_photo_path']; ?>" alt="Profile Photo"">
                </a> 
                <h3><?php echo $_SESSION['cus_name']; ?></h3>
            </div>
        </div>
    </section>
</body>
</html>