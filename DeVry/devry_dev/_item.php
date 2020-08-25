<?php
if(isset($_POST['theunit'])){

$place = $_POST['theunit'];

$parts = explode("xx", $place);

$div = $parts[0];
$file = $parts[1];
$path = $parts[2];

$div = str_replace("_"," ",$div);

$folder = str_replace("_"," ",$file);

$pic = ("".$path."/".$div."/".$folder."/details/main.jpg");
$info = ("".$path."/".$div."/".$folder."/details/info.txt");
$price = ("".$path."/".$div."/".$folder."/details/price.txt");

$unitprice = file_get_contents($price);

if(trim($unitprice) == ""){
$unitprice = 0;
} 


$regexp = "/.[A-z]/";

if (preg_match($regexp, $unitprice, $matches)) {
 $unitpricea = 0;
 $plable = "";
}

else 
{
$plable = "$";



$unitpricea = str_replace(".","dot",$unitprice);



}


}
else
{
echo "Not Found";
}
 
?>


  <div id="title">
		<h1>
<?php
echo $div." - ".$folder;
?>		
    </h1>
	</div>
	<div id="img-container">
		<div id="map"></div>
	</div>
				
	
				
				
				
  
  <div id="content_container" style="position:relative;height:auto;width:600px;margin-right:25px;float:left; border: solid 1px #cccccc;background: #ffffff;padding:10px 10px; 10px 10px;overflow:auto;">
	<div style="position:relative;border: solid 1px #cccccc;background: #ffffff;padding:10px;display:block;">
  <table cellpadding="10px">
	<tr>
	<td>
	<table>
	<tr>
	<td>
  <?php
  echo("<center><a href=\"".$pic."\" class=\"highslide\" onclick=\"return hs.expand(this, { captionText: '".$div." - ".$folder."' })\"><img src=\"".$pic."\" alt=\"Highslide JS\" title=\"click to enlarge\" style=\"height:150px;\"></a></center>");
  //echo("<div class=\"highslide-caption\" id=\"the-caption\">".$folder."</div>");
  ?>
  </td>
  </tr>
  <tr>
  <td>
  <center>click image for larger view<img style="position:relative;top:5px;left:5px;" src="./assets/images/zoom_in.png"></center>
  </td>
  </tr>
  </table>
  <td>
  <h3>Item Description:</h3>
  <h4>
  <?php 
  echo $folder
  ?>
  </h4>
  <br>
  <?php
  echo file_get_contents($info);
  ?>
  
  </td>
  <td>
  <?php
  echo "<h3 style=\"\">Price: ".$plable.file_get_contents($price)."</h3>";
  $linker = $parts[0]."xx".$parts[1]."xx".$unitpricea;
  ?>
  <img style="cursor:pointer;" id="<?php echo($linker) ?>" src="./assets/images/cart.png" onclick="addtocart(this.id)">
  
  </td>
  
  </tr>
  </table>
  </div>
  </div><!--content_container end-->
  

