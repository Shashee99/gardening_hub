<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>
<!-- --------------------------------------------------------------- -->
<style>
    /* * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1340px;
    position: relative;
    margin: 0 auto;
    padding: 0 30px;
    display: flex;
}

.productInfo1 {
    width: 30%;
    padding: 20px;
    margin-top: 30px;
}

#name {
    margin-top: 20px;
    margin-bottom: 30px;
    text-align: center;
}

.proimage {
    width: 130px;
    height: 130px;
    border: 1px solid black;
    display: block;
    margin: auto;
}

.proinfo {
    text-align: center;
    margin-top: 30px;
    width: 130px;
    display: block;
    margin: auto;
}

.ads {
    display: flex;
    justify-content: center;
    margin: 30px 0px;
}


.productInfo2 {
    flex-grow: 1;
    padding: 20px;
}

#disc {
    margin-top: 40px;
    padding: 25px;
    text-align: justify;
    background: #efefef65;
    border-radius: 15px;
}

.coverPhotos {
    width: 700px;
    margin: 35px auto;
}


.cp {
    width: 130px;
    height: 130px;
    border: 1px solid black;
    display: inline-block;
    margin: 20px;
}

#save_buton {
    margin-left: 1300px; 
    border-radius: 4px;
    background-color: #00A778;
    border: none;
    color: white;
    text-align: center;
    padding: 15px 30px;
    cursor: pointer;
    font-family: 'Source Sans 3';
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    border-radius: 10px;
}

.edit_icon {
    width: 32px;
    height: 32px;
    background: #00A778;
    border-radius: 50%;
    align-items: center;
    position:relative;
}

#pencil {
    display:inline-block;
    margin: auto;
    position:absolute;
    top: 25%;
    left: 27%;
}

#title_edit {
    display: inline-block;
    position:absolute;
    top: 17.5%;
    left: 15.5%;
}

#price_edit {
    display: inline-block;
    position:absolute;
    top: 71.5%;
    left: 15.5%;
}

#available_edit {
    display: inline-block;
    position:absolute;
    top: 81%;
    left: 15.5%;
}

#description_edit {
    display: inline-block;
    position:absolute;
    top: 20%;
    left: 62.85%;
}

h3 {
    display: inline;
} */

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.showmaincontainer{
    width: 80%;
    margin: 20px auto;
    height: 1500px;
    box-shadow: 2px 2px 5px 1px #ececec;
    border-radius: 4px;
}

.showmain{
    display: flex;
}

.imgproduct{
    width: 50%;
}

.detailsproduct{
    width: 50%;
    padding: 40px;
}

#proimageshow{
    width: 600px;
    padding: 40px;
}

#productname{
    text-align: center;
    font-size: 30px;
    font-weight: 900;
    border: none;
}

#productname:focus{
    outline: none;
}


.pricerating{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 40px 0px;
}

.ratingStars{
    width: 230px;
    height: 40px;
    background: rgba(159, 115, 115, 0.07);
}

#productpriceupdate{
    font-size: 22px;
    color: #00A778;
    display: flex;
    
}

#updateproductpriceupdate{
    font-size: 22px;
    color: #00A778;
    width: 180px;
    border: none;
}

#updateproductpriceupdate{
    outline: none;
}

#productavailableupdate{
    font-size: 18px;
    letter-spacing: 1px;
    color: #ff4c4c;
    display: flex;
}

#updateproductavailableupdate{
    font-size: 18px;
    letter-spacing: 1px;
    color: #ff4c4c;
    width: 40px;
    border: none;
}

#updateproductavailableupdate:focus{
    outline: none;
}

.updateproductdescription{
    border: 1px solid #00A778;
    border-radius: 4px;
    padding: 25px;
    height: 220px;
    text-align: justify;
    width: 100%;
}

.updateproductdescription:focus{
    outline: none;
}

.categoryimages{
    display: flex;
    justify-content: center;
}

.uppi{
    width: 245px;
    height: 245px;
    margin: 20px;
    border-radius: 4px;
}

.titleupdatediv{
    justify-content: center;
    display: flex;
}

/* --------------------------------------- */

.uploadlabel{
    width: 100%;
    height: 115px;
    background: #fbfbfb;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 2px dashed #00A778;
    cursor: pointer;
    margin: 30px 0px;
    border-radius: 4px;
}

.uploadlabelcover{
    width: 90.8%;
    height: 115px;
    background: #fbfbfb;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 2px dashed #00A778;
    cursor: pointer;
    margin: 30px auto;
    border-radius: 4px;
}

.uploadlabel, .uploadlabelcover span{
    font-size: 40px;
    color: #00A778;
}

.uploadlabel, .uploadlabelcover p{
    color: #00A778;
    font-size: 12px;
    font-weight: 800;
}

.previewimg{
    width: 245px;
    height: 245px;
    margin: 20px;
}

#previewcoverphotoareaupdate{
    display: flex;
    justify-content: center;
    width: 100%;
    bottom: -776px;
}

#preclick{
    width: 300px;
    position: absolute;
}


#updatesubmit{
    width: 90.8%;
    margin: 40px auto;
    display: flex;
    padding: 5px 30px;
    font-size: 17px;
    height: 50px;
    background-color: #00A778;
    color: #ececec;
    /* text-align: center; */
    justify-content: center;
    border: none;
    border-radius: 4px;
}


</style>
<!-- --------------------------------------------------------------- -->

<!-- <form action="<?php echo URLROOT; ?>/sellers/update/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
<div class="infopart">
        <div class="container">
            <div class="productInfo1" >
                <div onmousemove="icon_hide()">
                    <div class="name" id="name">
                        <input type="text" name="title" value="<?php echo $data['title']; ?>">
                    </div>
                    <div class="edit_icon" id="title_edit">
                        <i class="fa-solid fa-pencil" id="pencil"></i>
                    </div>
                </div>
                <img src="<?= URLROOT;?>/img/upload_images/product_cover_photo/<?= $data['image'];?>" alt="Image" class="proimage">
                <div id="coverphoto">
                    <label for="image"><i class="fa-solid fa-upload"></i><br>Cover Photo</label>
                    <input type="file" name="image" id="image"><br>
                    <p class="error image_err" style="color:red"> <?php echo '* '.$data['image_err']; ?> </p>
                </div>
                <div class="proinfo">
                    <div class="ads">
                    <h3>Rs. </h3>
                        <div>
                            <div class="priceTag" id="priceTag">
                                <input type="text" name="price" value="<?php echo $data['price']; ?>">
                            </div>
                            <div class="edit_icon" id="price_edit">
                                <i class="fa-solid fa-pencil" id="pencil"></i>
                            </div>
                        </div>
                    </div>
                    <div class="ads">
                        <h3>Available : </h3>
                        <div>
                            <div class="availablity">
                                <h3 >15</h3>
                            </div>
                            <div class="edit_icon" id="available_edit" >
                                <i class="fa-solid fa-pencil" id="pencil"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="productInfo2" onmousemove="icon_hide()">
                <div class="productdetails">
                    <p class="disc" id="disc">
                    <input type="text" name="description" value="<?php echo $data['description']; ?>">
                    </p>
                    <div class="edit_icon" id="description_edit">
                        <i class="fa-solid fa-pencil" id="pencil"></i>
                    </div>
                </div>
                <div class="coverPhotos">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][0] -> image_name?>" alt="img1" class="cp">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][1] -> image_name?>" alt="img2" class="cp">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][2] -> image_name?>" alt="img3" class="cp">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][3] -> image_name?>" alt="img4" class="cp">
                </div>
                <div class="samplephotoare">
                    <label for="cover_photo"><i class="fa-solid fa-upload"></i><br>Other Photo</label>
                    <input type="file" name="cover_photos[]" id="cover_photo" multiple>
                    <p class="error photo_err" style="color:red"> <?php echo '* '.$data['photo_err']; ?> </p>
                    <br>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Save">
    </div>
</form> -->

<form action="<?php echo URLROOT; ?>/sellers/update/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="showmaincontainer">
        <div class="showmain">
            <div class="imgproduct">
                <img src="<?= URLROOT;?>/img/upload_images/product_cover_photo/<?= $data['image'];?>" alt="Product Image" id="proimageshow">
                <div id="coverphoto">
                    <!-- <label for="image"><i class="fa-solid fa-upload"></i><br>Cover Photo</label> -->
                    <input type="file" name="image" id="upim" onchange="previewimage(this)" hidden><br>
                    <!-- <p class="error image_err" style="color:red"> <?php echo '* '.$data['image_err']; ?> </p> -->
                </div>
            </div>
            <div class="detailsproduct">
                <!-- <h2 id="productname"><?php echo $data['itemData'] -> title ?></h2> -->
                <div class="titleupdatediv" >
                    <input id="productname" type="text" name="title" value="<?php echo $data['title']; ?>">
                </div>
                <div class="pricerating">
                    <!-- <h3 id="productpriceupdate">Rs <?php echo $data['itemData'] -> price ?></h3> -->
                    <div class="priceTag" id="productpriceupdate">
                        <h3>Rs. </h3>
                        <input id="updateproductpriceupdate" type="text" name="price" value="<?php echo $data['price']; ?>">
                    </div>

                    <div class="name" id="productavailableupdate">
                        <h3>Available: </h3>
                        <input id="updateproductavailableupdate" type="text" name="quantity" value="<?php echo $data['quantity']; ?>">
                    </div>
                    
                </div>
                <!-- <h3 id="productavailableupdate"> Available : <?php echo $data['itemData'] -> quantity ?> </h3> -->

                <!-- <div class="updateproductdescription">
                    <p><?php echo $data['itemData'] -> description ?></p>
                </div> -->
                <input class="updateproductdescription" type="text" name="description" value="<?php echo $data['description']; ?>">

                <input type="file" name="image" id="preeimage" onchange="previewimage(this)" hidden>
                <label for="image" class="uploadlabel">
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
            
            <!-- <div  id="err3">
                <p  id="symbol_err3"><?php echo $data['err_symbole2']; ?></p>
                <p class="error title_err" id="cat_err3"><?php echo $data['photo_err']; ?> </p>
            </div> -->
        </label>
        <div id="previewcoverphotoareaupdate"></div>

        <input type="submit" name="submit" value="Save" id="updatesubmit">
    </div>
</form>

<script>
    // var t;
    // var a = document.getElementById("title_edit");
    // var b = document.getElementById("price_edit");
    // var c = document.getElementById("available_edit");
    // var d = document.getElementById("description_edit");
    // function icon_hide() {
        
    //     a.style = "display:block";
    //     b.style = "display:block";
    //     c.style = "display:block";
    //     d.style = "display:block";

    //     clearInterval(t);
    //     t = setTimeout(() => {
    //         a.style = "display:none";
    //         b.style = "display:none";
    //         c.style = "display:none";
    //         d.style = "display:none";
    //     },1500);
    // }


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