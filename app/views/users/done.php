<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/LoginPage/login_page.css">
</head>
<body>
<div class="login-page-navbar">
    <div class="logo">
        <a href="<?php echo URLROOT; ?>/">
            <img src="<?php echo URLROOT; ?>/img/login-registration/logo2.png" alt="logo">
        </a>
    </div>
</div>
<div class="login-page-container" style="background-image: url('<?php echo URLROOT; ?>/img/login-registration/farmer.jpg');">
    <div class="form-content">
        <h1>Password Changed Succefully !</h1>

        <p>We kindly inform you that your password has been updated. To access your account, please click on the Log in button, which will direct you to the login page.</p>
        <?php flash("register_success"); ?>
        <form action="<?php echo URLROOT; ?>/users/login">
            <div class="button">
                <input type="submit" value="Log in"   name="login" >
            </div>
        </form>

    </div>
</div>


</body>
</html>