$(function(){       
	$('.SelectLink ').change(function(e){
	
	
	var fireTag = $('.SelectLink option:selected').attr('rel');
dcsMultiTrack('DCS.dcsuri','financial-aid-tuition/tuition-and-expenses.jsp','WT.ti', fireTag);

	
			var url = $(this).attr('value');	
			if(url != ""){
				$.ajax({
					  url: url,
					  success: function(html){
						$("#lightbox").html("");
						$("#lightbox").append(html);
						showLightBox($("#lightbox").width()); 
						$("#close").click(function(){showLightBox($("#lightbox").width());})
						$(".close").click(function(){showLightBox($("#lightbox").width());})
						bindA();
					  }
					  }); 
									return false;
				}

		})
     }); 
function bindA(obj){
	sIFR.replace(metaBold, {
						selector: '#lightbox_container1 h1'
						,wmode: 'transparent'
						,css: [ '.sIFR-root { color:#FFFFFF;}' ]
				});
	var urlstr = window.location.href;
	if(urlstr.indexOf("opencms")==-1){
		$("#close").hover(
		function(){
			$("#close").attr("src","/assets/images/btn-close_over.jpg");
		},
		function(){
			$("#close").attr("src","/assets/images/btn-close.jpg");
		}
		);	
	}else{
		if(urlstr.indexOf("campus")!=-1&&urlstr.indexOf("locations")!=-1){
			$("#close").hover(
			function(){
				$("#close").attr("src","../../assets/images/btn-close_over.jpg");
			},
			function(){
				$("#close").attr("src","../../assets/images/btn-close.jpg");
			}
			);
		}else{
			$("#close").hover(
			function(){
				$("#close").attr("src","../assets/images/btn-close_over.jpg");
			},
			function(){
				$("#close").attr("src","../assets/images/btn-close.jpg");
			}
			);
		}
	}
	$("a").each(function(i, n){
		if(typeof($(n).attr("linkType"))!="undefined"){		
			$(n).unbind("click");
			$(n).bind("click",function(){
				var url = $(this).attr("href");
				/*inLightBox*/
				if($(this).attr("linkType")=="inLightBox"){
					
					$.ajax({
					  url: url,
					  success: function(html){
						$("#lightbox").html("");
						$("#lightbox").append(html);
						showLightBox($("#lightbox").width()); 
						$("#close").click(function(){showLightBox($("#lightbox").width());})
						$(".close").click(function(){showLightBox($("#lightbox").width());})
						bindA();
					  }
					}); 
					return false;
				}
				/*external*/
				if($(this).attr("linkType")=="external"){
					location.href=url;
				}
				/*inline*/
				if($(this).attr("linkType")=="inline"){
					$.ajax({
					  url: url,
					  success: function(html){
						  
						$("#lightbox").html("");
						
						$("#lightbox").append(html);
						showLightBox($("#lightbox").width(),true); 
						$("#close").click(function(){showLightBox($("#lightbox").width());})
						bindA();
					  }
					}); 
					return false;
				}
				
				/*news list*/
				if($(this).attr("linkType")=="tabs"){
					$(".lightbox-right").children("div").css("display","none");
					url = url.substring(url.indexOf("#"));
					$(url).css("display","block");
					return false;
				}
				if($(this).attr("id") == "news_active"){
					$("#news_list").toggle();
					$("#news_list_1").toggle();
					return false;
				}
				if($(this).attr("id")=="print_page"){
					printPage();
					
					return false;
				}
			});	
		}
	});	
}
$(document).ready(function(){
	$('.selectLink1').change(function(e){	
					var url = $(this).attr('value');	
					if(url != '-1'){window.open(url,"_blank")};
					return false;
				});
});	
var printPage=function(){
	$("body").append('<iframe id="printframe" src="print.html" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" height="0" width="0"></iframe>');
	
	setTimeout(printDetail,1800);
}
var printDetail=function(){
	var rv = null; 
	var obj = document.getElementById("printframe");
	
	if (obj.contentWindow.document){ 
		rv = obj.contentWindow.document; 
	} else { 
		rv = document.frames["printframe"].document;
	}
	
	rv.body.innerHTML = $("#lightbox").html();
	obj.contentWindow.focus();
	obj.contentWindow.print();
}