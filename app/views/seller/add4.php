<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

    <style>


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
            <button id="cusorder" onclick="window.location.href = '<?php echo URLROOT; ?>/sellers/dashboard';">View your product </button>
        </div>
    </div>

    <script>
        window.onload = function(){
            const one = document.querySelector(".one");
            const two = document.querySelector(".two");
            const three = document.querySelector(".three");
            const four = document.querySelector(".four");
            one.classList.add("active");
            two.classList.add("active");
            three.classList.add("active");
            four.classList.add("active");
}
    </script>
