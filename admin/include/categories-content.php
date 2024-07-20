<div class="container-fluid col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 margin-auto">

  <h4 class = "center">CATEGORIES</h4>
  <div class="text-center pad  ">
    <form class="form-inline" action="categories.php <?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
      <div class="form-group justify">
        <?php
        $cat_value = '';
        if (isset($_GET['edit'])) {
        $cat_value = $ecat['C_NAME'];
       }  else {
          if(isset($_POST['C_NAME'])){
            $cat_value = sanitize($_POST['C_NAME']);
          }
        }
       ?>
        <label for="category"><?=((isset($_GET['edit']))?'Edit':'Add'); ?> Category:</label>
        <input type="text" name="category" id ="category" class = "form-control" value="<?=$cat_value; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href= "categories.php" class=" btn-brgy btn-default">Cancel</a>
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
      <?php while($cats = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td class = "bold"><?php echo $cats['C_NAME']; ?></td>
        <td class = "edit-table"><a href="categories.php?edit=<?php echo $cats['C_ID']; ?>" name = "edit" class = "btn btn-xs btn-default"> <i class="fa fa-edit"></i> </a></td>
        <td class = "delete-table"><a href="categories.php?delete=<?php echo $cats['C_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
