<?php
    if(!isset($_SESSION['advisor_id']))
    {
        redirect('users/login');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/advisor/homepage.css">
</head>
<body>
    

    <div class="contener">
   

         <div class="head">
         <div><img src="<?= URLROOT; ?>/img/advisor/logo.png" alt="mylogo"></div>
        

        <ul >
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Contect us</a></li>

        </ul>

    </div>
     <div class="sider">
       <div class="sidleft">
         <div class="profile">
            <img src="<?= URLROOT; ?>/img/advisor/logo.png" alt="image" >
            <p>Dasith chanuka <br>Active now </p> <div></div>
         </div>

          <div class="function"><p class="c">Dashbord</p></div>
          <div class="function"><p class="a">Customer Problems</p></div>
          <div class="function"><p class="a">Add New Technology</p></div>
          <div class="function"><p class="c">Log out</p></div>
          <div class="function"><p class="c">View Generate Report</p></div>

       </div>
       <div class="sidright">
         
       <div class="up">
           <div>
            <p class="pa">Number of Total Problems received</p>
            <P class="pb">150</P>
          </div>
        <div>
            <p class="pa">Number of Total Problems answered</p>
            <p  class="pb">125</p>
          </div>
          </div>
       <div class="dwon">
         
       <div class="dia"><img  class='stra' src="<?= URLROOT; ?>/img/advisor/stra.png" alt="stra"></div>
       <div  class="pro" ><img src="<?= URLROOT; ?>/img/advisor/progess.png" alt="">
        
        </div>

       </div>

       </div>


       </div>
      

      
      

    </div>  
    

    </div>




</body>
</html>