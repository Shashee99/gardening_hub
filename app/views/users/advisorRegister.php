<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/RegistrationPages/advisorRegister.css">
</head>
<body>
    
    <div class="navbg"></div>
    <div class="container">
        <nav>
            <div class="logo"><img src="<?= URLROOT; ?>/img/login-registration/logo.png" alt="text" width="" hight="" ></div>
            <div class="navs">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <main>
            <h3>Fill and submit your information</h3>
            <div class="formcard">
                <form action="<?= URLROOT;?>/users/advisorRegister" method="POST" enctype="multipart/form-data">
                    <div class="form">
                        <div class="col1">
                            <input type="text" name="gmail" id="gmail" placeholder="Gmail" ><br>
                            <label for="" id="username-label"><?= $data['email_err']; ?></label><br>
                        
                        <input type="text" name="password" id="password"placeholder="Password"  ><br>
                        <label for="" id="passwordlable"></label><br>

                        <input type="text" name="pa" id="cpass"placeholder="conform Password"  ><br>
                        <label for="" id="cpass_lable"> </label><br>


                        <input type="text" name="fname" id="fname" placeholder="Full Name"  required > <br>
                        
                        <input type="text"  name="nic" id ="nic" placeholder="NIC_NO"  required ><br>
                        <label for="" id="nic-lable"> </label><br>

                        <input type="text" name="phone" id="phone" placeholder="Mobile Number"  required ><br>
                        <label for="" id="phone_lable"> </label><br> 
                            
                            
                        
                        </div>
                        <div class="col2"></div>
                        <div class="col3">

                        <input type="text" name="address" id="addre" placeholder="Address"  required ><br>
                        <label for="" id="phone_lable"> </label><br> 
                            
                            <input type="file" name="photo" id="pp" placeholder="Profile photo " required ><br>
                            <br>
                            <label for="" id="email-label"> </label><br>
                            <br>

                            
                            <textarea cols=40 rows=14  class="tearea" placeholder="Describe your Qualifications here"  name="qualification"   >
                            </textarea>

                            <div class="fileup">
                                <br>
                                
                                <h6> up load  qualification</h6>
                                <input type="file" name="qfile[]" id="qfile" value="input" multiple  required>
                                <br>
                                
                            <!-- </div>
                            <div class="fileup">
                            
                                <input type="file" name="inputbtn" id="inputbtn" value="input"  required >
                                <br>
                                
                            </div>
                        </div> -->
                    </div>
                    <div class="submitsection">
                        <input type="submit"  name="submint" id="sub" value="Submit" class="button">
                        <!-- <input type="submit"  name="cancel"   value="Cancel" class="button btncancel"> -->
                    </div>

                </form>

            </div>
        </main>
    </div>
    <script src="<?php echo URLROOT; ?>/js/advisor/validate.js" ></script>
</body>
</html>