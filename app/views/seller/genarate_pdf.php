<?php 
    include_once APPROOT . '/fpdf/fpdf.php';
    

    if(sizeof($data['reportData']) != 0){

        $pdf = new FPDF();
        $pdf -> AddPage();
        $pdf -> SetLineWidth(0.5);
        $pdf -> Rect(5.0, 5.0, $pdf->GetPageWidth() - 10.0, $pdf -> GetPageHeight() - 10.0);
        $pdf -> Image('http://localhost/gardening_hub/img/seller/logo.png', 25, 10, 60, 30);
        $pdf -> SetFont("Times", "B", 9);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(100, 10, "", "0", "0", "C");
        $pdf -> Cell(0, 10, "gardeninghub@gmail.com", "0", "1", "L");
        $pdf -> Cell(100, 10, "", "0", "0", "C");
        $pdf -> Cell(0, 10, "No 12, Main Rd, Kirulapona, Colombo 7", "0", "1", "L");
        $pdf -> Cell(100, 10, "", "0", "0", "C");
        $pdf -> Cell(0, 10, "011-4513769", "0", "1", "L");
        $pdf -> SetLineWidth(0.3);
        $pdf -> Cell(190,5,"", "0", "1", "C");
        $pdf -> Cell(190,0,"", "1", "1", "C");
        $pdf -> Cell(190,1,"", "0", "1", "C");
        $pdf -> Cell(190,0,"", "1", "1", "C");


        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> SetLineWidth(0.1);
        $pdf -> Cell(190,10,"", "0", "1", "C");
        $pdf -> SetFont("Times", "", 15);
        $pdf -> Cell(190,15,"Monthly Income", "0", "1", "C");
        $pdf -> Cell(190,15,"", "0", "1", "C");
        $pdf -> SetFont("Times", "", 8);
        $pdf -> Cell(25,10,"Product Number", "1", "0", "C");
        $pdf -> Cell(30,10,"Product Name", "1", "0", "C");
        $pdf -> Cell(25,10,"Sold Products", "1", "0", "C");
        $pdf -> Cell(25,10,"Unit Price", "1", "0", "C");
        $pdf -> Cell(30,10,"Completed Date", "1", "0", "C");
        $pdf -> Cell(25,10,"Review", "1", "0", "C");
        $pdf -> Cell(30,10,"Income", "1", "1", "C");

        foreach($data['reportData'] as $reportData){
            $pdf -> Cell(25,10,$reportData -> product_no, "1", "0", "C");
            $pdf -> Cell(30,10,$reportData -> title, "1", "0", "C");
            $pdf -> Cell(25,10,$reportData -> num_of_sold_items, "1", "0", "C");
            $pdf -> Cell(25,10,$reportData -> price, "1", "0", "C");
            $pdf -> Cell(30,10,$reportData -> complete_date_time, "1", "0", "C");
            $pdf -> Cell(25,10,$reportData -> fullrating, "1", "0", "C");
            $pdf -> Cell(30,10,$reportData -> item_income, "1", "1", "C");
        }
        $pdf -> Cell(160,10,"Total monthly income", "1", "0", "C");
        $pdf -> Cell(30,10,$data['totalIncome'] -> total_income, "1", "0", "C");
        $pdf -> Output($_SESSION['seller_name'].'_summary.pdf', 'I');
    } else {
        echo "Not Found Record";
    }
?>
