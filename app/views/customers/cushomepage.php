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
               <img src="<?= URLROOT;?>/img/customer/red-pending.png" alt="">
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
            <tbody>
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
                        <td id="remaning-time">
                           <input type="text" name="time" value="<?="2020-06-07 23:39:00"; ?>" hidden>
                        </td>
                        
                     </tr>
                  <?php
                     } 
                  }
                  ?>
               </div>
            </tbody>
         </table>
      </div>
   </section>

   <script>


      function getRemainingTime() {

         const dateValue = document.getElementById("remaning-time").value;
        
         var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
        var date2 = Math.abs((new Date(dateValue).getTime() / 1000).toFixed(0));

        var diff = date2 - date;

        var days = Math.floor(diff / 86400);
        var hours = Math.floor(diff / 3600) % 24;
        var minutes = Math.floor(diff / 60) % 60;
        var seconds = diff % 60;

        var daysStr = days;
        if (days < 10) {
            daysStr = "0" + days;
        }
 
        var hoursStr = hours;
        if (hours < 10) {
            hoursStr = "0" + hours;
        }
 
        var minutesStr = minutes;
        if (minutes < 10) {
            minutesStr = "0" + minutes;
        }
 
        var secondsStr = seconds;
        if (seconds < 10) {
            secondsStr = "0" + seconds;
        }

        if (days < 0 && hours < 0 && minutes < 0 && seconds < 0) {
            daysStr = "00";
            hoursStr = "00";
            minutesStr = "00";
            secondsStr = "00";

            console.log("close");
            if (typeof interval !== "undefined") {
                clearInterval(interval);
            }
        }

        document.getElementById("remaning-time").innerHTML = daysStr + " days, " + hoursStr + ":" + minutesStr + ":" + secondsStr;
    }

    getRemainingTime();
    var interval = setInterval(getRemainingTime, 1000); // update time every second
   </script>
</body>
</html>