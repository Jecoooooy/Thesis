<?php
function display_errors($errors){
$display = '<ul class = "danger">';
foreach($errors as $error){
  $display .= '<li class = "text-danger">'.$error.'</li>';
}
$display .= '</ul>';
return $display;
}

function sanitize($dirty){
  return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}
function login($user_id){
  $_SESSION['SBUser'] = $user_id;
  global $db;
  $date = date("Y-m-d H:i:s");
  $db->query("UPDATE login SET L_LAST_LOGIN = '$date' WHERE L_ID = '$user_id'");
  $_SESSION['success_flash'] = 'you are now logged in!';
  header('Location: index.php');
}
function is_logged_in(){
  if (isset($_SESSION['SBUser']) && $_SESSION['SBUser'] > 0) {
    return true;

  }
  return false;
}
function login_error_redirect($url = 'login.php'){
  $_SESSION['error_flash'] = 'You must be logged in to access that page';
  header('Location: '.$url);
}
function permission_error_redirect($url = 'login.php'){
  $_SESSION['error_flash'] = 'You do not have permission to access that page.';
  header('Location: '.$url);
}
function has_permission($permission = 'admin'){
  global $user_data;
  $permissions = explode(', ',$user_data['L_PERMISSIONS']);
  if (in_array($permission,$permissions,true)) {
    return  true;
  }
  return  false;
}
function pretty_date($date){
  return date("M d, Y (h:i A) ",Strtotime($date));
}
function pretty_date1($date){
  return date("M d, Y",Strtotime($date));
}
