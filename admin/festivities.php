<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  if (!is_logged_in()) {
    login_error_redirect();
  }
  if ((!has_permission('tourism')) && (!has_permission('admin')))  {
    permission_error_redirect('index.php');
  }
  include 'include/head.php';
  $dbpath = '';
  //add product
  if (isset($_GET['delete'])) {
    $delete_id = sanitize($_GET['delete']);
    $db->query("DELETE FROM festivities WHERE F_ID = '$delete_id'");
    header('Location: festivities.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $festivitiesQuery = $db->query("SELECT * FROM festivities");
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):'');
    $month = ((isset($_POST['month']) && $_POST['month'] != '')?sanitize($_POST['month']):'');
    $days = ((isset($_POST['days']) && $_POST['days'] != '')?sanitize($_POST['days']):'');
    $saved_image = '';
    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $festivitiesResult = $db->query("SELECT * FROM festivities WHERE F_ID = '$edit_id'");
      $festivities = mysqli_fetch_assoc($festivitiesResult);
      //delete image
      if(isset($_GET['delete_image'])){
        $image_url = $_SERVER['DOCUMENT_ROOT'].$festivities['F_IMG'];
        unlink($image_url);
        $db->query("UPDATE festivities SET F_IMG = '' WHERE F_ID = '$edit_id'");
        header('Location: festivities.php?edit='.$edit_id);
      }
      $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$festivities['F_TITLE']);
      $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):$festivities['F_DESCRIPTION']);
      $month = ((isset($_POST['month']) && $_POST['month'] != '')?sanitize($_POST['month']):$festivities['F_MONTH']);
      $days = ((isset($_POST['days']) && $_POST['days'] != '')?sanitize($_POST['days']):$festivities['F_DATE']);
      $saved_image = (($festivities['F_IMG'] !='')?$festivities['F_IMG']:'');
      $dbpath = $saved_image;
    }
    if($_POST){
      $dbpath = '';
      $errors = array();
      $required = array('title','description','month','days');
      foreach($required as $field) {
        if($_POST[$field]==''){
          $errors[] = 'All Field with an Asterisk are required.';
          break;
        }
      }
      if($_FILES["image"]["error"] == 4) {
        $errors[] = 'An image is required.';
        echo display_errors($errors);
      }
      if ($saved_image == '') {
        // code...

      if($_FILES["image"]["error"] != 4) {
      $photo = $_FILES['image'];
      $name = $photo['name'];
      $nameArray = explode('.',$name);
      $fileName = $nameArray[0];
      $fileExt = $nameArray[1];
      $mime = explode('/',$photo['type']);
      $mimeType = $mime[0];
      $mimeExt = $mime[1];
      $tmpLoc = $photo['tmp_name'];
      $fileSize = $photo['size'];
      $allowed = array('PNG','png','jpg','jpeg','gif');
      $uploadName = md5(microtime()).'.'.$fileExt;
      $uploadPath = BASEURL.'images/festivities/'.$uploadName;
      $dbpath = "/thesis/images/festivities/".$uploadName;
      if($mimeType != 'image'){
        $errors[]='The File must be an Image.';
      }
      if(!in_array($fileExt, $allowed)){
        $errors[] = 'The file extention must be a png, jpg, jpeg or gif.';
      }
      if ($fileSize > 25000000) {
        $errors[] = 'The file size must be under 25MB';
        // code...
      }
      if($fileExt = $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg'))  {
        $errors[] = 'File Extension does not match the file.';
      }
      if(!empty($errors)){
        echo display_errors($errors);
      }
      else{
        move_uploaded_file($tmpLoc,$uploadPath);
        $insertsql = "INSERT INTO festivities (F_TITLE,F_DESCRIPTION,F_IMG,F_MONTH,F_DATE)
        VALUES('$title','$description','$dbpath','$month','$days')";
        if(isset($_GET['edit'])) {
          $insertsql = "UPDATE festivities SET F_TITLE = '$title', F_DESCRIPTION = '$description',
           F_IMG = '$dbpath', F_MONTH = '$month', F_DATE = '$days' WHERE F_ID = '$edit_id'";
        }else{
          echo "noob";
        }
        $db->query($insertsql);
        header('Location: festivities.php');
      }


  }
  }
  else {
    $insertsql = "UPDATE festivities SET F_TITLE = '$title', F_DESCRIPTION = '$description', F_MONTH = '$month', F_DATE = '$days' WHERE F_ID = '$edit_id'";
     $db->query($insertsql);
     header('Location: festivities.php');
  }



      // for data security file autentication
    }
?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-festivities-content.php' ?>
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
    $sql  = "SELECT * FROM festivities ORDER BY F_ID DESC";
    $result = $db->query($sql);
    ?>
    <?php
    //for status
    if (isset($_GET['stat'])) {
      $id = (int)$_GET['id'];
      $status = (int)$_GET['stat'];
      $statussql = "UPDATE festivities SET F_STATUS = '$status' WHERE F_ID ='$id'";
      $db->query($statussql);
      header('Location: festivities.php');
    }
    else{
    }
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/festivities-content.php' ?>
      <!-- end of content -->
      <?php include 'include/contents/space.php'; ?>
      <?php include 'include/footer.php';?>
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
