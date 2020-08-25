
jQuery.fn.sSelect = function(){  
    var selectId = $(this).attr('id');  
    var selectIndex = $('#'+selectId+' > select > option').index($('#'+selectId+' > select > option:selected')[0]);  
    $('#'+selectId).append('<div class="dropselectbox"><h4></h4><span class="FixSelectBrowserSpan"></span><ul style="display:none"><li></li></ul></div>');  
    $('#'+selectId+' > div > h4').empty().append($('#'+selectId+' > select > option:selected').text());  
    $('.dropselectbox').show();  
    var selectWidth = $('#'+selectId+'> select').css("width"); 
    $('#'+selectId+' > div > h4').css({width:selectWidth}); 
    var selectUlwidth = selectWidth;
    $('#'+selectId+' > div > ul').css({width:selectUlwidth}); 
    $('#'+selectId+' > select').hide();  
    $('#'+selectId+' > div').hover(function(){  
        $('#'+selectId+' > div > h4').addClass("over");  
        $('#'+selectId+' > div > span').addClass("over");  
    },function(){  
        $('#'+selectId+' > div > h4').removeClass("over");  
        $('#'+selectId+' > div > span').removeClass("over");  
    });
	
    var ss = "blur";
      if ($.browser.safari) {
      		ss="mouseout";
	} 
    $('#'+selectId)  
	.bind(ss,function(){  
        __clearSelectMenu(ss); 
        return false;  
    })
    .bind("focus",function(){
        __clearSelectMenu();  
        $('#'+selectId+' > div > h4').addClass("over");  
        $('#'+selectId+' > div > span').addClass("over");  
    })  
    .bind("click",function(e){  
        if($('#'+selectId+' > div > ul').css("display") == 'block'){  
            __clearSelectMenu();  
            return false;  
        }else{  
            $('#'+selectId+' > div > h4').addClass("current");  
            $('#'+selectId+' > div > span').addClass("over").addClass("current");  
            $('#'+selectId+' > div > ul').show();  
            __setSelectValue(selectId);  
             var windowspace = ($(window).scrollTop() + document.documentElement.clientHeight) - $('#'+selectId).offset().top;  
             var ulspace = $('#'+selectId+' > div > ul').outerHeight(true);  
			 if(ulspace > 300 ){
			 $('#'+selectId+' > div > ul').css('height','300px');
			 $('#'+selectId+' > div > ul').css('overflow','auto');
			 };
             selectIndex = $('#'+selectId+' > div > ul > li').index($('.selectedli')[0]);  
             $(window).scroll(function(){  
                 var windowspace = ($(window).scrollTop() + document.documentElement.clientHeight) - $('#'+selectId).offset().top;  
                 var ulspace = $('#'+selectId+' > div > ul').outerHeight(true);  
                 if (windowspace < ulspace) {  
                     $('#'+selectId+' > div > ul').css({top:-ulspace});  
                 }else{  
                     $('#'+selectId+' > div > ul').css({top:$('#'+selectId+' > div > h4').outerHeight(true)});  
                 }  
             });  
             $('#'+selectId+' > div > ul > li').click(function(e){                                          
                     selectIndex = $('#'+selectId+' > div > ul > li').index(this);  
                     //$('#value2').append('¨º¨®¡À¨º¦Ì??¡Â¡êo'+selectIndex+'&nbsp;&nbsp;<br>');  
                     $('#'+selectId+'> select')[0].selectedIndex = selectIndex;  
                     $('#'+selectId+' > div > h4').empty().append($('#'+selectId+' > select > option:selected').text());  
                     __clearSelectMenu();  
                     e.stopPropagation();  
                     e.cancelbubble = true;  
             })  
             .hover(  
                    function(){  
                         $('#'+selectId+' > div > ul > li').removeClass("over");  
                         $(this).addClass("over").addClass("selectedli");  
                         selectIndex = $('#'+selectId+' > div > ul > li').index(this);  
                     },  
                     function(){  
                         $(this).removeClass("over");  
                     }  
             );  
         };  
         e.stopPropagation();  
     })  
     .bind("mousewheel",function(){  
     })  
     .bind("dblclick", function(){  
         __clearSelectMenu();  
         return false;  
     })  
     .bind("keydown",function(e){  
         $(this).bind('keydown',function(e){  
             if (e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 35 || e.keyCode == 36){  
                 return false;  
             }  
         });  
         switch(e.keyCode){ //¨¦¨¨???atrue?¨¦???¡§case¡¤??¡ì  
             case 9:  
                 return true;  
                 break;  
             case 13:  
                 //enter  
                 //$('#value2').append('¡ã¡ä??3¦Ì¨º?¦Ì?¦Ì??¦Ì¡êo'+selectIndex+'&nbsp;&nbsp;<br>');  
                 __clearSelectMenu();  
                 break;  
             case 27:  
                 //esc  
                 __clearSelectMenu();  
                 break;  
             case 33:  
                 $('#'+selectId+' > div > ul > li').removeClass("over");  
                 selectIndex = 0;  
                 __keyDown(selectId,selectIndex);  
                 break;  
             case 34:  
                 $('#'+selectId+' > div > ul > li').removeClass("over");  
                 selectIndex = ($('#'+selectId+' > select > option').length - 1);  
                 __keyDown(selectId,selectIndex);  
                 break;  
             case 35:  
                 $('#'+selectId+' > div > ul > li').removeClass("over");  
                 selectIndex = ($('#'+selectId+' > select > option').length - 1);  
                 __keyDown(selectId,selectIndex);  
                 break;  
             case 36:  
                 $('#'+selectId+' > div > ul > li').removeClass("over");  
                 selectIndex = 0;  
                 __keyDown(selectId,selectIndex);  
                 break;  
             case 38:  
                 //up  
                 //$('#value2').append('?-¨º??¦Ì¡êo'+selectIndex+'&nbsp;&nbsp;<br>');  
                 $('#'+selectId+' > div > ul > li').removeClass("over");  
                 if (selectIndex == 0){  
                     selectIndex = 0;  
                 }else{  
                     selectIndex--;  
                 };  
                 //$('#value2').append('<span style="color:red;">?¨°¨¦???¡À?¦Ì?aa?¦Ì¡êo</span>'+selectIndex+'&nbsp;&nbsp;');  
                 __keyDown(selectId,selectIndex);  
                 break;  
             case 40:  
                 //down  
                 //$('#value2').append('¡ä?¦ÌY1y¨¤¡ä¦Ì?¡êo'+selectIndex+'&nbsp;&nbsp;');  
                 $('#'+selectId+' > div > ul > li').removeClass("over");  
                 if (selectIndex == ($('#'+selectId+' > select > option').length - 1)){  
                    selectIndex = $('#'+selectId+' > select > option').length - 1;  
                }else{  
                    selectIndex ++;  
                };  
               //$('#value2').append('<span style="color:blue;">?¨°????¡À?¦Ì?aa?¦Ì¡êo</span>'+selectIndex+'&nbsp;&nbsp;');  
               __keyDown(selectId,selectIndex);  
                break;  
           		/*case ((hotkeys > 47 && hotkeys < 59) || (hotkeys > 64 && hotkeys < 91) || (hotkeys > 96 && hotkeys < 123)): 
                //¨º¡Á¡Á???2¨¦?¡¥?¡è¨¢??¨®?¨² 
                //character = String.fromCharCode(hotkeys).toLowerCase(); 
                return false; 
                break;*/  
            default:  
                return false;  
                break;  
        };  
    });
     
    //???1????  
    $('.dropselectbox').bind("selectstart",function(){  
            return false;  
    });  
};  
  
function __clearSelectMenu(s){  
	if(s=="mouseout"){
		$("body").bind("click", function(){
			__clearSelectMenu();
		});	
	}else{
		$('.dropselectbox > ul').empty().hide();  
		$('.dropselectbox > h4').removeClass("over").removeClass("current");  
		$('.dropselectbox > span').removeClass("over");
	}
}  
   
function __setSelectValue(sID){  
    $('#'+sID+' > div > ul').empty();  
    $.each($('#'+sID+' > select > option'), function(i){  
        $('#'+sID+' > div > ul').append("<li class='FixSelectBrowser'>"+$(this).text()+"</li>");  
    });  
    $('#'+sID+' > div > h4').empty().append($('#'+sID+' > select option:selected').text());  
    $('#'+sID+' > div > ul > li').eq($('#'+sID+'> select')[0].selectedIndex).addClass("over").addClass("selectedli");  
}  
  
function __keyDown(sID,selectIndex){  
    $('#'+sID+'> select')[0].selectedIndex = selectIndex;  
    $('#'+sID+' > div > ul > li:eq('+selectIndex+')').toggleClass("over");  
    $('#'+sID+' > div > h4').empty().append($('#'+sID+' > select option:selected').text());  
}  
$(document).ready(function(){
	$("resource_main").css("display","block");
	$("#test1").sSelect(); 
});