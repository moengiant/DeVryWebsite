<script type="text/javascript">
function isNumeric(e, helperMsg, d){
	var elem = this.document.getElementById(e);
	var rid = this.document.getElementById(d);
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		document.getElementById(e).value='0';
		this.document.orders(d).blur(0);
		this.document.orders(d).focus(0);
		return false;
	}
}
</script>