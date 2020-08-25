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
}
else
{
echo "Not Found";
}
 
?>


<div id="main_container" style="height:600px">
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
				
	<div id="content_container" style="position:relative;height:auto;width:auto; border: solid 1px #cccccc;background: #ffffff;padding:10px 10px; 10px 10px;overflow:auto;">
	<div style="position:relative;border: solid 1px #cccccc;background: #ffffff;padding:10px;display:block;">
  <table cellpadding="10px">
	<tr>
	<td>
  <?php
  echo("<a href=\"".$pic."\" class=\"highslide\" onclick=\"return hs.expand(this, { captionText: '".$div." - ".$folder."' })\"><img src=\"".$pic."\" alt=\"Highslide JS\" title=\"click to enlarge\" style=\"height:150px;\"></a>");
  //echo("<div class=\"highslide-caption\" id=\"the-caption\">".$folder."</div>");
  ?>
  </td>
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
  echo "<h3 style=\"\">Price: $".file_get_contents($price)."</h3>";
  ?>
  <img style="" src="./assets/images/cart.png">
  
  </td>
  
  </tr>
  </table>
  </div>
  <div style="position:relative;display:block;top:10px;height:auto; border: solid 1px #cccccc;background: #ffffff; padding:10px;margin:0px 0px 10px 0px;"><!-- my cart -->
  
  <img style="" src="./assets/images/check.png">
  
  </div>
  
  </div><!--content_container end-->
  
  
  
</div><!--main_container end-->


