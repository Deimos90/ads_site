<?php
	session_start();//не забываем во всех файлах писать session_start
	require_once('mount.php'); 
	if (isset($_POST['login']) && isset($_POST['password'])){
    //немного профильтруем логин
	$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
    //хешируем пароль т.к. в базе именно хеш
	$password = md5(trim($_POST['password']));
     // проверяем введенные данные
    $query = "SELECT id_user, user_login
            FROM users
            WHERE user_login= '$login' AND user_password = '$password'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    // если такой пользователь есть
    if (mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_assoc($sql);
		//ставим метку в сессии 
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_login'] = $row['user_login'];
		$_SESSION['phone'] = $row['phone'];
		//ставим куки и время их хранения 10 дней
		setcookie("CookieMy", $row['user_login'], time()+60*60*24*10);
		
   }
    else {
        //если пользователя нет, то пусть пробует еще
		echo 'net polzovatelya';
    }
}
//проверяем сессию, если она есть, то значит уже авторизовались
if (isset($_SESSION['user_id'])){
	echo '<div align="right" class="helmes">Добро пожаловать,'.'<b>'.htmlspecialchars($_SESSION["user_login"]).'</b>'.'</div>';
} else {
	$login = '';
	//проверяем куку, может он уже заходил сюда
	if (isset($_COOKIE['CookieMy'])){
		$login = htmlspecialchars($_COOKIE['CookieMy']);
	}
	//простая формочка
}
?>