<?function imageresize($outfile,$infile,$neww,$newh,$quality) {    $im=imagecreatefromjpeg($infile);    $k1=$neww/imagesx($im);    $k2=$newh/imagesy($im);    $k=$k1>$k2?$k2:$k1;    $w=intval(imagesx($im)*$k);    $h=intval(imagesy($im)*$k);    $im1=imagecreatetruecolor($w,$h);    imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));    imagejpeg($im1,$outfile,$quality);    imagedestroy($im);    imagedestroy($im1);    }?><?php	session_start();	require_once('include/config.php');	include('image_resize.php');		$foto='';for($i = 0; isset($_FILES["photo".$i]); $i++) {	$dir = opendir('upload');	$count = 0;	while($file = readdir($dir)){		if($file == '.' || $file == '..' || is_dir('upload' . $file)){			continue;		}		$count++;	} $allowedExts = array("gif", "jpeg", "jpg", "png"); $extension = end(explode(".", $_FILES["photo".(($i >= 0) ? $i : '')]["name"])); if ((($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/gif") || ($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/jpeg") || ($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/jpg") || ($_FILES["photo".(($i >= 0) ? $i : '')]["type"] == "image/png")) && ($_FILES["photo".(($i >= 0) ? $i : '')]["size"] < 500000) && in_array($extension, $allowedExts))   {   if ($_FILES["photo".(($i >= 0) ? $i : '')]["error"] > 0)     {     echo "Произошла ошибка: " . $_FILES["photo".(($i >= 0) ? $i : '')]["error"] . "<br>Вернитесь назад и попробуйте загрузить другое изображение.";     }   else     {     if (file_exists("upload/" . $_FILES["photo".(($i >= 0) ? $i : '')]["name"]))       {       echo $_FILES["photo".(($i >= 0) ? $i : '')]["name"] . " already exists. ";       }     else       {		$ttmp=new SimpleImage();		$ttmp->load($_FILES["photo".(($i >= 0) ? $i : '')]["tmp_name"]);		$ttmp->resizeToHeight(500);		$ttmp->resizeToWidth(500);		$ttmp->save("upload/" . $count.'.jpg');    //   move_uploaded_file($_FILES["photo".(($i >= 0) ? $i : '')]["tmp_name"],    //   "upload/" . $count.'.jpg');	   $foto =$foto. "upload/" . $count.'.jpg:';	      $image = new SimpleImage();	   $image->load("upload/" . $count.'.jpg');	   imageresize("upload/" . $count.'(small).jpg',"upload/" . $count.'.jpg',150,150,75);		//$image->resizeToHeight(150);		//$image->resizeToWidth(150);	//	$image->save("upload/" . $count.'(small).jpg');     }     }   }}	if(isset($_POST['submit'])) {		$login = mysql_real_escape_string(trim(htmlspecialchars($_POST['login_r'])));		$mail = mysql_real_escape_string(trim(htmlspecialchars($_POST['email_r'])));		if(isset($_POST['nomail'])){		$hiddenmail = $_POST['nomail'];}		else{$hiddenmail='no';}		$phone_r = mysql_real_escape_string(trim(htmlspecialchars($_POST['phone_r'])));		$region = mysql_real_escape_string(trim(htmlspecialchars($_POST['region'])));		$city = mysql_real_escape_string(trim(htmlspecialchars($_POST['city'])));		$sfera = mysql_real_escape_string(trim(htmlspecialchars($_POST['sfera'])));		$podsfera = mysql_real_escape_string(trim(htmlspecialchars($_POST['podsfera'])));		$order_name = mysql_real_escape_string(trim(htmlspecialchars($_POST['order_name'])));		$order_amount = mysql_real_escape_string(trim(htmlspecialchars($_POST['order_amount'])));		$order_descr = mysql_real_escape_string(trim(htmlspecialchars($_POST['order_descr'])));		if(strlen($order_descr)<2){$order_descr='&nbsp;';}		$data = date("d-m-Y").' '.date("H:i");		if(isset($_SESSION['id'])){$id=$_SESSION['id'];		mysql_query("INSERT INTO orders 	SET name_holder='".$login."',id_user='".$id."', mail='".$mail."', hiddenmail='".$hiddenmail."', phone='".$phone_r."', region='".$region."', gorod='".$city."', order_descr='".$order_descr."', order_name='".$order_name."', order_amount='".$order_amount."', podsfera='".$podsfera."',photo='".$foto."',data='".$data."',sfera='".$sfera."'");		}else{			mysql_query("INSERT INTO orders 	SET name_holder='".$login."',mail='".$mail."', hiddenmail='".$hiddenmail."', phone='".$phone_r."', region='".$region."', gorod='".$city."', order_descr='".$order_descr."', order_name='".$order_name."', order_amount='".$order_amount."', podsfera='".$podsfera."',photo='".$foto."',data='".$data."',sfera='".$sfera."'");				}			}	     echo "Объявление успешно размещено <script>setTimeout(function(){location.href='index.php'},1000)</script>.Вы будете перемещены на главную страницу."; ?>   