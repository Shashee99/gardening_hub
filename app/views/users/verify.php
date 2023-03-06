<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almost there!</title>
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
        <?php flash("register_success"); ?>
        <form action="<?php echo URLROOT; ?>/users/verify" method="post">

            <div class="input-box">
                <input type="text" id='<?php echo (!empty($data['u_name_err'])) ? 'invalid' : ''; ?>' name="u_name" value="<?php echo $data['u_name']; ?>" placeholder="Your Email" >
                <div class="error">
                    <span><?php echo $data['u_name_err']; ?></span>
                </div>
            </div>
            <div class="input-box">
                <input type="password" id='<?php echo (!empty($data['pass_err'])) ? 'invalid' : ''; ?>' name="pass" value="<?php echo $data['pass']; ?>" placeholder="Password" >
                <i id="pass-status" class="uil uil-eye-slash " onclick="viewPassword()"></i>
                <div class="error">
                    <span><?php echo $data['pass_err']; ?></span>
                </div>
            </div>
            <div class="input-box">
                <input type="text" id='<?php echo (!empty($data['verify_err'])) ? 'invalid' : ''; ?>' name="verify" value="<?php echo $data['verify']; ?>" placeholder="Enter Verification" >
                <div class="error">
                    <span><?php echo $data['verify_err']; ?></span>
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Verify"   name="Verify" >
            </div>
            <div class="button">
                <input type="button" value="Sign up">
            </div>
            <br>
        </form>

    </div>
</div>


</body>
</html>