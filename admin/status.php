<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
include 'include/head.php';


$stat  = "SELECT * FROM stat ORDER BY STAT_NAME ASC";
$result = $db->query($stat);
?>

<?php
$errors = array();
//edit barangay
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM stat WHERE STAT_ID = '$edit_id'";
$edit_result = $db->query($sql2);
$estat = mysqli_fetch_assoc($edit_result);
}
//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM stat WHERE STAT_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: status.php');
}

//if add form is sumbitted
if(isset($_POST['add_submit'])){
  $stat = sanitize($_POST['status']);
//check if bartangay is blank
  if($_POST['status'] == '') {
    $errors[] = 'enter status!';
  }
  // cheeck if brand exist in Database
  $sql = "SELECT * FROM stat WHERE STAT_NAME = '$stat'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM staT WHERE STAT_NAME = '$stat' AND STAT_ID != '$edit_id' ";
  }
  $result1 = $db->query($sql);
  $count = mysqli_num_rows($result1);
  if ($count > 0) {
    $errors[] .= 'Status '.$stat.' already exists. Please Choose another status name...';
  }



  //display error
  if (!empty($errors)) {
    echo display_errors($errors);
  } else{
    //add barangay to data base
    $sql = "INSERT INTO stat (STAT_NAME) VALUES ('$stat')";
    if(isset($_GET['edit'])){
      $sql = "UPDATE stat SET STAT_NAME = '$stat' WHERE STAT_ID = '$edit_id'";
    }
    $db->query($sql);
    header('Location: status.php');


  }
}else{

}
//edit barabgay

 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/status-content.php' ?>
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
