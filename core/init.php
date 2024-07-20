<?php
$db = mysqli_connect('127.0.0.1','root','','thesis');
if(mysqli_connect_errno()){
  echo 'Database connection failed with following errors: '. mysqli_connect_error();
  die();
}
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/config.php';
require_once BASEURL.'helpers/helpers.php';

if (isset($_SESSION['SBUser'])) {
  $user_id = $_SESSION['SBUser'];
  $query = $db->query("SELECT * FROM login WHERE L_ID = '$user_id'");
  $user_data = mysqli_fetch_assoc($query);
  $fn = explode(' ', $user_data['L_FULLNAME']);
  $user_data['first'] = $fn[0];
  $user_data['last'] = $fn[1];
}


if (isset($_SESSION['success_flash'])) {
  echo '<div class = "bg-success success-custom"><p class = "text text-center">' .$_SESSION['success_flash'].'</p></div>';
  unset($_SESSION['success_flash']);
}
if (isset($_SESSION['error_flash'])) {
  echo '<div class = "bg-danger success-custom"><p class = "text text-center">' .$_SESSION['error_flash'].'</p></div>';
  unset($_SESSION['error_flash']);
}

// session_destroy();
