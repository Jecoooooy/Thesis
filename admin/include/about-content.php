<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">ABOUT</h4>
  <a href="about.php?edit" class ="btn btn-success pull-right" id = "add-about-btn"> edit</a>
  <div class="clearfix clearfix-pad">
  </div>
  <div class="container">

    <div class="row">

      <?php while($about = mysqli_fetch_assoc($result)): ?>
        <div class="col-3">
          <div class="row">
            <img src="<?= $about['mayor_image'] ?>" class = "img-fluid" alt="">
          </div>
        </div>
      <div class=" col-9">
        <div class="row">
          <div class="col-12">

            <p class="">Municipal Mayor: <?= $about['mayor'] ?></p>
            <p class=""> <?= nl2br($about['mayor_message'],false); ?></p>
          </div>

        </div>

      </div>

      <div class=" col-12">
        <h2 class="center">HISTORY</h2>
        <p class="history"> <?= nl2br($about['history'],false); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
<!-- ================================= -->
  </div>
