<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>


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
                        <input type="file" name="image" id="preeimage" onchange="previewimage(this), checkInput()" hidden>
                        <label for="image" class="uploadlabel">
                            <span><i class="fa fa-cloud-upload" onclick="triggerClick()"></i></span>
                            <p>Click to upload</p><br>
                            <h6 class="imgmsgadd3">(Image for item card)</h6>
                            <div  id="err3">
                                <p  id="symbol_err3"><?php echo $data['err_symbol1']; ?></p>
                                <p class="error title_err" id="cat_err3"><?php echo $data['image_err']; ?> </p>
                            </div>
                        </label>
                        <img src=""  alt="" id="preclick">


                        <input type="file" name="cover_photos[]" id="cover_photo" onchange="checkInput()" multiple hidden>
                        <label for="cover_photo" class="uploadlabel">
                            <span><i class="fa fa-cloud-upload"></i></span>
                            <p>Click to upload</p><br>
                            <h6 class="imgmsgadd3">(Images for product details)</h6>
                            <div id="previewcoverphotoarea"></div>
                            <div  id="err3">
                                <p  id="symbol_err3"><?php echo $data['err_symbol2']; ?></p>
                                <p class="error title_err" id="cat_err3"><?php echo $data['photo_err']; ?> </p>
                            </div>
                        </label>
                    </div>

                    <div id="imageaddbutonarea">
                        <input type="submit"  name="save_user" id="imageaddbuton" value="Next">
                    </div>
                </form>
            </div>
        </div>

    </div>

<script>


    window.onload = function(){
        const one = document.querySelector(".one");
        const two = document.querySelector(".two");
        one.classList.add("active");
        two.classList.add("active");
    }


    function checkInput(){
        const three = document.querySelector(".three");
        var im1 = (document.getElementById("preeimage")).value.trim();
        var im2 = (document.getElementById("cover_photo")).value.trim();
        if((im1 != "") && (im2 != "")){
            three.classList.add("active");
        } else {
            three.classList.remove("active");
        }
    }


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
                image.classList.add('previewimgadd3');
            };
        }
    });
</script>

</html>