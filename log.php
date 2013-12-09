<?php include_once('include/config.php');?>
<?php include_once('include/function.php');?>
<?php
 if(isset($_POST['this'])){
   $email = htmlspecialchars(trim($_POST['login']));
   if ($email==''){return exit("<script>alert('Пользователь с таким emaiil не зарегистрирован');location.href='index.php';</script>");}
   //Опознаем пользователя по мылу
   $select = mysql_query("SELECT * FROM users WHERE email = '$email'") or die(mysql_error());
   //Генерируем новый пароль
   $rand = mt_rand(100,1000).mt_rand(2000,5000) * mt_rand(1,10) +2;
   $arr = mysql_fetch_assoc($select);
   //Достаем id
   $id = $arr['id_user'];
	$_SESSION['id'] = $arr['id_user'];   
	$_SESSION['name'] = $arr['name'];   
	$_SESSION['phone'] = $arr['phone'];   
   //Если юзера с таким мылом в бд нет выводим соответствующее сообщение
   if($arr['email'] != $email){return exit("<script>alert('Пользователь с таким email не зарегистрирован');</script>");}
   //Если норм, меняем пароль данному юзеру на тот который сгенерировали выше
   $password = md5($rand);
   $update = mysql_query("UPDATE users SET password = '$password' WHERE id_user = '$id'")or die(mysql_error());
   //Если все норм, готовим сообщение
   $to = $email;
   $title = "Востановление пароля";
   $message = "Здравствуйте {$arr['name']}, ваш новый пароль к сайту {$rand}";
   $mail = mail($to,$title,$message);
   //Опознаем пользователя
   if($mail){
      echo "<script>alert('".$arr['name']." Ваш новый пароль выслан к вам на email адрес');</script>";
      echo "<script>alert('".$message."');</script>";
    }
    else {return exit('<script>alert("Ошибка при отправке сообщения");</script>');}


 }
?>
