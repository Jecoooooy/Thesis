<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  include 'include/head.php';
  include 'include/header.php';
?>
<section id = "section1">
  <div class="black-filter">
    <div class="container">
      <div class="row page-logo-center">
        <div class="red-bar">
        </div>
        <div class="page-title">
          <h1>TOURISM</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section id = "procurement">
  <div class="container">
    <div class="row justify-space-between">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 sidebar">
            <button class="category bg-black"> <h4>DINE SA BAILEN</h4></button>
            <!-- <button class="category" onclick="openCity(event, 'promotion')"> <h5>PROMOTION</h5></button> -->
            <button class="category" onclick="openCity(event, 'places')" id="defaultOpen"><h5>PLACES</h5></button>
            <button class="category" onclick="openCity(event, 'products')"><h5>PRODUCTS</h5></button>
            <button class="category" onclick="openCity(event, 'festivities')"> <h5>FESTIVITIES</h5></button>

        </div>
        <div id="promotion" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 tabcontent1 no_pad">
          <div class="right-table">
            <?php include 'include/section-tourism-promotion.php';?>
          </div>
        </div>
        <div id="places" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 tabcontent1 no_pad">
          <div class="right-table">
            <?php include 'include/section-tourism-places.php';?>
          </div>
        </div>
        <div id="products" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 tabcontent1 no_pad">
          <div class="right-table">
            <?php include 'include/section-products.php';?>
          </div>
        </div>
        <div id="festivities" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 tabcontent1 no_pad">
          <div class="right-table">
            <?php include 'include/section-festivities.php';?>
          </div>
        </div>
    </div>
  </div>
</section>

 <?php include 'include/footer.php';?>
 <?php include 'include/script.php';?>