<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if ((!has_permission('procurement')) && (!has_permission('admin')))  {
  permission_error_redirect('index.php');
}
include 'include/head.php';


$mode  = "SELECT * FROM method ORDER BY M_ID ASC";
$result = $db->query($mode);
?>

<?php
$errors = array();
//edit barangay
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM method WHERE M_ID = '$edit_id'";
$edit_result = $db->query($sql2);
$emode = mysqli_fetch_assoc($edit_result);
}
//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM method WHERE M_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: mode.php');
}

//if add form is sumbitted
if(isset($_POST['add_submit'])){
  $mode = sanitize($_POST['method']);
//check if bartangay is blank
  if($_POST['method'] == '') {
    $errors[] .= 'You must enter a method!';

  }
  // cheeck if brand exist in Database
  $sql = "SELECT * FROM method WHERE M_NAME = '$mode'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM method WHERE M_NAME = '$mode' AND M_ID != '$edit_id' ";
  }
  $result1 = $db->query($sql);
  $count = mysqli_num_rows($result1);
  if ($count > 0) {
    $errors[] .= 'The method'.$mode.' already exists. Please Choose another Method name...';
  }



  //display error
  if (!empty($errors)) {
    echo display_errors($errors);
  } else{
    //add barangay to data base
    $sql = "INSERT INTO method (M_NAME) VALUES ('$mode')";
    if(isset($_GET['edit'])){
      $sql = "UPDATE method SET M_NAME = '$mode' WHERE M_ID = '$edit_id'";
    }
    $db->query($sql);
    header('Location: mode.php');


  }
}else{

}
//edit barabgay

 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/mode-content.php' ?>
  <!-- end of content -->

  </div>
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
