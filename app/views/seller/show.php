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
}

/* .s1 {
    background: linear-gradient(270deg, #6DD5ED 0%, #2193B0 103.58%);
}

.s2 {
    background: linear-gradient(270deg, #614385 0%, #516395 103.58%);
}

.s3 {
    background: linear-gradient(270deg, #61045F 0%, #AA076B 103.58%);
} */

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
}


#review_name{
    font-size: 16px;
    width: 200px;
}

#review_date{
    font-size: 14px;
}

.num_ratings{
    /* visibility: hidden; */
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
}

</style>
<!-- ---------------------------------------------------------------------- -->

    <div class="infopart">
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
                                    <!-- <div id="ratingstar" class="rev"> -->
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
        
        let final_total_star = total_star_count/star_count.length;
        // console.log(final_total_star);
        const final_total_star_percentage = `${(final_total_star/5) * 100}%`;

        document.addEventListener('DOMContentLoaded', getRatings);

        function getRatings(){
            for(let star_count in star_counts){
                const starPercentage = `${(star_counts[star_count]/5) * 100}%`;
                // console.log(starPercentage);
                const find = document.getElementById(stars_id[star_count]);
                // console.log(find);
                (find.children[0].children[2].childNodes[3]).style.width = starPercentage;
            }
            const final_rating = document.getElementById("ratingStars");
            (final_rating.childNodes[1].children[1]).style.width = final_total_star_percentage;

            document.getElementById("num_ratings_bolow").innerHTML = "( "+final_total_star+" )";
        }


        // ------------------- Ratings below item---------------------  //

    </script>
<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>