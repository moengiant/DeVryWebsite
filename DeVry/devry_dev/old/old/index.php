<?php

function getDirectory( $path = '.', $level = 0 ){ 

    $ignore = array( 'cgi-bin', '.', '..','details','scripts','images','includes' ); 
    $ignore2 = array( 'cgi-bin','.', '..','details','scripts','images','includes' ); 
    
    // Directories to ignore when listing output. Many hosts 
    // will deny PHP access to the cgi-bin. 

    $dh = @opendir( $path ); 
    // Open the directory to the handle $dh 
     
    while( false !== ( $file = readdir( $dh ) ) ){ 
    // Loop through the directory 
     
        if( !in_array( $file, $ignore ) ){ 
        // Check that this file is not to be ignored 
             
            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) ); 
            // Just to add spacing to the list, to better 
            // show the directory tree. 
             
            if( is_dir( "$path/$file" ) ){ 
            // Its a directory, so we need to keep reading down... 
             
                //echo "<strong>$spaces $file</strong><br />"; 
                
                if($level==0){echo("\n<h5 style=\"padding-left:5px;background: url('./assets/images/bg-nav-level1.gif') repeat-x;font-size:12px;color:#fff;\"><a href='#' style=\"color:#fff;font-size:11px;\">$file</a></h5>");
                
                //echo getcwd();
                echo "\n<div>";
                $dircheck = @opendir( "./$path/$file" );
                //echo $path."/".$file."<br>";
                 
                // Open the directory to the handle $dh 
     
                  while( false !== ( $ele = readdir( $dircheck ) ) ){ 
                  // Loop through the directory
                     
                    if( !in_array( $ele, $ignore2 ) ){ 
                    // Check that this file is not to be ignored 
                    
                    if(is_dir("./".$path."/".$file."/".$ele)){
                    $sprp = str_replace(" ","_",$ele);
                    
                    echo "<p id=\"$sprp\" style=\"padding-left: 15px;font-size:11px;background:url(./assets/images/bg-nav-level1.gif) repeat-x 0 -17px;margin:0px 0px 0px 0px;border:solid 1px #cccccc\">".$ele."</p>";
                    
                    
                    //$bt_functions .= "\n$(\"#".$sprp."\").click(function(){\n$(\"#main_container\").load(\"item.php?unit=".$sprp."\");\n};\n";
                    //echo $bt_functions;
                    
                    
                    }
                    else
                    {
                    //echo "not a directory - $path/$ele<br>";
                    
                    }
                    
                    }
                     else
                    {
                    //echo "do not include - $path/$ele<br>";
                    }
                    } 
                    echo "</div>";
                
                }
                else
                {
                }
                getDirectory( "$path/$file", ($level+1) ); 
                // Re-call this same function but on a new directory. 
                // this is what makes function recursive. 
             
            } else { 
             
                //echo "$spaces $file<br />"; 
                // Just print out the filename 
             
            } 
         
        } 
     
    } 
     
    closedir( $dh ); 
    // Close the directory handle 

} 

function getMyButtons( $path = '.', $level = 0 ){ 

    $ignore = array( 'cgi-bin', '.', '..','details','scripts','images','includes' ); 
    $ignore2 = array( 'cgi-bin','.', '..','details','scripts','images','includes' ); 
    
    // Directories to ignore when listing output. Many hosts 
    // will deny PHP access to the cgi-bin. 

    $dh = @opendir( $path ); 
    // Open the directory to the handle $dh 
     
    while( false !== ( $file = readdir( $dh ) ) ){ 
    // Loop through the directory 
     
        if( !in_array( $file, $ignore ) ){ 
        // Check that this file is not to be ignored 
             
            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) ); 
            // Just to add spacing to the list, to better 
            // show the directory tree. 
             
            if( is_dir( "$path/$file" ) ){ 
            // Its a directory, so we need to keep reading down... 
             
                //echo "<strong>$spaces $file</strong><br />"; 
                
                if($level==0){
                //echo("\n<h5 style=\"padding-left:5px;background: url('./assets/images/bg-nav-level1.gif') repeat-x;font-size:12px;color:#fff;\"><a href='#' style=\"color:#fff;font-size:11px;\">$file</a></h5>");
                
                //echo getcwd();
                //echo "\n<div>";
                $dircheck = @opendir( "./$path/$file" );
                //echo $path."/".$file."<br>";
                 
                // Open the directory to the handle $dh 
     
                  while( false !== ( $ele = readdir( $dircheck ) ) ){ 
                  // Loop through the directory
                     
                    if( !in_array( $ele, $ignore2 ) ){ 
                    // Check that this file is not to be ignored 
                    
                    if(is_dir("./".$path."/".$file."/".$ele)){
                    $sprp = str_replace(" ","_",$ele);
                    
                    //echo "<p id=\"$sprp\" style=\"padding-left: 15px;font-size:11px;background:url(./assets/images/bg-nav-level1.gif) repeat-x 0 -17px;margin:0px 0px 0px 0px;border:solid 1px #cccccc\">".$ele."</p>";
                    
                    
                    echo("\n$(document).ready(function() {\n$(\"#".$sprp."\").click(function(){\n$(\"#main_container\").load(\"item.php?theunit=1234, { theunit : ".$sprp." }\");\n});\n});");
                    //echo $bt_functions;
                    
                    
                    }
                    else
                    {
                    //echo "not a directory - $path/$ele<br>";
                    
                    }
                    
                    }
                     else
                    {
                    //echo "do not include - $path/$ele<br>";
                    }
                    } 
                    //echo "</div>";
                
                }
                else
                {
                }
                getDirectory( "$path/$file", ($level+1) ); 
                // Re-call this same function but on a new directory. 
                // this is what makes function recursive. 
             
            } else { 
             
                //echo "$spaces $file<br />"; 
                // Just print out the filename 
             
            } 
         
        } 
     
    } 
     
    closedir( $dh ); 
    // Close the directory handle 

}




?>  


 


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" > 
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="devry campus locations, devry locations, undergraduate campus locations, search campus locations, devry university" />
<meta name="description" content="DeVry has more than 90 campus locations in the U.S. &amp;amp; Canada. Search DeVry campus locations by zip code to find a location near you. More at DeVry.edu." />
<title>Event Marketing</title>

<link rel="stylesheet" href="resources/css/print.css" media="print" />

<link media="screen" rel="stylesheet" type="text/css" href="resources/css/global.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/template5.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/home.css" />

<link rel="stylesheet" type="text/css" href="resources/css/sifr.css" />
<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="./resources/css/ie.css" />
<![endif]-->
<!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="./resources/css/ie6.css" />
<![endif]-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
    $(".accord").accordion(
{alwaysOpen: true, autoHeight: false}
);
});

<?php

getMyButtons("schools/devry");

?>

</script>
 


<script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-26539680-1']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script></head>

<body>
  <div id="html_container">
		<div id="html_center">
			<div id="header_container">
                <div id="logo">
                    <a title="DeVry University">DeVry University</a>
                </div>
                <div style="height:85px;width:100%;">
                </div>
      </div>          
<div id="navigate_container">
<div class="accord" style="width:140px;display:inline;float:left;">			
<?php
getDirectory( "schools/devry" ); 
?>
</div>
</div>
<!--navigate_container end-->
			
			
<div id="main_container" style="height:600px">
  <div id="title">
		<h1>
		Exhibit Inventory
    </h1>
	</div>
	<div id="img-container">
		<div id="map"></div>
	</div>
				
	<div id="content_container">
		<h2>
		Welcome to DeVry's Trade Show Booth inventory site	
    </h2>
		<p>On this site you will find a number of displays and sizes to fit your needs from DeVry, Keller, Corporate Education to CoBranded exhibits. To get started select from the options in the left side menu for the displays you would like to shop.</p>
	</div><!--content_container end-->
</div><!--main_container end-->
			
</div><!--html_center end-->
		
		<!-- footer_container start -->
		<div id="footer_container"> 
        <div id="footer_center"> 
            <div id="footer_wrapper"> 
		<ul> 
			<li class="first"> 
				<ul> 
					<li class="title">About this site</li> 
					<!--
          <li><a id="more-about-call" track="" href="../degree-programs/colleges-degree-programs-overview.jsp">Degree Programs</a></li>                             
					<li><a track="" href="http://information.devry.edu/us/campus-tour?vc=160053" target="_blank">Campus Tour</a></li>
					<li><a track="" class="rivc" href="http://information.devry.edu/us/domestic-request-info?vc=140427" target="_blank">Request Information</a></li>
					<li><a track="" href="../uscatalog/">Academic Catalogs</a></li>
					<li><a track="" href="http://high-school.devry.edu/parents-sp/index.jsp?WT.ac=hs-sp-parent" target="_blank">Los Padres de Familia (Espa&ntilde;ol)</a></li> 
					<li><a track="" href="../financial-aid-tuition/financial-aid-tuition-faqs.jsp">FAQs</a></li> 
				  -->
        </ul> 
			</li> 
			<li class="second"> 
				<ul> 
					<li class="title">How To Use This Site</li> 
					<!--
          <li><a track="" href="../degree-programs/academic-calendar.jsp">Academic Calendar</a></li> 
					<li><a track="" href="../uscatalog/">Academic Catalogs</a></li> 
					<li><a track="" href="http://library.devry.edu" target="_blank">DeVry University Library</a></li> 
				  -->
        </ul> 
			</li> 
			<li class="third"> 
				<ul> 
					<li class="title">Contacts</li> 
					<!--
          <li><a track="" href="http://alumni.devry.edu/" target="_blank">Alumni Home</a></li>
					<li><a track="" href="http://alumni.devry.edu/about.jsp" target="_blank">Alumni Association</a></li>
					<li><a track="" href="http://alumni.devry.edu/benefits.jsp" target="_blank">Benefits & Services</a></li>
					<li><a track="" href="http://alumni.devry.edu/networking.jsp" target="_blank">Networking</a></li>
					<li><a track="" href="http://alumni.devry.edu/news-events.jsp" target="_blank">News & Events</a></li>
				  -->
        </ul> 
			</li>

			<li class="fourth"> 
				<ul> 
					<li class="title"></li> 
					<!--
          <li><a track="" href="http://corp.keller.edu" target="_blank">Corporate Education</a></li> 
					<li><a track="" href="http://www.beckerpm.com/" rel="nofollow" target="_blank">Employee Training</a></li> 
					<li><a track="" href="../hiredevry/">Hire DeVry</a></li> 
				  -->
        </ul> 
			</li> 
			<li class="fifth"> 
				<ul> 
					<li class="title"></li> 
					<!--
          <li><a track="" href="../whydevry/accreditation.jsp">Accreditation &amp; Approvals</a></li> 
					<li><a track="" href="../advisory-board.jsp">Advisory Board</a></li>                             
					<li><a track="" href="http://www.devryuniversity-devry.icims.com" rel="nofollow" target="_blank">Careers at DeVry</a></li> 
					<li><a track="" href="../contact_us.jsp">Contact Us</a></li> 
					<li><a track="" href="http://newsroom.devry.edu/" target="_blank">Newsroom</a></li>
					<li><a track="" href="http://www.devry.edu/presidents-blog/">President's Blog</a></li> 
				  -->
        </ul> 
			</li>

			 
		</ul>


                </div><!--footer_container end--> 
            <div id="copyright">
                <a href="#">Terms and Conditions</a> | 
                <a href="#">Privacy Policy</a> 
                </div> 
            <div id="disclaimer">
            </div> 


        </div> <!--footer_center end-->
    </div><!--footer_container end-->
    



<!-- footer_container end -->
		
	</div><!--html_container end-->

</body>
</html> 