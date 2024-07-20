<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  include 'include/head.php';

  $email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
  $email = trim($email);
  $password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
  $password = trim($password);

  $errors = array();
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
      $query = $db->query("SELECT * FROM login WHERE L_EMAIL = '$email'");
      $user = mysqli_fetch_assoc($query);
      $userCount = mysqli_num_rows($query);

      //validation
      if (empty($_POST['email']) || (empty($_POST['password']))) {
        $errors[] = 'you must provide email and password';
      }
      else{
        //validate Email
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $errors[]= 'Must enter a valid Email';
          if (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters';
          }
        }
        //password is more that 6 characrter


        else{
          if ($userCount < 1) {
            $errors[] = 'That email doesn\'t exist in our Database.';
          }
          if ($password != $user['L_PASSWORD']) {
            $errors[] = 'The password does not Match our records. Please try again.';
          }
          // if (!password_verify($password, $user['L_PASSWORD'])) {
          //
          //   $errors[] = 'The password does not Match our records. Please try again.';
          // }
        }


      }
      // check user database





      if(!empty($errors)){
        echo display_errors($errors);
      }
      else{
        $user_id = $user['L_ID'];
        login($user_id);
        // log user include 'file';
      }
    }

     ?>
</div>
<div class="container-fluid jec">


  <div class="row jec1">


<div class="col-xl-9 col-lg-8 col-md-3 col-sm-3 col-2">
</div>

<div id ="login-form" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-8">

  <h2 class="text-center">LOGIN</h2>
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="email" class = " col-12">Email:</label>
      <input type="text"class = "form-control col-12" name="email" id = "email" value="<?=$email; ?>">
    </div>
    <div class="form-group">
      <label for="password" class = "col-12">Password:</label>
      <input type="password"class = " form-control col-12" name="password" id = "password" value="<?=$password; ?>">
    </div>
    <div class="form-group">
      <input type="submit"  value="Login" class="btn btn-primary form-control">
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
