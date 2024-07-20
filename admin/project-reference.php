<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if ((!has_permission('procurement')) && (!has_permission('admin')))  {
  permission_error_redirect('index.php');
}
include 'include/head.php';


$PR  = "SELECT * FROM project_reference ORDER BY PROJ_CODE ASC";
$result = $db->query($PR);
?>

<?php
$errors = array();
//edit barangay
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM project_reference WHERE PROJ_ID = '$edit_id'";
$edit_result = $db->query($sql2);
$epr = mysqli_fetch_assoc($edit_result);
}
//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM project_reference WHERE PROJ_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: project-reference.php');
}

//if add form is sumbitted
if(isset($_POST['add_submit'])){
  $pr = sanitize($_POST['reference']);
//check if bartangay is blank
  if($_POST['reference'] == '') {
    $errors[] .= 'You must enter a new project reference!';

  }
  // cheeck if brand exist in Database
  $sql = "SELECT * FROM project_reference WHERE PROJ_CODE = '$pr'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM project_reference WHERE PROJ_CODE = '$pr' AND PROJ_ID != '$edit_id' ";
  }
  $result1 = $db->query($sql);
  $count = mysqli_num_rows($result1);
  if ($count > 0) {
    $errors[] .= 'project reference '.$brgy.' already exists. Please Choose another project reference name...';
  }



  //display error
  if (!empty($errors)) {
    echo display_errors($errors);
  } else{
    //add barangay to data base
    $sql = "INSERT INTO project_reference (PROJ_CODE) VALUES ('$pr')";
    if(isset($_GET['edit'])){
      $sql = "UPDATE project_reference SET PROJ_CODE = '$pr' WHERE PROJ_ID = '$edit_id'";
    }
    $db->query($sql);
    header('Location: project-reference.php');


  }
}else{

}
//edit barabgay

 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/project-reference-content.php' ?>
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
