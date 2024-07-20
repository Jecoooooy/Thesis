<?php
require_once '../core/init.php';

include 'include/head.php';
if (!is_logged_in()) {
  header('Location: login.php');
}

?>
<div class="admin-wrapper">
  <!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>

  <!-- this code is content  -->
  <?php include 'include/contents/dashboard.php' ?>
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
