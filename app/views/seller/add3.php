<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>


    <style>
        .wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
    width: 100%;
}

.box {
    /* max-width: 500px; */
    background: #ffffff;
    padding: 30px;
    /* width: 100%; */
    border-radius: 4px;
    -webkit-border-radius: 4px;
    box-shadow: 2px 2px 5px 1px #ececec
}

#uploadarea{
    display: flex;
}

.upload-area-title{
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
    color: #00A778;
}

.uploadlabel{
    width: 400px;
    height: 400px;
    background: #fbfbfb;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 2px dashed #00A778;
    cursor: pointer;
    margin: 20px;
    border-radius: 4px;
}

.uploadlabel span{
    font-size: 70px;
    color: #00A778;
}

.uploadlabel p{
    color: #00A778;
    font-size: 16px;
    font-weight: 800;
}

.previewimg{
    width: 140px;
    height: 140px;
    margin: 5px;
}

#previewcoverphotoarea{
    position: absolute;
    display: flex;
    flex-wrap: wrap;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 300px;
    background: #daf1df;
}

#preclick{
    width: 300px;
    position: absolute;
}

#imageaddbutonarea{
    display: block;
    text-align: center;
}

#imageaddbuton{
    width: 230px;
    height: 26px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
    background-color:#00A778;
    color: #fbfbfb;
    cursor: pointer;
}

.imgmsgadd3{
    color: #00A778;
}


#err3{
    display: flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    left: 20px;
    position: relative;
}

#cat_err3 {
    /* text-align: center; */
    border: none;
    /* margin: 60px auto 0px auto; */
    width: fit-content;
    height: 35px;
    padding: 8px;
    border-radius: 4px;
    font-size: 14px;
    color: red;
    /* background-color: #FFD6D5; */
    letter-spacing: 1px;
}

#symbol_err3{
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    /* margin: auto; */
    position: relative;
    /* top: 5.5px; */
    /* left: 5px; */
    right: 10px;
    font-size: 20px;
    color: red;
}
    </style>

        <!-- ---------------------------- Progress Bar---------------------------- -->

<div class="progressbar">
        <ul class="ulpro">
            <li class="ulli">
                <div class="progress one">
                    <i class="icon uil fa-solid fa-carrot"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Select Category</p>
            </li>
            <li class="ulli">
                <div class="progress two">
                    <i class="icon uil fa-solid fa-pen"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Add Product Details</p>
            </li>
            <li class="ulli">
                <div class="progress three">
                    <i class="icon uil fa-solid fa-image"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Add Images</p>
            </li>
            <li class="ulli">
                <div class="progress four">
                    <i class="icon uil fa-solid fa-thumbs-up"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Completed</p>
            </li>
        </ul>

    </div>

<!-- --------------------------------------------------------------------- -->

        <div class="wrapper">
        <div class="box">
            <div class="input-bx">
                <h2 class="upload-area-title">Upload Product Images</h2>
                <!-- <form action="" id="uploadarea"> -->
                <form action="<?php echo URLROOT; ?>/sellers/add3" method="post" enctype="multipart/form-data" >

                <input type="text" name="cat" value="<?= $data['selected_category']?>" hidden>
                <input type="text" name="subcat" value="<?= $data['selected_subcategory']?>" hidden>
                <input type="text" name="title" value="<?= $data['title']?>" hidden>
                <input type="text" name="quantity" value="<?= $data['quantity']?>" hidden>
                <input type="text" name="description" value="<?= $data['description']?>" hidden>
                <input type="text" name="price" value="<?= $data['price']?>" hidden>
                <input type="text" name="unitvalue" value="<?= $data['unitvalue']?>" hidden>
                <input type="text" name="validate_period" value="<?= $data['validate_period']?>" hidden>

                
                    <div class="imageForm" id="uploadarea">
                            <!-- <input type="file" id="upload" hidden> -->
                        <input type="file" name="image" id="preeimage" onchange="previewimage(this)" hidden>
                        <!-- <label for="upload" class="uploadlabel"> -->
                        <label for="image" class="uploadlabel">
                            <span><i class="fa fa-cloud-upload" onclick="triggerClick()"></i></span>
                            <p>Click to upload</p><br>
                            <h6 class="imgmsgadd3">(Image for item card)</h6>
                            <img src=""  alt="" id="preclick">
                            <!-- <p class="error image_err" style="color:red"> <?php echo '* '.$data['image_err']; ?> </p> -->
                            <div  id="err3">
                                <p  id="symbol_err3"><?php echo $data['err_symbol1']; ?></p>
                                <p class="error title_err" id="cat_err3"><?php echo $data['image_err']; ?> </p>
                            </div>
                        </label>


                        <!-- <input type="file" id="upload" hidden> -->
                        <input type="file" name="cover_photos[]" id="cover_photo" multiple hidden>
                        <!-- <label for="cover_photo"> -->
                        <label for="cover_photo" class="uploadlabel">
                            <span><i class="fa fa-cloud-upload"></i></span>
                            <p>Click to upload</p><br>
                            <h6 class="imgmsgadd3">(Images for product details)</h6>
                            <div id="previewcoverphotoarea"></div>
                            <!-- <p class="error photo_err" style="color:red"> <?php echo '* '.$data['photo_err']; ?> </p> -->
                            <div  id="err3">
                                <p  id="symbol_err3"><?php echo $data['err_symbol2']; ?></p>
                                <p class="error title_err" id="cat_err3"><?php echo $data['photo_err']; ?> </p>
                            </div>
                        </label>
                    </div>

                    <div id="imageaddbutonarea">
                        <input type="submit"  name="save_user" id="imageaddbuton" value="Submit">
                    </div>
                </form>
            </div>
        </div>

    </div>

<script>

    function triggerClick(){
        document.querySelector('#preeimage').click();
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

    const input = document.getElementById("cover_photo");
    const preview = document.getElementById("previewcoverphotoarea");

    input.addEventListener("change", function(event){
        preview.innerHTML = "";

        const files = event.target.files;

        for(const file of files) {
            const reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onload = function() {
                const image = document.createElement("img");
                image.src = reader.result;
                preview.appendChild(image);
                image.classList.add('previewimg');
            };
        }
    });
</script>

</html>