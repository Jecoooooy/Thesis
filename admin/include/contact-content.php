<div class="container-fluid  col-12 margin-auto">

  <h4 class = "center">CONTACT</h4>
  <div class="text-center pad  ">
  </div>

  <table class="table justify-space-between">
    <thead>

      <tr class="row">
        <th class="col-2 center">NAME</th>
        <th class="col-3 center">EMAIL</th>
        <th class="col-3 center">COMMENT</th>
        <th class="col-3 center">COMMENT</th>
        <th class="delete-table center col-1">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($contacts = mysqli_fetch_assoc($result)): ?>
      <tr class="row">
        <td class="col-2 center jec15"><?php echo $contacts['C_NAME']; ?></td>
        <th class="col-3 center jec15"><?php echo $contacts['C_EMAIL']; ?></th>
        <th class="col-3 center jec15"><?php echo $contacts['C_CONTENT']; ?></th>
        <th class="col-3 center jec15"><?php echo pretty_date1($contacts['C_DATE']); ?></th>
        <td class = "delete-table center col-1"><a href="contact.php?delete=<?php echo $contacts['C_ID']; ?>" name = "delete" class = "btn btn-xs btn-default"> <i class="fa fa-trash"></i> </a></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

</div>
