<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">PROCUREMENT</h4>
  <a href="procurement.php?add=1" class ="btn btn-success pull-right" id = "add-places-btn"> Add procurement</a> <div class="clearfix clearfix-pad">

  </div>
  <table class="table justify-space-between add_scroll center-text ">
    <thead>
      <tr class = "row">

        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">Project Reference</td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 bold">Title</td>

        <td class = "col-2 bold">Date</td>
        <td class = "col-2 bold">Source of Fund</td>
        <td class = "col-1 bold">BUDGET</td>
        <td class = "col-1 bold">Status</td>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 edit-table">EDIT</th>
        <th class="col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>



      <?php
      $sql1  = "SELECT * FROM vprocurement";
      $result1 = $db->query($sql1);
      while($proc = mysqli_fetch_assoc($result1)):
        
        $yr = $db->query("SELECT YEAR(' $proc[PROC_DATE]') AS YEAR;");
        $yrs = mysqli_fetch_assoc($yr);
        $yrs1 = $yrs['YEAR'];
        $yrsArray = explode('.',$yrs1);
        $yrsfinal = $yrsArray[0];
        ?>
      <tr class = "row">
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 putput"> <h6><?php echo $proc['PROJ_CODE'];?> <?php echo $proc['PROC_ID'];?>-<?php echo $proc['C_NAME'];?>-<?php  echo $yrsfinal; ?></h6></td>
        <td class = "col-xl-2 col-lg-2 col-md-2 col-xs-2 col-2 descript text-justify"><p><?php echo $proc['PROC_TITLE']; ?></p></td>
        <td class = "col-2"><p> <?php echo pretty_date1($proc['PROC_DATE']); ?>
        <br></br>
        <br></br>
        (DEADLINE)
        <br></br>
        <?php echo pretty_date1($proc['PROC_DATE_DEAD']); ?>
         </p></td>
        <td class = "col-2"><p> <?php echo $proc['O_NAME']; ?> </p></td>
        <td class = "col-1 bold"><p> ₱<?php $numnum = $proc['PROC_BUDGET']; echo number_format("$numnum",2,",",".");?></p></td>
        <?php if (($proc['STAT_ID']) == 3) { ?>
          <td class = "col-1" ><p style="color:red;"> <?php echo $proc['STAT_NAME']; ?> </p></td>
          <?php
        }
        else{
          if (($proc['STAT_ID']) == 1) {
            ?>
            <td class = "col-1"><p style="color:green;"> <?php echo $proc['STAT_NAME']; ?> </p></td>
            <?php
          }else{
          ?>
          <td class = "col-1"><p> <a href="procurement.php?stat=<?=(($proc['STAT_ID'] == 1)?'2':'1');?> &id=<?=$proc['PROC_ID'];?>" class = " btn btn-xs btn-default btn-custom <?=(($proc['STAT_ID'] == 1)?'bg-green':'bg-red');?>">
          <span><?=(($proc['STAT_ID'] == 1)?'AWARDED':'PENDING');?></span></a></p></td>
          <?php
        }
        } ?>
        <td class = "col-xl-1 col-lg-1 col-md-1  col-xs-1 col-1 edit-table"> <a href="procurement.php?edit=<?php echo $proc['PROC_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-xl-1 col-lg-1 col-md-1 col-xs-1 col-1 delete-table"><a href="procurement.php?delete=<?php echo $proc['PROC_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
