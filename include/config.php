<?php

  session_start();

$_DB = new mysqli("localhost","root","","base");
	mysql_connect ("localhost", "root","");
	mysql_select_db("base") or die (mysql_error());
	mysql_query('SET character_set_database = utf8'); 
	mysql_query ("SET NAMES 'utf8'");

?>
