<?php
require_once '../core/init.php';
$F_ID = $_POST['F_ID'];
$F_ID = (int)$F_ID;
$sql = "SELECT * FROM festivities WHERE F_ID = '$F_ID'";
$result = $db->query($sql);
$festivities1 = mysqli_fetch_assoc($result);
?>
<?php ob_start();?>
<div class="modal fade details-1" id="modalfestivities" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $festivities1['F_TITLE']; ?></h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="center-block">
              <img src="<?php echo $festivities1['F_IMG']; ?>" alt="" class="details img-fluid">
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 txtxt">
            <h4>NAME:  </h4>
            <p><?php echo $festivities1['F_TITLE']; ?></p>
            <h4>DATE:  </h4>
            <p><?php echo $festivities1['F_MONTH']; ?> <?php echo $festivities1['F_DATE']; ?></p>
            <h4>DESCRIPTION: </h4>
            <p><?php echo nl2br($festivities1['F_DESCRIPTION']); ?></p>

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
  jQuery('#modalfestivities').modal('hide');
  setTimeout(function(){
    jQuery('#modalfestivities').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}

</script>
<?php echo ob_get_clean(); ?>
