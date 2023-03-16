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
               <img src="<?= URLROOT;?>/img/customer/pendingconfirm.png" alt="">
               <div>
                  <h3><?= $data['pending']; ?></h3>
                  <span>Pending To Confirm</span>
               </div>
               
         </div>
         <div class="valbox" id="d2">
               <img src="<?= URLROOT;?>/img/customer/reject.png" alt="">
               <div>
                  <h3><?= $data['rejected']; ?></h3>
                  <span>Rejected Orders</span>
               </div>
               
         </div>
         <div class="valbox" id="d3">
               <img src="<?= URLROOT;?>/img/customer/pending-cart.png" alt="">
               <div>
                  <h3><?= $data['pending_to_complete']; ?></h3>
                  <span>Pending To Complete</span>
               </div>
               
         </div>
         <div class="valbox" id="d4">
               <img src="<?= URLROOT;?>/img/customer/complete.png" alt="">
               <div>
                  <h3><?= $data['complete']; ?></h3>
                  <span>Completed Orders</span>
               </div>
               
         </div>
      </div>

      <div id="clock"></div>
      <div class="not-complete-orders">
         <table>
            <thead>
               <th>Product</th>
               <th>Seller</th>
               <th>Quantity</th>
               <th>Order Confirm Date</th>
               <th>Remain Time to Collect</th>
            </thead>
            <tbody id = "tdata">
               <div class="tabale_data">
               
                  <?php foreach ($data['wishlist'] as $row )
                  {
                     if($row->status == 2)
                     {
                  ?>
                     <tr>
                        <td><?= $row->title; ?></td>
                        <td><?= $row->shop_name; ?></td>
                        <td><?= $row->count; ?></td>
                        <td><?= $row->confirm_reject_date_time; ?></td>
                        <?php
                           list($dateString, $timeString) = explode(' ', $row->confirm_reject_date_time);

                           $dateTime = new DateTime($dateString);

                           $timeInterval = new DateInterval('P7DT19H29M'); // 23 hours and 59 minutes
                           
                           $newDateTime = $dateTime->add($timeInterval);
                           //echo $newDateTime->format('Y-m-d H:i:s');
                           $currentDateTime = new DateTime();
                           $interval = $newDateTime->diff($currentDateTime);
                           if($interval->format('%a')==0)
                           {
                        ?>
                              <td class="remaning_time" style="color:red" data-time=<?= $row->confirm_reject_date_time; ?> > <?=  $interval->format('%a days, %h hours, %i minutes'); ?></td>
                           <?php
                           } 
                           else{
                           ?>
                              <td class="remaning_time" data-time=<?= $row->confirm_reject_date_time; ?> > <?=  $interval->format('%a days, %h hours, %i minutes'); ?></td>
                           <?php
                           }
                           ?>
               
                  <?php
                     } 
                  }
                  ?>
               </div>
            </tbody>
         </table>
      </div>
   </section>

   <!-- <script src="<?php echo URLROOT; ?>/js/customer/remaning_time.js"></script> -->

</body>
</html>