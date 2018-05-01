<?php
require_once('../classes/autoloader.php');
Autoloader::init();

$user = (isset($_POST['user']))? $_POST['user'] : null;
$pass = (isset($_POST['pass']))? $_POST['pass'] : null;

if(User::logIn($user, $pass)){
  //session_cache_expire(10);
  session_start();
  $_SESSION['logged'] = true;
  header("Location: index.php");
}else{
  header("Location: login.php");
}

?>
