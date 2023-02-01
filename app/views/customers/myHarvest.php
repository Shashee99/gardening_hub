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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/harvest.css">

</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

   <section class="rest" id="blur" >
        <div class="options">
            <div class="btn" id="btn1">
                <a href="<?= URLROOT; ?>/harvests/viewAddMyHarvest">MY Harvest</a>
            </div>
            <div class="btn" id="btn2">
                <a href="<?= URLROOT; ?>/harvests/otherHarvests">Other Harvest</a>
            </div>
    
                <div class="selectcat">
                    <select name="category" id="category">
                        <option value="">All</option>
                        <option value="vegetable">Vegetable</option>
                        <option value="fruits">Fruits</option>
                        <option value="flowers">Flowers</option>
                    </select>
                </div>
               
        </div>

        <div class="add-harvest-card">
            <h3>Add Your harvest</h3>
            <div class="harvest">
                <form action="<?php echo URLROOT; ?>/harvests/viewAddMyHarvest" method="POST" enctype="multipart/form-data">
                    <div class="input-box">
                        <div class="title">
                            <input type="text" class="title" id='<?php echo (!empty($data['title_err'])) ? 'invalid' : 'title'; ?>' name="title" placeholder="Enter a short title for your harvest">

                        </div>
                        <div class="error">
                            <span><?php echo $data['title_err']; ?></span>
                        </div>
                    </div>
                    
                    <div class="input-box">
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
                        <textarea name="description"  id='<?php echo (!empty($data['description_err'])) ? 'invalid' : 'description'; ?>' placeholder="Enter description about your harvest"  cols="30" rows="10" ></textarea>
                        <div class="error">
                            <span><?php echo $data['description_err']; ?></span>
                        </div>
                    </div>

                    <div class="last">
                        <div id="images">

                        </div>
                    </div>
                    
                    <div class="photos">
                        <div class="items" id='<?php echo (!empty($data['photo_err'])) ? 'invalid' : ''; ?>'>
                            <input type="file" name="photos[]" id="photo"  placeholder="Select some photos of your harvest" onchange="preview()" multiple >
                        </div>
                        <div class="error">
                            <span><?php echo $data['photo_err']; ?></span>
                        </div>
                    </div>
                    <div class="btns">
                        <div class="button">
                            <input type="submit" value="Add">
                        </div>
                    </div>
                </form><br>
               

            </div>
        </div>

        <div class="harvest-wrap">
            <?php
            if($data['harvest'])
            {
                foreach($data['harvest'] as $row)
                {
                ?>
                    <div class="harvest">
                        <div class="part1">
                            <div class="photo">
                                <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?php echo $_SESSION['cus_photo_path']; ?>" alt="">
                            </div>
                            <div class="date">
                                <h5><?php echo $_SESSION['cus_name']; ?></h5>
                                <h6><?php echo $row->date; ?></h6>
                                <p>Category : <?php echo $row->category; ?></p>
                            </div>
                        </div>
                        <h3><?php echo $row->title; ?></h3>
                        <div class="content">
                            <p><?php echo $row->description; ?></p>
                        </div>
                        <div class="last">

                            <div class="images">
                                <?php
                                foreach($data['harvest_photo'] as $row1)
                                {
                                    
                                    if($row1->harvest_id == $row->harvest_id)
                                    {
                                    ?>
                                        <img src="<?= URLROOT; ?>/img/upload_images/harvest_photo/<?php echo $row1->name; ?>" alt="">
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="delete_btn">
                                <form action="../controller/harvest_con.php" method="POST">
                                    <input type="hidden" name="type" value="Delete">
                                    <input type="hidden" name="id" value="<?php echo $row->harvest_id ?>">
                                    <input type="submit" value="Delete">
                                </form>
                                    
                            </div>
                        </div><br>
                
                    </div>
                <?php
                }
            }
            else
            {
                echo "<div class='empty_record' >";
                echo "<h2>Rsecords Not Found</h2>";
                echo "</div>";
            }
            ?>

        </div>
        
       

   </section>

   <script src="<?php echo URLROOT; ?>/js/displayimage.js" ></script>
   <script src="<?php echo URLROOT; ?>/js/harvestFilter.js"></script>

   
</body>
</html>