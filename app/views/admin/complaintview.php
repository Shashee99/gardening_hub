<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
<div>
    <br>
    <a href="<?= URLROOT;?>/admins/complains" class="backbutton">Back</a>
    <br> <br>
</div>
<hr>

<div class="position-relative parentwidth">

    <div class="userinfo-complain parentwidth">
        <ul class="complaint-list parentwidth">
            <li><b>Complaint Reference : </b> <?= $data['complaints'] -> complian_no ?>  </li>
            <li><b>Complaint Date : </b> <?= $data['complaints'] -> complain_date ?> </li>
            <li><b>Complainant Name : </b> <?= $data['complainant']?> </li>
            <li><b>Complainant_type : </b> <?= $data['complainant_type']?> </li>
            <li><b>Complainee Name : </b> <?= $data['complainee']?></li>
            <li><b>Complainee_type : </b> <?= $data['complainee_type']?></li>
            <li><b>Problem </b> <div style="width: 400px; height: 100px; overflow: scroll;"><?= $data['complaints']-> complain ?></div></li>
            <li>
            <div class="complainphotos parentwidth">
                <div class="complainphotos_1"><img src="<?=URLROOT;?>/img/upload_images/customer_pp/IMG-64336695707eb4.76947797.jpg" alt="" width="100%" height="100%" onclick="previewImage(this)"></div>
<!--                <div class="complainphotos_1"><img src="--><?//=URLROOT;?><!--/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>-->
<!--                <div class="complainphotos_1"><img src="--><?//=URLROOT;?><!--/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>-->
<!---->
<!--                <div class="complainphotos_1"><img src="--><?//=URLROOT;?><!--/img/upload_images/customer_pp/IMG-63a40c0c97bec9.72962555.jpg" alt="" width="100%" height="100%"></div>-->

            </div>
            </li>
            <li>
                <div class= "inneroption parentwidth">
                    <a class="delete-green parentwidth" style="text-decoration: none" href="<?=URLROOT;?>/admins/viewcomplaineduser/<?=$data['complainantid'];?>">View Complainant Profile</a>
                    <a class="delete-green parentwidth" style="text-decoration: none"href="<?=URLROOT;?>/admins/viewcomplaineduser/<?=$data['complaineeid'];?>">View Complainanee Profile</a>
                    <a class="delete-blue parentwidth" style="text-decoration: none"href="<?=URLROOT;?>/admins/resolvecomplain/<?= $data['complaints'] -> complian_no ?>">Mark as Resolved</a>
                    <a class="delete parentwidth" style="text-decoration: none"href="<?=URLROOT;?>/admins/deleteacomplain/<?= $data['complaints'] -> complian_no ?>">Delete</a>
                </div>
            </li>

        </ul>
    </div>

</div>

<script>
    function previewImage(img) {
        // create a new image element
        var previewImg = new Image();
        previewImg.src = img.src;

        // create a new div element to hold the preview image
        var previewDiv = document.createElement('div');
        previewDiv.classList.add('preview');
        previewDiv.style.position = 'fixed';
        previewDiv.style.top = '0';
        previewDiv.style.left = '0';
        previewDiv.style.width = '100%';
        previewDiv.style.height = '100%';
        previewDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        previewDiv.style.display = 'flex';
        previewDiv.style.justifyContent = 'center';
        previewDiv.style.alignItems = 'center';

        // add the preview image to the preview div
        previewDiv.appendChild(previewImg);

        // add the preview div to the document body
        document.body.appendChild(previewDiv);

        // add a click event listener to the preview div to remove it when clicked
        previewDiv.addEventListener('click', function() {
            document.body.removeChild(previewDiv);
        });
    }
</script>



<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>
