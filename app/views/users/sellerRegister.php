<style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css");

.additem2 {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 50px;
    border-radius: 4px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    margin: 80px auto;
}

.additem2 #itemdis {
    font-size: 1.5rem;
    color: #333;
    font-weight: 500;
    text-align: center;
}

.additem2 .form {
    margin-top: 30px;
}

.form .input-box {
    width: 100%;
}

.input-box label {
    color: #333;
}

.form :where(.input-box input, .select-box) {
    position: relative;
    height: 50px;
    width: 100%;
    outline: none;
    font-size: 13px;
    color: #282A3A;
    margin-top: 8px;
    border: 1px solid #00A778;
    border-radius: 4px;
    padding: 0 15px;
}

.headcontent{
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.logo{
    width: 200px;
    cursor: pointer;
}

.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

input[type="text"]::placeholder {
    color: #00A778;
}

.form .column {
    display: flex;
    column-gap: 15px;
}

.address :where(input, .select-box) {
    margin-top: 15px;
}

.select-box select {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    color: #707070;
    font-size: 1rem;
}

.image_brfile{
    display: flex;
}

.firstinfo{
    width: 35%;
}

.seller_image{
    height: 380px;
    border: 1px solid #00A778;
    border-radius: 4px;
    margin-right: 10px;
    margin-top: 8px;
}

.secondinfo{
    width: 65%;
    height: 300px;
}

.certificate{
    height: 380px;
    border: 1px solid #00A778;
    margin-top: 8px;
    border-radius: 4px;
    margin-left: 10px;
}

.info_docu{
    display: block;
}

#preclick{
    width: 214px;
    height: 277px;
    object-fit: cover;
    margin: 10px;
    bottom: 18px;
    border-radius: 4px;
}


.uploadlabel {
    width: 233px;
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    border-radius: 4px;
    padding-top: 15px;
}

.uploadlabeldoc{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    padding-top: 15px;
}

.dfg{
    margin-left: 10px;
}

#pdf_icon {
    display: none;
    padding-top: 30px;
}

#pdf_icon img {
    max-width: 100px;
    height: auto;
    display: flex;
    margin: auto;
}

#pdf_icon p {
    font-size: 14px;
    margin-top: 5px;text-align: center;
}

.regsub{
    display: flex;
    position: inherit;
    margin-top: 20px;
    width: 100%;
    justify-content: center;
    height: 40px;
    border-radius: 4px;
    border: none;
    background: #00A778;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 2px;
}

.reg_err_cls{
    display: flex;
    align-items: center;
    margin-left: 30px;
}

@keyframes hideafteronesec {
    to{
        width: 0;
        height: 0;
        overflow: hidden;
    }
}

@-webkit-keyframes hideafteronesec {
    to{
        width: 0;
        height: 0;
        visibility: hidden;
    }
}

#reg_err_name {
    font-size: 14px;
    color: red;
    letter-spacing: 1px;
}

#reg_err_symbl{
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    position: relative;
    right: 10px;
    font-size: 20px;
    color: red;
}

</style>

    <section  class="additem2" id="additem2">
        <div class="headcontent">
            <a href="<?php echo URLROOT; ?>" class="an">
                <img src="<?php echo URLROOT; ?>/img/seller/logo.png" alt="" class="logo">
            </a>
            <h2 id="itemdis"> Seller Registration Form</h2>
        </div>
        
        <form action="<?php echo URLROOT; ?>/users/sellerRegister" method="post" enctype="multipart/form-data" class="form">
            <div class="input-box">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" placeholder=" Enter full name" value="<?php echo $data['name']; ?>">
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es1']; ?></p>
                    <p id="reg_err_name"><?php echo $data['name_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="shop_name">Name of the shop</label>
                <input type="text" name="shop_name" id="shop_name" placeholder="Enter name of the shop" value="<?php echo $data['shop_name']; ?>"><br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es2']; ?></p>
                    <p id="reg_err_name"><?php echo $data['shop_name_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="address">Address</label>
                <input type="text" name="address" id="address"placeholder="Enter address" value="<?php echo $data['address']; ?>"><br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es3']; ?></p>
                    <p id="reg_err_name"><?php echo $data['address_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="br_num">BR Number</label>
                <input type="text" name="br_num" id="br_num" placeholder="Enter BR Number" value="<?php echo $data['br_num']; ?>"> <br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es4']; ?></p>
                    <p id="reg_err_name"><?php echo $data['br_num_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="mo_num">Mobile Number</label>
                <input type="text" name="mo_num" id="mo_num" placeholder="Enter Mobile Number" value="<?php echo $data['mo_num']; ?>"><br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es5']; ?></p>
                    <p id="reg_err_name"><?php echo $data['mo_num_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="email">E-mail address</label>
                <input type="email" name="email" id="email" placeholder="Enter E-mail address" value="<?php echo $data['email']; ?>"><br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es6']; ?></p>
                    <p id="reg_err_name"><?php echo $data['email_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="description">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" value="<?php echo $data['password']; ?>"><br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es8']; ?></p>
                    <p id="reg_err_name"><?php echo $data['password_err']; ?> </p>
                </div>
            </div>
            <div class="input-box">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" value="<?php echo $data['confirm_password']; ?>"><br>
                <div class="reg_err_cls">
                    <p  id="reg_err_symbl"><?php echo $data['es9']; ?></p>
                    <p id="reg_err_name"><?php echo $data['confirm_password_err']; ?> </p>
                </div>
            </div>
            <div class="image_brfile">
                <div class="firstinfo">
                    <p class="dfg">Profile Image</p>
                    
                    <div class="seller_image">
                        <label for="shopimage" class="uploadlabel">
                            <span><i class="fa fa-cloud-upload" onclick="triggerClick()"></i></span>
                            <p>Click to upload</p>
                        </label>                    
                        <input type="file" name="shopimage" id="shopimage" onchange="previewimage(this)" hidden>
                        <img src=""  alt="" id="preclick">
                    </div>
                    
                    <div class="reg_err_cls">
                        <p  id="reg_err_symbl"><?php echo $data['es7']; ?></p>
                        <p id="reg_err_name"><?php echo $data['seller_image_err']; ?> </p>
                    </div>
                </div>
                <div class="secondinfo">
                    <p class="dfg">Documents</p>   
                    <div class="certificate">
                        <label for="pro_li" class="uploadlabeldoc">
                            <span><i class="fa fa-cloud-upload" onclick="triggerClickfile()"></i></span>
                            <p>Click to upload</p><br>
                        </label> 
                        <input type="file" name="pro_li" id="pro_li" onchange="previewPDF()" hidden>
                        <div id="pdf_icon"></div>
                        
                    </div>
                    <div class="reg_err_cls">
                        <p  id="reg_err_symbl"><?php echo $data['es10']; ?></p>
                        <p id="reg_err_name"><?php echo $data['pro_li_err']; ?> </p>
                    </div>
                </div>
                
            </div>

            <input type="submit" value="Register" class="regsub">
        </form>
      </section>


    <script>


        function triggerClick(){
            document.querySelector('#shopimage').click();
        }

        function previewimage(img){
            if(img.files[0]){
                var reader = new FileReader();
                reader.onload = function(img) {
                    document.querySelector('#preclick').setAttribute('src', img.target.result);
                }
                reader.readAsDataURL(img.files[0]);
            }
        }

        function triggerClickfile(){
            document.querySelector('#pro_li').click();
        }

        function previewPDF() {
            const inputfile = document.getElementById("pro_li");
            const previewpdf = document.getElementById("pdf_icon");

            const file = inputfile.files[0];
            console.log(file);

            const reader = new FileReader();


            reader.onload = () => {
                const img = document.createElement('img');
                img.src = '<?= URLROOT; ?>/img/seller/pdficon.png';
                const p = document.createElement('p');
                p.innerHTML = file.name;
                previewpdf.innerHTML = '';
                previewpdf.appendChild(img);
                previewpdf.appendChild(p);
                previewpdf.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }


    </script>
<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>