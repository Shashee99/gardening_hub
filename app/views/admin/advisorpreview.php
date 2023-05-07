<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
    <br>
    <a href="<?= URLROOT;?>/admins/advisors" class="backbutton">Back</a>
    <br> <br>
    <hr>
    <div class="userdetails parentwidth">

        <div class="userimage">
            <img class="userimage" src="<?= URLROOT ;?>/img/upload_images/advisor_pp/<?=$data['advisor']->photo?>" alt="userimg" width="100%" height="100%">
        </div>

        <div style="height: 400px; width: 500px;overflow-x: scroll;" class="userinfo">

            <ul class="userinfo-list">
                <li><b>Name of the Advisor : </b> <?=$data['advisor'] -> name; ?></li>
                <li><b>Email: </b> <?=$data['advisor'] -> email; ?></li>
                <li><b>Mobile Phone : </b> <?=$data['advisor'] -> tel_no; ?></li>
                <li><b>Qualification : </b><?=$data['advisor'] -> qualification;?></li>
                <li><b>Qualification Documents : </b><a href="<?= URLROOT; ?>/img/upload_images/Advisor_Qualification_docs/<?= $data['document']->name; ?>" download><?= $data['document']->name; ?></a></li>
                <li class="flex" style="justify-content:space-evenly">
                    <a href="<?= URLROOT;?>/admins/advisorApprove/<?=$data['advisor'] -> advisor_id?>" class="view">Approve</a>
                    <a href="<?= URLROOT;?>/admins/rejectAdvisor/<?=$data['advisor'] -> advisor_id?>" class="delete">Reject</a>
                </li>
            </ul>


        </div>
    </div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>