<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  include 'include/head.php';


  $contact  = "SELECT * FROM contact ORDER BY C_ID ASC";
  $result = $db->query($contact);
  include 'include/header.php';

  $errors = array();

  if(isset($_POST['add_submit'])){
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $comment = sanitize($_POST['comment']);
    if(($_POST['name'] == '') || ($_POST['email'] == '') || ($_POST['comment'] == '')) {
      $errors[] .= 'All Field with an Asterisk are required!';
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $errors[]= 'Must enter a valid Email';

    }

    if (!empty($errors)) {
      echo display_errors($errors);
    }
    else{
      $sql = "INSERT INTO contact (C_NAME,C_EMAIL,C_CONTENT) VALUES ('$name','$email','$comment')";
      $db->query($sql);
      header('Location: Contact.php');
    }
  }
?>
<section id = "section1">
  <div class="black-filter">
    <div class="container">
      <div class="row page-logo-center">
        <div class="red-bar">
        </div>
        <div class="page-title">
          <h1>CONTACT</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'include/section-visit-us.php';?>
<?php include 'include/footer.php';?>
<?php include 'include/script.php';?>
