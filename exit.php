<?php
 include_once('include/config.php');
 setcookie("id","",time()-3600);
 unset($_SESSION['id']);
 header('Location:index.php');
?>