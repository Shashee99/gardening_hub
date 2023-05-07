 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/seller/sellermain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,600;1,700&family=Sevillana&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
 </head>
 <body>
   <header>
      <a href="<?php echo URLROOT; ?>" class="an">
         <img src="<?php echo URLROOT; ?>/img/seller/logo.png" alt="" class="logo">
      </a>
      
      <nav>
         <ul class="nav_links">
               <li id="dlink"><a class="an" href="<?php echo URLROOT; ?>/sellers/dashboard" id="dash">Dashboard <i class="fa-solid fa-cart-shopping"></i></a></li>
         </ul>
      </nav>
      <?php if(isset($_SESSION['user_id'])) : ?>
         <a href="<?php echo URLROOT; ?>/users/logout" class="cta"><button id="logoutbtn">Logout</button></a>
      <?php endif; ?>
      <a href="#" >
         <img src="<?php echo URLROOT; ?>/img/seller/proimg.png" alt="" class="profile">
      </a>
      
   </header>
    
 