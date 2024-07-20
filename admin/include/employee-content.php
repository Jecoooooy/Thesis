<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">EMPLOYEE</h4>
  <a href="employee.php?add=1" class ="btn btn-success pull-right" id = "add-employee-btn"> Add Employee</a> <div class="clearfix clearfix-pad">

  </div>
  <table class="table justify-space-between add_scroll center-text ">
    <thead>
      <tr class = "row">
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold">NAME</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">DESIGNATION</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">CONTACT</td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold">OFFICE</td>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 edit-table">EDIT</th>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>



      <?php while($emp = mysqli_fetch_assoc($result)):?>
      <tr class = "row">
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold"><?php echo $emp['E_NAME_FIRST']; ?> <?php echo $emp['E_NAME_LAST']; ?></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"><?php echo $emp['E_DESIGNATION']; ?></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"><?php echo $emp['E_CONTACT']; ?></td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3"><?php echo $emp['O_NAME']; ?></td>
        <td class = "col-xl-1 col-lg-1 col-md-1  col-xs-1 col-1 edit-table"> <a href="employee.php?edit=<?php echo $emp['E_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table"><a href="employee.php?delete=<?php echo $emp['E_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
