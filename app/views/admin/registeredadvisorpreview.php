<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>
    <br>
    <a href="<?= URLROOT;?>/admins/newadvisors" class="backbutton">Back</a>
    <br> <br>
    <hr>
    <div class="userdetails parentwidth">

        <div class="userimage">
            <img class="userimage" src="<?= URLROOT ;?>/img/upload_images/advisor_pp/<?=$data['advisor']->photo?>" alt="userimg" width="100%" height="100%">
        </div>

        <div class="userinfo">
            <ul class="userinfo-list">
                <li><b>Name of the Advisor : </b> <?=$data['advisor'] -> name; ?></li>
                <li><b>Mobile Phone : </b> <?=$data['advisor'] -> tel_no; ?></li>
                <li><b>E-mail : </b> <?=$data['advisor'] -> email; ?></li>
                <li><b>Qualification : </b> <?=$data['advisor'] -> qualification; ?></li>
                <li><b>Qualification Documents : </b><a href="<?= URLROOT; ?>/img/upload_images/Advisor_Qualification_docs/<?= $data['document']->name; ?>" download><?= $data['document']->name; ?></a></li>
                <li class="flex" style="justify-content:space-evenly">
                    <a href="<?= URLROOT;?>/admins/deleteaadviser/<?= $data['advisor'] -> advisor_id;?>" class="delete" >Remove</a>
                </li>
            </ul>
        </div>
    </div>

    <div>
        <h2>No of Complaints for this seller : <?= count($data['complaints']);?></h2>
        <br>
        <div class="seller-table-area" style="border: 1px solid black; overflow-x: scroll;">
            <table class="usertable">
                <thead>
                <tr>
                    <th>From</th>
                    <th>Complaint Date</th>
                    <th>Reason</th>
                </tr>
                </thead>
                <?php foreach ($data['complaints'] as $row) : ?>
                    <tr style="border: 1px solid black">
                        <td><?php echo $row -> posted_user_id ?></td>
                        <td><?php echo $row -> complain_date ?></td>
                        <td><?php echo $row -> complain ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>


<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>