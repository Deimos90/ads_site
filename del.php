<?php 
require_once('mount.php');
$id=$_GET['id'];
mysql_query( "DELETE FROM orders WHERE order_id = $id LIMIT 1" );
header ("Location:pro_adv.php");
?>