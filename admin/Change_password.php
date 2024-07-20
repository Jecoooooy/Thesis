<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  if (!is_logged_in()) {
    login_error_redirect();
  }

  include 'include/head.php';
  $hashed = $user_data['L_PASSWORD'];
  $old_password = ((isset($_POST['old_password']))?sanitize($_POST['old_password']):'');
  $old_password = trim($old_password);
  $password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
  $password = trim($password);
  $confirm_password = ((isset($_POST['confirm_password']))?sanitize($_POST['confirm_password']):'');
  $confirm_password = trim($confirm_password);
  $user_id = $user_data['L_ID'];
  $errors = array();
  $new_password = $password;
?>
<style>
.danger{
  right: 0!important;
  top: 0!important;
  width: 100%!important;
}
</style>
<div >
    <?php
    if($_POST){
      if (empty($_POST['old_password']) || (empty($_POST['password'])) || (empty($_POST['confirm_password']))) {
        $errors[] = 'you must fill out all feilds';
      }
      else {
        if (strlen($password) < 6) {
          $errors[] = 'Password must be at least 6 characters';
        }
        else {
          if ($password !=$confirm_password) {
            $errors[] = 'The password and confirm new password does not match.';
          }
          else {
            if ($old_password != $hashed) {
              $errors[] = 'The Old password does not Match our records.';
            }
          }
        }
      }


      if(!empty($errors)){
        echo display_errors($errors);
      }
      else{
        // change password
        $db->query("UPDATE login SET L_PASSWORD = '$new_password' WHERE L_ID = '$user_id'");
        $_SESSION['success_flash'] = 'Your password has been Updated!';
        header('Location: index.php');

      }
    }

     ?>
</div>
<div class="container-fluid jec">


  <div class="row jec1">


<div class="col-xl-9 col-lg-8 col-md-3 col-sm-3 col-2">
</div>

<div id ="login-form" style = "height:450px!important;" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-8">

  <h4 class="text-center">CHANGE PASSWORD</h4>
  <form action="Change_password.php" method="post">
    <div class="form-group">
      <label for="old_password" class = " col-12">Old Password:</label>
      <input type="password"class = "form-control col-12" name="old_password" id = "old_password" value="<?=$old_password; ?>">
    </div>
    <div class="form-group">
      <label for="password" class = "col-12">Password:</label>
      <input type="password"class = " form-control col-12" name="password" id = "password" value="<?=$password; ?>">
    </div>
    <div class="form-group">
      <label for="confirm_password" class = "col-12">confirm Password:</label>
      <input type="password"class = " form-control col-12" name="confirm_password" id = "confirm_password" value="<?=$confirm_password; ?>">
    </div>
    <div class="form-group">
      <a href="index.php" class="btn btn-default">Cancel</a>
      <input type="submit"  value="Change Password" class="btn btn-primary">
    </div>
    <p class ="text-right"> <a href="/thesis/index.php" alt"home">Visit Site</a> </p>
  </form>
</div>
</div>
</div>

<?php

  include 'include/footer.php';
  ?>

  <?php
  include 'include/script.php';
?>
