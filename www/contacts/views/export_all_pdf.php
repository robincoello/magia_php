<?php

include (pdf_template('export'));

$pdf = new EXPORT();
$pdf->AddPage("L");

$pdf->SetFont("arial", "B", 16);

$pdf->Cell(100, 10, $title, 0, 1);
$pdf->SetFont("arial", "", 10);

$pdf->body_contacts($contacts);

//$pdf->SetFont("Arial","B",16);
//$pdf->Cell(40,10,"Hello World !");
$pdf->Output();
