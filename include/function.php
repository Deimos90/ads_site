<?php
 include_once('config.php');
 if(isset($_POST['cook'])){
  //setcookie("email",time()+600);
  setcookie("id",time()+600);
  }
 function tmp_email($email){
 $select = "SELECT email FROM users";
 $des = mysql_query($select) or die (mysql_error());
 while($md = mysql_fetch_assoc($des)){
    if($md['email']===$email){return exit("<br><center>Пользователь с таким email уже существует!</center>");}
 }
 }
 function db_insert($iemail,$iname,$ifirstname,$ipassword,$ipho){
    $data = date('Y.m.d');
 	$insert = "INSERT INTO users (email,name,firstname,password,phone,date) VALUES ('$iemail','$iname','$ifirstname','$ipassword','$ipho','$data')";
 	$des = mysql_query($insert) or die(mysql_error()) ;
 	if(!$des){return false;}
 }
function delete_acc($id){
	$delete = mysql_query("DELETE  FROM users WHERE id_user = '$id'") or die(mysql_error());
	if(!delete_acc){return false;}

}
function getPassword($password,$id){
  stripslashes($password);
  $ipassword = trim(md5($password));
  $update = mysql_query("UPDATE users SET password = '$ipassword' WHERE id_user = '$id'")or die(mysql_error()) ;
  if($update){return true;}


}
?>