<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if ((!has_permission('procurement')) && (!has_permission('admin')))  {
  permission_error_redirect('index.php');
}
include 'include/head.php';


$cat  = "SELECT * FROM categories ORDER BY C_NAME ASC";
$result = $db->query($cat);
?>

<?php
$errors = array();
//edit barangay
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM categories WHERE C_ID = '$edit_id'";
$edit_result = $db->query($sql2);
$ecat = mysqli_fetch_assoc($edit_result);
}
//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM categories WHERE C_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: categories.php');
}

//if add form is sumbitted
if(isset($_POST['add_submit'])){
  $cat = sanitize($_POST['category']);
//check if bartangay is blank
  if($_POST['category'] == '') {
    $errors[] .= 'You must enter a category!';

  }
  // cheeck if brand exist in Database
  $sql = "SELECT * FROM categories WHERE C_NAME = '$cat'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM categories WHERE C_NAME = '$cat' AND C_ID != '$edit_id' ";
  }
  $result1 = $db->query($sql);
  $count = mysqli_num_rows($result1);
  if ($count > 0) {
    $errors[] .= 'Category '.$cat.' already exists. Please Choose another Category name...';
  }



  //display error
  if (!empty($errors)) {
    echo display_errors($errors);
  } else{
    //add barangay to data base
    $sql = "INSERT INTO categories (C_NAME) VALUES ('$cat')";
    if(isset($_GET['edit'])){
      $sql = "UPDATE categories SET C_NAME = '$cat' WHERE C_ID = '$edit_id'";
    }
    $db->query($sql);
    header('Location: categories.php');


  }
}else{

}
//edit barabgay

 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/categories-content.php' ?>
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
