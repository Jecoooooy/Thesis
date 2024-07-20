<div class="container-fluid col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 margin-auto">

  <h4 class = "center">PROJECT REFERENCE</h4>
  <div class="text-center pad  ">
    <form class="form-inline" action="project-reference.php <?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
      <div class="form-group justify">
        <?php
        $epr_value = '';
        if (isset($_GET['edit'])) {
        $epr_value = $epr['PROJ_CODE'];
       }  else {
          if(isset($_POST['PROJ_CODE'])){
            $brgy_value = sanitize($_POST['PROJ_CODE']);
          }
        }
       ?>
        <label for="reference"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> Project reference:</label>
        <input type="text" name="reference" id ="reference" class = "form-control" value="<?=$epr_value; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href= "project-reference.php" class=" btn-brgy btn-default">Cancel</a>
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
      <?php while($PRS = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td class="bold"><?php echo $PRS['PROJ_CODE']; ?></td>
        <td class = "edit-table"><a href="project-reference.php?edit=<?php echo $PRS['PROJ_ID']; ?>" name = "edit" class = "btn btn-xs btn-default"> <i class="fa fa-edit"></i> </a></td>
        <td class = "delete-table"><a href="project-reference.php?delete=<?php echo $PRS['PROJ_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
