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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/addProgress.css">
</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">
        <div class="progress-form">
            <h3>Enter Your progress details</h3>
            <form action="<?= URLROOT; ?>/progresses/addProgress" method="POST" enctype="multipart/form-data">
                <div class="input-box">
                    <span class="details">Topic of Progress</span>
                    <input id='<?php echo (!empty($data['title_err'])) ? 'invalid' : ''; ?>'
                            type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Enter your progress topic">
                    <div class="error">
                        <span><?php echo $data['title_err']; ?></span>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Category</span>
                    <select name="category"  id='<?php echo (!empty($data['category_err'])) ? 'invalid' : 'category'; ?>'  placeholder="Select Category" >
                        <option value="" selected hidden>Select category your harvest belongs</option>
                        <option value="vegetable">Vegetable</option>
                        <option value="fruits">Fruits</option>
                        <option value="flowers">Flowers</option>
                    </select>
                    <div class="error">
                        <span><?php echo $data['category_err']; ?></span>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Cultivation Progress</span>
                    <textarea name="progress"  id='<?php echo (!empty($data['progress_err'])) ? 'invalid' : 'description'; ?>' placeholder="Enter Your cultivation Progress"  cols="30" rows="10" ><?php echo $data['progress']; ?></textarea>
                    <div class="error">
                        <span><?php echo $data['progress_err']; ?></span>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Photos</span>
                    <div class="image-upload">
                        <div class="upload-images">
                            <div id="images">

                            </div>
                        </div>
                        <div class="image-button">
                            <input type="file" name="photos[]" id="photo" onchange="preview()" multiple>
                            <div class="label-of-image">
                                <label for="photo">
                                    <img src="<?= URLROOT; ?>/img/customer/upload-2.png" alt="">
                                    <p>Upload fiels</p> 
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="error">
                        <span><?php echo $data['photo_err']; ?></span>
                    </div>
                </div>
                <div class="buttons">
                    <div class="submit-btn">
                        <input type="submit" value="ADD">
                    </div>
                    <div class="cancele-btn">
                        <a href="<?= URLROOT; ?>/progresses/viewMyProgress">
                            <input type="button" value="Cancele">
                        </a>
                    </div>
                </div><br>
            </form>
           
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/displayimage.js"></script>

</body>
</html>