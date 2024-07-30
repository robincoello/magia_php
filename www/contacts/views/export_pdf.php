<?php

require("includes/fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage("L");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(40, 10, "Hello World !");
$pdf->Output();
