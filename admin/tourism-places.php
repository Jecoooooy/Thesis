<?php
require_once '../core/init.php';
if (!is_logged_in()) {
  login_error_redirect();
}
((!has_permission('tourism')) && (!has_permission('admin'))) {
    permission_error_redirect('index.php');
}
include 'include/head.php';
?>
<div class="admin-wrapper">
  <!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
  <!-- this code is content  -->
  <?php include 'include/contents/tourism.php' ?>
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
