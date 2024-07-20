<div class="container-fluid col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 margin-auto">

  <h4 class = "center">METHODS OF PROCUREMENT</h4>
  <div class="text-center pad  ">
    <form class="form-inline" action="mode.php <?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
      <div class="form-group justify">
        <?php
        $mode_value = '';
        if (isset($_GET['edit'])) {
        $mode_value = $emode['M_NAME'];
       }  else {
          if(isset($_POST['M_NAME'])){
            $mode_value = sanitize($_POST['M_NAME']);
          }
        }
       ?>
        <label for="method"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> method:</label>
        <input type="text" name="method" id ="method" class = "form-control" value="<?=$mode_value; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href= "mode.php" class=" btn-brgy btn-default">Cancel</a>
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
      <?php while($modes = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td class="bold"><?php echo $modes['M_NAME']; ?></td>
        <td class = "edit-table"><a href="mode.php?edit=<?php echo $modes['M_ID']; ?>" name = "edit" class = "btn btn-xs btn-default"> <i class="fa fa-edit"></i> </a></td>
        <td class = "delete-table"><a href="mode.php?delete=<?php echo $modes['M_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
