<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">PRODUCTS</h4>
  <a href="products.php?add=1" class ="btn btn-success pull-right" id = "add-products-btn"> Add Places</a>
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
      <?php while($products = mysqli_fetch_assoc($result)): ?>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <img src="<?php echo $products['PROD_IMG']; ?>" class = "img-fluid" alt=""> </td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <h6> <?php echo $products['PROD_NAME']; ?> </h6></td>
        <td class = "col-xl-4 col-lg-4 col-md-4 col-xs-4 col-4 descript text-justify"><p><?php echo $products['PROD_DESCRIPTION']; ?></p></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 stat-size">
        <a href="products.php?stat=<?=(($products['PROD_STATUS'] == 0)?'1':'0');?> &id=<?=$products['PROD_ID'];?>" class = " btn btn-xs btn-default btn-custom <?=(($products['PROD_STATUS'] == 1)?'bg-green':'bg-red');?>">
        <span><?=(($products['PROD_STATUS'] == 1)?'SHOW':'HIDE');?></span>
        </a>


        </td>
        <td class = "col-xl-1 col-lg-1 col-md-1  col-xs-1 col-1 edit-table"> <a href="products.php?edit=<?php echo $products['PROD_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table"><a href="products.php?delete=<?php echo $products['PROD_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
