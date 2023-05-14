<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<div class="profileinfomain">
        <div class="textinfo">
            <div class="confir">
                <div class="asd">
                    <h4 id="sellername"><?php echo $data['profileData'] -> owner_name ?></h4>
                </div>
                <div id="fsdgg">
                    <img class="seller_pro_img" src="<?=URLROOT ?>/img/upload_images/seller_pp/<?php echo $data['profileData'] -> 	photo ?>" alt="">
                </div>
                
            </div>
            <hr>
            <div class="consec">
                <div class="infopart">
                    <div class="infoheadtitle">Shop Name :</div>
                    <div class="sellerinfo"><?php echo $data['profileData'] -> 	shop_name ?></div>
                </div>
                <div class="infopart">
                    <div class="infoheadtitle">Address :</div>
                    <div class="sellerinfo"><?php echo $data['profileData'] -> 	address ?></div>
                </div>
                <div class="infopart">
                    <div class="infoheadtitle">BR-Number :</div>
                    <div class="sellerinfo"><?php echo $data['profileData'] -> br_no ?></div>
                </div>
                <div class="infopart">
                    <div class="infoheadtitle">Email :</div>
                    <div class="sellerinfo"><?php echo $data['profileData'] -> 	email ?></div>
                </div>
                <div class="infopart">
                    <div class="infoheadtitle">Mobile Number :</div>
                    <div class="sellerinfo"><?php echo $data['profileData'] -> 	tel_no ?></div>
                </div>
            </div>
        </div>
        <div class="doctag">Documents</div>
        <div class="sellerdocuments">
            <div id="dasfasfsd">
                <img class="pdficonproinfo" src="<?= URLROOT; ?>/img/seller/pdficon.png" alt="">
            </div>
            <div class="viewpdf">
                <a href="<?=URLROOT ?>/img/upload_images/seller_doc/<?php echo $data['profileData'] -> br_photo ?>" id="retes">
                    View Document
                </a>
            </div>
            
        </div>
        <button onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/dashboard';" id="profileokbuton">OK</button>
    </div>