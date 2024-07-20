<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if ((!has_permission('tourism')) && (!has_permission('admin')) && (!has_permission('procurement'))) {
  permission_error_redirect('index.php');
}
include 'include/head.php';


$officeQuery  = "SELECT * FROM office ORDER BY O_NAME ASC";
$result = $db->query($officeQuery);
?>

<?php
$errors = array();
//edit barangay
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM office WHERE O_ID = '$edit_id'";
$edit_result = $db->query($sql2);
$eoffice = mysqli_fetch_assoc($edit_result);
}
//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM office WHERE O_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: office.php');
}

//if add form is sumbitted
if(isset($_POST['add_submit'])){
  $office = sanitize($_POST['office']);
//check if bartangay is blank
  if($_POST['office'] == '') {
    $errors[] .= 'You must enter a new Office!';

  }
  // cheeck if brand exist in Database
  $sql = "SELECT * FROM office WHERE O_NAME = '$office'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM office WHERE O_NAME = '$office' AND O_ID!= '$edit_id' ";
  }
  $result1 = $db->query($sql);
  $count = mysqli_num_rows($result1);
  if ($count > 0) {
    $errors[] .= 'Office '.$office.' already exists. Please Choose another Office name...';
  }



  //display error
  if (!empty($errors)) {
    echo display_errors($errors);
  } else{
    //add barangay to data base
    $sql = "INSERT INTO office (O_NAME) VALUES ('$office')";
    if(isset($_GET['edit'])){
      $sql = "UPDATE office SET O_NAME = '$office' WHERE O_ID = '$edit_id'";
    }
    $db->query($sql);
    header('Location: office.php');


  }
}else{

}
//edit barabgay

 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/office-content.php' ?>
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
