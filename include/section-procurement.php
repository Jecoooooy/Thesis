<?php $yrs  = "SELECT YEAR(PROC_DATE) AS YEAR FROM procurement GROUP BY YEAR;";
$result_yrs = $db->query($yrs);
?>
<section id = "procurement">
  <div class="container">
    <div class="row justify-space-between">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 top-procure ">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
            <p class = "center bold">PROJECT REFERENCE</p>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-6 top-procure1">
            <p class = "center bold">TITLE</p>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 ">
            <p class = "center bold">STATUS</p>
          </div>
        </div>
      </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 sidebar">
            <button class="category bg-black"> <h4>BIDS & AWARDS</h4></button>
            <?php while($yr = mysqli_fetch_assoc($result_yrs)): ?>
            <?php $Cyear = "SELECT YEAR(CURDATE())";
            $CurYear = $db->query($Cyear);
            if($CurYear == $yr['YEAR']) { ?>
              <button class="category design" onclick="openYear('<?php echo $yr['YEAR']; ?>')" id="defaultOpen"><h5><?php echo $yr['YEAR']; ?></h5></button>
              <?php
            }
            else{ ?>
                <button class="category design" onclick="openYear('<?php echo $yr['YEAR']; ?>')" id="defaultOpen"><h5><?php echo $yr['YEAR']; ?></h5></button>
                <?php
            }
            ?>



            <?php endwhile; ?>
        </div>

        <?php $yrs  = "SELECT YEAR(PROC_DATE) AS YEAR FROM procurement GROUP BY YEAR;";
        $result_yrs = $db->query($yrs);



        ?>
        <?php while($yr = mysqli_fetch_assoc($result_yrs)): ?>
          <?php
          $dateee1 = $yr['YEAR'].'-01-01';
          $dateee2 = $yr['YEAR'].'-12-31';

           ?>
        <div id="<?php echo $yr['YEAR']; ?>" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 year1 no_pad top-procure">
          <?php $procure_query  = "SELECT * FROM vprocurement WHERE PROC_DATE  BETWEEN '$dateee1' AND '$dateee2'  ORDER BY PROC_ID DESC";
          $result_procure_query = $db->query($procure_query);?>


            <?php while($procurementfinal = mysqli_fetch_assoc($result_procure_query)): ?>
            <button type="button" class = "btn modal-button procure design des"onclick="modalprocurement(<?= $procurementfinal['PROC_ID'];?>)" >
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <p class = "center bold"><?php echo $procurementfinal['PROJ_CODE'];?> <?php echo $procurementfinal['PROC_ID'];?>-<?php echo $procurementfinal['C_NAME'];?>-<?php  echo $yr['YEAR']; ?></p>
              </div>
              <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-6 top-procure1 text-custom">
                <p class = " bold"><?php echo $procurementfinal['PROC_TITLE'];  ?></p>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 ">
                <p class = "center bold"><?php echo $procurementfinal['STAT_NAME'];  ?></p>
              </div>
            </div>
          </button>
            <?php endwhile; ?>



        </div>
        <?php endwhile; ?>
        </div>
    </div>
  </div>
</section>
<script>
function openYear(yrs) {
  var i;
  var x = document.getElementsByClassName("year1");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(yrs).style.display = "block";
}
</script>
