<?php
$sql = "SELECT * FROM vplaces WHERE PL_STATUS = 1 ORDER BY PL_ID DESC";
$place = $db->query($sql);
?>
  <div class="container-fluid">
    <div class="row right-table">
      <?php while($places = mysqli_fetch_assoc($place)) : ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad fit-content">



        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 img-fluid img-custom">
            <img src="<?php echo $places['PL_IMG']; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 name">
            <h5><?php echo $places['PL_TITLE']; ?></h5>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 LOCATION">
            <p><?php echo $places['PLOC_BARANGAY']; ?></p>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 description1">
            <p><?php echo $places['PL_DESCRIPTION']; ?></p>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12">
            <button type="button" class = "Space modal-button  pad2 places-thumbnails" onclick="modalplaces(<?= $places['PL_ID'];?>)">
              <p class="Space">Read More</p>
            </button>
          </div>

        </div>

      </div>
      <?php endwhile; ?>
    </div>
  </div>
