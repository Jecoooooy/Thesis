<?php
require_once '../core/init.php';
$PROC_ID = $_POST['PROC_ID'];
$PROC_ID = (int)$PROC_ID;
$sql = "SELECT * FROM vprocurement WHERE PROC_ID = '$PROC_ID'";
$result = $db->query($sql);
$proc1 = mysqli_fetch_assoc($result);


?>
<?php $yrs  = "SELECT YEAR(PROC_DATE) AS YEAR FROM vprocurement WHERE PROC_ID = '$PROC_ID'  GROUP BY YEAR;";
$result_yrs = $db->query($yrs);
$yr = mysqli_fetch_assoc($result_yrs);
?>
<?php ob_start();?>
<div class="modal fade details-1" id="modalprocurement" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $proc1['PROJ_CODE'];?> <?php echo $proc1['PROC_ID'];?>-<?php echo $proc1['C_NAME'];?>-<?php  echo $yr['YEAR']; ?></h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-4">
            <h6>Project Reference:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $proc1['PROJ_CODE'];?> <?php echo $proc1['PROC_ID'];?>-<?php echo $proc1['C_NAME'];?>-<?php  echo $yr['YEAR']; ?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>Project Title:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $proc1['PROC_TITLE'];?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>Approved Budget of the Contract:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold">₱<?php $numnum = $proc1['PROC_BUDGET']; echo number_format("$numnum",2,",",".");?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>Amount in Words:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $proc1['PROC_WORD'] ?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>Date:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo pretty_date1($proc1['PROC_DATE']); ?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>Source of Fund:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold">Office of the <?php echo $proc1['O_NAME'] ?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>procurement Method:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold"> <?php echo $proc1['M_NAME'] ?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6>Status:</h6>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $proc1['STAT_NAME'] ?></h5>
          </div>
          <!-- -============================== -->
          <div class="col-4">
            <h6></h6>
          </div>
          <div class="col-8 overover">
          </div>



        </div>

      </div>
    </div>
    <div class="modal-footer">
      <button class = "btn modal-button red-bg" onclick="closeModal()" data-dismiss="modal" aria-label="close">Close</button>
    </div>
  </div>
  </div>

</div>
<script>
function closeModal(){
  jQuery('#modalprocurement').modal('hide');
  setTimeout(function(){
    jQuery('#modalprocurement').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}

</script>
<?php echo ob_get_clean(); ?>
