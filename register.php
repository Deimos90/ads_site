<?php include_once('include/config.php');?>
<?php include_once('include/function.php');?>
<?php

  if(!isset($_SESSION['id'])){
  include_once('tmp/register.tpl');
 } else {exit("Вы уже зарегистрированны");}
 if(isset($_POST['pkey'])){
 if($_SESSION["secret_number"]==""){
	$_SESSION["secret_number"] = "ABCD";
}

//Обрабатываем наши поля чтобы нам не написали html или js код
$email = trim(htmlspecialchars($_POST['email'],ENT_QUOTES));
$name = trim(htmlspecialchars($_POST['name'],ENT_QUOTES));
$firstname = trim(htmlspecialchars($_POST['firstname'],ENT_QUOTES));
$password = trim(htmlspecialchars($_POST['password'],ENT_QUOTES));
$phone = trim(htmlspecialchars($_POST['phone'],ENT_QUOTES));
stripslashes($email);
stripslashes($name);
stripslashes($firstname);
stripslashes($password);
stripslashes($phone);
//Проверка на пустоту
if($email == "" && $name == "" && $password){return exit("Не все поля заполненны");}
//Проверяем есть ли пользователь с таким мылом в нашей базе
$select = "SELECT * FROM users";
$query = mysql_query($select) or die(mysql_error());
$array = mysql_fetch_array($query);
//Выводим сообщение если БД пуста
if(@mysql_num_rows($query) <= 0){return exit('В базе данных нет записей');}
if(mysql_num_rows($query) > 0){
tmp_email($email);
}
//Шифруем пароль
$newpassword = md5($password);
//Добавляем данные в Базу данных
db_insert($email,$name,$firstname,$newpassword,$phone);
//Запоминаем сессию
$cookie = mysql_query("SELECT * FROM users WHERE email ='$email'") or die(mysql_error());
$assoc = mysql_fetch_assoc($cookie);
$_SESSION['id'] = $assoc['id_user'];
//Запоминаем куки
$_COOKIE['id'] = $_SESSION['id'];
//Если все успешно выводим текст и запоминаем юзера
?>
<b><a href="exit.php">Выйти</a></b>
<?php

 exit;
}


?>
