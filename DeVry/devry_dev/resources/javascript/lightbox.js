function showLightBox(w, flag){
	var arrPageSizes = ___getPageSize();
	// Style overlay and show it
	if(arrPageSizes[0]<1003){
		arrPageSizes[0]=1003;
	}
	if(!flag){
		$("#lightbox-overlay").toggle();// .css("display","block");
		$("#lightbox").toggle();//.css("display","block");
		$('.SelectLink ').toggle();
	}
	$("#lightbox").css({top:(document.documentElement.scrollTop+139)+"px", left:((arrPageSizes[0]-w)/2)+"px"});
	setSize();
}
function setSize(){
	// Get page sizes
	var arrPageSizes = ___getPageSize();
	// Style overlay and show it
	if(arrPageSizes[0]<1003){
		arrPageSizes[0]=1003;
	}
	$('#lightbox-overlay').css({
		width:		arrPageSizes[0],
		height:		arrPageSizes[1]
	});
}
function ___getPageSize() {
	var xScroll, yScroll;
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = window.innerWidth + window.scrollMaxX;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		if(document.documentElement.clientWidth){
			windowWidth = document.documentElement.clientWidth; 
		} else {
			windowWidth = self.innerWidth;
		}
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}	
	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}
	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){	
		pageWidth = xScroll;		
	} else {
		pageWidth = windowWidth;
	}
	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight);
	return arrayPageSize;
};
function bindA1(obj){
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
						bindA1();
						sIFR.replace(metaBold, {
						selector: '#lightbox_container h1'
						,wmode: 'transparent'
						,css: [ '.sIFR-root { color:#FFFFFF;}' ]
				});
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
						bindA1();
						sIFR.replace(metaBold, {
						selector: '#lightbox_container h1'
						,wmode: 'transparent'
						,css: [ '.sIFR-root { color:#FFFFFF;}' ]
				});
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
var printPage=function(){
	$("body").append('<iframe id="printframe" src="print.html" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" height="0" width="0"></iframe>');
	setTimeout(printDetail,100);
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
$(function() {
	var lightbox = '<div id="lightbox-overlay"></div><div id="lightbox"></div>';
	$("body").prepend(lightbox);
	$(window).resize(function() {
		setSize();
	});
	bindA1();
	$("#lightbox-overlay").bind("click",function(){
		showLightBox($("#lightbox").width());
		$("#lightbox_container1").remove()
		if ($.browser.msie && $.browser.version.substr(0,1)<7) {
		  $("#career-perspectives-dropdown-select").show();
		}
	});
});


// pass in id for the youtube video
	function lightboxYouTube(id){
		if ($.browser.msie && $.browser.version.substr(0,1)<7) {
		  $("#career-perspectives-dropdown-select").hide();
		}
		
		var html = '<div id="lightbox_container1"  style="width: 565px; height: 342px; padding:40px 10px 14px 13px; background-image: none;"><img src="/assets/images/btn-close-white.jpg" alt="Close" id="close"/>';
		html += '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/' + id + '&hl=en&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>';
		html += '<embed src="http://www.youtube.com/v/' + id + '&hl=en&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
		html += '</div>';
		$("#lightbox").html(html);
		showLightBox($("#lightbox").width());
		$("#close").click(function(){
				showLightBox($("#lightbox").width());
				
				$("#lightbox_container1").remove()
				if ($.browser.msie && $.browser.version.substr(0,1)<7) {
				  $("#career-perspectives-dropdown-select").show();
				}
			}).hover(function(){ $(this).attr("src","/assets/images/btn-close-white_over.jpg");	}, function(){ $(this).attr("src","/assets/images/btn-close-white.jpg");});
	}

