<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

    <!-- ---------------------------------------------------------------------- -->
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

body {
    background: linear-gradient(91.33deg, #DE6262 1.21%, #FFB88C 99.03%);
}

.navbar {
    position: relative;
    max-width: 1305px;
    margin: 0 auto;
    padding: 0 40px;
    z-index: 12;
}

.infopart {
    background: #fbf8f394;
    margin-top: 30px;
    height: 100%;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    padding: 30px 0px;
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

.name {
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
}

.ratingStars {
    width: 130px;
    height: 50px;
    margin: 10px auto;
    border: 1px solid black;
}

.availablity {
    margin: 10px auto;
}

.productInfo2 {
    flex-grow: 1;
    padding: 20px;
}

.disc {
    margin-top: 10px;
    padding: 25px;
    text-align: justify;
    background: #efefef65;
    border-radius: 15px;
}

.coverPhotos {
    width: 700px;
    margin: auto;
    padding-top: 4px;
}

.revtitle {
    margin: 15px;
}

.cp {
    width: 130px;
    height: 130px;
    border: 1px solid black;
    display: inline-block;
    margin: 20px;
}

.reviews {
    background: #efefef65;
    border-radius: 15px;
    height: 250px;
    padding: 10px;
}

.reviewarea {
    height: 230px;
    overflow-y: scroll;
    border-radius: 15px;
}

.review {
    margin: 15px;
    border-radius: 15px;
    padding: 10px;
}

.s1 {
    background: linear-gradient(270deg, #6DD5ED 0%, #2193B0 103.58%);
}

.s2 {
    background: linear-gradient(270deg, #614385 0%, #516395 103.58%);
}

.s3 {
    background: linear-gradient(270deg, #61045F 0%, #AA076B 103.58%);
}

.p1 {
    height: 70px;
    width: 1000px;
    display: flex;
    padding: 10px;
}

.rev {
    display: inline-block;
}



#proImg {
    border: 1px solid black;
    border-radius: 50%;
    width: 50px;
    height: 50px;
}

#mainInfo {
    margin-left: 10px;
    color: #FFFFFF;
}

#ratingstar {
    border: 1px solid black;
    width: 200px;
    height: 40px;
    margin-left: 600px;
}

.p2 {
    padding: 0px 10px 10px 10px;
    color: #FFFFFF;
}

.reviewarea::-webkit-scrollbar {
    width: 15px;
}

.reviewarea::-webkit-scrollbar-track {
    background: #FFFFFF;
    border-radius: 100vw;
}

.reviewarea::-webkit-scrollbar-thumb {
    background: #1d976cb2;
    border-radius: 100vw;
    border: 3px solid #FFFFFF;
}

</style>
<!-- ---------------------------------------------------------------------- -->

<!-- <div class="navbar">
        <nav>
            <div class="logo"></div>
            <div class="navs">
                <ul id="navul">
                    <li><a href="" class="an">Home</a></li>
                    <li><a href="" class="an">About</a></li>
                    <li><a href="" class="an">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div> -->
    <div class="infopart">
        <div class="container">
            <div class="productInfo1">
                <h2 class="name"><?php echo $data['itemData'] -> title ?></h2>
                <img src="<?= URLROOT;?>/img/upload_images/product_cover_photo/<?= $data['itemData'] -> image;?>" alt="Image" class="proimage">
                <div class="proinfo">
                    <h3 class="priceTag">Price  <?php echo $data['itemData'] -> price ?></h3>
                    <div class="ratingStars"></div>
                    <h4>(276)</h4>
                    <h3 class="availablity">Available : 15</h3>
                </div>
            </div>
            <div class="productInfo2">
                <div class="productdetails">
                    <p class="disc">
                    <?php echo $data['itemData'] -> description ?>
                    </p>
                </div>
                <div class="coverPhotos">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][0] -> image_name?>" alt="img1" class="cp">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][1] -> image_name?>" alt="img1" class="cp">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][2] -> image_name?>" alt="img1" class="cp">
                    <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][3] -> image_name?>" alt="img1" class="cp">
                </div>
                <h3 class="revtitle">Reviews</h3>
                <div class="reviews">
                    <div class="reviewarea">
                        <div class="review s1">
                            <div class="p1">
                                <div class="rev" id="proImg">
                                </div>
                                <div id="mainInfo" class="rev">
                                    <h3>Kamal Perera</h3>
                                    <h4>12.08.2022</h4>
                                </div>
                                <div id="ratingstar" class="rev">
    
                                </div>
                            </div>
                            <p class="p2">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus veritatis earum consequatur repudiandae rerum. Doloremque qui nihil dolore ad sed magnam esse! Maxime libero quis modi excepturi commodi voluptate odit?
                            </p>
                        </div>
    
                        <div class="review s2">
                            <div class="p1">
                                <div class="rev" id="proImg">
                                </div>
                                <div id="mainInfo" class="rev">
                                    <h3>Kamal Perera</h3>
                                    <h4>12.08.2022</h4>
                                </div>
                                <div id="ratingstar" class="rev">
    
                                </div>
                            </div>
                            <p class="p2">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus veritatis earum consequatur repudiandae rerum. Doloremque qui nihil dolore ad sed magnam esse! Maxime libero quis modi excepturi commodi voluptate odit?
                            </p>
                        </div>
    
                        <div class="review s3">
                            <div class="p1">
                                <div class="rev" id="proImg">
                                </div>
                                <div id="mainInfo" class="rev">
                                    <h3>Kamal Perera</h3>
                                    <h4>12.08.2022</h4>
                                </div>
                                <div id="ratingstar" class="rev">
    
                                </div>
                            </div>
                            <p class="p2">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus veritatis earum consequatur repudiandae rerum. Doloremque qui nihil dolore ad sed magnam esse! Maxime libero quis modi excepturi commodi voluptate odit?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>