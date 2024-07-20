<div class="container-fluid">
 <div class="row cons">



  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-user"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>USERS</h6>
        <?php $u = $db->query( "SELECT * FROM login");
        $rowcount=mysqli_num_rows($u);
         ?>
        <h2><?= $rowcount; ?></h2>

        <?php  ?>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-shopping-cart"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>PROCUREMENT</h6>
        <?php $z = $db->query( "SELECT * FROM procurement");
        $rowcount1=mysqli_num_rows($z);
         ?>
        <h2><?= $rowcount1; ?></h2>

        <?php  ?>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-headset"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>SERVICES</h6>
        <?php $s = $db->query( "SELECT * FROM service");
        $rowcount2=mysqli_num_rows($s);
         ?>
        <h2><?= $rowcount2; ?></h2>

        <?php  ?>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-gavel"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>ORDINANCES</h6>
        <?php $q = $db->query( "SELECT * FROM ordinance");
        $rowcount3=mysqli_num_rows($q);
         ?>
        <h2><?= $rowcount3; ?></h2>

        <?php  ?>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-headset"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>PLACES</h6>
        <?php $a = $db->query( "SELECT * FROM places");
        $rowcount4=mysqli_num_rows($a);
         ?>
        <h2><?= $rowcount4; ?></h2>

        <?php  ?>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-headset"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>PRODUCTS</h6>
        <?php $y = $db->query( "SELECT * FROM product");
        $rowcount5=mysqli_num_rows($y);
         ?>
        <h2><?= $rowcount5; ?></h2>

        <?php  ?>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 counter pad">
    <div class="row border-counter">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 icon-counter">
        <i class ="fa fa-headset"></i>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 icon-counter-details">
        <h6>SERVICES</h6>
        <?php $s1 = $db->query( "SELECT * FROM festivities");
        $rowcount6=mysqli_num_rows($s1);
         ?>
        <h2><?= $rowcount6; ?></h2>
        <?php  ?>
      </div>
    </div>
  </div>


</div>
</div>
