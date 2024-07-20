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

    $db->query("DELETE FROM service WHERE S_ID = '$delete_id'");
    $db->query("DELETE FROM requirement WHERE R_ID = '$delete_id'");
    $db->query("DELETE FROM service_step WHERE SS_ID = '$delete_id'");
    header('Location: services.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $serviceQuery = $db->query("SELECT * FROM service");
    $serviceidQuery = $db->query("SELECT S_ID FROM service ORDER BY S_ID DESC LIMIT 1");
    $sid = mysqli_fetch_assoc($serviceidQuery);
    $ser_id = $sid['S_ID'] + 1;

    $employeeQuery = $db->query("SELECT * FROM employee ORDER BY E_NAME_FIRST ASC");
    $officeQuery = $db->query("SELECT * FROM office ORDER BY O_NAME ASC");
    $personQuery = $db->query("SELECT * FROM employee ORDER BY E_NAME_FIRST ASC");

    $service = ((isset($_POST['service']) && $_POST['service'] != '')?sanitize($_POST['service']):'');
    $office = ((isset($_POST['office']) && $_POST['office'] != '')?sanitize($_POST['office']):'');
    $employee = ((isset($_POST['employee']) && $_POST['employee'] != '')?sanitize($_POST['employee']):'');

    $fee = ((isset($_POST['fee']) && $_POST['fee'] != '')?sanitize($_POST['fee']):'');
    $new[] = ((isset($_POST['new[]']) && $_POST['new[]'] != '')?sanitize($_POST['new[]']):'');
    $old[] = ((isset($_POST['old[]']) && $_POST['old[]'] != '')?sanitize($_POST['old[]']):'');
    $applicant[] = ((isset($_POST['applicant[]']) && $_POST['applicant[]'] != '')?sanitize($_POST['applicant[]']):'');
    $activity[] = ((isset($_POST['activity[]']) && $_POST['activity[]'] != '')?sanitize($_POST['activity[]']):'');
    $num[] = ((isset($_POST['num[]']) && $_POST['num[]'] != '')?sanitize($_POST['num[]']):'');
    $person[] = ((isset($_POST['person[]']) && $_POST['person[]'] != '')?sanitize($_POST['person[]']):'');

    //edit
    // ==============================================================================================
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $procureResult = $db->query("SELECT * FROM procurement WHERE PROC_ID = '$edit_id'");
      $procure = mysqli_fetch_assoc($procureResult);

    }
    if($_POST){
      $errors = array();
      $required = array('service','office','employee','fee','new','old','applicant','activity','num','person');
      foreach($required as $field) {
        if($_POST[$field]==''){
          $errors[] = 'All Field with an Asterisk are required.';
          break;
        }
      }
      if(!empty($errors)){
        echo display_errors($errors);
      }
      else{
        $number = count($_POST["new"]);
        $number1 = count($_POST["old"]);
        $r_id = $ser_id;
        if($number > 0)
        {
          for($i=0; $i<$number; $i++)
          {
            if(trim($_POST["new"][$i] != ''))
            {
              $req_name = $_POST["new"][$i];
              $type = 'NEW';
              $rcount = $i+1;

              $sql = "INSERT INTO requirement(R_ID,R_COUNT,R_NAME,R_TYPE) VALUES($r_id,$rcount,'$req_name','$type')";
              $db->query($sql);
            }
          }
          echo "Data Inserted";
        }
        if($number1 > 0)
        {
          for($i=0; $i<$number1; $i++)
          {
            if(trim($_POST["old"][$i] != ''))
            {
              $req_name = $_POST["old"][$i];
              $type = 'OLD';
              $rcount = $i+1;

              $sql = "INSERT INTO requirement(R_ID,R_COUNT,R_NAME,R_TYPE) VALUES($r_id,$rcount,'$req_name','$type')";
              $db->query($sql);
            }
          }
          echo "Data Inserted";
        }
        $number2 = count($_POST["applicant"]);
        $ss_id = $ser_id;
        if($number2 > 0)
        {
          for($i=0; $i<$number2; $i++)
          {
            if((trim($_POST["applicant"][$i] != '')) && (trim($_POST["activity"][$i] != '')) && (trim($_POST["num"][$i] != '')) && (trim($_POST["person"][$i] != '')))
            {
              $applicant_final = $_POST["applicant"][$i];
              $activity_final = $_POST["activity"][$i];
              $num_final = $_POST["num"][$i];
              $person_final = $_POST["person"][$i];
              $scount = $i+1;

              $sql = "INSERT INTO service_step(SS_ID,SS_COUNT,SS_APPLICANT,SS_ACTIVITY,SS_DURATION,E_NAME) VALUES($ss_id,$scount,'$applicant_final','$activity_final',$num_final,'$person_final')";
              $db->query($sql);
            }
          }
          echo "Data Inserted";
        }

        else
        {
          echo "Please Enter Name";
        }
        if(!empty($errors)){
          echo display_errors($errors);
        }else{
          echo $ser_id."--".$service."--".$employee."--".$office."--".$r_id."--".$fee."--".$ss_id;
          $insertsql = "INSERT	INTO service (S_ID,S_NAME,E_ID,O_ID,R_ID,S_FEES,SS_ID)
                        VALUES	($ser_id,'$service',$employee,$office,$r_id,$fee,$ss_id)";
          $db->query($insertsql);
          header('Location: services.php');
        }

      }
    }



?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-services-content.php' ?>
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
    $sql  = "SELECT * FROM viewservice ";
    $result = $db->query($sql);
    ?>
    <?php?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/services-content.php' ?>
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
