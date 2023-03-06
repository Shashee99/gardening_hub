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
        <h1><?php echo $data['title']; ?></h1>

        <p>Enter the email associated with your account and we'll send a verification code to your email address.</p>
        <?php flash("register_success"); ?>
        <form action="<?php echo URLROOT; ?>/users/forgetpassword" method="post">

            <div class="input-box">
                <input type="text" id='<?php echo (!empty($data['u_name_err'])) ? 'invalid' : ''; ?>' name="u_name" value="<?php echo $data['u_name']; ?>" placeholder="Enter your email" >
                <div class="error">
                    <span><?php echo $data['u_name_err']; ?></span>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Send Verification Code"   name="login" >
            </div>
            <br>
        </form>

    </div>
</div>


</body>
</html>