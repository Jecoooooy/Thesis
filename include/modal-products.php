<?php
require_once '../core/init.php';
$PROD_ID = $_POST['PROD_ID'];
$PROD_ID = (int)$PROD_ID;
$sql = "SELECT * FROM product WHERE PROD_ID = '$PROD_ID'";
$result1 = $db->query($sql);
$product1 = mysqli_fetch_assoc($result1);
?>
<?php ob_start();?>
<div class="modal fade details-1" id="modalproduct" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $product1['PROD_NAME']; ?></h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="center-block">
              <img src="<?php echo $product1['PROD_IMG']; ?>" alt="" class="details img-fluid">
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
            <h4>NAME:  </h4>
            <p><?php echo $product1['PROD_NAME']; ?></p>
            <h4>DESCRIPTION: </h4>
            <p><?php echo $product1['PROD_DESCRIPTION']; ?></p>

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
  jQuery('#modalproduct').modal('hide');
  setTimeout(function(){
    jQuery('#modalproduct').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}

</script>
<?php echo ob_get_clean(); ?>
