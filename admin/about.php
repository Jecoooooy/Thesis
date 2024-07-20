<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  if (!is_logged_in()) {
    login_error_redirect();
  }
  if ((!has_permission('tourism')) && (!has_permission('admin')))  {
    permission_error_redirect('index.php');
  }
  $dbpath = '';
  include 'include/head.php';
  if (isset($_GET['edit'])) {
    $asd = 1;
    $About = $db->query("SELECT * FROM about WHERE id = '$asd';");
    $Abouts = mysqli_fetch_assoc($About);
    $name1 = ((isset($_POST['name1']) && $_POST['name1'] != '')?sanitize($_POST['name1']):$Abouts['mayor']);
    $message = ((isset($_POST['message']) && $_POST['message'] != '')?sanitize($_POST['message']):$Abouts['mayor_message']);
    $history = ((isset($_POST['history']) && $_POST['history'] != '')?sanitize($_POST['history']):$Abouts['history']);
    $saved_image = (($Abouts['mayor_image'] !='')?$Abouts['mayor_image']:'');
    $dbpath = $saved_image;
    if(isset($_GET['delete_image'])){
      $image_url = $_SERVER['DOCUMENT_ROOT'].$Abouts['mayor_image'];echo $image_url;
      unlink($image_url);
      $db->query("UPDATE about SET mayor_image = '' WHERE id = '$asd'");
      header('Location: about.php?edit');
    }
    if($_POST){
      $dbpath = '';
      $errors = array();
      $required = array('name1','message','history');
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
      if($_FILES['image']['error'] !== 4) {
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
        }
        if($fileExt = $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg'))  {
          $errors[] = 'File Extension does not match the file.';
        }
        if(!empty($errors)){
          echo display_errors($errors);
        }
        else{
          move_uploaded_file($tmpLoc,$uploadPath);
          $insertsql = "UPDATE about SET mayor = '$name1', mayor_message = '$message',
          history = '$history', mayor_image = '$dbpath' WHERE id = '$asd'";
          $db->query($insertsql);
          header('Location: about.php');

        }
      }
    }
      else {
        $insertsql = "UPDATE about SET mayor = '$name1', mayor_message = '$message',
        history = '$history' WHERE id = '$asd'";
        $db->query($insertsql);
        header('Location: about.php');
      }
    }
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/add-about-content.php' ?>
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
    $sql  = "SELECT * FROM about";
    $result = $db->query($sql);
    ?>
    <?php
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/about-content.php' ?>
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
