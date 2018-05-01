<?php
session_start();
if(session_destroy()){
  unset($_SESSION['logged']);
  header("Location: index.php");
}
?>
