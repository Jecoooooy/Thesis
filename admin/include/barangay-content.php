<div class="container-fluid col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 margin-auto">

  <h4 class = "center">BARANGAY</h4>
  <div class="text-center pad  ">
    <form class="form-inline" action="barangays.php <?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
      <div class="form-group justify">
        <?php
        $brgy_value = '';
        if (isset($_GET['edit'])) {
        $brgy_value = $eBrgy['PLOC_BARANGAY'];
       }  else {
          if(isset($_POST['PLOC_BARANGAY'])){
            $brgy_value = sanitize($_POST['PLOC_BARANGAY']);
          }
        }
       ?>
        <label for="barangay"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> Barangay:</label>
        <input type="text" name="barangay" id ="barangay" class = "form-control" value="<?=$brgy_value; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href= "barangays.php" class=" btn-brgy btn-default">Cancel</a>
        <?php endif; ?>
        <input type="submit" name="add_submit" value="<?=((isset($_GET['edit']))?'Edit':'Add'); ?>" class = "btn btn-success">
      </div>
    </form>
  </div>

  <table class="table justify-space-between">
    <thead>

      <tr>
        <th class="bold">NAME</th>
        <th class="edit-table">EDIT</th>
        <th class="delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($brgys = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td class="bold"><?php echo $brgys['PLOC_BARANGAY']; ?></td>
        <td class = "edit-table"><a href="barangays.php?edit=<?php echo $brgys['PLOC_ID']; ?>" name = "edit" class = "btn btn-xs btn-default"> <i class="fa fa-edit"></i> </a></td>
        <td class = "delete-table"><a href="barangays.php?delete=<?php echo $brgys['PLOC_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
