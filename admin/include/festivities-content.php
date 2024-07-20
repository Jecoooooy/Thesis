<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">FESTIVITIES</h4>
  <a href="festivities.php?add=1" class ="btn btn-success pull-right" id = "add-products-btn"> Add FESTIVITIES</a>
  <div class="clearfix clearfix-pad">
  </div>
  <table class="table justify-space-between add_scroll center-text">
    <thead>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">IMAGE</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">NAME</td>
        <td class = "col-xl-4 col-lg-4 col-md-4 col-xs-4 col-4 bold">DESCRIPTION</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">STATUS</td>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 edit-table">EDIT</th>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($festivity = mysqli_fetch_assoc($result)): ?>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <img src="<?php echo $festivity['F_IMG']; ?>" class = "img-fluid" alt=""> </td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <h6> <?php echo $festivity['F_TITLE']; ?> </h6></td>
        <td class = "col-xl-4 col-lg-4 col-md-4 col-xs-4 col-4 descript text-justify"><p><?php echo $festivity['F_DESCRIPTION']; ?></p></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 stat-size">
        <a href="festivities.php?stat=<?=(($festivity['F_STATUS'] == 0)?'1':'0');?> &id=<?=$festivity['F_ID'];?>" class = " btn btn-xs btn-default btn-custom <?=(($festivity['F_STATUS'] == 1)?'bg-green':'bg-red');?>">
        <span><?=(($festivity['F_STATUS'] == 1)?'SHOW':'HIDE');?></span>
        </a>
        </td>
        <td class = "col-xl-1 col-lg-1 col-md-1  col-xs-1 col-1 edit-table"> <a href="festivities.php?edit=<?php echo $festivity['F_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table"><a href="festivities.php?delete=<?php echo $festivity['F_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
