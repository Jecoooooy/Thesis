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
    $db->query("DELETE FROM places WHERE PL_ID = '$delete_id'");
    header('Location: places.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $placeQuery = $db->query("SELECT * FROM places");
    $brgyQuery = $db->query("SELECT * FROM place_location ORDER BY PLOC_BARANGAY ASC");
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $embed1 = ((isset($_POST['embed1']) && $_POST['embed1'] != '')?$_POST['embed1']:'');
    $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):'');
    $location = ((isset($_POST['location']) && $_POST['location'] != '')?sanitize($_POST['location']):'');
    $saved_image = '';
    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $placeResult = $db->query("SELECT * FROM places WHERE PL_ID = '$edit_id'");
      $place = mysqli_fetch_assoc($placeResult);
      //delete image
      if(isset($_GET['delete_image'])){
        $image_url = $_SERVER['DOCUMENT_ROOT'].$place['PL_IMG'];echo $image_url;
        unlink($image_url);
        $db->query("UPDATE places SET PL_IMG = '' WHERE PL_ID = '$edit_id'");
        header('Location: places.php?edit='.$edit_id);
      }
      $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$place['PL_TITLE']);
      $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):$place['PL_DESCRIPTION']);
      $location = ((isset($_POST['location']) && $_POST['location'] != '')?sanitize($_POST['location']):$place['PLOC_ID']);
      $embed1 =  (string)$place['embed'];
      $saved_image = (($place['PL_IMG'] !='')?$place['PL_IMG']:'');
      $dbpath = $saved_image;
    }
    if($_POST){
      $dbpath = '';
      $errors = array();
      $required = array('title','description','location');
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
      if($_FILES["image"]["error"] !== 4) {
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
      $uploadPath = BASEURL.'images/places/'.$uploadName;
      $dbpath = "/thesis/images/places/".$uploadName;
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
        $insertsql = "INSERT INTO places(PL_TITLE,PL_DESCRIPTION,PLOC_ID,PL_IMG,embed)
        VALUES('$title','$description','$location','$dbpath','$embed1')";
        if(isset($_GET['edit'])) {
          $insertsql = "UPDATE places SET PL_TITLE = '$title', PL_DESCRIPTION = '$description',
          PLOC_ID = '$location', PL_IMG = '$dbpath' WHERE PL_ID = '$edit_id'";
        }
        $db->query($insertsql);
        header('Location: places.php');
      }

  }
}
else {
  $insertsql = "UPDATE places SET PL_TITLE = '$title', PL_DESCRIPTION = '$description',
  PLOC_ID = '$location', embed = '$embed1' WHERE PL_ID = '$edit_id'";
  $db->query($insertsql);
  header('Location: places.php');
}


      // for data security file autentication
    }
?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-places-content.php' ?>
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
    $sql  = "SELECT * FROM vplaces ORDER BY PL_ID DESC";
    $result = $db->query($sql);
    ?>
    <?php
    //for status
    if (isset($_GET['stat'])) {
      $id = (int)$_GET['id'];
      $status = (int)$_GET['stat'];
      $statussql = "UPDATE places SET PL_STATUS = '$status' WHERE PL_ID ='$id'";
      $db->query($statussql);
      header('Location: places.php');
    }
    else{
    }
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/places-content.php' ?>
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
