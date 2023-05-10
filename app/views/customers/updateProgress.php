<?php 
    if(!isset($_SESSION['cus_id']))
    {
        redirect('users/login');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/updateProgress.css">
</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">
        <div class="update-form">
            <h3>Update Your progress details</h3>
            <form action="<?= URLROOT; ?>/progresses/updateProgress/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="input-box">
                    <span class="details">Topic of Progress</span>
                    <input id='<?php echo (!empty($data['title_err'])) ? 'invalid' : ''; ?>'
                            type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Enter your progress topic">
                    <div class="error">
                        <span><?php echo $data['title_err']; ?></span>
                    </div>
                </div>
                <div class="input-box" >
                    <span class="details">Category</span>
                    <input type="text" name="category" value="<?php echo $data['category']; ?>" disabled >
                </div>
                <div class="dates">
                    <div class="input-box" id="date1">
                        <span class="details">Started date</span>
                        <input type="text" name="category" value="<?php echo $data['add_date']; ?>" disabled >
                    </div>
                    <div class="input-box" id="date2">
                    <span class="details">Last updated date</span>
                    <input type="text" name="category" value="<?php echo $data['update_date']; ?>" disabled >
                </div>
                </div>
                <div class="input-box">
                    <span class="details">Cultivation Progress</span>
                    <textarea name="progress"  id='<?php echo (!empty($data['progress_err'])) ? 'invalid' : 'description'; ?>' cols="30" rows="10" ><?= $data['progress']; ?></textarea>
                    <div class="error">
                        <span><?php echo $data['progress_err']; ?></span>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Photos</span>
                    <div class="image-upload">
                        <div class="upload-images">
                            <div id="images">
                                <?php
                                foreach($data['uploaded_photos'] as $row1)
                                {
                                ?>
                                    <img src="<?= URLROOT; ?>/img/upload_images/progress_photo/<?php echo $row1->name; ?>" alt="">
                                <?php   
                                }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="error">
                        <span><?php echo $data['photo_err']; ?></span>
                    </div>
                </div>
                <span id="message">You can upload maximum 5 photos of your progress</span>
                <div class="image-button">
                            <input type="file" name="photos[]" id="photo" onchange="preview()" multiple>
                            <div class="label-of-image">
                                <label for="photo">
                                    <img src="<?= URLROOT; ?>/img/customer/upload-2.png" alt="">
                                    Upload another photos
                                </label>
                            </div>
                </div>
                <div class="buttons">
                    <div class="submit-btn">
                        <input type="submit" value="UPDATE">
                    </div>
                    <div class="cancele-btn">
                        <a href="<?= URLROOT; ?>/progresses/viewMyProgress">
                            <input type="button" value="Cancel">
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>

</body>
</html>