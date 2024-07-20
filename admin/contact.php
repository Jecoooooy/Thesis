<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
if ((!has_permission('tourism')) && (!has_permission('admin')))  {
  permission_error_redirect('index.php');
}
include 'include/head.php';


$contact  = "SELECT * FROM contact ORDER BY C_ID ASC";
$result = $db->query($contact);
?>

<?php
$errors = array();
//edit barangay

//delete barangay
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = sanitize($delete_id);
  $sql = "DELETE FROM contact WHERE C_ID = '$delete_id'";
  $db -> query($sql);
  header('Location: contact.php');
}
//edit barabgay
 ?>


<div class="admin-wrapper ">
  <!-- this code is navigation  -->
   <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->

  <?php include 'include/contact-content.php' ?>
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
