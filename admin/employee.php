<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  if (!is_logged_in()) {
    login_error_redirect();
  }
  if ((!has_permission('services')) && (!has_permission('admin')))  {
    permission_error_redirect('index.php');
  }
  include 'include/head.php';
  $dbpath = '';
  //add product
  if (isset($_GET['delete'])) {

    $delete_id = sanitize($_GET['delete']);
    $db->query("DELETE FROM employee WHERE E_ID = '$delete_id'");
    header('Location: employee.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $empQuery = $db->query("SELECT * FROM employee");
    $officeQuery = $db->query("SELECT * FROM office ORDER BY O_NAME ASC");
    $first1 = ((isset($_POST['first']) && $_POST['first'] != '')?sanitize($_POST['first']):'');
    $last1 = ((isset($_POST['last']) && $_POST['last'] != '')?sanitize($_POST['last']):'');
    $designation = ((isset($_POST['designation']) && $_POST['designation'] != '')?sanitize($_POST['designation']):'');
    $contact = ((isset($_POST['contact']) && $_POST['contact'] != '')?sanitize($_POST['contact']):'');
    $office1 = ((isset($_POST['office']) && $_POST['office'] != '')?sanitize($_POST['office']):'');
    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $empResult = $db->query("SELECT * FROM employee WHERE E_ID = '$edit_id'");
      $emp = mysqli_fetch_assoc($empResult);
      $first1 = ((isset($_POST['first']) && $_POST['first'] != '')?sanitize($_POST['first']):$emp['E_NAME_FIRST']);
      $last1 = ((isset($_POST['last']) && $_POST['last'] != '')?sanitize($_POST['last']):$emp['E_NAME_LAST']);
      $designation = ((isset($_POST['designation']) && $_POST['designation'] != '')?sanitize($_POST['designation']):$emp['E_DESIGNATION']);
      $contact = ((isset($_POST['contact']) && $_POST['contact'] != '')?sanitize($_POST['contact']):$emp['E_CONTACT']);
      $office1 = ((isset($_POST['office']) && $_POST['office'] != '')?sanitize($_POST['office']):$emp['O_ID']);
    }
    if($_POST){
      $errors = array();
      $required = array('first','last','designation','contact','office');
      foreach($required as $field) {
        if($_POST[$field]==''){
          $errors[] = 'All Field with an Asterisk are required.';
          break;
        }
      }
      if ((strlen($contact) != 10) && (strlen($contact) != 11)) {
        $errors[] = 'please enter a valid contact number';
      }
      if(!empty($errors)){
        echo display_errors($errors);
      }
      else{

        $insertsql = "INSERT	INTO employee (E_NAME_FIRST,E_NAME_LAST,E_DESIGNATION,E_CONTACT,O_ID)
                      VALUES	('$first1', '$last1', '$designation', $contact, $office1);";
        if(isset($_GET['edit'])) {
          $insertsql = "UPDATE employee SET E_NAME_FIRST = '$first1',E_NAME_LAST = '$last1',E_DESIGNATION = '$designation',
          E_CONTACT = '$contact', O_ID = '$office1' WHERE E_ID = '$edit_id'";
        }
        $db->query($insertsql);
        header('Location: employee.php');
      }
    }



?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-employee-content.php' ?>
<!-- end of content -->
  <?php include 'include/contents/space.php'; ?>
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
}
//main content for admin
  else{
    $sql  = "SELECT * FROM vemployee ORDER BY E_NAME_FIRST";
    $result = $db->query($sql);
    ?>
    <?php?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/employee-content.php' ?>
      <!-- end of content -->
      <?php include 'include/contents/space.php'; ?>

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
  }
  include 'include/footer.php';
  include 'include/script.php';
?>
