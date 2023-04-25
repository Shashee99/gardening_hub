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
    <title>Add Problem</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/addproblem.css">
</head>
<body>
<?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

<?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>
<section id="rest">
 <div class="chatbox">

 </div>
 <div class="chatprompt">

 </div>
</section>

</body>
</html>