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
   <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/homepage.css">
</head>
<body>

   <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

   <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

   <section id="rest">
      <h2>Order Details</h2>
      <div class="order-details" >
         <div class="valbox" id="d1">
               <img src="./images/pendingconfirm.png" alt="">
               <div>
                  <h3>210</h3>
                  <span>Pending To Confirm</span>
               </div>
               
         </div>
         <div class="valbox" id="d2">
               <img src="./images/reject.png" alt="">
               <div>
                  <h3>210</h3>
                  <span>Rejected Orders</span>
               </div>
               
         </div>
         <div class="valbox" id="d3">
               <img src="./images/pendingbuy.png" alt="">
               <div>
                  <h3>210</h3>
                  <span>Pending To Complete</span>
               </div>
               
         </div>
         <div class="valbox" id="d4">
               <img src="./images/complete.png" alt="">
               <div>
                  <h3>210</h3>
                  <span>Completed Orders</span>
               </div>
               
         </div>
      </div>
   </section>

</body>
</html>