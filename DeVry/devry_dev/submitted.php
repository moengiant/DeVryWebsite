<?php
$vars = $_SERVER['QUERY_STRING'];

$part = 1;

$shipping = split("!!!!!&", $vars); 

$first = $shipping[0];
$second = $shipping[1];

$body .= "<h3>Billing Information</h3>";

$fn = $_REQUEST['element_1_1'];
$body .= "First Name: ".$fn."<br>";

$ln = $_REQUEST['element_1_2'];
$body .= "Last Name: ".$ln."<br>";

$email = $_REQUEST['element_2'];
$body .= "Email: ".$email."<br>";

$deptnum = $_REQUEST['element_3'];
$body .= "Department Number: ".$deptnum."<br>";

$accnum = $_REQUEST['element_4'];
$body .= "Account Number: ".$accnum."<br>";

$pa = $_REQUEST['element_5_1'];
$pb = $_REQUEST['element_5_2'];
$pc = $_REQUEST['element_5_3'];
$body .= "Phone Number: (".$pa.") ".$pb."-".$pc."<br>";

$body .= "<br><h3>Shipping Information</h3>";

$stfn = $_REQUEST['element_9_1'];
$body .= "Ship to First Name: ".$stfn."<br>";

$stln = $_REQUEST['element_9_2'];
$body .= "Ship to Last Name: ".$stln."<br>";

$adda = $_REQUEST['element_8_1'];
$body .= "Address 1: ".$adda."<br>";

$addb = $_REQUEST['element_8_2'];
$body .= "Address 2: ".$addb."<br>";

$city = $_REQUEST['element_8_3'];
$body .= "City: ".$city."<br>";

$state = $_REQUEST['element_8_4'];
$body .= "State: ".$state."<br>";

$zip = $_REQUEST['element_8_5'];
$body .= "Zip: ".$zip."<br>";

$country = $_REQUEST['element_8_6'];
$body .= "Country: ".$country."<br>";

$body .= "<h3>Shipping Method</h3>";

$shipper = $_REQUEST['element_10_1'];
$body .= "Freight carrier: ".$shipper."<br>";

$shipmeth = $_REQUEST['element_10_2'];
$body .= "Shipping method: ".$shipmeth."<br>";


$body .= "<br><h3>Order Information</h3>";





$items = split("&", $first);
$num = 0;

FOR ($i = 0; $i < count($items); $i++) 
{ 
  
  
  switch ($part) {
    case 1:
        
        $part = $part + 1;
        $num++;                
        $body .= "Item ".$num."<hr>";
        $alpha = split("=", urldecode($items[$i]));
        $alphaa = str_replace("_", " ",$alpha[1], $counta);

        $body .=$alphaa."<br>";
        break;
    case 2:
        
        $part = $part + 1;
        $bravo = split("=", urldecode($items[$i]));
        $body .= "Quantity: ".$bravo[1]."<br>";
        break;
    case 3:
        $charlie = split("=", urldecode($items[$i]));
        $part = $part + 1;
        $body .= "Unit Price: ".$charlie[1]."<br>";
        break;
    case 4:
        $delta = split("=", urldecode($items[$i]));
        $part = 1;
        $body .= "Extended Price: ".$delta[1]."<br><br>";
        break;


}

  
  
  
} 



if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$visitor_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$visitor_ip = $_SERVER['REMOTE_ADDR'];
}


$ip = $visitor_ip;
$now = date('l jS \of F Y h:i:s A');


$loginfo = $now. ", " .$ip. "\r\n" .$body. "\r\n";

$log = fopen('openpagelog.txt', 'a');
fputs($log, $loginfo);
fclose($log);

$headers = "From: dcs@ionexhibits.com\r\n";
$headers .= "Content-type: text/html\r\n";

$File = "counter.txt";
//This is the text file we keep our count in, that we just made
$handle = fopen($File, 'r+') ;
//Here we set the file, and the permissions to read plus write
$data = fread($handle, 512) ;
//Actully get the count from the file
$count = $data + 1;
//Add the new visitor to the count
//print "You are visitor number ".$count;
//Prints the count on the page
fseek($handle, 0) ;
//Puts the pointer back to the begining of the file
           
fwrite($handle, $count) ;
//saves the new count to the file
fclose($handle) ;
//closes the file

function add_leading_zeros($input, $str_length) {
	return str_pad($input, $str_length, '0', STR_PAD_LEFT);
}
 
//example of usage (this will echo "0013")
$ordernumber = add_leading_zeros($count, 5); 
 
               

include("orderform.php");

$email_body = "<a href='http://www.ionexhibits.com/devry_dev/D".$ordernumber.".pdf'>DeVry Order Number: D".$ordernumber."</a>";

ini_set("SMTP","172.20.10.253");
if(mail("DeVryOnlineOrder@ionexhibits.com, kam@ionexhibits.com, dcs@ionexhibits.com", "DeVry web order",$email_body."<br>".$ip, $headers)){
echo("<h3>Thank you!</h3><br>You order has beem submitted successfully.<br>An ion exhibits representative will be in contact with you within 24 hours to confirm your order.<br>To place another order click 'Main Menu' in the top menu bar.<br><br>"); 
}
else
{
echo("There was an error in sending this message. Please contact ion exhibits by phone at 630-285-9500");
}

?>
<div style="width:100%;height:32px;border-bottom:1px dotted #ccc">
<a href="#" id="printer" style="float:right;position:relative;">print</a><a href="./D<?php echo $ordernumber; ?>.pdf" id="pdf_button" style="float:right;position:relative;">download pdf</a><br>
</div>
<hr>
<?php
echo $body;


?>
  

