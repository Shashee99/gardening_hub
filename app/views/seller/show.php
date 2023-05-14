<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

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
                        <div class="showstars-outer">
                            <h6 class="shownum_ratings"><?php echo $reviewData -> rating ?></h6>
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
            // console.log(arr_content_num);
            const arr_content_num_float = parseFloat(arr_content_num).toFixed(1);
            star_counts.push(arr_content_num_float);

            total_star_count = total_star_count + arr_content_num_float;
        }
        // console.log(total_star_count);
        let final_total_star;
        if(star_count.length == 0 ){
            final_total_star = 0;
        } else {
            final_total_star = (total_star_count/star_count.length);
        }
        
        const final_total_star_percentage = `${(final_total_star/5) * 100}%`;
        // console.log(final_total_star_percentage);
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