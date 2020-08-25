<?php // common.php

function error($msg) {
    ?>
    <html>
    <head>
    <script language="JavaScript">
    <!--
        alert("<?php echo $msg; ?>");
        history.back();
    //-->
    </script>
    <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-26539680-1']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script></head>
    <body>
    </body>
    </html>
<?php
    exit;
}
?>
