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
    $db->query("DELETE FROM latest_news WHERE LN_ID = '$delete_id'");
    header('Location: latest-news.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $newsQuery = $db->query("SELECT * FROM latest_news");
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):'');
    $saved_image = '';
    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $newsResult = $db->query("SELECT * FROM latest_news WHERE LN_ID = '$edit_id'");
      $news = mysqli_fetch_assoc($newsResult);
      //delete image
      if(isset($_GET['delete_image'])){
        $image_url = $_SERVER['DOCUMENT_ROOT'].$news['LN_IMG'];echo $image_url;
        unlink($image_url);
        $db->query("UPDATE latest_news SET LN_IMG = '' WHERE LN_ID = '$edit_id'");
        header('Location: latest-news.php?edit='.$edit_id);
      }
      $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$news['LN_TITLE']);
      $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):$news['LN_DESCRIPTION']);
      $saved_image = (($news['LN_IMG'] !='')?$news['LN_IMG']:'');
      $dbpath = $saved_image;
    }
    if($_POST){
      $dbpath = '';
      $errors = array();
      $required = array('title','description');
      foreach($required as $field) {
        if($_POST[$field]==''){
          $errors[] = 'All Field with an Asterisk are required.';
          break;
        }
      }
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
      $uploadPath = BASEURL.'images/latest_news/'.$uploadName;
      $dbpath = "/thesis/images/latest_news/".$uploadName;
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
        $insertsql = "INSERT INTO latest_news(LN_TITLE,LN_DESCRIPTION,LN_IMG)
        VALUES('$title','$description','$dbpath')";
        if(isset($_GET['edit'])) {
          $insertsql = "UPDATE latest_news SET LN_TITLE = '$title', LN_DESCRIPTION = '$description',
          LN_IMG = '$dbpath' WHERE LN_ID = '$edit_id'";
        }
        $db->query($insertsql);
        header('Location: latest-news.php');
      }

  }
  else {
    $errors[] = 'An image is required.';
    echo display_errors($errors);

  }


      // for data security file autentication
    }
?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-latest-news.php' ?>
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
    $sql  = "SELECT * FROM latest_news ORDER BY LN_DATE DESC";
    $result = $db->query($sql);
    ?>
    <?php
    //for status
    // if (isset($_GET['stat'])) {
    //   $id = (int)$_GET['id'];
    //   $status = (int)$_GET['stat'];
    //   $statussql = "UPDATE places SET PL_STATUS = '$status' WHERE PL_ID ='$id'";
    //   $db->query($statussql);
    //   header('Location: places.php');
    // }
    // else{
    // }
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/latest-news-content.php' ?>
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
