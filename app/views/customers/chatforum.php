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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/chatforum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

<?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

<input type="text" id="customerid" value="<?= $data['cusid']?>" hidden>
<section id="rest">
    <div class="chatcontainer">
        <div id="chatboxid" class="chatbox" onscroll="handleScroll();">
<!--            <div class="chatpreview">-->
<!--                <div class="profileandchat">-->
<!--                    <div class="senderprofile">-->
<!--                    </div>-->
<!--                    <div class="chatcontent">-->
<!--                        <h4>Name</h4>-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut consequuntur cumque doloremque ducimus exercitationem ipsum itaque laboriosam, minima modi, mollitia natus nesciunt nostrum quas temporibus vel voluptate! Culpa, repudiandae!-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                <span class="chattime-righ">11:01</span>-->
<!--            </div>-->
<!--            <div class="chatpreviewoutgoing">-->
<!--                <div class="profileandchat">-->
<!--                    <div class="senderprofile">-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="chatcontent">-->
<!--                        <h4>Name</h4>-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut consequuntur cumque doloremque ducimus exercitationem ipsum itaque laboriosam, minima modi, mollitia natus nesciunt nostrum quas temporibus vel voluptate! Culpa, repudiandae!-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad error eveniet iste placeat. Aspernatur beatae culpa dolorem eaque eligendi ex in iusto laboriosam laudantium necessitatibus officiis recusandae, reiciendis temporibus, veniam?-->
<!--                    </div>-->
<!--                </div>-->
<!--                <span class="chattime-righ">11:01</span>-->
<!--            </div>-->
        </div>
        <div class="chatprompt">
            <input class="msgprompt" type="text" name="" id="prompt" placeholder="Type a massage">
            <button class="chatsendbutton" id="sendmsgbutton" onclick="sendmessage();"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>

</section>
<script src="<?php echo URLROOT; ?>/js/customer/chatforum.js"></script>
</body>
</html>