<?php
session_start();
if(!$_SESSION['username'] || !$_SESSION['userlevel'] || !$_SESSION['TimeLoggedIn'])
{
  //header('Location: ../login/');
  exit(header('Location: app/login/'));
}
date_default_timezone_set('Africa/Nairobi');
?>