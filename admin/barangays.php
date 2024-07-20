<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if ((!has_permission('tourism')) && (!has_permission('admin'))) {
  permission_error_redirect('index.php');
}
include 'include/head.php';


$brgy  = "SELECT * FROM place_location ORDER BY PLOC_BARANGAY ASC";
$result = $db->query($brgy);
?>

<?php
$errors = array();
//edit barangay
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM place_location WHERE PLOC_ID = '$edit_id'";
$edit_result = $db->query($sql2);
$eBrgy = mysqli_fetch_assoc($edit_result);
}
//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM place_location WHERE PLOC_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: barangays.php');
}

//if add form is sumbitted
if(isset($_POST['add_submit'])){
  $brgy = sanitize($_POST['barangay']);
//check if bartangay is blank
  if($_POST['barangay'] == '') {
    $errors[] .= 'You must enter a Barangay!';

  }
  // cheeck if brand exist in Database
  $sql = "SELECT * FROM place_location WHERE PLOC_BARANGAY = '$brgy'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM place_location WHERE PLOC_BARANGAY = '$brgy' AND PLOC_ID != '$edit_id' ";
  }
  $result1 = $db->query($sql);
  $count = mysqli_num_rows($result1);
  if ($count > 0) {
    $errors[] .= 'Barangay '.$brgy.' already exists. Please Choose another Barangay name...';
  }



  //display error
  if (!empty($errors)) {
    echo display_errors($errors);
  } else{
    //add barangay to data base
    $sql = "INSERT INTO place_location (PLOC_BARANGAY) VALUES ('$brgy')";
    if(isset($_GET['edit'])){
      $sql = "UPDATE place_location SET PLOC_BARANGAY = '$brgy' WHERE PLOC_ID = '$edit_id'";
    }
    $db->query($sql);
    header('Location: barangays.php');


  }
}else{

}
//edit barabgay

 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/barangay-content.php' ?>
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
