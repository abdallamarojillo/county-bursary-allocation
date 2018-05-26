<?php
session_start();
if(!$_SESSION['email'] || !$_SESSION['level'])
{
  header('Location: '.$_SERVER['PHP_SELF']);
}

?>