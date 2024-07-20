<?php
require_once '../core/init.php';
$LN_ID = $_POST['LN_ID'];
$LN_ID = (int)$LN_ID;
$sql = "SELECT * FROM latest_news WHERE LN_ID = '$LN_ID'";
$result = $db->query($sql);
$latest_new = mysqli_fetch_assoc($result);
?>
<?php ob_start();?>
<div class="modal fade details-1 pad" id="modallatestnews" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $latest_new['LN_TITLE']; ?></h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12 col-12">
            <div class="center-block">
              <img src="<?php echo $latest_new['LN_IMG']; ?>" alt="" class="details img-fluid">
            </div>
          </div>
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12">
            <h4>TITLE:  </h4>
            <p><?php echo $latest_new['LN_TITLE']; ?></p>

            <h4>DESCRIPTION: </h4>
            <p><?php echo $latest_new['LN_DESCRIPTION']; ?></p>

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
  jQuery('#modallatestnews').modal('hide');
  setTimeout(function(){
    jQuery('#modallatestnews').remove();
    jQuery('.modal-backdrop').remove();
  },500)
}

</script>
<?php echo ob_get_clean(); ?>
