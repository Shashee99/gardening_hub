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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/advisorProfile.css">

</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>
    
    <section id="rest" >

    <div class="advisor-profile">
        <div class="left">
            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt="">
            <div class="details">
                <span>Name</span>
                <input type="text" value="<?= $data['details']->name; ?>" readonly>
            </div>
            <div class="details">
                <span>Email</span>
                <input type="text" value="<?= $data['details']->email; ?>" readonly>
            </div>
            <div class="details">
                <span>Address</span>
                <input type="text" value="<?= $data['details']->address; ?>" readonly>
            </div>
            <div class="details">
                <span>Name</span>
                <input type="text" value="<?= $data['details']->name; ?>" readonly>
            </div>
            <div class="details">
                <span>NIC</span>
                <input type="text" value="<?= $data['details']->nic_no; ?>" readonly>
            </div>
            <div class="details">
                <span>Telephone</span>
                <input type="text" value="<?= $data['details']->tel_no; ?>" readonly>
            </div>
            
        </div>
        <div class="right">
            <div class="details">
                <span>Qualifications</span>
                <textarea name="" id="" cols="30" rows="10" readonly>
                    <?= $data['details']->qualification; ?>
                </textarea>
            </div>
            <div class="details">
                <span>Qualifications Documents</span>
                <div class="images">
                    <iframe src="<?= URLROOT; ?>/img/upload_images/Advisor_Qualification_docs/<?= $data['documents']->name;?>" width="200" height="400"></iframe>


                    <!-- <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt="">
                    <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt="">
                    <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt="">
                    <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt="">
                    <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt="">
                    <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/<?= $data['details']->photo; ?>" alt=""> -->
                </div>
                <a href="<?= URLROOT; ?>/img/upload_images/Advisor_Qualification_docs/<?= $data['documents']->name;?>" download>Download PDF</a>

            </div>

        </div>
    </div>

        

    </section>
</body>
</html>