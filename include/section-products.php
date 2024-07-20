<?php
$sql = "SELECT * FROM product WHERE PROD_STATUS = '1'";
$product1 = $db->query($sql);
?>
<section id="products">
  <div class="container">
    <div class="row center2">
      <?php while($product2 = mysqli_fetch_assoc($product1)) : ?>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 center1">
        <button type="button" class = "btn modal-button demo demo-2" onclick="modalproduct(<?= $product2['PROD_ID'];?>)" >
          <div class="movie">
              <div class="movie__card">
                <div class="layer-1"></div>
                  <img src="<?php echo $product2['PROD_IMG']; ?>" class = "img-fluid layer-2" alt="">
                <div class="layer-3"> <p><?php echo $product2['PROD_NAME']; ?></p></div>
              </div>
          </div>
        </button>
      </div>
    <?php endwhile; ?>
    </div>
  </div>
</section>
