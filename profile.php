<?php
 include_once('include/config.php');

require('include/paging.inc.php');

?>
<?php
  if(isset($_POST['button'])){
  $email = $_POST['email'];
  $name = $_POST['name'];
  $firstname = $_POST['firstname'];
  $phone = $_POST['phone'];
  $meid = $_SESSION['id'];
  //Обновляем данные
  $update = mysql_query("UPDATE users SET email = '$email', name = '$name', firstname = '$firstname',
                        phone = '$phone' WHERE id_user = '$meid'") or die (mysql_error());

}
?>
<?php include "templates/include/header_without_select.php" ?>

	<section id="middle">

		<div id="container">
			<div id="content">
			<div class="spacer"></div>
			<div class="pro_left_menu">
				<div class="pro_me_item"><span><a href="pro_adv.php">Мои обьявления</a></span></div>
				<div class="pro_me_item"><span><a href="profile.php">Личные данные</a></span></div>
			</div>
			<div class="pro_content">
				<?php
				 $id = $_SESSION['id'];
				 //делаем полную выборку из базы данных
				  $select = mysql_query("SELECT * FROM users WHERE id_user = '$id'") or die(mysql_error());
				  $assoc = mysql_fetch_assoc($select);

				?>
				<br />
				<br /><center><h1>Личные данные</h1></center>
				<div class="profile_data">
				<?php   if(isset($update)){print "<center>Данные сохранены успешно</center>";} ?>
				<br />
				<form  method="post" >
				  <div class="profile_li"><label>E-mail:</label> <input name="email"  type="text" value="<?=$assoc['email'];?>" maxlength="25"/></div>
				  <div class="profile_li"><label>Имя: </label> <input name="name"  type="text"  maxlength="15" value="<?=$assoc['name'];?>"/></div>
				  <div class="profile_li"><label>Фамилия:</label>  <input name="firstname"  type="text" maxlength="25" value="<?=$assoc['firstname'];?>"/></div>
				   <div class="profile_li"><label>Номер телефона:</label>  <input name="phone"  type="text" maxlength="25" value="<?=$assoc['phone'];?>"/></div>
					<div class="profile_li"><label>&nbsp;</label><button type="submit" name="button" class="but">Изменить</button></div>
				  </form>


				</div>				
			</div>
			</div><!-- #content-->
		</div><!-- #container-->
		<div class="spacer"></div>


	</section><!-- #middle-->

<?php include "templates/include/footer.php" ?>