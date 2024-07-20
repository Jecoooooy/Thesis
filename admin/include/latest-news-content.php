<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">LATEST NEWS</h4>
  <a href="latest-news.php?add=1" class ="btn btn-success pull-right" id = "add-latest-news-btn"> Add NEWS</a> <div class="clearfix clearfix-pad">

  </div>
  <table class="table justify-space-between add_scroll center-text">
    <thead>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">IMAGE</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">TITLE</td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold">DESCRIPTION</td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 bold">DATE</td>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 edit-table">EDIT</th>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>
      <?php while($news = mysqli_fetch_assoc($result)): ?>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <img src="<?php echo $news['LN_IMG']; ?>" class = "img-fluid" alt=""> </td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2"> <h6> <?php echo $news['LN_TITLE']; ?> </h6></td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3 descript text-justify"><p><?php echo $news['LN_DESCRIPTION']; ?></p></td>
        <td class = "col-xl-3 col-lg-3 col-md-3 col-xs-3 col-3"><p> <?php echo $news['LN_DATE']; ?> </p></td>
        <td class = "col-xl-1 col-lg-1 col-md-1  col-xs-1 col-1 edit-table"> <a href="latest-news.php?edit=<?php echo $news['LN_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table"><a href="latest-news.php?delete=<?php echo $news['LN_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
