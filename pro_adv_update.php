<?php
	session_start();
	require_once('mount.php');
	include('image_resize.php');	
	$foto='';
for($i = 0; isset($_FILES["photo".$i]); $i++) {
	$dir = opendir('upload');
	$count = 0;
	while($file = readdir($dir)){
		if($file == '.' || $file == '..' || is_dir('upload' . $file)){
			continue;
		}
		$count++;
	}
echo  $_FILES["photo".(($i >= 0) ? $i : '')]["name"];
 $allowedExts = array("gif", "jpeg", "jpg", "png");
 $extension = end(explode(".", $_FILES["photo".(($i >= 0) ? $i : '')]["name"]));
 if ((($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/gif")
 || ($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/jpeg")
 || ($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/jpg")
 || ($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/png"))
 && ($_FILES["photo".(($i >= 0) ? $i : '')]["size"] < 200000)
 && in_array($extension, $allowedExts))
   {
   if ($_FILES["photo".(($i >= 0) ? $i : '')]["error"] > 0)
     {
     echo "Return Code: " . $_FILES["photo".(($i >= 0) ? $i : '')]["error"] . "<br>";
     }
   else
     {
     echo "Upload: " . $_FILES["photo".(($i >= 0) ? $i : '')]["name"] . "<br>";
     echo "Type: " . $_FILES["photo".(($i >= 0) ? $i : '')]["type"] . "<br>";
     echo "Size: " . ($_FILES["photo".(($i >= 0) ? $i : '')]["size"] / 1024) . " kB<br>";
     echo "Temp file: " . $_FILES["photo".(($i >= 0) ? $i : '')]["tmp_name"] . "<br>";

     if (file_exists("upload/" . $_FILES["photo".(($i >= 0) ? $i : '')]["name"]))
       {
       echo $_FILES["photo".(($i >= 0) ? $i : '')]["name"] . " already exists. ";
       }
     else
       {
		$ttmp=new SimpleImage();
		$ttmp->load($_FILES["photo".(($i >= 0) ? $i : '')]["tmp_name"]);
		$ttmp->resizeToWidth(500);
		$ttmp->resizeToHeight(500);
		$ttmp->save("upload/" . $count.'.jpg');
    //   move_uploaded_file($_FILES["photo".(($i >= 0) ? $i : '')]["tmp_name"],
    //   "upload/" . $count.'.jpg');
	   $foto =$foto. "upload/" . $count.'.jpg:';
	      $image = new SimpleImage();
	   $image->load("upload/" . $count.'.jpg');
		$image->resizeToWidth(150);
		$image->resizeToHeight(150);
		$image->save("upload/" . $count.'(small).jpg');
       echo "Stored in: " . "upload/" . $_FILES["photo".(($i >= 0) ? $i : '')]["name"];
       }
     }
   }
}
	if(isset($_POST['submit'])) {
		$login = mysql_real_escape_string(trim(htmlspecialchars($_POST['login_r'])));
		$mail = mysql_real_escape_string(trim(htmlspecialchars($_POST['email_r'])));
		$ord_id=$_POST['id'];
		if(isset($_POST['nomail'])){		$hiddenmail = $_POST['nomail'];}
		else{$hiddenmail='no';}
		$phone_r = mysql_real_escape_string(trim(htmlspecialchars($_POST['phone_r'])));
		$region = mysql_real_escape_string(trim(htmlspecialchars($_POST['region'])));
		$city = mysql_real_escape_string(trim(htmlspecialchars($_POST['city'])));
		$sfera = mysql_real_escape_string(trim(htmlspecialchars($_POST['sfera'])));
		$podsfera = mysql_real_escape_string(trim(htmlspecialchars($_POST['podsfera'])));
		$order_name = mysql_real_escape_string(trim(htmlspecialchars($_POST['order_name'])));
		$order_amount = mysql_real_escape_string(trim(htmlspecialchars($_POST['order_amount'])));
		$order_descr = mysql_real_escape_string(trim(htmlspecialchars($_POST['order_descr'])));
		$data = date("d-m-Y").' '.date("H:i");
		$id=$_SESSION['id'];
		mysql_query("UPDATE orders 	SET name_holder='".$login."',id_user='".$id."', mail='".$mail."', hiddenmail='".$hiddenmail."', phone='".$phone_r."', region='".$region."', gorod='".$city."', order_descr='".$order_descr."', order_name='".$order_name."', order_amount='".$order_amount."', podsfera='".$podsfera."',photo='".$foto."',data='".$data."',sfera='".$sfera."' WHERE order_id='".$ord_id."'");

		
	}
		     echo "Объявление успешно изменено <script>setTimeout(function(){location.href='pro_adv.php'},1000)</script>.Вы будете перемещены на главную страницу.";

 ?>
 
 
 
