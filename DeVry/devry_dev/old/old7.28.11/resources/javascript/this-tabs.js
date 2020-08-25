var opencms = ((window.location.href).indexOf("opencms")>-1) ? "/opencms/opencms" : "";

	var metaBold = {  
		src: opencms + '/resources/flash/metaBold.swf'
	}; 
	var metaCondensedBold = {
		src: opencms + '/resources/flash/metaCondensedBold.swf'
	}
  	var metaMedium = {  
		src: opencms + '/resources/flash/metaMedium.swf'
	}; 
	sIFR.activate(metaMedium, metaBold, metaCondensedBold);
$(function() {
	var tabs = "tabs";
	var temp = "";
	var i = 0;
	$("#accordion").css("display", "block");
	$("#accordion").accordion({
		header: "div.head",
        event: 'click',
		alwaysOpen : false,
		autoHeight:false,
		change:function(){
			$(this).find("div").css("height", "");
			$(this).find("div.head").each(function(i, n){
				$(n).css("background", $(n).css("background-image"));   
			});
			var a = $(this).find("div.selected");
			$(a).css("background", $(a).css("background-image")+" no-repeat 0 -29px");
		}
	});
	var a = $("#accordion").find("div.selected");
	$(a).css("background", $(a).css("background-image")+" no-repeat 0 -29px");
	$("#accordion div.head").bind("click",function(){
		if($("#accordion div.head").index(this) == $("#accordion div.head").length-1 && $(this).attr("class").indexOf("selected")==-1){
			$("#accordion").css("border-bottom","1px solid #DBDBDB");
		}else{
			$("#accordion").css("border-bottom","0px");
		} 
	});
	
	$("#effect").hide();
	$(".btn_detail").click(function() {
		var obj;
		if($(this).parent().parent().html().toLowerCase().indexOf("div")!=-1)
			obj = $(this).parent().next();
		else
			obj = $(this).parent().parent().next();
		if($(this).html()=="[+] Show details"){
			$(obj).show("blind");
			$(this).html("[-] Hide details");
		}else{	
			$(obj).hide("blind");
			$(this).html("[+] Show details");
		}
		return false;
	});
	$("#"+tabs+" a").each(function(j,n){
		var str = $(n).parent().attr("class");
		if(str.indexOf("_sel") != -1)
			$(n).css({ "font-size":"1.2em"});
		if($(n).parent().attr("class").indexOf("long")!= -1 && $(n).parent().width() <= 245){
			i += $(n).parent().width();
		}else{
			if($(n).parent().width() <= 162)
				i += $(n).parent().width()+2;
		}
	})
	if(i<550)
		i=550;
	$("#"+tabs+" ul").css("width",i+"px");
	
	function showLevel3(){
		$(".level2").removeClass("level2_sel");
		$(temp).addClass("level2_sel");
		$("#sub_nav_container").css("display", "block");
		$("#sub_nav_body").html("");
		var obj = "<ul>"+$(temp).children(".level3").html()+"</ul>";
		$("#sub_nav_body").append(obj);
		$("#sub_nav_body").children(".level3").css("display", "block");
			if (jQuery.browser.msie) {
			  if(parseInt(jQuery.browser.version) == 6) {
			      $("#career-perspectives-dropdown-select").hide();
				  $("#career-perspectives-dropdown-go").hide();
			  }
			}	
	}
	$(".level2").bind("mouseover",function(){		
		$(this).addClass("level2_sel");
		temp = $(this);
		$("#sub_nav_container").css("top", $(this).offset().top+"px");
		$("#sub_nav_container").css("left", 174+"px");
		if($(this).children(".level3").length>0){
			showLevel3();
		}
	});
	
	$(".level2").bind("mouseout",function(){		
		$(this).removeClass("level2_sel");
		temp = $(this);
		$("#sub_nav_container").css("display", "none");
		$("#html_container").css("height","auto");
		if (jQuery.browser.msie) {
		  if(parseInt(jQuery.browser.version) == 6) {
		      $("#career-perspectives-dropdown-select").show();
			  $("#career-perspectives-dropdown-go").show();
		  }
		}
	});
	$("#sub_nav_container").hover(
		function(){
			$("#sub_nav_container").css("display", "block");
			$(temp).addClass("level2_sel");
			if (jQuery.browser.msie) {
			  if(parseInt(jQuery.browser.version) == 6) {
			      $("#career-perspectives-dropdown-select").hide();
				  $("#career-perspectives-dropdown-go").hide();
			  }
			}
		},
		function(){
			$(temp).removeClass("level2_sel");
			$("#sub_nav_container").css("display", "none");
			$("#html_container").css("height","auto");
			if (jQuery.browser.msie) {
			  if(parseInt(jQuery.browser.version) == 6) {
			      $("#career-perspectives-dropdown-select").show();
				  $("#career-perspectives-dropdown-go").show();
			  }
			}
		}
	);
	
		
	
	sIFR.replace(metaBold, {
	selector: '#title h1'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#FFFFFF;}' ]
	});
	sIFR.replace(metaCondensedBold, {
		selector: '#resource_center h3'
		,wmode: 'transparent'
		,css: [ '.sIFR-root { color:#205C82;}' ]
	});
	sIFR.replace(metaBold, {
	selector: '#title_pic h1'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#FFFFFF;}' ]
	});
	sIFR.replace(metaBold, {
	selector: '#title_container h1'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#FFFFFF;}' ]
	});
	sIFR.replace(metaBold, {
	selector: '#lightbox_container h1'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#FFFFFF;}' ]
	});
	sIFR.replace(metaBold, {
	selector: '#img-container h1'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#FFFFFF;}' ]
	});
	sIFR.replace(metaBold, {
	selector: '#content_container h2'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#0F2D50;}' ]
	});
	sIFR.replace(metaBold, {
	selector: '#content_container h3'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#0F2D50; font-size:15px;}']
	});
	sIFR.replace(metaMedium, {
	selector: '#content_container span.cta_link'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#2D73A8; cursor:pointer;}', 'a{color:#2D73A8;text-decoration: none; font-size:16px}','a:hover{color:#2D73A8;}' ]
	});
	sIFR.replace(metaMedium, {
	selector: '#title_container span.cta_link'
	,wmode: 'transparent'
	,css: [ '.sIFR-root { color:#ffffff; cursor:pointer; width:100%}', 'a{color:#ffffff;text-decoration: none; font-size:16px}','a:hover{color:#ffffff;}' ]
	});
	$("#print_page").bind("click",function(){   
	});
// button highlight
	$('#search-btn').mouseover(
		function (){
		$(this).css('background-position','-272px -28px');
		});
	$('#search-btn').mouseout(
		function (){
		$(this).css('background-position','-272px 0px');
		});
	$('.send-btn').mouseover(
		function (){
		$(this).css('background-position','-331px -28px');
		});
	$('.send-btn').mouseout(
		function (){
		$(this).css('background-position','-331px 0px');
		});
	$('.go-btn').mouseover(
		function (){
		$(this).css('background-position','-370px -28px');
		});
	$('.go-btn').mouseout(
		function (){
		$(this).css('background-position','-370px 0px');
		});
	$('.go-btn1').mouseover(
		function (){
		$(this).css('background-position','right -28px');
		});
	$('.go-btn1').mouseout(
		function (){
		$(this).css('background-position','right 0px');
		}); 
	$('.go-btn2').mouseover(
		function (){
		$(this).css('background-position','right top');
		});
	$('.go-btn2').mouseout(
		function (){
		$(this).css('background-position','left top');
		}); 
});

