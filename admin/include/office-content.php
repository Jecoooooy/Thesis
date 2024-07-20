<div class="container-fluid col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 margin-auto">

  <h4 class = "center">OFFICE</h4>
  <div class="text-center pad  ">
    <form class="form-inline" action="office.php <?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
      <div class="form-group justify">
        <?php
        $office_value = '';
        if (isset($_GET['edit'])) {
        $office_value = $eoffice['O_NAME'];
       }  else {
          if(isset($_POST['O_NAME'])){
            $office_value = sanitize($_POST['O_NAME']);
          }
        }
       ?>
        <label for="barangay"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> Office:</label>
        <input type="text" name="office" id ="office" class = "form-control" value="<?=$office_value; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href= "office.php" class=" btn-brgy btn-default">Cancel</a>
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
      <?php while($office = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $office['O_NAME']; ?></td>
        <td class = "edit-table"><a href="office.php?edit=<?php echo $office['O_ID']; ?>" name = "edit" class = "btn btn-xs btn-default"> <i class="fa fa-edit"></i> </a></td>
        <td class = "delete-table"><a href="office.php?delete=<?php echo $office['O_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
