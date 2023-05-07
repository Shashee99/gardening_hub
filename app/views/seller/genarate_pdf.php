<?php 
    include_once APPROOT . '/fpdf/fpdf.php';
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf -> SetFont("Arial", "B", 16);
    $pdf -> SetTextColor(252, 3, 3);
    $pdf -> Cell(0, 50, "Monthly Selling Details", "0", "1", "C");

    //Table Column
    // $pdf -> SetLeftMargin(10);
    // $pdf -> SetRightMargin(800);
    $pdf -> SetTextColor(0, 0, 0);
    $pdf -> SetFont("Arial", "", 7);
    $pdf -> Cell(30,10,"Product Number", "1", "0", "C");
    $pdf -> Cell(30,10,"Product Name", "1", "0", "C");
    $pdf -> Cell(25,10,"Sold Products", "1", "0", "C");
    $pdf -> Cell(25,10,"Unit Price", "1", "0", "C");
    $pdf -> Cell(30,10,"Completed Date", "1", "0", "C");
    $pdf -> Cell(25,10,"Review", "1", "0", "C");
    $pdf -> Cell(30,10,"Income", "1", "1", "C");

    if(sizeof($data['reportData']) != 0){
        foreach($data['reportData'] as $reportData){
            $pdf -> Cell(30,10,$reportData -> product_no, "1", "0", "C");
            $pdf -> Cell(30,10,$reportData -> title, "1", "0", "C");
            $pdf -> Cell(25,10,$reportData -> num_of_sold_items, "1", "0", "C");
            $pdf -> Cell(25,10,$reportData -> price, "1", "0", "C");
            $pdf -> Cell(30,10,$reportData -> complete_date_time, "1", "0", "C");
            $pdf -> Cell(25,10,$reportData -> fullrating, "1", "0", "C");
            $pdf -> Cell(30,10,$reportData -> item_income, "1", "1", "C");
        }
    } else {
        echo "Not Found Record";
    }
    $pdf -> Cell(165,10,"Total monthly income", "1", "0", "C");
    $pdf -> Cell(30,10,$data['totalIncome'] -> total_income, "1", "0", "C");

    $pdf -> Output();
?>
