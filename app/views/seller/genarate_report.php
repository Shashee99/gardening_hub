<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.info{
    display: flex;
    width: 85%;
    margin: auto;
    height: 100%;
}

.image_container{
    width: 50%;
    border: 1px solid black;
    
}

.input_container{
    width: 50%;
    border: 1px solid black;
    text-align: center;
    padding-top: 30px;
}

h3{
    margin: 100px;
    font-size: 25px;
}

button{
    margin: 70px auto;
    width: 200px;
    height: 35px;
    display: block;
    border-radius: 10px;
    border: none;
    cursor: pointer;
}

#down{
    margin-bottom: 150px;
}
</style>



<body>
    <div class="info">
        <div class="input_container">
            <h3>Monthly selling details</h3>
            <button id="view">
                <a href="<?= URLROOT; ?>/sellers/genarate_pdf"> View Online </a>
            </button>
            <button id="down">
                <a href="<?= URLROOT; ?>/sellers/genarate_pdf"> Download Report </a>
            </button>
        </div>
        <div class="image_container">

        </div>
    </div>
    
</body>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>