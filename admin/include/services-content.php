
<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w95 margin-auto">
  <h4 class = "center">SERVICES</h4>
  <a href="services.php?add=1" class ="btn btn-success pull-right" id = "add-places-btn"> Add SERVICES</a> <div class="clearfix clearfix-pad">

  </div>
  <table class="table justify-space-between add_scroll center-text ">
    <thead>
      <tr class = "row">

        <td class = " col-1 bold"></td>
        <td class = "col-2 bold">SERVICE</td>
        <td class = "col-2 bold">OFFICE</td>
        <td class = "col-2 bold">EMPLOYEE</td>
        <td class = "col-2 bold">DESIGNATION</td>
        <td class = "col-1 bold">FEES</td>
        <th class="col-1 edit-table">EDIT</th>
        <th class=" col-1 delete-table">DELETE</th>
      </tr>

    </thead>
    <tbody>



      <?php while($serv = mysqli_fetch_assoc($result)):
        ?>

      <tr class = "row divideline">
        <td class = " col-1 bold">  <?= $serv['S_ID'] ?></td>
        <td class = "col-2  jec111"><p><?= $serv['S_NAME'] ?> </p></td>
        <td class = "col-2 bold"><p> <?= $serv['O_NAME'] ?> </p></td>
        <td class = "col-2 bold"><p><?= $serv['E_NAME_FIRST'] ?> <?= $serv['E_NAME_LAST'] ?></p></td>
        <td class = "col-2 bold"><p><?= $serv['E_DESIGNATION'] ?></p></td>
        <td class = "col-1 bold"><p><?= $serv['S_FEES'] ?></p></td>
        <td class = " col-1 edit-table"> <a href="services.php?edit=<?php echo $serv['S_ID']; ?>" name = "edit" class = "btn btn-xs btn-default btn-custom"><i class="fa fa-edit"></i> </a></td>
        <td class = "col-1 delete-table"><a href="services.php?delete=<?php echo $serv['S_ID']; ?>" name = "delete" class = "btn btn-xs btn-default btn-custom"> <i class="fa fa-trash"></i> </a></td>
        <td class="col-6">
          <div class="jec100">
            <p class="jec100" >NEW REQUIREMENTS</p>
          </div>

          <?php $rid = $serv['R_ID'];
          $rnew = $db->query("SELECT * FROM requirement WHERE R_ID = $rid AND R_TYPE = 'NEW' AND R_NAME != 'none'"); ?>
          <?php while ($new = mysqli_fetch_assoc($rnew)):?>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-1 jec111"><p><?= $new['R_COUNT']; ?></p></div>
            <div class="col-10 jec112"><p><?= $new['R_NAME']; ?></p></div>
          </div>
            <?php endwhile; ?>
        </td>
        <td class="col-6">
          <div class="jec100">
          <p class="jec100">OLD REQUIREMENTS</p>
        </div>

          <?php $rid = $serv['R_ID'];
          $rold = $db->query("SELECT * FROM requirement WHERE R_ID = $rid AND R_TYPE = 'OLD' AND R_NAME != 'none'"); ?>
          <?php while ($old = mysqli_fetch_assoc($rold)):?>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-1 jec111"><p><?= $old['R_COUNT']; ?></p></div>
            <div class="col-10 jec112"><p><?= $old['R_NAME']; ?></p></div>
          </div>
            <?php endwhile; ?>
        </td>
        <td class="col-12">
          <h6 style="font-weight: bold;"><center> HOW TO AVAIL SERVICE</center></h6>
          <div class="row">
            <div class="col-1 jec111"><p>STEPS</p></div>
            <div class="col-4 jec101"><p>APPLICANTS / CLIENTS</p></div>
            <div class="col-3 jec101"><p>ADMINISTRATIVE OFFICE ACTIVITY</p></div>
            <div class="col-2 jec101"><p>DURATION</p></div>
            <div class="col-2 jec101"><p>PERSON IN CHARGE</p></div>
          </div>
          <?php $ssid = $serv['SS_ID'];
          $step = $db->query("SELECT * FROM service_step WHERE SS_ID = $ssid"); ?>
          <?php while ($steps = mysqli_fetch_assoc($step)):?>
          <div class="row">
            <div class="col-1 jec112"><p><?= $steps['SS_COUNT']; ?></p></div>
            <div class="col-4 jec112"><p><?= $steps['SS_APPLICANT']; ?></p></div>
            <div class="col-3 jec112"><p><?= $steps['SS_ACTIVITY']; ?></p></div>
            <div class="col-2 jec112"><p><?= $steps['SS_DURATION']; ?> Minutes</p></div>
            <div class="col-2 jec112"><p><?= $steps['E_NAME']; ?></p></div>
          </div>
            <?php endwhile; ?>
        </td>
      </tr>

      <?php endwhile; ?>
    </tbody>
  </table>
