<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

    <!-- ---------------------------------------------------------------------- -->
<style>
    

/* .infopart {
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
    background: linear-gradient(270deg, #6DD5ED 0%, #2193B0 103.58%);
} */

/* .s1 {
    background: linear-gradient(270deg, #6DD5ED 0%, #2193B0 103.58%);
}

.s2 {
    background: linear-gradient(270deg, #614385 0%, #516395 103.58%);
}

.s3 {
    background: linear-gradient(270deg, #61045F 0%, #AA076B 103.58%);
} */

/* .p1 {
    height: 70px;
    width: 1000px;
    display: flex;
    padding: 10px;
}

.rev {
    display: inline-block;
}



#proImg {
    border-radius: 50%;
    width: 50px;
    height: 50px;
}

#mainInfo {
    margin-left: 10px;
    color: #FFFFFF;
}

#ratingstar {
    width: 200px;
    height: 40px;
    margin-left: 530px;
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
} */


/* #review_name{
    font-size: 16px;
    width: 200px;
}

#review_date{
    font-size: 14px;
}

.num_ratings{
    display: inline-block;
    margin: auto 10px;
}

.stars-outer{
    position: relative;
    display: inline-block;
    margin-left: 550px;
}

.stars-inner{
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
}

.stars-outer::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #ccc;
}

.stars-inner::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #f8ce0b;
}


.stars-outer-below{
    position: relative;
    display: inline-block;
}

.stars-inner-below{
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
}

.stars-outer-below::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #ccc;
}

.stars-inner-below::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #f8ce0b;
} */


.showmaincontainer{
    width: 80%;
    height: 1500px;
    margin: 20px auto;
    box-shadow: 2px 2px 5px 1px #ececec;
    border-radius: 4px;
    margin-top: 50px;
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

.proimageshow{
    width: 600px;
    padding: 40px;
}

#productname{
    text-align: center;
    padding-bottom: 50px;
    font-size: 30px;
    font-weight: 900;
}

.pricerating{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 40px;
}

.ratingStars{
    width: 230px;
    height: 40px;
    background: rgba(159, 115, 115, 0.07);
}

#productpriceshow{
    font-size: 22px;
    color: #00A778;
}

#productavailable{
    font-size: 18px;
    letter-spacing: 1px;
    padding-bottom: 40px;
    color: #ff4c4c;
}

.productdescription{
    border: 1px solid #00A778;
    border-radius: 4px;
    padding: 25px;
    height: 290px;
    text-align: justify;
}

.categoryimages{
    display: flex;
    justify-content: center;
}

.pi{
    width: 245px;
    height: 245px;
    /* border: 1px solid black; */
    margin: 20px;
    border-radius: 4px;
}

/* Rating Star */

.showratingStars {
    width: 160px;
    height: 50px;
}

.shownum_ratings{
    /* visibility: hidden; */
    display: inline-block;
    margin: auto 10px;
    position: absolute;
    right: -35px;
}

#shownum_ratings_bolow{
    position: absolute;
    display: inline;
    right: -40px;
}

.showstars-outer{
    position: relative;
    display: inline-block;
    margin-left: 600px;
    /* border: 1px solid black; */
}

.showstars-inner{
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
    /* border: 1px solid red; */
}

.showstars-outer::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #ccc;
}

.showstars-inner::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #f8ce0b;
}


.showstars-outer-below{
    position: relative;
    display: inline-block;
    /* border: 1px solid black; */
}

.showstars-inner-below{
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
    /* border: 1px solid red; */
}

.showstars-outer-below::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #ccc;
}

.showstars-inner-below::before{
    content: "\f005 \f005 \f005 \f005 \f005";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 20px;
    color: #f8ce0b;
}

/* Review */

.reviews {
    background: #efefef65;
    border-radius: 15px;
    height: 250px;
    padding: 10px;
}

.reviewarea {
    height: 400px;
    overflow: scroll;
    overflow-x: hidden;
    border-radius: 4px;
    margin: 50px;
    /* border: 1px solid black; */
}

.review {
    border-radius: 4px;
    margin-bottom: 15px;
    padding: 10px;
    margin: 0px 10px 10px;
    background: #efefef65;
}

.rev {
    display: inline-block;
}

#proImg {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    border: 1px solid black;
}

#mainInfo {
    margin-left: 30px;
    color: #282A3A;
}

.showp1{
    display: flex;
    padding: 14px;
}

#ratingstar {
    width: 200px;
    height: 40px;
    margin-left: 530px;
}

.p2 {
    color: #282A3A;
    padding: 20px;
    margin: 10px 20px 20px 20px;
    border-radius: 4px;
    background: #efefef;
}

.reviewarea::-webkit-scrollbar {
    width: 5px;
    margin-left: 10px;
}

.reviewarea::-webkit-scrollbar-track {
    /* background: #daf1df; */
    border-radius: 100vw;
    margin-left: 10px;
}

.reviewarea::-webkit-scrollbar-thumb {
    background: #1d976cb2;
    border-radius: 100vw;
    /* border: 3px solid #daf1df; */
    padding: 10px;
}


#review_name{
    font-size: 16px;
    width: 200px;
}

#review_date{
    font-size: 14px;
}

#reviewtitle{
    font-size: 18px;
    padding: 50px 0px 0px 55px;
}
</style>
<!-- ---------------------------------------------------------------------- -->

    <!-- <div class="infopart">
        <div class="container">
            <div class="productInfo1">
                <h2 class="name"><?php echo $data['itemData'] -> title ?></h2>
                <img src="<?= URLROOT;?>/img/upload_images/product_cover_photo/<?= $data['itemData'] -> image;?>" alt="Image" class="proimage">
                <div class="proinfo">
                    <h3 class="priceTag">Price  <?php echo $data['itemData'] -> price ?></h3>
                    <div class="ratingStars" id="ratingStars">
                        <div class="stars-outer-below">
                            <h5 id="num_ratings_bolow"></h5>
                            <div class="stars-inner-below"></div>
                        </div>
                    </div>
                    <h3 class="availablity">Available : <?php echo $data['itemData'] -> quantity ?></h3>
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
                        <?php foreach($data['reviewData'] as $reviewData) : ?>
                            <div class="review" id="<?= $reviewData -> 	customer_id ;?>">
                                <div class="p1">
                                    <div >
                                        <img src="<?= URLROOT;?>/img/upload_images/customer_pp/<?= $reviewData -> photo;?>" alt="Image" class="rev" id="proImg">
                                    </div>
                                    <div id="mainInfo" class="rev">
                                        <h3 id="review_name"><?php echo $reviewData -> name ?></h3>
                                        <h4 id="review_date">12.08.2022</h4>
                                    </div>
                                    <div class="stars-outer">
                                        <h6 class="num_ratings">( <?php echo $reviewData -> rating ?> )</h6>
                                        <div class="stars-inner"></div>
                                    </div>
                                </div>
                                <p class="p2">
                                    <?php echo $reviewData -> review ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>/
        </div>
    </div> -->
    <div class="showmaincontainer">
        <div class="showmain">
            <div class="imgproduct">
                <img class="proimageshow" src="<?= URLROOT;?>/img/upload_images/product_cover_photo/<?= $data['itemData'] -> image;?>" alt="Product Image">
            </div>
            <div class="detailsproduct">
                <h2 id="productname"><?php echo $data['itemData'] -> title ?></h2>
                <div class="pricerating">
                    <h3 id="productpriceshow">Rs. <?php echo $data['itemData'] -> price ?></h3>
                    <div class="showratingStars" id="showratingStars">
                        <div class="showstars-outer-below">
                            <h5 id="shownum_ratings_bolow"></h5>
                            <div class="showstars-inner-below"></div>
                        </div>
                    </div>
                </div>
                <h3 id="productavailable"> Available : <?php echo $data['itemData'] -> quantity ?> </h3>
                <div class="productdescription">
                    <p><?php echo $data['itemData'] -> description ?></p>
                </div>
            </div>
        </div>
        <div class="categoryimages">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][0] -> image_name?>" alt="img1" class="pi">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][1] -> image_name?>" alt="img1" class="pi">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][2] -> image_name?>" alt="img1" class="pi">
            <img src="<?= URLROOT;?>/img/upload_images/product_photos/<?= $data['productImg'][3] -> image_name?>" alt="img1" class="pi">
        </div>


        <h3 id="reviewtitle">Product Reviews</h3>
        <div class="reviewarea">
            <?php foreach($data['reviewData'] as $reviewData) : ?>
                <div class="review" id="<?= $reviewData -> 	customer_id ;?>">
                    <div class="showp1">
                        <div >
                            <img src="<?= URLROOT;?>/img/upload_images/customer_pp/<?= $reviewData -> photo;?>" alt="Image" class="rev" id="proImg">
                        </div>
                        <div id="mainInfo" class="rev">
                            <h3 id="review_name"><?php echo $reviewData -> name ?></h3>
                            <h4 id="review_date">12.08.2022</h4>
                        </div>
                        <!-- <div id="ratingstar" class="rev"> -->
                        <div class="showstars-outer">
                            <h6 class="shownum_ratings">( <?php echo $reviewData -> rating ?> )</h6>
                            <div class="showstars-inner"></div>
                        </div>
                    </div>
                    <p class="p2">
                        <?php echo $reviewData -> review ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>

    // ------------------- Ratings in Review Box---------------------  //

        const stars = document.querySelectorAll(".review");
        const stars_id = [];
        for(let i=0; i<stars.length; i++){
            const arr_content = stars[i].id;
            stars_id.push(arr_content);
        }
        
        const star_count = document.getElementsByTagName("h6");
        const star_counts = [];

        let total_star_count =  0;

        for(let i=0; i<star_count.length; i++){
            const arr_content_num = star_count[i].textContent;
            const arr_content_num_chars = arr_content_num.match(/\d+/g).join('');
            const arr_content_num_int = parseInt(arr_content_num_chars); 
            star_counts.push(arr_content_num_int);

            total_star_count += arr_content_num_int;
        }
        
        let final_total_star = (total_star_count/star_count.length).toFixed(1);
        // console.log(final_total_star);
        const final_total_star_percentage = `${(final_total_star/5) * 100}%`;
        console.log(final_total_star_percentage);
        document.addEventListener('DOMContentLoaded', getRatings);

        function getRatings(){
            for(let star_count in star_counts){
                const starPercentage = `${(star_counts[star_count]/5) * 100}%`;
                // console.log(starPercentage);
                const find = document.getElementById(stars_id[star_count]);
                // console.log(find);
                (find.children[0].children[2].childNodes[3]).style.width = starPercentage;
            }
            const final_rating = document.getElementById("showratingStars");
            (final_rating.childNodes[1].children[1]).style.width = final_total_star_percentage;

            document.getElementById("shownum_ratings_bolow").innerHTML = "( "+final_total_star+" )";
        }


        // ------------------- Ratings below item---------------------  //

    </script>
<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>