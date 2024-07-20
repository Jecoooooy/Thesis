<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">PLACES</h4>
  <a href="places.php?add=1" class ="btn btn-success pull-right" id = "add-places-btn"> Add Places</a> 
  <div class="clearfix clearfix-pad">
  </div>
  <table class="table justify-space-between add_scroll center-text">
    <thead>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">IMAGE</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">NAME</td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold">DESCRIPTION</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">LOCATION</td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 bold">STATUS</td>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 edit-table">EDIT</th>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($place = mysqli_fetch_assoc($result)): ?>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <img src="<?php echo $place['PL_IMG']; ?>" class = "img-fluid" alt=""> </td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <h6> <?php echo $place['PL_TITLE']; ?> </h6></td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 descript text-justify"><p><?php echo $place['PL_DESCRIPTION']; ?></p></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"><p> <?php echo $place['PLOC_BARANGAY']; ?> </p></td>
      <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 stat-size">
        <a href="places.php?stat=<?=(($place['PL_STATUS'] == 0)?'1':'0');?> &id=<?=$place['PL_ID'];?>" class = " btn btn-xs btn-default btn-custom <?=(($place['PL_STATUS'] == 1)?'bg-green':'bg-red');?>">
        <span><?=(($place['PL_STATUS'] == 1)?'SHOW':'HIDE');?></span>
        </a>


        </td>
        <td class = "col-xl-1 col-lg-1 col-md-1  col-xs-1 col-1 edit-table"> <a href="places.php?edit=<?php echo $place['PL_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table"><a href="places.php?delete=<?php echo $place['PL_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
