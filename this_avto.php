<?php include_once('include/config.php');?>
<?php include_once('include/function.php');?>

<?php
if(isset($_SESSION['id'])){
	echo "Вы уже авторизированны <a href='index.php'>На главную</a><br />";
	exit;
}else{
  include_once('tmp/auth.tpl');

}

?>


