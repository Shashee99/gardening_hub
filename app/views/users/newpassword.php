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

        <p>Enter your new password.</p>
        <?php flash("register_success"); ?>
        <form action="<?php echo URLROOT; ?>/users/newpassword" method="post">

            <div class="input-box">
                <input type="password" id='<?php echo (!empty($data['pass_err1'])) ? 'invalid' : ''; ?>' name="new_pass" value="<?php echo $data['new_pass']; ?>" placeholder="Enter your password" >
                <i id="pass-status" class="uil uil-eye-slash " onclick="viewPassword()"></i>
                <div class="error">
                    <span><?php echo $data['pass_err1']; ?></span>
                </div>
            </div>
            <div class="input-box">
                <input type="password" id='<?php echo (!empty($data['pass_err2'])) ? 'invalid' : ''; ?>' name="re_pass" value="<?php echo $data['re_pass']; ?>" placeholder="Re-enter your password" >
                <i id="pass-status" class="uil uil-eye-slash " onclick="viewPassword()"></i>
                <div class="error">
                    <span><?php echo $data['pass_err2']; ?></span>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Change"   name="login" >
            </div>
            <br>
        </form>

    </div>
</div>


</body>
</html>