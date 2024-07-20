<?php
require_once '../core/init.php';
$PL_ID = $_POST['PL_ID'];
$PL_ID = (int)$PL_ID;
$sql = "SELECT * FROM vplaces WHERE PL_ID = '$PL_ID'";
$result = $db->query($sql);
$place = mysqli_fetch_assoc($result);
?>
<?php ob_start();?>
<div class="modal fade details-1" id="modalplaces" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $place['PL_TITLE']; ?></h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-12">
            <div class="center-block">
              <img src="<?php echo $place['PL_IMG']; ?>" alt="" class="details img-fluid">
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-12">
            <div class="center-block">
              <?php echo $place['embed']; ?>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <h4 class="col-6 jecjec1">NAME:  </h4>
                <h4 class="col-6 jecjec2"><?php echo $place['PL_TITLE']; ?></h4>
            </div>
            <div class="row">
              <div class="col-6"></div>
              <div class="col-6 overover">
            </div>

            </div>
            <div class="row">
                <h4 class="col-6 jecjec1">LOCATION:  </h4>
                <h4 class="col-6 jecjec2"><?php echo $place['PLOC_BARANGAY']; ?></h4>
            </div>
            <div class="row">
              <div class="col-6"></div>
              <div class="col-6 overover">
            </div>

            </div>
            <div class="row">
                <h4 class="col-12 jecjec1">DESCRIPTION:  </h4>
                <p class="col-12"><?php echo nl2br($place['PL_DESCRIPTION']); ?></p>
            </div>

          </div>
        </div>

      </div>
    </div>
    <div class="modal-footer">
      <button class = "btn modal-button red-bg" onclick="closeModal()">Close</button>
    </div>
  </div>
  </div>

</div>
<script>
function closeModal(){
  jQuery('#modalplaces').modal('hide');
  setTimeout(function(){
    jQuery('#modalplaces').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}

</script>
<?php echo ob_get_clean(); ?>
