<?php
//include 'accesscontrol.php';
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
                
                if($level==0){echo("\n<h5 style=\"padding-left:5px;background: url('./assets/images/bg-nav-level1.gif') repeat-x;font-size:13px;color:#fff;\"><a href='#' style=\"color:#fff;font-size:13px;\">$file</a></h5>");
                
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
                    $frep = str_replace(" ","_", $file);
                    
                    echo "<p class=\"piclinks\" id=\"".$frep."xx".$sprp."\" style=\"cursor:pointer;padding-left: 15px;font-size:13px;background:url(./assets/images/bg-nav-level1.gif) repeat-x 0 -17px;margin:0px 0px 0px 0px;border:solid 1px #cccccc\" rel=\"./".$path."/".$file."/".$ele."/details/main.jpg\">".$ele."</p>";
                    
                    
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
                    $frep = str_replace(" ","_", $file);
                    
                     echo("$(document).ready(function(){\n$(\"#".$frep."xx".$sprp."\").click(function(){\ncheckButton();\n$(\"#main_container\").load(\"item.php\", {theunit: '".$frep."xx".$sprp."xx".$path."'}, function(){ $(\"input:checkbox\").uniform(); });\n});\n});\n");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  
<!--Force IE6 into quirks mode with this comment tag-->
<!-- 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="./resources/javascript/jquery-1.6.3.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="./resources/javascript/jquery.calculation.js"></script>
<script type="text/javascript" src="./resources/javascript/jquery.clearform.min.js"></script> 
<script type="text/javascript" src="./resources/highslide/highslide.js"></script>
<script type="text/javascript" src="./resources/javascript/jquery.qtip-1.0.min.js"></script>
<script type="text/javascript" src="./resources/javascript/iepngfix_tilebg.js"></script> 
<script type="text/javascript" src="./resources/javascript/jquery.validate.js"></script>
<script type="text/javascript" src="./howtoorder/pdfobject.js"></script>        
<script type="text/javascript" src="./resources/javascript/imgpreview.js"></script>
<script type="text/javascript" src="./resources/javascript/jquery.uniform.js" ></script>
<link rel="stylesheet" type="text/css" href="./resources/css/uniform.default.css" />

<link rel="stylesheet" type="text/css" href="./resources/highslide/highslide.css" />


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
      width:375px;
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

<script>
   $(document).ready(function() {
  $('p.piclinks').imgPreview({
   containerID: 'imgPreviewWithStyles',
   /* Change srcAttr to rel: */
   srcAttr: 'rel',
   imgCSS: {
   // Limit preview size:
   height: '100px'
   },
   distanceFromCursor: {
   top:-50,
   left:100
   },
   // When container is shown:
   onShow: function(link){
   $('<span>preview image</span>').appendTo(this);
   },
   // When container hides:
   onHide: function(link){
   $('span', this).remove();
   }
   }); 
});
</script>

<script>
   $(document).ready(function() {
    $("input:checkbox").uniform();
     });
</script>

<script>
   $(document).ready(function() {
   //select all the a tag with name equal to modal
   $('a[name=modal]').click(function(e) {
   //Cancel the link behavior
   e.preventDefault();
   //Get the A tag
   var id = $(this).attr('href');
   //Get the screen height and width
   var maskHeight = $(document).height();
   var maskWidth = $(window).width();
   //Set height and width to mask to fill up the whole screen
   $('#mask').css({'width':maskWidth,'height':maskHeight});
   //transition effect
   //$('#mask').fadeIn(1000);
   $('#mask').fadeTo("slow",0.7);
   //Get the window height and width
   var winH = $(window).height();
   var winW = $(window).width();
   //Set the popup window to center
   $(id).css('top',  winH/2-$(id).height()/2);
   $(id).css('left', winW/2-$(id).width()/2);
   //transition effect
   $(id).fadeIn(2000);
  });
   //if close button is clicked
   $('.window .close').click(function (e) {
   //Cancel the link behavior
   e.preventDefault();
   $('#mask, .window').hide();
  });
   //if mask is clicked
   $('#mask').click(function () {
   $(this).hide();
   $('.window').hide();
  });
});
</script>

<script type="text/javascript">
 function yorker(mydog){
 var checkE = "#" + mydog + "xxYork";
 var checkR = "#" + mydog + "xxReplace";
 var theTarget = $('img[name=add_button]').attr('id');
 $("#" + theTarget).attr({'id': 'cleared'});
 var theClean = $('img[name=add_button]').attr('id');
 
 if($(checkE).is(':checked') && $(checkR).is(':checked')){
 var theCase = 1;
 }
 else if($(checkE).is(':checked')){
 var theCase = 2;
 }
 else if($(checkR).is(':checked')){
 var theCase = 3;
 }
 else {
 var theCase = 4;
 }
 
 switch(theCase)
{
case 1:
  // if New York option and Replacement option are check
  var theNew = "Replacement_Graphic_Only_New_York_Option_" + mydog;
  $("#" + theClean).attr({'src':'./assets/images/cart.png'}); 
  $("#" + theClean).attr({'id': theNew});
  break;
  
case 2:
  // if only the New York option is checked
  var theNew = "New_York_Option_" + mydog;
  $("#" + theClean).attr({'src':'./assets/images/cart.png'}); 
  $("#" + theClean).attr({'id': theNew});
  break;
  
case 3:
  // if only the Replacement option is checked
  var theNew = "Replacement_Graphic_Only_" + mydog;
  $("#" + theClean).attr({'src':'./assets/images/cart.png'}); 
  $("#" + theClean).attr({'id': theNew});
  break;
  
default:
  // if nothing is checked
  var theNew = mydog;
  $("#" + theClean).attr({'src':'./assets/images/cart.png'}); 
  $("#" + theClean).attr({'id': theNew});
  }
}
</script>


 
<script type="text/javascript"> 
$(document).ready(function() {

$(window).bind('beforeunload', function() {
var str = $("#myorder").serialize();
if(str != ''){  
return 'WARNING!!!\n\nYou have placed items in your cart and you have not completed your order\n\nIf you exit this page your information will not be saved! ';
} 
 });

});
</script>

<script type="text/javascript"> 
function checkButton(){
 if($("#submitorder").length >0){
 //check button state when a menu item is click
 $("#big_bt").attr({'src':'./assets/images/check.png'});
 $("#submitorder").attr({'id':'checkout'});
 }
}
</script>

<script type="text/javascript"> 
	function clearCart(){
  v = document.getElementById('cart');
  v.style.display = "inline";
  v.style.display = "none";
}
  function showCart(){
  v = document.getElementById('cart');
  v.style.display = "inline";
  }
</script>

<script type="text/javascript">
  function button(bt){
  if(bt == "checkout"){
  $("#big_bt").attr({'src':'./assets/images/submit.png'});
  var bid = "#" + bt;
  $(bid).attr({'id':'submitorder'});
  $('#main_container').empty();      
  $.get('content.php',{form: 'order form'} ,function(data){
  $("#main_container").append(data);
  },"html"
  );
 }
  
  
  else
  {
  if(bt == "submitorder"){
  
  $("#notice span").html('');
  $("#notice").removeClass("error");
  
  n = document.getElementById('notice');
  
  n.style.display = "none";
  
  $.validator.addMethod("textOnly", function(value, element) {
		return !/[0-9]*/.test(value);
		
	}, "Alpha Characters Only.");
  
  $("#form_256018").validate({
   
   //errorElement: "div",
   //highlight: function(element, errorClass) {         $(element).removeClass(errorClass);     },
  
  
   submitHandler: function(form) {
        //alert("made it to submit handler");
   	    $("div.error").hide();
        var str = $("#myorder").serialize();
        var str_info = $("#form_256018").serialize();
        $('#myorder').empty();
        clearCart();
        $.get('submitted.php',str + "!!!!!&" + str_info,function(data){$("#main_container").html(data);},"html");
 },


  
  invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      //alert(errors);
      if (errors>0) {
      
        var message = errors == 1 ? 'There is an error in one of the fields. It has been highlighted.<br>Correct the error and click the submit order button.<br>' : 'There are ' + errors + ' errors in the form. They have been highlighted.<br>Correct the errors and click the submit order button.<br>';
          var errors = "";
            if (validator.errorList.length > 0) {
              for (x=0;x<validator.errorList.length;x++) {
              errors += "<br>" + validator.errorList[x].message;
              
              }
             }
        if(validator.errorList.length>1){
          vehe = 18;
          }
          else
          {
          vehe = 18;
          }
        $("#notice").addClass("error");
        $('#notice').css({ 'height': 58 + vehe * validator.errorList.length}); 
        $("div.error span").html("<img src='./resources/images/alert-32.png' style='position:relative;float:left;top:0px;left:2px;padding:5px'>" + message + "\n" + errors);
        $("div.error").show();
        
      } 
      else {
        

        $("div.error").hide();
        var str = $("#myorder").serialize();
        var str_info = $("#form_256018").serialize();
        $('#myorder').empty();
        clearCart();
        $.get('submitted.php',str + "!!!!!&" + str_info,function(data){$("#main_container").html(data);},"html");
        
      }
  },


  rules: {
      element_1_1:{
        required: true,
      minlength: 2,
      //textOnly: true
        
      },
      
      element_2: {
        required: true,
        email: true
     }
     
  },
  messages: {
      element_2: {
        required: "We need your email address to contact you",
        email: "Your email address must be in the format of name@domain.com"
     },
     element_1_1: {
        required: "Please enter your first name.",
        minlength: "Your first name needs to be longer than two charaters",
        //textOnly: "This field can not contain numeric values."
     }

  }
  }
  ).form();
  
  if(!$('#form_256018').valid()){
   return false;
   
   }
   
   else {
   var str = $("#myorder").serialize();
  var str_info = $("#form_256018").serialize();
  $('#myorder').empty();
  clearCart();
  $('#main_container').empty();
  $('#main_container').html('<center><img src="./resources/images/loading_orange.gif"><br>submitting order</center>');                                    
  //alert(str);
  $.get('submitted.php',str + "!!!!!&" + str_info,function(data){$('#main_container').empty();$("#main_container").append(data);
  $("#printer").live("click", function(){ window.print() });

  },"html");
  
   }
   }
  
  
  }
  
}
</script>

<script type="text/javascript"> 
	hs.graphicsDir = './resources/highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.wrapperClassName = 'wide-border';
</script>

<script type="text/javascript"> 
function addtocart(widget){
var myArray = widget.split('xx');
widget = widget.replace(/^\s+|\s+$/g,"");
var qtyid = widget + "_qty";
var item = myArray[1];
var newitem = item.replace(/_/g,"&nbsp;");
var price = myArray[2];
var newprice = price.replace("dot",".");

if(!this.document.getElementById(qtyid)){
//$('#myorder').append('<div id="' + widget + '_dv" style="display:block;border-bottom:1px solid #cccccc;padding:10px;height:auto;"><input id="' + widget + '_in" class="orderpart" type="text" size="40" value="' + myArray[0] + ' - ' + newitem + '" style="height:auto;padding:2px;" readonly="readonly"><span id="' + widget + '_sp" style="margin-left:15px">QTY: </span><input style="margin-left:2px" class="orderpart" id="' + qtyid + '" type="text" size="3" value="1" onKeyUp="updateTotal(\'' + widget + '\');"><input id="' + widget + '_hdp" type="hidden" size="10" value="$' + newprice + '"><input id="' + widget + '_pr" class="orderpart" type="text" size="10" value="$' + newprice + '" style="height:auto;padding:2px;margin-left:15px" readonly="readonly"><a href="#" id="' + widget + '_rm" name="' + widget + '" style="margin-left:15px;" onclick="remover(this.name)"><img src="./assets/images/remove7.png" style="position:relative;top:5px;"></a></div>');
$('#myorder').append('<input id="' + widget + '_in" name="' + widget + '_in" class="orderpart" type="text" size="40" value="' + myArray[0] + ' - ' + newitem + '" style="height:auto;padding:2px;" readonly="readonly"><span id="' + widget + '_sp" style="margin-left:15px">QTY: </span><input style="margin-left:2px" class="orderpart" id="' + qtyid + '" name="' + qtyid + '" type="text" size="3" value="1" onKeyUp="updateTotal(\'' + widget + '\');"><input id="' + widget + '_hdp" name="' + widget + '_hdp" type="hidden" size="10" value="$' + newprice + '"><input id="' + widget + '_pr" type="hidden" name="' + widget + '_pr" class="orderpart" type="text" size="10" value="$' + newprice + '" style="height:auto;padding:2px;margin-left:15px" readonly="readonly"><a href="#" id="' + widget + '_rm" name="' + widget + '" style="margin-left:15px;" onclick="remover(this.name)"><img src="./assets/images/remove7.png" style="position:relative;top:5px;"></a>');
//alert('<input id="' + widget + '_in" class="orderpart" type="text" size="40" value="' + myArray[0] + ' - ' + newitem + '" style="height:auto;padding:2px;" readonly="readonly"><span id="' + widget + '_sp" style="margin-left:15px">QTY: </span><input style="margin-left:2px" class="orderpart" id="' + qtyid + '" type="text" size="3" value="1" onKeyUp="updateTotal(\'' + widget + '\');"><input id="' + widget + '_hdp" type="hidden" size="10" value="$' + newprice + '"><input id="' + widget + '_pr" class="orderpart" type="text" size="10" value="$' + newprice + '" style="height:auto;padding:2px;margin-left:15px" readonly="readonly"><a href="#" id="' + widget + '_rm" name="' + widget + '" style="margin-left:15px;" onclick="remover(this.name)"><img src="./assets/images/remove7.png" style="position:relative;top:5px;"></a>');



$("#myorder").height('auto');
$("#myorder div:nth-child(odd)").css("background", "#FAFAFA");
var total = $("input[id$='_pr']").sum();
//this.document.getElementById("tots").innerHTML = total;

}
else
{
var ele = this.document.getElementById(qtyid).value;
var asd = Number(ele) + 1; 
this.document.getElementById(qtyid).value = asd;
var costele = this.document.getElementById(widget + "_hdp").value;
var danumber = costele.replace("$","");
newcost = Number(danumber) * Number(asd);
this.document.getElementById(widget + "_pr").value = "$" + newcost;

var total = $("input[id$='_pr']").sum();
//this.document.getElementById("tots").innerHTML = total;


}
}
</script>

<script type="text/javascript">
  function drop(){
  //var str = $("form[name= mystuff] :input[value]").serialize();
  //var str = $("#myorder").serialize();
  //alert(str);
  $("#myorder").submit();
   
}
</script>

<script type="text/javascript">
$(document).ready(function() {
//$('form').live('submit',function(e){
//      e.preventDefault();
      //alert($(this).serialize());
//});
});
</script>

<script type="text/javascript">
$(document).ready(function() {

var myPDF = new PDFObject({ url: "./howtoorder/how to order.pdf" }).embed("pdf");
if(!myPDF){
$("#pdf").css("height","50px");
}
});
</script>

<script type="text/javascript">
function updateTotal(theID){
var theSub = this.document.getElementById(theID + "_qty").value;
var theCost = this.document.getElementById(theID + "_hdp").value;
var newcost = Number(theSub) * Number(theCost.replace("$",""));
this.document.getElementById(theID + "_pr").value = "$" + newcost;
var total = $("input[id$='_pr']").sum();
//this.document.getElementById("tots").innerHTML = total;

}
</script>

<script type="text/javascript">
function contentchanger(formid){
$("#main_container").load("content.php", {form: formid});
}
</script>

<script type="text/javascript"> 
function remover(place){
var reid = "#" + place + "_in";
var resp = "#" + place + "_sp";
var rerm = "#" + place + "_rm";
var reqt = "#" + place + "_qty";
var redv = "#" + place + "_dv";
var repr = "#" + place + "_pr";
var rehp = "#" + place + "_hdp";
var elhe = $(reid).height();
var cahe = $("#myorder").height();
$(reid).remove();
$(resp).remove();
$(rerm).remove();
$(reqt).remove();
$(redv).remove();
$(repr).remove();
$(rehp).remove();


var ct = $("#myorder").children().size();
$("#myorder div:nth-child(1n)").css("background", "#ffffff");
$("#myorder div:nth-child(odd)").css("background", "#FAFAFA");

$("#myorder").height('auto');

var total = $("input[id$='_pr']").sum();
//this.document.getElementById("tots").innerHTML = total;

}
</script>


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


<script>
  $(document).ready(function() {
    $(".accord").accordion({active: false, autoHeight: false});
});

$(document).ready(function() {
$('.tipsy').qtip({
style: { 
      
      padding: 5,
      background: '#eeeeee',
      color: 'black',
      textAlign: 'left',
      border: {
         width: 1,
         radius: 1,
         color: '#cccccc'
      },
      tip: 'leftMiddle',
      name: 'dark' // Inherit the rest of the attributes from the preset dark style
   },
position: {
      corner: {
         target: 'rightMiddle',
         tooltip: 'leftMiddle'
      }
}
});
});

<?php

//getMyButtons("schools/devry");
getMyButtons("schools/KCCL");

?>

</script>
 
<script>

function flipper(button){
if(button == 'devry_menu'){
$("#devryBox").attr("style","display:inline;width:140px;float:left;");
$("#kcclBox").attr("style","display:none");

}
else
{
$("#kcclBox").attr("style","display:inline;width:140px;float:left;");
$("#devryBox").attr("style","display:none");

}
}
</script>





<script>
function total(){
var total = $("input[id$='_pr']").sum();
//this.document.getElementById("tots").innerHTML = 'Total: $' + total;

}
</script>


</head>

<body style="background:#ffffff;">
  <div id="html_container">
		<div id="html_center">
			<div id="header_container" style="height:82px;">
                <div id="logo">
                    <a title="DeVry University">DeVry University</a>
                </div>
                
                <div id=header_nav" style="height:15px;position:absolute;left:400px;top:28px;color:#fff;">
                <a href="../index.php" style="color:#fff;">Main Menu</a> | <a href="#howto" name="modal" style="color:#fff;" onclick="loader();">How to Order</a>
                </div>
                
      </div>          
<div id="navigate_container" style="">

<div id="devryBox" style="display:block;width:140px">
<!--
<h5 style="padding-left:5px;height:25px;border:1px solid #cccccc; background: url('./assets/images/bg-nav-level2.gif') repeat-x;font-size:12px;color:#fff;"><a href='#' style="color:#000;font-size:14px;">DeVry</a></h5>
-->
<div class="accord" id="devry_menu" style="width:140px;float:left;">			
<?php
getDirectory( "schools/KCCL" );
echo("\n<h5 style=\"padding-left:5px;background: url('./assets/images/bg-nav-level1.gif') repeat-x;font-size:13px;color:#fff;\"><a href='#instructions' name='modal' style=\"color:#fff;font-size:13px;\">Set-Up Instructions</a></h5>");
  
?>
</div>
</div>

<!--
<div id="kcclBox" style="display:none;">
<h5 style="padding-left:5px;height:25px;border:1px solid #cccccc;background: url('./assets/images/bg-nav-level2.gif') repeat-x;font-size:12px;color:#fff;"><a href='#' style="color:#000;font-size:14px;">KCCL</a></h5>
<div class="accord" id="kccl_menu" style="width:140px;float:left;">			
-->
<?php
//getDirectory( "schools/KCCL" ); 
?>
<!--
</div>
</div>
-->
</div><!--navigate_container end-->			
			
<div id="main_container">
  <div id="title">
		<h1>
		Event Inventory
    </h1>
	</div>
	<div id="img-container">
		<div id="map"></div>
	</div>
				
	<div id="content_container">
		<h2>
		Welcome to KCCL's Event inventory site	
    </h2>
		<p>On this site you will find a number of displays and sizes to fit your needs.</p>
		<p>To begin your order select items from the catagories in the left side menu.</p> 
	  <div>
	  <!--
    <a href="#" style="position:relative;display:inline;padding-right:10px;z-index:1000" onclick="flipper('devry_menu'); contentchanger('Step2'); showCart();"><img src="./assets/images/devry_select_button.png"></a>
	  <a href="#" style="position:relative;display:inline:10px;z-index:1000" onclick="flipper('kccl_menu'); contentchanger('Step2'); showCart();"><img src="./assets/images/keller_select_button.png"></a>
	  -->
    </div>
  
  </div><!--content_container end-->

  
 

</div><!--main_container end-->

<div id="cart" style="position:relative;top:-20px;width:600px;float:left; height:auto;z-index:1001; border: solid 1px #cccccc;background: #ffffff; padding:10px;margin:0px 0px 20px 199px;"><!-- my cart -->
 <span><img class="tipsy" src="./assets/images/info.png" title="test"></span>
 <table style="display:inline">
 <tr>
 <td style="padding-left:10px;font-weight:bold;font-size:15px;">
 Description
 </td>
 <td style="padding-left:170px;font-weight:bold;font-size:15px;">
 Quantity
 </td>
 <td style="padding-left:30px;font-weight:bold;font-size:15px;">
 
 </td>
 <td>
 </td>
 </tr>
 </table>
 
 
 <form id="myorder" name="mystuff" action="#" method="get">
 
 </form>
  
  <hr>
  <table>
  <tr>
  <td>
  <!--
  <a href="#" onclick="drop();" id="thebut"><img style="" src="./assets/images/check.png"></a>
  -->
  
  <a href="#" onclick="button(this.id);" id="checkout"><img id="big_bt" style="" src="./assets/images/check.png"></a>
  
  </td>
  <td style="padding-left:190px;font-weight:bold;font-size:15px;">
  <!-- Total: $ --><span id="tots" style="display:none;">0</span>
  </td>
  </tr>
  </table>
 
 
</div>
  
			
</div><!--html_center end-->
		
		<!-- footer_container start -->
		<div id="footer_container"> 
        <div id="footer_center"> 
            <div id="footer_wrapper"> 
		<ul> 
			<li class="first"> 
				<ul> 
					<li class="title"><a href="#aboutsite" name="modal">About this site</a></li> 
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
					<li class="title"><a href="#instructions" name="modal">Set-up Instructions</a></li> 
					<!--
          <li><a track="" href="../degree-programs/academic-calendar.jsp">Academic Calendar</a></li> 
					<li><a track="" href="../uscatalog/">Academic Catalogs</a></li> 
					<li><a track="" href="http://library.devry.edu" target="_blank">DeVry University Library</a></li> 
				  -->
        </ul> 
			</li> 
			<li class="third"> 
				<ul> 
					<li class="title"><a href="#contacts" name="modal">Contacts</a></li> 
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
                <a href="#terms" name="modal">Terms and Conditions</a> | 
                <a href="#privacy" name="modal">Privacy Policy</a> 
                </div> 
            <div id="disclaimer">
            </div> 
     </div> <!--footer_center end-->
    </div><!--footer_container end-->
    <!-- #dialog is the id of a DIV defined in the code below -->
      <div id="boxes">
                   <!-- #customize your modal window here -->
                         <div id="terms" class="window">
                                  <a href="#" class="close" style="float:right" >Close <img src="./resources/images/close.png" style="position:relative;top:3px;"></a>
                                  <br>
                                  
                                  <!-- close button is defined as close class -->
                                  <?php 
                                  include("./templates/terms.html");
                                  ?>
                                  
                         </div>
                         
                         <div id="privacy" class="window">
                                  <a href="#" class="close" style="float:right" >Close <img src="./resources/images/close.png" style="position:relative;top:3px;"></a>
                                  <br>
                                  
                                  <!-- close button is defined as close class -->
                                  <?php 
                                  include("./templates/privacy_statement.txt");
                                  ?>
                                  
                         </div>
                         
                         <div id="howto" class="window">
                                  <a href="#" class="close" style="float:right" >Close <img src="./resources/images/close.png" style="position:relative;top:3px;"></a>
                                  <br>
                                  
                                  <!-- close button is defined as close class -->
                                  
                                  <?php 
                                  include("./howtoorder/howto.html");
                                  ?>
                                  
                         </div>
                         <div id="contacts" class="window">
                                  <a href="#" class="close" style="float:right" >Close <img src="./resources/images/close.png" style="position:relative;top:3px;"></a>
                                  <br>
                                  
                                  <!-- close button is defined as close class -->
                                  <?php 
                                  include("./templates/contacts.txt");
                                  ?>
                                  
                         </div>
                         <div id="aboutsite" class="window">
                                  <a href="#" class="close" style="float:right" >Close <img src="./resources/images/close.png" style="position:relative;top:3px;"></a>
                                  <br>
                                  
                                  <!-- close button is defined as close class -->
                                  <?php 
                                  include("./templates/aboutsite.txt");
                                  ?>
                                  
                         </div>
                         <div id="instructions" class="window">
                                  <a href="#" class="close" style="float:right" >Close <img src="./resources/images/close.png" style="position:relative;top:3px;"></a>
                                  <br>
                                  
                                  <!-- close button is defined as close class -->
                                  <?php 
                                  include("./templates/instructions.txt");
                                  ?>
                                  
                         </div>
                         
                   <!-- Do not remove div#mask, because you'll need it to fill the whole screen -->
                         <div id="mask"></div>
      </div>
   </div><!--html_container end-->
 </body>
</html> 