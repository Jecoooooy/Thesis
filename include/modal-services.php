<?php
require_once '../core/init.php';
$S_ID = $_POST['S_ID'];
$S_ID = (int)$S_ID;
$sql = "SELECT * FROM viewservice WHERE S_ID = '$S_ID'";
$result = $db->query($sql);
$service = mysqli_fetch_assoc($result);


?>

<?php ob_start();?>
<div class="modal fade details-1" id="modalservice" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-xl">
    <div class="modal-content">

    <div class="modal-header">
      <button type="button"class= "close"onclick="closeModal()" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
      <h2 class = "modal-title"><?php echo $service['S_NAME']; ?> SECTION</h2>
    </div>
    <div class="modal-body">
      <div class="container-fluid ">
        <div class="row">

          <div class="col-4">
            <h5>Employee:</h5>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $service['E_NAME_FIRST']; ?> <?php echo $service['E_NAME_LAST']; ?></h5>
          </div>
          <div class="col-4">
          </div>
          <div class="col-8 overover">
          </div>
          <!-- ================================================== -->
          <div class="col-4">
            <h5>Designation:</h5>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $service['E_DESIGNATION']; ?></h5>
          </div>
          <div class="col-4">
          </div>
          <div class="col-8 overover">
          </div>
          <!-- ================================================== -->
          <div class="col-4">
            <h5>Contact:</h5>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $service['E_CONTACT']; ?></h5>
          </div>
          <div class="col-4">
          </div>
          <div class="col-8 overover">
          </div>
          <!-- ================================================== -->
          <div class="col-4">
            <h5>Office:</h5>
          </div>
          <div class="col-8">
            <h5 class="bold"><?php echo $service['O_NAME']; ?></h5>
          </div>
          <div class="col-4">
          </div>
          <div class="col-8 overover">
          </div>
          <!-- ================================================== -->
          <div class="col-4">
            <h5>Requirements:</h5>


          </div>
          <div class="col-8">
            <h5 class="bold">For New Applicants</h5>
            <?php
            $R_ID = $service['R_ID'];
            $requirements = $db->query("SELECT * FROM Requirement WHERE R_ID = $R_ID AND R_TYPE = 'NEW'");
            while($requirement = mysqli_fetch_assoc($requirements)):
             ?>
             <ul>
               <li><?= $requirement['R_NAME']; ?></li>
             </ul>
             <?php endwhile; ?>
             <h5 class="bold">For Old Applicants</h5>
             <?php
             $R_ID = $service['R_ID'];
             $requirements1 = $db->query("SELECT * FROM Requirement WHERE R_ID = $R_ID AND R_TYPE = 'OLD'");
             while($requirement1 = mysqli_fetch_assoc($requirements1)):
              ?>
              <ul>
                <li><?= $requirement1['R_NAME']; ?></li>
              </ul>
              <?php endwhile; ?>
          </div>
          <div class="col-12 overover">
          </div>
          <!-- ================================================== -->
          <div class="col-12">
            <h5 class="bold">HOW to avail Service:</h5>
            <?php
            $SS_ID = $service['SS_ID'];
            $steps = $db->query("SELECT * FROM service_step WHERE SS_ID = $SS_ID");

             ?>
             <div class="table-responsive">
             <table class="table table-bordered">
               <tr>
                 <td class="bold">Step</td>
                 <td class="bold">APPLICANT / Client</td>
                 <td class="bold">Administrative Offfice Activity</td>
                 <td class="bold">Activity Duration</td>
                 <td class="bold">Person In-charge</td>
               </tr>
               <?php while($step = mysqli_fetch_assoc($steps)): ?>
               <tr>
                 <td class="bold"><?= $step['SS_COUNT']; ?></td>
                 <td><?= $step['SS_APPLICANT']; ?></td>
                 <td><?= $step['SS_ACTIVITY']; ?></td>
                 <td><?= $step['SS_DURATION']; ?> minutes</td>
                 <td><?= $step['E_NAME']; ?></td>
               </tr>
               <?php endwhile; ?>
             </table>
             </div>

          </div>
          <!-- ================================================== -->
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
  jQuery('#modalservice').modal('hide');
  setTimeout(function(){
    jQuery('#modalservice').remove();
    jQuery('.modal-backdrop').remove();
  },500);
}

</script>
<?php echo ob_get_clean(); ?>
