<?php

require_once('./pdf/config/lang/eng.php');
require_once('./pdf/tcpdf.php');
 
class MYPDF extends TCPDF {
	public function Header() {
		$this->setJPEGQuality(90);
		$this->Image('./resources/images/ionlogo.png', 120, 10, 75, 0, 'PNG', 'http://www.finalwebsites.com');
 
	}
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont(PDF_FONT_NAME_MAIN, 'I', 8);
		$this->Cell(0, 10, 'finalwebsites.com - PHP Script Resource, PHP classes and code for web developer', 0, false, 'C');
	}
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}
}

// create a PDF object
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// set document (meta) information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Olaf Lederer');
$pdf->SetTitle('TCPDF Example');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, tutorial');
 
// add a page
$pdf->AddPage();
 
// create address box
$pdf->CreateTextBox('Customer name Inc.', 0, 55, 80, 10, 10, 'B');
$pdf->CreateTextBox('Mr. Tom Cat', 0, 60, 80, 10, 10);
$pdf->CreateTextBox('Street address', 0, 65, 80, 10, 10);
$pdf->CreateTextBox('Zip, city name', 0, 70, 80, 10, 10);
 
// invoice title / number
$pdf->CreateTextBox('Invoice #201012345', 0, 90, 120, 20, 16);
 
// date, order ref
$pdf->CreateTextBox('Date: '.date('Y-m-d'), 0, 100, 0, 10, 10, '', 'R');
$pdf->CreateTextBox('Order ref.: #6765765', 0, 105, 0, 10, 10, '', 'R');

// list headers
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
$pdf->CreateTextBox('$'.number_format($total, 2, '.', ''), 140, $currY+5, 30, 10, 10, 'B', 'R');
 
// some payment instructions or information
$pdf->setXY(20, $currY+30);
$pdf->SetFont(PDF_FONT_NAME_MAIN, '', 10);
$pdf->MultiCell(175, 10, '<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit</em>. <br />
Vestibulum sagittis venenatis urna, in pellentesque ipsum pulvinar eu. In nec <a href="http://www.google.com/">nulla libero</a>, eu sagittis diam. Aenean egestas pharetra urna, et tristique metus egestas nec. Aliquam erat volutpat. Fusce pretium dapibus tellus.', 0, 'L', 0, 1, '', '', true, null, true);
 
//Close and output PDF document
$pdf->Output('test.pdf', 'F');

?>