<?php
require_once '../core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM ordinance WHERE id = '$id'";
$result = $db->query($sql);
$ordinance1 = mysqli_fetch_assoc($result);
?>
<?php ob_start();?>
<div class="modal fade details-1" id="modalordinance" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $ordinance1['author']; ?></h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid" style="height:80vh;">
        <embed src="<?php echo $ordinance1['pdf_file']; ?>" type="application/pdf" width="100%" height="100%">
    </iframe>

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
  jQuery('#modalordinance').modal('hide');
  setTimeout(function(){
    jQuery('#modalordinance').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}

</script>
<?php echo ob_get_clean(); ?>
