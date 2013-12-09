<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen, projection" />
	<link href="styles/style_loginbox.css" rel="stylesheet" />
	<link href="styles/main.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
<div id="loginpop" style="display:none;"></div>	
<div id="wrapper">

	<header id="header">
		<div id="loginbox" style="display:none;">
			<form id="loginForm"  method="post" action="ath.php" onsubmit="login_f();return false;">
				<span id="closelogin" onclick="unlogin();">Закрыть</span>
				<div class="field">
					<label>Имя пользователя:</label>
					<div class="input"><input type="text" name="login" value="" id="login" /></div>
				</div>
				<div class="field">
					<a href="#" id="forgot" onclick="repas();">Забыли пароль?</a>
					<label>Пароль:</label>
					<div class="input"><input type="password" name="password" value="" id="pass" /></div>
				</div>
				<div class="submit">
					<button type="submit" class="but">Войти</button>
					<label id="remember"><input name="rememberme" type="checkbox" value="" /> Запомнить меня</label>
				</div>
				<script>
					function repas(){
						document.getElementById('loginbox').style.display='none';
						document.getElementById('repass').style.display='block';
					}
				</script>
			</form>
		</div>
		<div id="repass" style="display:none;">
			 <form  method="post" id="repas">
				<div class="field">
					<b>Введите свой email:</b><br />
					<input name="login" type="text" /></p>
				</div>
				<div class="submit">
					<button type="submit" class="but" name="this">Восстановить</button><p>
				</div>
			</form>
		</div>
		<div class="log_r">
			<?php   if(!isset($_SESSION['id'])){
						include_once('tmp/loginbox.tpl');
					}else{
						echo '	<div class="log_reg_box"><a href="profile.php" class="loginbox">личный кабинет</a> | <a href="exit.php" class="loginbox">Выйти</a></b></div>';
					} 
			?>

		</div>
		<div class="img_baner"><a href="index.php" style="display:block;height:100%; "></a></div>
		<div class="pl_or">
			<span>
				<input type="button" value="Подать объявление" class="pl_order" onclick="place_order()">
			</span>
		</div>
		<div class="sear_in">
			<form id="searchform" method="post" action="search.php">
				<input name="search" class="search" value="поиск..." onfocus="search_input(this)" onblur="se_in(this)">&nbsp;<input type="submit" value="Искать" class="but">
			</form>
		</div>
		<div class="kat_sel">
			<form name="getorder" id="getorder"  method="post" action="index.php">
				<select id="region" name="region" onchange="loadCity(this)">
					<option >Выберите регион</option>
						<?php 
							foreach ($city as $region => $cityList)
							{
								echo '<option value="' . $region . '">' . $region . '</option>' . "\n";
							}
						?>
				</select>
				<select id="city" name="city" disabled="disabled">
					<option value="0"></option>
				</select>
				<select name="sfera" onchange="loadSfera(this)">
					<option value="0">Выберите категорию</option>
					<?php 
						foreach ($sferaphp as $podsfera => $sferalist)
						{
							echo '<option value="' . $podsfera . '">' . $podsfera . '</option>' . "\n";
						}
					?>
				</select>
				<select id="podsfera" name="podsfera" disabled="disabled">
					<option></option>
				</select><div class="ang_s"><input type="submit" value="Найти" class="but"/></div>
			</form>
		</div>
	</header><!-- #header-->
	
