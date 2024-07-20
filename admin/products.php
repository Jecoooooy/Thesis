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
    $db->query("DELETE FROM product WHERE PROD_ID = '$delete_id'");
    header('Location: products.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
    $productsQuery = $db->query("SELECT * FROM product");
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):'');
    $location = ((isset($_POST['location']) && $_POST['location'] != '')?sanitize($_POST['location']):'');
    $saved_image = '';
    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $productResult = $db->query("SELECT * FROM product WHERE PROD_ID = '$edit_id'");
      $product = mysqli_fetch_assoc($productResult);
      //delete image
      if(isset($_GET['delete_image'])){
        $image_url = $_SERVER['DOCUMENT_ROOT'].$product['PROD_IMG'];echo $image_url;
        unlink($image_url);
        $db->query("UPDATE product SET PROD_IMG = '' WHERE PROD_ID = '$edit_id'");
        header('Location: products.php?edit='.$edit_id);
      }
      $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$product['PROD_NAME']);
      $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):$product['PROD_DESCRIPTION']);
      $saved_image = (($product['PROD_IMG'] !='')?$product['PROD_IMG']:'');
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
        $uploadPath = BASEURL.'images/products/'.$uploadName;
        $dbpath = "/thesis/images/products/".$uploadName;
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
          $insertsql = "INSERT INTO product(PROD_NAME,PROD_DESCRIPTION,PROD_IMG)
          VALUES('$title','$description','$dbpath')";
          if(isset($_GET['edit'])) {
            $insertsql = "UPDATE product SET PROD_NAME = '$title', PROD_DESCRIPTION = '$description',
             PROD_IMG = '$dbpath' WHERE PROD_ID = '$edit_id'";
          }
          $db->query($insertsql);
          header('Location: products.php');
        }

    }
  }
    else {
      $insertsql = "UPDATE product SET PROD_NAME = '$title', PROD_DESCRIPTION = '$description' WHERE PROD_ID = '$edit_id'";
       $db->query($insertsql);
       header('Location: products.php');
    }


      // for data security file autentication
    }
?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-products-content.php' ?>
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
    $sql  = "SELECT * FROM product ORDER BY PROD_ID DESC";
    $result = $db->query($sql);
    ?>
    <?php
    //for status
    if (isset($_GET['stat'])) {
      $id = (int)$_GET['id'];
      $status = (int)$_GET['stat'];
      $statussql = "UPDATE product SET PROD_STATUS = '$status' WHERE PROD_ID ='$id'";
      $db->query($statussql);
      header('Location: products.php');
    }
    else{
    }
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/products-content.php' ?>
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
