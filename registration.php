<?php

  if(!isset($_SESSION['id'])){
  include_once('tmp/register.tpl');
 } else {exit("Вы уже зарегистрированны");}
 ?>