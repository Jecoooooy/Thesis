<div class="container-fluid col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 margin-auto">

  <h4 class = "center">STATUS</h4>
  <div class="text-center pad  ">
    <form class="form-inline" action="status.php <?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
      <div class="form-group justify">
        <?php
        $stat_value = '';
        if (isset($_GET['edit'])) {
        $stat_value = $estat['STAT_NAME'];
       }  else {
          if(isset($_POST['STAT_NAME'])){
            $stat_value = sanitize($_POST['STAT_NAME']);
          }
        }
       ?>
        <label for="status"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> status:</label>
        <input type="text" name="status" id ="status" class = "form-control" value="<?=$stat_value; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href= "status.php" class=" btn-brgy btn-default">Cancel</a>
        <?php endif; ?>
        <input type="submit" name="add_submit" value="<?=((isset($_GET['edit']))?'Edit':'Add'); ?>" class = "btn btn-success">
      </div>
    </form>
  </div>

  <table class="table justify-space-between">
    <thead>

      <tr>
        <th>NAME</th>
        <th class="edit-table">EDIT</th>
        <th class="delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($stats = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $stats['STAT_NAME']; ?></td>
        <td class = "edit-table"><a href="status.php?edit=<?php echo $stats['STAT_ID']; ?>" name = "edit" class = "btn btn-xs btn-default"> <i class="fa fa-edit"></i> </a></td>
        <td class = "delete-table"><a href="status.php?delete=<?php echo $stats['STAT_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
