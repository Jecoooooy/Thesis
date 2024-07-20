<?php
$sql = "SELECT * FROM latest_news ORDER BY `LN_ID` DESC LIMIT 3";
$latest_new = $db->query($sql);
?>
<section id="latest-news">
  <div class="container">
    <div class="row">
      <?php while($latest_news = mysqli_fetch_assoc($latest_new)) : ?>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-10 pad ">

        <button type="button" class = "btn modal-button latest-news-picture" onclick="modallatestnews(<?= $latest_news['LN_ID'];?>)">
          <img src="<?php echo $latest_news['LN_IMG']; ?>" class="img-fluid" alt="xample1.jpg">
          <div class="latest-news-date-box text-center">
            <!-- <h3>30</h3>
            <p>Feb 2020</p> -->
            <p><?php echo pretty_date($latest_news['LN_DATE']); ?></p>
          </div>
          <div class="latest-news-info-box">
            <p><?php echo $latest_news['LN_TITLE']; ?></p>
          </div>
        </button>

      </div>
      <?php endwhile; ?>

    </div>

  </div>
</section>
