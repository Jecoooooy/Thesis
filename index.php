<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  include 'include/head.php';
  include 'include/header.php';
  include 'include/header-wrapper.php';
 ?>
 <!-- main content -->
  <div class="container-fluid text-center">
    <h1>TOURISM</h1>
  </div>
  <!-- tourism -->
  <?php include 'include/section-tourism.php';?>
  <div class="container-fluid text-center">
    <h1>LATEST NEWS</h1>
  </div>
  <!-- latest-news -->
  <?php include 'include/section-latest-news.php';?>
  <div class="container-fluid text-center">
    <h1>VISIT US</h1>
  </div>
  <!-- visit us -->
  <?php include 'include/section-visit-us.php';?>
  <!-- footer -->
  <?php include 'include/footer.php';?>

  <?php include 'include/script.php';?>
