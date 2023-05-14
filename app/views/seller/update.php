<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>


<form action="<?php echo URLROOT; ?>/sellers/update/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="showmaincontainer">
        <div class="showmain">
            <div class="imgproduct">
                <img src="<?= URLROOT;?>/img/upload_images/product_cover_photo/<?= $data['image'];?>" alt="Product Image" id="proimageshow">
                <div id="coverphoto">
                    <input type="file" name="image" id="upim" onchange="previewimage(this)" hidden><br>
                </div>
            </div>
            <div class="detailsproduct">
                <div class="titleupdatediv" >
                    <input id="productname" type="text" name="title" value="<?php echo $data['title']; ?>">
                </div>
                <div class="pricerating">
                    <div class="priceTag" id="productpriceupdate">
                        <h3>Rs. </h3>
                        <input id="updateproductpriceupdate" type="text" name="price" value="<?php echo $data['price']; ?>">
                    </div>

                    <div class="name" id="productavailableupdate">
                        <h3>Available: </h3>
                        <input id="updateproductavailableupdate" type="text" name="quantity" value="<?php echo $data['quantity']; ?>">
                    </div>
                    
                </div>
                <input class="updateproductdescription" type="text" name="description" value="<?php echo $data['description']; ?>">

                <label for="image" class="uploadlabelshow">
                    <span><i class="fa fa-cloud-upload" onclick="triggerClick()"></i></span>
                    <p>Click to upload</p><br>
                    <h6 class="imgmsgadd3">(Image for item card)</h6>
                    <img src=""  alt="" id="preclick">
                    <p class="error image_err" style="color:red"> <?php echo '* '.$data['image_err']; ?> </p>
                </label>


            </div>
        </div>
        <div class="categoryimages">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][0] -> image_name?>" alt="img1" class="uppi">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][1] -> image_name?>" alt="img2" class="uppi">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][2] -> image_name?>" alt="img3" class="uppi">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][3] -> image_name?>" alt="img4" class="uppi">
        </div>


        <input type="file" name="cover_photos[]" id="cover_photo" multiple hidden>
        <label for="cover_photo" class="uploadlabelcover">
            <span><i class="fa fa-cloud-upload"></i></span>
            <p>Click to upload</p><br>
            <h6 class="imgmsgadd3">(Images for product details)</h6>
        </label>
        <div id="previewcoverphotoareaupdate"></div>

        <input type="submit" name="submit" value="Save" id="updatesubmit">
    </div>
</form>

<script>


    function triggerClick(){
        document.querySelector('#upim').click();
    }

    function previewimage(img){
        if(img.files[0]){
            var reader = new FileReader();
            reader.onload = function(img) {
                document.querySelector('#proimageshow').setAttribute('src', img.target.result);
            }
            reader.readAsDataURL(img.files[0]);
        }
    }

    const input = document.getElementById("cover_photo");
    const preview = document.getElementById("previewcoverphotoareaupdate");

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




    $(document).on('click', '.edit_icon', function(event)
    {
        
        event.preventDefault();
        $(this).hide();
        var editable = $(this).parent('div');
        $(this).parent('div').attr('contenteditable', 'true');
        $(this).focus();
    });



</script>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>