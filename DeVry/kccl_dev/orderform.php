<?php

require_once('./pdf/config/lang/eng.php');
require_once('./pdf/tcpdf.php');

class MYPDF extends TCPDF {
	public function Header() {
		$this->setJPEGQuality(90);
	
    $this->Image('./resources/images/ionlogo.png', 10, 10, 50, 0, 'PNG', false,'T',true,300,'L',false,false,0,false,false,false);      
		$this->setCellPaddings(3,1,1,1);
    $this->SetY(16);
    $this->SetX(65);
    $this->SetFont('','',8);
    $this->Cell(30, 0, '700 District Drive', 0, 0, 'L', 0, '', 0, true, 'T', 'T');//
	  $this->SetFont('','',14);
    $this->Cell(90, 0, 'ORDER', 0, 1, 'R', 0, '', 0, true, 'T', 'T');//
    $this->SetFont('','',8);
    $this->SetXY(65,21);
    //$this->SetY(25);
    $this->Cell(30, 0, 'Itasca,IL 60143',0, 0, 'L');
    $this->Cell(90, 0, 'Date: '.date('Y/m/d'), 0, 1, 'R', 0, '', 0, false, 'T', 'T');
    $this->SetX(65);
    $this->Cell(30, 0, 'ph 630.285.9500', 0, 0, 'L');
    $this->Cell(90, 0, '', 0, 1, 'R', 0, '', 0, false, 'T', 'T');
    $this->SetX(65);
    $this->Cell(30, 0, 'fax 630.285.9501', 0, 0, 'L');
    $this->Cell(90, 0, '', 0, 2, 'R', 0, '', 0, false, 'T', 'T');
    
    
}
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont(PDF_FONT_NAME_MAIN, 'I', 8);
		$this->Cell(0, 10, 'Created By: ion exhibits - Devry Website', 0, false, 'C');
	   }
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}
}

// create a PDF object
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// set document (meta) information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('iom exhibits');
$pdf->SetTitle('Online Order - DeVry');
$pdf->SetSubject('DeVry');
$pdf->SetKeywords('ion exhibits');

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 55, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

 
// add a page
$pdf->AddPage();
 
// create address box
//$pdf->CreateTextBox('Customer name Inc.', 0, 55, 80, 10, 10, 'B');
//$pdf->CreateTextBox('Mr. Tom Cat', 0, 60, 80, 10, 10);
//$pdf->CreateTextBox('Street address', 0, 65, 80, 10, 10);
//$pdf->CreateTextBox('Zip, city name', 0, 70, 80, 10, 10);
 
// invoice title / number
$pdf->CreateTextBox('Order Number: K'.$ordernumber, 0, 45, 120, 20, 16);
 
// date, order ref
$pdf->CreateTextBox('', 0, 65, 0, 10, 10, '', 'R');
$pdf->SetXY(20, 60);
//$pdf->CreateTextBox('Order ref.: #6765765', 0, 105, 0, 10, 10, '', 'R');

// list headers
/*
$pdf->CreateTextBox('Quantity', 0, 120, 20, 10, 10, 'B', 'C');
$pdf->CreateTextBox('Product or service', 20, 120, 90, 10, 10, 'B');
$pdf->CreateTextBox('Price', 110, 120, 30, 10, 10, 'B', 'R');
$pdf->CreateTextBox('Amount', 140, 120, 30, 10, 10, 'B', 'R');
 
$pdf->Line(20, 129, 195, 129);
 
// some example data
$orders[] = array('quant' => 5, 'descr' => '.com domain registration', 'price' => 9.95);
$orders[] = array('quant' => 3, 'descr' => '.net domain name renewal', 'price' => 11.95);
$orders[] = array('quant' => 1, 'descr' => 'SSL certificate 256-Byte encryption', 'price' => 99.95);
$orders[] = array('quant' => 1, 'descr' => '25GB VPS Hosting, 200GB Bandwidth', 'price' => 19.95);
 
$currY = 128;
$total = 0;
foreach ($orders as $row) {
	$pdf->CreateTextBox($row['quant'], 0, $currY, 20, 10, 10, '', 'C');
	$pdf->CreateTextBox($row['descr'], 20, $currY, 90, 10, 10, '');
	$pdf->CreateTextBox('$'.$row['price'], 110, $currY, 30, 10, 10, '', 'R');
	$amount = $row['quant']*$row['price'];
	$pdf->CreateTextBox('$'.$amount, 140, $currY, 30, 10, 10, '', 'R');
	$currY = $currY+5;
	$total = $total+$amount;
}
$pdf->Line(20, $currY+4, 195, $currY+4);

// output the total row
$pdf->CreateTextBox('Total', 20, $currY+5, 135, 10, 10, 'B', 'R');
$pdf->CreateTextBox('$'.number_format($total, 2, '.', ''), 140, $currY+5, 30, 10, 10, 'B', 'L');
*/ 
// some payment instructions or information
$terms = file_get_contents("./templates/terms.txt");
$content = $body."<br>".$terms;
$pdf->MultiCell(175, 10, $content, 0, 'L', 0, 1, '', '', true, null, true);

$pdf->setXY(20, $currY+30);
$pdf->SetFont(PDF_FONT_NAME_MAIN, '', 10);
//$pdf->MultiCell(175, 10, $terms, 0, 'L', 0, 1, '', '', true, null, true);
 
//Close and output PDF document
$pdf->Output('K'.$ordernumber.'.pdf','F');

?>