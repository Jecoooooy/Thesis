<?php
$sql = "SELECT * FROM vplaces WHERE PL_STATUS = 1";
$place = $db->query($sql);
?>
<section id="tourism">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php while($places = mysqli_fetch_assoc($place)) : ?>

      <div class="swiper-slide col-xl-3 col-lg-4 col-md-5 col-sm-6 col-10">
        <div class="thumbnails">
          <div class="tourism-img">
            <img src="<?php echo $places['PL_IMG']; ?>" class="img-fluid" alt="">
          </div>
          <div class="name">
            <h5><?php echo $places['PL_TITLE']; ?></h5>
          </div>
          <div class="LOCATION">
            <p><?php echo $places['PLOC_BARANGAY']; ?></p>
          </div>
          <div class="description">
            <p><?php echo $places['PL_DESCRIPTION']; ?></p>
          </div>
          <div class="read">
            <button type="button" class = "btn modal-button red-bg" onclick="modalplaces(<?= $places['PL_ID'];?>)">Read More</button>
          </div>
        </div>
      </div>
      <?php endwhile; ?>


    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</section>
