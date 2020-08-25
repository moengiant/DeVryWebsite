<?php
if(isset($_REQUEST['form'])){
$form = $_REQUEST['form'];
}
$content = file_get_contents("./templates/".$form.".txt");
?>



  <div id="title">
		<h1>
<?php
echo $form;
?>		
    </h1>
	</div>
	<div id="img-container">
		<div id="map"></div>
	</div>
	<div id="content_container">
  
<?php
  echo $content;
?>
  
  </div>







