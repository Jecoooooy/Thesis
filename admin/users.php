<?php
require_once '../core/init.php';

include 'include/head.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if (!has_permission('admin')) {
  permission_error_redirect('index.php');
}
if (isset($_GET['delete'])) {
  $delete_id = sanitize($_GET['delete']);
  $db->query("DELETE FROM login WHERE L_ID = '$delete_id'");
  header('Location: users.php');
}
if (isset($_GET['add'])) {
  $name = ((isset($_POST['name']) && $_POST['name'] != '')?sanitize($_POST['name']):'');
  $email = ((isset($_POST['email']) && $_POST['email'] != '')?sanitize($_POST['email']):'');
  $password = ((isset($_POST['password']) && $_POST['password'] != 'password')?sanitize($_POST['password']):'');
  $confirm = ((isset($_POST['confirm']) && $_POST['confirm'] != 'confirm')?sanitize($_POST['confirm']):'');
  $permissions = ((isset($_POST['permissions']) && $_POST['permissions'] != 'permissions')?sanitize($_POST['permissions']):'');
  $errors = array();
  if($_POST){
    $emailQuery = $db->query("SELECT * FROM login WHERE L_EMAIL = '$email'");
    $emailCount = mysqli_num_rows($emailQuery);


    if ((empty($_POST['name'])) || (empty($_POST['email'])) || (empty($_POST['password'])) || (empty($_POST['confirm'])) || (empty($_POST['permissions']))) {
      $errors[] = 'All Field with an Asterisk are required.';
    }
    else{
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $errors[]= 'Must enter a valid Email';
    }
    if (strlen($password) < 6) {
      $errors[] = 'Password must be at least 6 characters';
    }
    if ($emailCount != 0) {
        $errors[] = 'That email already exist in our Database.';
    }
    if ($password !=$confirm) {
      $errors[] = 'The password and confirm new password does not match.';
    }
    }


    if (!empty($errors)) {
      echo display_errors($errors );
    }
    else{
$db->query("INSERT INTO login (L_FULLNAME,L_EMAIL,L_PASSWORD,L_LAST_LOGIN,L_PERMISSIONS)
          VALUES ('$name','$email','$password','0000-00-00 00:00:00','$permissions')");
      $_SESSION['success_flash'] = "User has been added!";
      header('Location: users.php');
    }

  }



?>




<div class="admin-wrapper">
  <!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<h4 class = "center "> ADD NEW USER</h4>
<div class="container-fluid col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12  white-color margin-auto">
  <form class = "pad" action="users.php?add=1" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group">
          <label for="name">Full Name:</label>
          <input type="text" name="name" id = "name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" id = "email" class="form-control" value="<?php echo $email; ?>">
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password" id = "password" class="form-control" value="<?php echo $password; ?>">
        </div>
        <div class="form-group">
          <label for="confirm">Confirm Password:</label>
          <input type="password" name="confirm" id = "confirm" class="form-control" value="<?php echo $confirm; ?>">
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group">
          <label for="permissions">Permissions:</label>
          <select class="form-control cursor-pointer" id= "permissions" name="permissions">
            <option value=""<?=(($permissions == '')?'selected':'') ?>></option>

            <option value="tourism"<?=(($permissions == 'tourism')?'selected':'') ?>>tourism</option>
            <option value="ordinance"<?=(($permissions == 'ordinance')?'selected':'') ?>>ordinance</option>
            <option value="services"<?=(($permissions == 'services')?'selected':'') ?>>services</option>
            <option value="procurement"<?=(($permissions == 'procurement')?'selected':'') ?>>procurement</option>

          </select>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group " style= "padding-top:25px;">
          <div class="row justify-space-around ">
            <a href="users.php" class = "btn btn-default col-5 btn-custom " >Cancel</a>
            <input type="submit"  class = "btn btn-success col-5 " value="ADD NEW USER">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
<?php

}

else{
?>


<div class="admin-wrapper">
  <!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>

  <!-- this code is content  -->

<!-- ==================================================================================================== -->
<div class="container-fluid col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 margin-auto">
<?php


$userQuery = $db->query("SELECT * FROM login ORDER BY L_FULLNAME");
 ?>
  <h4 class = "center">ACCOUNTS</h4>
  <a href="users.php?add=1" class ="btn btn-success pull-right" id = "user"> Add new user</a>
  <div class="clearfix clearfix-pad">
  </div>
  <table class="table justify-space-between">
    <thead>

      <tr class = "row">
        <th class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">NAME</th>
        <th class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold">EMAIL</th>
        <th class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">JOIN DATE</th>
        <th class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">LAST LOGIN</th>
        <th class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">PERMISSION</th>
        <th class="delete-table col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 bold">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($users = mysqli_fetch_assoc($userQuery)): ?>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 jec9 bold"><?php echo $users['L_FULLNAME']; ?></td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 jec9"><?php echo $users['L_EMAIL']; ?></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 jec9"><?= pretty_date($users['L_LOGIN_DATE']); ?> </td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 jec9"><?= (($users['L_LAST_LOGIN'] == '0000-00-00 00:00:00')?'Never':pretty_date($users['L_LAST_LOGIN'])); ?></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 jec9"><?php echo $users['L_PERMISSIONS']; ?></td>

        <td class = "delete-table col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1">
          <?php if ($users['L_ID'] != $user_data['L_ID']):?>
          <a href="users.php?delete=<?php echo $users['L_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i>
          </a>
        <?php endif; ?>
        </td>


      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
</div>
<!-- ==================================================================================================== -->
  </div>
<?php } ?>
  </div>
  <script>
  	    $(document).ready(function(){
  			$('#sidebarCollapse').on('click',function(){
  				$('#sidebar').toggleClass('active');
  			});
  		});
  	</script>
<?php
include 'include/footer.php';
include 'include/script.php';
?>




<!--  -->
