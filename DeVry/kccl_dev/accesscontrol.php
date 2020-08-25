<?php // accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();

$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];

if(!isset($uid)){
  ?>
  <!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Please Log In for Access </title>
    <meta http-equiv="Content-Type"
      content="text/html; charset=iso-8859-1" />
    <link href="http://www.ionexhibits.com/styles.css" media="all" rel="stylesheet" />
    <style type="text/css">
            
            #media
            {
                margin-top: 40px;
            }
            #noUpdate
            {
                margin: 0 auto;
                font-family:Arial, Helvetica, sans-serif;
                font-size: x-small;
                color: #cccccc;
                text-align: left;
                width: 210px; 
                height: 200px;	
                padding: 40px;
            }
        </style>

<style type="text/css">
img { behavior: url('./resources/javascript/iepngfix.htc') }
label.error {
color: red;
background: #fcdfe4;
}
span.error (
background: #fcdfe4;
color: red;
)

input.error {
background: #fcdfe4;
border:1px dotted red;
}

#notice.error{
list-style-type:none;
background: #fcdfe4;
border:1px dotted red;
}

#notice span{
list-style-type:none;
}

#form_256018 li {
list-style-type:none;
}

#form_256018 input .error{
background: #fcdfe4;
border:1px dotted red;

}

#printer{
background: #fff url('./resources/images/document_print.png') no-repeat 0 0;
  padding: 5px 0 4px 32px;
  text-decoration: none;

}

#pdf_button{
background: #fff url('./resources/images/pdf.png') no-repeat 0 0;
  padding:5px 5px 4px 30px;
  text-decoration: none;

}

</style>

<style>
   /* Z-index of #mask must lower than #boxes .window */
   #mask {
      position:absolute;
      z-index:9000;
      background-color:#000;
      display:none;
       }
   #boxes .window {
      position:absolute;
      width:440px;
      height:auto;
      display:none;
      z-index:9999;
      padding:20px;
       }
    /* Customize your modal window here, you can add background image too */
    #boxes #terms {
      width:400px;
      height:auto;
      background: #ffffff;
      }
    #boxes #privacy {
      width:700px;
      height:400px;
      background: #ffffff;
      overflow: scroll;
      }
    #boxes #howto {
      width:700px;
      height:550px;
      background: #ffffff;
      overflow: scroll;
      }
      
    #boxes #contacts {
      width:375px;
      height:auto;
      background: #ffffff;
      
      }
    
    #boxes #instructions {
      width:600px;
      height:auto;
      background: #ffffff;
      
      }
    #boxes #aboutsite {
      width:375px;
      height:auto;
      background: #ffffff;
      }
      
      #pdf {
      position:relative;
      left:-10px;
	    width: 600px;
      height: 500px;
      background: #FFF;
	    margin-left: auto ;
      margin-right: auto ;
      }
      
      #media{
      
      }
      
      #imgPreviewWithStyles {
      background: #fff;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      padding: 15px;
      z-index: 999;
      border: 1px solid #ccc;
      
      align:center;
      }
      
      /* Text below image */
      #imgPreviewWithStyles span {
      color: #bbb;
      text-align: center;
      display: block;
      padding: 10px 0 3px 0;
      }
      
</style>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="devry campus locations, devry locations, undergraduate campus locations, search campus locations, devry university" />
<meta name="description" content="DeVry has more than 90 campus locations in the U.S. &amp;amp; Canada. Search DeVry campus locations by zip code to find a location near you. More at DeVry.edu." />
<title>Event Marketing</title>

<link rel="stylesheet" href="resources/css/print.css" media="print" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/global.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/template5.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/home.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/view.css" />


<link rel="stylesheet" type="text/css" href="resources/css/sifr.css" />
<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="./resources/css/ie.css" />
<![endif]-->
<!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="./resources/css/ie6.css" />
<![endif]-->
    
  </head>
  
  <body style="background:#ffffff;">
  <div id="html_container">
		<div id="html_center">
			<div id="header_container" style="height:82px;">
                <div id="logo">
                    <a title="DeVry University">DeVry University</a>
                </div>
                
                
                
      </div>          
<div id="navigate_container" style="">

</div><!--navigate_container end-->			
			
<div id="main_container">
  <div id="title">
		<h1>
		DeVry Event Site
    </h1>
	</div>
	<div id="img-container">
		<div id="map"></div>
	</div>
				
	<div id="content_container">
		<h2>
		Welcome to DeVry's Event site	
    </h2>
		<h1> Login Required </h1>
  <p>You must log in to access this area of the site.</p>
  <p><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="log">
    User ID: <input type="text" name="uid" size="8" style="border: 1px solid #ccc"/><br />
    Password: <input type="password" name="pwd" SIZE="8" style="border: 1px solid #ccc"/><br />
    <br>
    <input type="image" src="./assets/images/log_button.png" onclick="document.log.submit()"/>
  </form></p>
  
  </div><!--content_container end-->

  
 

</div><!--main_container end-->
  
			
</div><!--html_center end-->
		
		
    </div><!--footer_container end-->
    <!-- #dialog is the id of a DIV defined in the code below -->
 
   </div><!--html_container end-->
   
   

   
 </body>

  </html>
  <?php
  exit;
}

$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;

dbConnect("sessions");
$sql = "SELECT * FROM user WHERE
        userid = '$uid' AND password = PASSWORD('$pwd')";
$result = mysql_query($sql);
if (!$result) {
  error('A database error occurred while checking your '.
        'login details.\\nIf this error persists, please '.
        'contact you@example.com.');
}

if (mysql_num_rows($result) == 0) {
  unset($_SESSION['uid']);
  unset($_SESSION['pwd']);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Access Denied </title>
    <meta http-equiv="Content-Type"
      content="text/html; charset=iso-8859-1" />
      <style type="text/css">
            
            #media
            {
                margin-top: 40px;
            }
            #noUpdate
            {
                margin: 0 auto;
                font-family:Arial, Helvetica, sans-serif;
                font-size: x-small;
                color: #cccccc;
                text-align: left;
                width: 210px; 
                height: 200px;	
                padding: 40px;
            }
        </style>

<style type="text/css">
img { behavior: url('./resources/javascript/iepngfix.htc') }
label.error {
color: red;
background: #fcdfe4;
}
span.error (
background: #fcdfe4;
color: red;
)

input.error {
background: #fcdfe4;
border:1px dotted red;
}

#notice.error{
list-style-type:none;
background: #fcdfe4;
border:1px dotted red;
}

#notice span{
list-style-type:none;
}

#form_256018 li {
list-style-type:none;
}

#form_256018 input .error{
background: #fcdfe4;
border:1px dotted red;

}

#printer{
background: #fff url('./resources/images/document_print.png') no-repeat 0 0;
  padding: 5px 0 4px 32px;
  text-decoration: none;

}

#pdf_button{
background: #fff url('./resources/images/pdf.png') no-repeat 0 0;
  padding:5px 5px 4px 30px;
  text-decoration: none;

}

</style>

<style>
   /* Z-index of #mask must lower than #boxes .window */
   #mask {
      position:absolute;
      z-index:9000;
      background-color:#000;
      display:none;
       }
   #boxes .window {
      position:absolute;
      width:440px;
      height:auto;
      display:none;
      z-index:9999;
      padding:20px;
       }
    /* Customize your modal window here, you can add background image too */
    #boxes #terms {
      width:400px;
      height:auto;
      background: #ffffff;
      }
    #boxes #privacy {
      width:700px;
      height:400px;
      background: #ffffff;
      overflow: scroll;
      }
    #boxes #howto {
      width:700px;
      height:550px;
      background: #ffffff;
      overflow: scroll;
      }
      
    #boxes #contacts {
      width:375px;
      height:auto;
      background: #ffffff;
      
      }
    
    #boxes #instructions {
      width:600px;
      height:auto;
      background: #ffffff;
      
      }
    #boxes #aboutsite {
      width:375px;
      height:auto;
      background: #ffffff;
      }
      
      #pdf {
      position:relative;
      left:-10px;
	    width: 600px;
      height: 500px;
      background: #FFF;
	    margin-left: auto ;
      margin-right: auto ;
      }
      
      #media{
      
      }
      
      #imgPreviewWithStyles {
      background: #fff;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      padding: 15px;
      z-index: 999;
      border: 1px solid #ccc;
      
      align:center;
      }
      
      /* Text below image */
      #imgPreviewWithStyles span {
      color: #bbb;
      text-align: center;
      display: block;
      padding: 10px 0 3px 0;
      }
      
</style>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="devry campus locations, devry locations, undergraduate campus locations, search campus locations, devry university" />
<meta name="description" content="DeVry has more than 90 campus locations in the U.S. &amp;amp; Canada. Search DeVry campus locations by zip code to find a location near you. More at DeVry.edu." />
<title>Event Marketing</title>

<link rel="stylesheet" href="resources/css/print.css" media="print" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/global.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/template5.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/home.css" />
<link media="screen" rel="stylesheet" type="text/css" href="resources/css/view.css" />


<link rel="stylesheet" type="text/css" href="resources/css/sifr.css" />
<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="./resources/css/ie.css" />
<![endif]-->
<!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="./resources/css/ie6.css" />
<![endif]-->    
  
  </head>
    <body style="background:#ffffff;">
  <div id="html_container">
		<div id="html_center">
			<div id="header_container" style="height:82px;">
                <div id="logo">
                    <a title="DeVry University">DeVry University</a>
                </div>
                
                
                
      </div>          
<div id="navigate_container" style="">

</div><!--navigate_container end-->			
			
<div id="main_container">
  <div id="title">
		<h1>
		DeVry Event Site
    </h1>
	</div>
	<div id="img-container">
		<div id="map"></div>
	</div>
				
	<div id="content_container">
		<h2>
		Welcome to DeVry's Event site	
    </h2>
  <h1> Access Denied </h1>
  <p>Your user ID or password is incorrect, or you are not a
     registered user on this site. To try logging in again, click
     <a href="<?=$_SERVER['PHP_SELF']?>">here</a>.</p>
  </div><!--content_container end-->

  
 

</div><!--main_container end-->
  
			
</div><!--html_center end-->
		
		
    </div><!--footer_container end-->
    <!-- #dialog is the id of a DIV defined in the code below -->
 
   </div><!--html_container end-->
   
   

   
 </body>

  </html>
  <?php
  exit;
}


$site = mysql_result($result,0,'site');

if($site == "GE") {
  ?>
  <!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Please Log In for Access </title>
    <meta http-equiv="Content-Type"
      content="text/html; charset=iso-8859-1" />
    <link href="http://www.ionexhibits.com/styles.css" media="all" rel="stylesheet" />
  <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-26539680-1']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script></head>
  <body>
  <h1> Login Required </h1>
  <p>You must log in to access this area of the site. If you are
     not a registered user, <a href="http://www.ionexhibits.com/rental/options/signup.php">click here</a>
     to sign up for instant access!</p>
  <p><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    User ID: <input type="text" name="uid" size="8" /><br />
    Password: <input type="password" name="pwd" SIZE="8" /><br />
    <input type="submit" value="Log in" />
  </form></p>
  </body>
  </html>
  <?php
  exit;
}



$username = mysql_result($result,0,'fullname');
?>
