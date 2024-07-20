<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  if (!is_logged_in()) {
    login_error_redirect();
  }
  if ((!has_permission('ordinance')) && (!has_permission('admin')))  {
    permission_error_redirect('index.php');
  }
  include 'include/head.php';
  $dbpath = '';
  //add product
  if (isset($_GET['delete'])) {
    $delete_id = sanitize($_GET['delete']);
    $db->query("DELETE FROM ordinance WHERE id = '$delete_id'");
    header('Location: ordinance.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $ordQuery = $db->query("SELECT * FROM ordinance");
    $author = ((isset($_POST['author']) && $_POST['author'] != '')?sanitize($_POST['author']):'');
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $pdf_file = '';
    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $ordResult = $db->query("SELECT * FROM ordinance WHERE id = '$edit_id'");
      $ordi = mysqli_fetch_assoc($ordResult);
      //delete image
      $author = ((isset($_POST['author']) && $_POST['author'] != '')?sanitize($_POST['author']):$ordi['author']);
      $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$ordi['title']);
      $pdf_file = (($ordi['pdf_file'] !='')?$ordi['pdf_file']:'');
      if(isset($_GET['delete_pdf'])){
        $image_url = $_SERVER['DOCUMENT_ROOT'].$ordi['pdf_file'];echo $image_url;
        unlink($image_url);
        $db->query("UPDATE ordinance SET pdf_file = '' WHERE id = '$edit_id'");
        header('Location: ordinance.php?edit='.$edit_id);
      }
    }
    if($_POST){
      $dbpath = '';
      $errors = array();
      $required = array('title','author');
      foreach($required as $field) {
        if($_POST[$field]==''){
          $errors[] = 'All Field with an Asterisk are required.';
          break;
        }
      }
      if( empty($_FILES)){
        $errors[] = 'You must input a file';
        }
      if(!empty($errors)){
          echo display_errors($errors);
      }
else {
  $allowedExts = array("pdf");
  $temp = explode(".", $_FILES["pdf_file"]["name"]);
  $extension = end($temp);
  $upload_pdf=$_FILES["pdf_file"]["name"];
  $final_upload = "/thesis/uploads/pdf/".$_FILES["pdf_file"]["name"];
  move_uploaded_file($_FILES["pdf_file"]["tmp_name"],BASEURL."uploads/pdf/" . $_FILES["pdf_file"]["name"]);
  $insertsql = "INSERT INTO ordinance(author,title,pdf_file)VALUES('$author','$title','$final_upload')";
  if(isset($_GET['edit'])) {
    if($pdf_file ==''){
      $pdf_file =$final_upload;
    }
    $insertsql = "UPDATE ordinance SET title = '$title', author = '$author',pdf_file = '$pdf_file' WHERE id = '$edit_id'";
  }

  $db->query($insertsql);
  header('Location: ordinance.php');
}


      // for data security file autentication
    }
?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-ordinance-content.php' ?>
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
    $sql  = "SELECT * FROM ordinance ORDER BY author ";
    $result = $db->query($sql);
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/ordinance-content.php' ?>
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
