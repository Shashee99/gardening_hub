<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>
<!-- --------------------------------------------------------------- -->
<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background: linear-gradient(91.33deg, #DE6262 1.21%, #FFB88C 99.03%);
}

.infopart {
    background: #fbf8f394;
    margin-top: 30px;
    height: 567px;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    padding: 60px 0px;
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
}

</style>
<!-- --------------------------------------------------------------- -->

<form action="<?php echo URLROOT; ?>/sellers/update/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
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
                                <!-- <h3 ><?php echo $data['price']; ?></h3> -->
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
                    <!-- <?php echo $data['itemData'] -> description ?> -->
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
        <!-- <button id="save_buton" type="submit" name="submit">Save</button> -->
        <input type="submit" name="submit" value="Save">
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