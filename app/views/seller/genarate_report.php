<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>



<body>
    <div class="infopdfarea">
        <div class="input_container">
            <h3 id="pdftitle">Monthly selling details</h3>
            <button onclick="window.open('<?= URLROOT; ?>/sellers/genarate_pdf', '_blank')" id="view" class="pdfbuton">
            <span><i class="fa-solid fa-eye"></i></span>View summary</button>
        </div>
    </div>
    
</body>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>