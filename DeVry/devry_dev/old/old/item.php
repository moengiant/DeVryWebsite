<?php

echo $_REQUEST['theunit']; 



if(is_set($_POST['theunit'])){
echo $_POST['theunit'];
}
else
{
echo "Not Found";
}
 
?>