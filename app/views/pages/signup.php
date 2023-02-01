<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view<port"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/LandingPage/landing_page_main.css">
    <title><?= $data['title'];?></title>


</head>
<body>
<header>
    <div class="navbar">
        <div class="container bgtransparent">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/landingPage/log.png" alt="logo" width="100%" height="100%">
            </div>
            <div class="navs">
                <ul>
                    <li class=""><a class="fontgreen" href="<?php echo URLROOT; ?>/pages/index">
                            <div class="icon"><img src="<?php echo URLROOT; ?>/img/landingPage/Vector.png" alt=""
                                                   width="100%" height="100%"></div>
                            Home</a></li>
                    <li class=""><a href="<?php echo URLROOT; ?>/pages/product">
                            <div class="icon"><img src="<?php echo URLROOT; ?>/img/landingPage/Vector (5).png" alt=""
                                                   width="100%" height="100%"></div>
                            How to sign up?</a></li>

                </ul>
            </div>
            <div class="signup flex">
                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn_green">Log in</a>
            </div>
        </div>
    </div>

</header>
<main>
    <section class="intro ">
        <div class="container" >
            <div class="actors" >
                <a style="text-decoration: none" href="<?php echo URLROOT; ?>/users/customerRegister">
                <div  class="actorcard">
                    <div class="whitebg">
                        <div class="actorimg">
                            <img src="<?= URLROOT;?>/img/landingPage/gardener.png" style="object-fit: contain; " width="100%" height="99%" alt="">
                        </div>
                        <div class="actortxt">
                            <p class="fontgreen font600 actortype" style="font-size: 28px">
                              Gardner
                            </p>
                            <p class="font400 actorinfo"><i>Sign up here if you are a gardener</i></p>
                        </div>
                     </div>
                </div>
                </a>
                <a style="text-decoration: none" href="http://localhost/advisor_project/view/advisor/advisor_register.php">
                <div class="actorcard" >
                    <div class="whitebg">
                        <div class="actorimg">
                            <img src="<?= URLROOT;?>/img/landingPage/advisor.png" style="object-fit: contain; " width="100%" height="100%" alt="">
                        </div>
                        <div class="actortxt">
                            <p class="fontgreen font600 actortype" style="font-size: 28px">
                               Advisor
                            </p>
                            <p class="font400 actorinfo"><i>Sign up here if you are an advisor and share your ideas</i></p>
                        </div>
                    </div>
                </div>
                </a>
                <a style="text-decoration: none" href="http://localhost/gardening_hub/users/sellerRegister">
                <div class="actorcard">
                    <div class="whitebg">
                        <div class="actorimg">
                            <img src="<?= URLROOT;?>/img/landingPage/sell.png" style="object-fit: contain; " width="100%" height="100%" alt="">
                        </div>
                        <div class="actortxt">
                            <p class="fontgreen font600 actortype" style="font-size: 28px">
                                Seller
                            </p>
                            <p class="font400 actorinfo"><i>Sign up here if you have gardening things to sell </i></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <img src="<?= URLROOT;?>/img/landingPage/gardeninboard.png" style="position: absolute; bottom: 0; left: 385px"width="291px" height="220px" alt="">

        <div class="grassbg">
            <img src="<?= URLROOT;?>/img/landingPage/grassfoot.png"  " width="100%" height="100%" alt="">
        </div>
    </section>

</main>
<script>
   let card = document.getElementById('hi');
   console.log(card)
   card.addEventListener('click',()=>{
       alert("jga");
   })
   // alert();
</script>
<?php require APPROOT . '/views/inc/incHome/footer.php'; ?>

