<?php 
setcookie("Id", "", time()-3600);
setcookie("nombre", "", time()-3600);
header("Location: index.php");
exit();
?>