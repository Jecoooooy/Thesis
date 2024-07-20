<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">ORDINANCES</h4>
  <a href="ordinance.php?add=1" class ="btn btn-success pull-right" id = "add-places-btn"> Add Ordinance</a>
  <div class="clearfix clearfix-pad">
  </div>
  <table class="table justify-space-between add_scroll center-text">
    <thead>
      <tr class = "row">
        <td class = " col-3 bold">AUTHOR</td>
        <td class = " col-5 bold">TITLE</td>
        <th class=" col-2 edit-table">EDIT</th>
        <th class=" col-2 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($ord = mysqli_fetch_assoc($result)): ?>
      <tr class = "row">
        <td class = " col-3 bold"><h6> <?php echo $ord['author']; ?> </h6></td>
        <td class = " col-5 bold"><h6> <?php echo $ord['title']; ?> </h6></td>
        <td class = "col-2 edit-table"> <a href="ordinance.php?edit=<?php echo $ord['id']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-2 delete-table"><a href="ordinance.php?delete=<?php echo $ord['id']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
