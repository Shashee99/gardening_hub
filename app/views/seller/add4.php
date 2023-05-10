<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

    <style>
        .imgsucces{
            width: 300px;
            margin: 30px auto;
            animation: completeanim 2s ease-in-out;
        }

        @keyframes completeanim{
            0%{
                transform: rotate(-20deg);
                width: 10px;
            }
            100%{
                transform: rotate(0deg);
                width: 300px;
            }
        }

        .succestxt{
            text-align: center;
            color: #282A3A;
        }

        #cusorder{
            width: 230px;
            height: 40px;
            border: none;
            border-radius: 4px;
            background-color: #00A778;
            color: #fbfbfb;
            cursor: pointer;
            font-size: 13px;
            margin: 50px auto 0px auto;
            display: block;

        }

    </style>

        <!-- ---------------------------- Progress Bar---------------------------- -->

        <div class="progressbar">
        <ul class="ulpro">
            <li class="ulli">
                <div class="progress one">
                    <i class="icon uil fa-solid fa-carrot"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Select Category</p>
            </li>
            <li class="ulli">
                <div class="progress two">
                    <i class="icon uil fa-solid fa-pen"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Add Product Details</p>
            </li>
            <li class="ulli">
                <div class="progress three">
                    <i class="icon uil fa-solid fa-image"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Add Images</p>
            </li>
            <li class="ulli">
                <div class="progress four">
                    <i class="icon uil fa-solid fa-thumbs-up"></i>
                    <i class="uill fa-solid fa-check"></i>
                </div>
                <p class="text">Completed</p>
            </li>
        </ul>

    </div>

<!-- --------------------------------------------------------------------- -->

    <div class="container">
        <div class="done" id="done">
            <div class="imgsucces">
                <img src="<?php echo URLROOT; ?>/img/seller/thumbs.png" width = "100%" height ="100%" alt="">
            </div>
            <h4 class="succestxt">
                Your product has succesfully added!
            </h4>
            <!-- <input type="button" class="button" value="View your item"> -->
            <button id="cusorder" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/dashboard';">View your product </button>
            <!-- <a href="<?php echo URLROOT; ?>/sellers/dashboard" class="btn1">View your item</a> -->
        </div>
    </div>
