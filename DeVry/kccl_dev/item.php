<?php
if(isset($_POST['theunit'])){

$place = $_POST['theunit'];
//$place = "Corporate_EducationxxKCCL_Banner_Stand_Version_1xxschools/kccl";

$parts = explode("xx", $place);

$div = $parts[0];
$file = $parts[1];
$path = $parts[2];



$div = str_replace("_"," ",$div);

$folder = str_replace("_"," ",$file);

$pic = ("".$path."/".$div."/".$folder."/details/main.jpg");
$info = ("".$path."/".$div."/".$folder."/details/info.txt");
$price = ("".$path."/".$div."/".$folder."/details/price.txt");
$york = ("".$path."/".$div."/".$folder."/details/york.txt");
$replace = ("".$path."/".$div."/".$folder."/details/replace.txt");
$noshow = ("".$path."/".$div."/".$folder."/details/noshow.txt");
$copy = ("".$path."/".$div."/".$folder."/details/copy.txt");




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
				
	
				
				
				
  
  <div id="content_container" style="position:relative;height:auto;width:600px;margin-right:25px;float:left; border: solid 1px #cccccc;background: #ffffff;padding:10px 10px; 10px 10px;overflow:visible;">
	<div style="position:relative;padding:10px;display:block;overflow: visible;">
  <table style="width:100%" border="0px" cellpadding="0px" cellspacing="0px">
<tr>
  <td colspan='3'>
    
      <h3>
        <?php
          echo $folder;
          if (file_exists($copy)) { 
$title = file_get_contents($copy);
echo "<br>".$title;
}
        ?>
      </h3>
    
  </td>
</tr>

<tr>
<td rowspan="2" width="300px">
<table>
	<tr>
	<td>
  <?php
  list($width, $height, $type, $attr) = getimagesize($pic);
  
  if($width > 250){
  $scale = 250/$width;
  $newheight = $height * $scale;
  $style = "height:".round($newheight)."px;";
  }
  else
  {
  if($height > 150){
  $scale = 150/$height;
  $newwidth = $width * $scale;
  $style = "width:".round($newwidth)."px;";
  }
  $newheight = $height;
  }
/* 
$max_width = 250; 
$max_height = 150; 
//list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
// New dimensions 
$width = intval($ratio*$width); 
$height = intval($ratio*$height); 

$style = "height:".$height.";width:".$width.";";  
*/ 


  echo("<center><a href=\"".$pic."\" class=\"highslide\" onclick=\"return hs.expand(this, { captionText: '".$div." - ".$folder."' })\"><img src=\"".$pic."\" alt=\"Highslide JS\" title=\"click to enlarge\" style=\"".$style."\"></a></center>");
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

</td>
<td colspan="2" style="position:relative;align:left;width:270px">

<?php
  echo file_get_contents($info);
?>

</td>

</tr>

<tr>

<td align="right">
<?php
  //echo "<h3 style=\"\">Price: ".$plable.file_get_contents($price)."</h3>";
  $linker = $parts[0]."xx".$parts[1]."xx".$unitpricea;
  
  $myText = (string)$linker;
  if (file_exists($york)) { 
   // new york option
   $yorked = "<br>New York Option <input id=\"".trim($myText)."xxYork\" type=\"checkbox\" onclick=\"yorker( '".trim($myText)."');\"><br>";
    
} else { 
   // no new york option
   $yorked = "";
}
  
if (file_exists($replace)) { 
   // new york option
   $yorked .= "<br>Replacement Graphic Only <input id=\"".trim($myText)."xxReplace\" type=\"checkbox\" onclick=\"yorker('".trim($myText)."');\"><br>";
    
} else { 
   // no new york option
   $yorked .= "";
}
  
  
  
  if (file_exists($noshow)){
  
  }
  else 
  {
  echo ("<img name=\"add_button\" style=\"cursor:pointer;\" id=\"".trim($linker)."\" src=\"./assets/images/cart.png\" onclick=\"addtocart(this.id);\">");
  echo $yorked;
  
  }
?>
</td>
<td>
</td>
</tr>

<tr>
<td colspan='3'></td>
</tr>

</table>

  
  </div>
</div><!--content_container end-->
  

