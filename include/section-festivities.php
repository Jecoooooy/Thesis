<?php
$sql = "SELECT * FROM festivities WHERE F_STATUS = '1'";
$festivities1 = $db->query($sql);
?>
<section id="festivities">
  <div class="container">
    <div class="row">
      <?php while($festivities2 = mysqli_fetch_assoc($festivities1)) : ?>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pad">
        <button type="button" class = "btn modal-button jec17 latest-news-picture"onclick="modalfestivities(<?= $festivities2['F_ID'];?>)">
          <img src="<?php echo $festivities2['F_IMG']; ?>" class="img-fluid" alt="xample1.jpg">
          <div class="latest-news-date-box text-center">
            <h2><?php echo $festivities2['F_DATE']; ?></h2>
            <h6><?php echo $festivities2['F_MONTH']; ?></h6>
          </div>
          <div class="latest-news-info-box">
            <p>Title: <?php echo $festivities2['F_TITLE']; ?></p>

          </div>
        </button>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
