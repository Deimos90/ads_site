<?php
include_once('include/config.php');
include_once('include/function.php');
$email = $_POST['login'];
$password = md5($_POST['password']);
$select = mysql_query("SELECT * FROM users WHERE email = '$email'")or die(mysql_error());
$ds = mysql_fetch_assoc($select);
if($email == $ds['email'] && $password == $ds['password']){

    //Если галочка стоит запоминаем юзера
 	 if($_POST['sess'] == "on"){
 		  $_SESSION['id'] = $ds['id_user'];
 		  $_SESSION['name'] = $ds['name'];
 		  $_SESSION['phone'] = $ds['phone'];
 		  $_SESSION['email'] = $ds['email'];
 		  $_COOKIE['id'] = $_SESSION['id'];
 		  //Перекидываем Юзера на главную
 		  ?>
 		   <script>document.location.href="index.php";</script>
 		  <?php
    }else{
			$_SESSION['id'] = $ds['id_user'];
		  	$_SESSION['name'] = $ds['name'];
			$_SESSION['phone'] = $ds['phone'];
			$_SESSION['email'] = $ds['email'];
     	  ?>
     	   <script>document.location.href="index.php";</script>
     	  <?php

 	}

}else{	$_er='email или пароль не совпадают.<br>';
		include "tmp/auth.tpl";
	}
?>