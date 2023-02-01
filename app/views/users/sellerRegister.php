<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

    <style>
        body{
            font-family: 'Work Sans';
            background-color: #00A778;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }

        /*nav bar styling*/

        .navbg::before{
            content: "";
            position: absolute;
            width: 100%;
            top: 0;
            height: 224px;
            background-color: white;
            border-radius: 0px 0px 30px 30px;
            z-index: 1;
        }
        .container{
            z-index: 6;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;


        }
        h3{
            margin: 16px 0px;
            font-family: 'Work Sans';
            font-style: normal;
            font-weight: 700;
            font-size: 25px;
            line-height: 4px;
            letter-spacing: -0.02em;
            color: #000000;
        }
        .col2{
            position: absolute;
            top: 150px;
            transform: translate(-50%);
            border: 2px solid black;
            height: 300px;
        }
        .form{
            display: flex;
            width: 100%;
            margin: 45px 0px;
            justify-content: space-around;
        }
        .formcard{
            margin-top: 70px;
            background-color: #FAF8FB;
            width: 100%;
            height: 500px;
            border-radius: 20px 20px 0px 0px;
        }
        input[type='text']{

            width: 100%;
            padding: 20px 20px;
            display: inline-block;
            border: none;
            border-bottom: 2px solid black;
            font-size: 20px;
            background-color: #FAF8FB;
            margin: 10px 0px 0px 0px;
        }

        input[type='email']{

            width: 100%;
            padding: 20px 20px;
            display: inline-block;
            border: none;
            border-bottom: 2px solid black;
            font-size: 20px;
            background-color: #FAF8FB;
            margin: 10px 0px 0px 0px;
        }

        input[type='password']{

            width: 100%;
            padding: 20px 20px;
            display: inline-block;
            border: none;
            border-bottom: 2px solid black;
            font-size: 20px;
            background-color: #FAF8FB;
            margin: 10px 0px 0px 0px;
        }



        .error{
            color: 	#ff3333;
            padding-left: 30px;
            display: none;
            transform: translate(-20px);
            font-size: 12px;
        }

        .infotext{

            margin: 10px 0px;
        }
        .inputbr{
            text-align: center;
            border: 2px dashed black;
            line-height: 40px;
            width: 100%;
            display: inline-block;
        }
        .fileup{
            margin: 20px 0px;
        }
        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #00A778;
            border: 2px solid #00A778;
            color: #000000;
            text-align: center;

            padding: 12px;

            transition: all 0.5s;
            cursor: pointer;
            margin: 23px 0px 0px 0px;
            font-family: 'Source Sans 3';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;

            letter-spacing: 0.09em;
            color: rgba(0, 0, 0, 0.9);
            border-radius: 10px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        .btncancel{
            background-color: white;
            border: 2px solid black;
        }
        .submitsection{
            position: absolute;
            width: 208px;
            height: 80px;
            bottom:0;
            left: 0;
            right: 0;
            margin:auto;

        }
        #inputbtn,#inputbr{
            display: none;

        }
        label i{
            margin-right: 20px;
        }

    </style>

<?php
if(($data['name_err']) != null){
    ?> <style>.name_err{display: block}</style> <?php
}
if(($data['shop_name_err']) != null){
    ?> <style>.shop_name_err{display: block}</style> <?php
}
if(($data['address_err']) != null){
    ?> <style>.address_err{display: block}</style> <?php
}
if(($data['br_num_err']) != null){
    ?> <style>.br_num_err{display: block}</style> <?php
}
if(($data['mo_num_err']) != null){
    ?> <style>.mo_num_err{display: block}</style> <?php
}
if(($data['email_err']) != null){
    ?> <style>.email_err{display: block}</style> <?php
}
if(($data['password_err']) != null){
    ?> <style>.password_err{display: block}</style> <?php
}
if(($data['confirm_password_err']) != null){
    ?> <style>.confirm_password_err{display: block}</style> <?php
}
if(($data['pro_li_err']) != null){
    ?> <style>.pro_li_err{display: block}</style> <?php
}
?>

    <div class="navbg"></div>
    <div class="container">
        <main>
            <h3>Fill and submit your information</h3>
            <div class="formcard">
                <form action="<?php echo URLROOT; ?>/users/sellerRegister" method="post" enctype="multipart/form-data">
                    <div class="form">
                        <div class="col1">
                            <input type="text" name="name" id="name" placeholder="Full name" value="<?php echo $data['name']; ?>"><br>
                            <p class="error name_err"> <?php echo '* '.$data['name_err']; ?> </p>
                            <input type="text" name="shop_name" id="shop_name" placeholder="Name of the shop" value="<?php echo $data['shop_name']; ?>"><br>
                            <p class="error shop_name_err"> <?php echo '* '.$data['shop_name_err']; ?> </p>
                            <input type="text" name="address" id="address"placeholder="Address" value="<?php echo $data['address']; ?>"><br>
                            <p class="error address_err"> <?php echo '* '.$data['address_err']; ?> </p>
                            <input type="text" name="br_num" id="br_num" placeholder="BR Number" value="<?php echo $data['br_num']; ?>"> <br>
                            <p class="error br_num_err"> <?php echo '* '.$data['br_num_err']; ?> </p>
                            <input type="text" name="mo_num" id="mo_num" placeholder="Mobile Number" value="<?php echo $data['mo_num']; ?>"><br>
                            <p class="error mo_num_err"> <?php echo '* '.$data['mo_num_err']; ?> </p>
                        </div>
                        <div class="col2"></div>
                        <div class="col3">
                            <input type="email" name="email" id="email" placeholder="E-mail address" value="<?php echo $data['email']; ?>"><br>
                            <p class="error email_err"> <?php echo '* '.$data['email_err']; ?> </p>
                            <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $data['password']; ?>"><br>
                            <p class="error password_err"> <?php echo '* '.$data['password_err']; ?> </p>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="<?php echo $data['confirm_password']; ?>"><br>
                            <p class="error confirm_password_err"> <?php echo '* '.$data['confirm_password_err']; ?> </p>
                            <input type="file" name="shopimage" id="shopimage">
                            <p class="error seller_image_err"> <?php echo '* '.$data['seller_image_err']; ?> </p>
                            <div class="fileup">
                                <p>Product licenses</p>
                                <label for="inputbtn" class="inputbr"><i class="fa-solid fa-upload"></i>Upload File</label>
                                <input type="file" name="pro_li" id="pro_li">
                                <br>
                                <p class="error pro_li_err"> <?php echo '* '.$data['pro_li_err']; ?> </p><br>
                                <small>* Attach the soft copy of your BR certificate and other product licens</small><br>
                                <small>* File size of your documents should not exceed 10MB</small>
                            </div>
                        </div>
                    </div>
                    <div class="submitsection">
                        <input type="submit" value="Submit" class="button">
                        <input type="submit" value="Cancel" class="button btncancel">
                    </div>

                </form>


            </div>
        </main>
    </div>
<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>