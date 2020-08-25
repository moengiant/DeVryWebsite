<?php

echo("<html>\n<head>\n");

// -------------------- 1st script disables enter key 

// -------------------- 2nd script is function to run when instruction link is clicked

?>

<script type="text/javascript">

function te(d, q){
	
	
	var g = q + '.graphic';
	document.orders(q).value = "0";
	document.orders(g).value = "0";
	
	var e = document.orders(d).length;
	var r = document.orders(d);
	r.checked = false;
	for (i=0; i<e; i++){
	if (r[i].checked == true) {
		r[i].checked = false;
		}
	}

}
</script>


<script type="text/javascript">
	
	function kH(e) {
			var pK = e ? e.which : window.event.keyCode;
			return pK !=13;
		       }
	document.onkeypress = kH;
	if (document.layers) document.captureEvents(Event.KEYPRESS);

</script>

<script type="text/javascript">

	function instructions(){
				alert("1 - Enter the desire quantiities for a show.\n\n" +
      				"2 - If applicable select market area.\n\n" +
				"3 - Click the 'CONFIRM ORDER' button.\n\n" +
				"4 - To Reset an order section press the clear button.\n")
			       }
</script>
<script type="text/javascript">
function contact(){
alert("Please contact Mike McShane with ion exhibits\n" +
      " at 630-227-4577 or by email\n" +
      " mjm@ionexhibits.com")
}
</script>

<script type="text/javascript">
function checkframes(){
this.parent.foot.location="./footer.html";
}
</script>

<?php

// -------------------- include script to validate form for numbers

include("../scripts/number_checker.js");

$pagenumber = 1;


echo ("\n<style>\n");


echo ("</style>\n</head>\n<body onLoad=\"checkframes();\">\n");



// -------------------- starts page output 

$dir = getcwd();

chdir("../");
$d = getcwd();

echo("<center>\n<div style='width:720px; background-color:#fff'>\n");
echo("<table border='0' style='background-color:#fff; width:100%;'>\n<tr>\n<td>\n");

include("./includes/co_header.html");

echo("</td></tr><tr><td>");

include("./includes/menu.html");

echo("</td>\n</tr>\n</table>\n");

chdir($dir);
// -------------------- generate dynamic page content

?>
<div style="width:95%;">
<form name="orders" action="../frame.php" method="get" target="_top">
<center>
<table width="100%" style="border-bottom:2px solid; border-top:2px solid; font-family:Tahoma; font-size:15px; background-color:#fff;">
<font face="Tahoma">
		



<?php

$direct = getcwd();
if (is_dir($direct)) {$dd = @opendir($direct);
                   while (($detailed = @readdir($dd)) == true) {if ($detailed !="."&& $detailed !=".."&& $detailed !="index.php" && $detailed !="details" && $details !='Copy of index_options' && $detailed !='footer.html' && $detailed !='frame.html' && $detailed !='index1.php' && $detailed !='original_index.php') 
                                                              { 
								$detail_array[]=$detailed;
                                            }
                                           }
                                          if ($dd == true) 
                                                          {
                                                           closedir($dd);
                                                          }
                                          }

sort($detail_array);
reset($detail_array);

// -------------------- Count number of items in array

for($n=0;$n<count($detail_array);$n++) {
	$counter = ($n+1);}

// -------------------- Set number of items per page with limit

$limit = 20;
$pages = round(($counter/$limit),0);
$top_page = ($pages+1);
$p=$pagenumber;
$low_record = (($p*$pages)-$limit);
$high_record = (($p*$limit)-1);

// -------------------- Generates dynamic table from folder content

for($i=0;$i<count($detail_array);$i++){
	
			if($i<($counter+1) && $i<($high_record+1) && $i>($low_record-1)){
			$headeritem = $detail_array[$i];
			$clean = eregi_replace(" ","",$headeritem);
			$q="_quantity";
			$num=$clean.$i;
			$quantity=$clean.$q;
			$plus="+";
			echo("<tr>\n<td colspan=\"3\"><h3>$headeritem</h3></td>\n</tr>\n");
			echo("<tr>\n<td width=\"20%\">\n");
			echo("<center>\n<table>\n<tr>\n<td>\n<a href='$headeritem/details/main.jpg'>\n<img src=\"$headeritem/details/main.jpg\" width=\"230\" height=\"168\"></a>\n");
			echo("</td>\n</tr>\n");
			echo("<tr>\n<td>\n");
			echo("<p>- Click image for larger view -</p>\n");
			echo("</td>\n</tr>\n</table>\n</center>\n</td>\n");
			echo("<td valign='top' width=\"60%\">\n<p>");
			echo("<font size=2px>");
			include("./$headeritem/details/info.txt");
			echo("</font></p>\n</td>\n");
			echo("<td valign='top'>\n");
			echo("<table>\n");
			echo("<tr>\n<td>\n");
			$price = file_get_contents("./$headeritem/details/price.txt"); 
			$dollar = number_format($price);
			$cleandollar = str_replace(",","",$dollar);
			$passed = $clean.$plus.$cleandollar;
			echo("<font size=\"3px\"><b>Complete Package</b></font><br>(Hardware and Graphic)<br>");
			echo "$",$dollar,"*";
			
			echo(" ");
			echo("</td>\n</tr>\n");
			echo("<tr>\n<td>\n");
			echo("Quantity:");
			
			echo("<input type=\"text\" name=\"$passed\" id=\"$quantity\" value=\"0\" onfocus=\"this.value=''\" onchange=\"isNumeric(this.id,'Numbers Only Please', this.name)\">\n");
			echo("</td>\n</tr>\n");
			
			if (file_exists("./$headeritem/details/graphic.txt")) {
			echo("<tr>\n<td>\n");
			$graphic = file_get_contents("./$headeritem/details/graphic.txt"); 
			$gdollar = number_format($graphic);
			$gcleandollar = str_replace(",","",$gdollar);
			$graph="graphic";
			$gpassed = $clean.$graph.$plus.$gcleandollar;
			echo("<font size=\"3px\"><b>Replacement Graphic Package</b></font>");
			echo("<br>(Graphic Only)<br>");
			echo "$",$gdollar,"*";
			$graph="graphic";
			echo("<br>Quantity:<input type=\"text\" name=\"$gpassed\" id=\"$quantity.$graph\" value=\"0\" onfocus=\"this.value=''\" onchange=\"isNumeric(this.id,'Numbers Only Please', this.name)\">\n");
			
			echo("</td>\n</tr>\n");
			}
			
			if (file_exists("./$headeritem/details/york.txt")) { 
    
			$york = file_get_contents("./$headeritem/details/york.txt");
			echo("<tr><td><br><input type=\"radio\" name=\"$clean\" value=\"$york\"> New York</td></tr>\n");
                        } else {}			

			if (file_exists("./$headeritem/details/canada.txt")) { 
    

			$canada = file_get_contents("./$headeritem/details/canada.txt");
			echo("<tr><td><input type=\"radio\" name=\"$clean\" value=\"$canada\"> Canada</td></tr>\n");
			} else {}
			
			echo("<tr><td><br><input type=\"button\" value=\"Clear\" name=\"c\" onClick=\"te('$clean','$quantity')\">");
			echo("</td></tr></table>");
			echo("<tr>\n<td colspan=\"3\">\n");
			echo("<hr width=\"100%\">\n");
			echo("</td>\n</tr>\n");
			
			}}

echo("</table></center>\n");


// -------------------- Pagination

$limit = 20;
$pages = round(($counter/$limit),0);
$width = ($pages*10);
$top_page = ($pages);
echo("<center>\n<div style=\"border:none;\">\n<center>Page Results</center>\n<center>\n<table cellspacing='10'>\n<tr>\n");
for ($p = 0;$p<$top_page;$p++){
				    
         			    $high_record = (($pagenumber*$limit)-1);
				    $low_record = (($high_record - $limit)+1);
				    echo("<td>\n");
				    echo("<a href=\"pager.php/?limit=$limit&low=$low_record&high=$high_record&url=$d&menu=$m&records=$counter\">$pagenumber</a>");
                                    echo("</td>\n");
				    $pagenumber = ($pagenumber+1);}					
	
		

echo("</tr></table></div></center><br>");

//-------------------- Closing page tags

echo("</div></center></div></body>\n</html>\n");
?>
																											