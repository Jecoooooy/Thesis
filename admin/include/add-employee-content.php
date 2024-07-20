<h4 class = "center "> <?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> EMPLOYEE</h4>
<div class="container-fluid col-xl-8 col-lg-8 col-md-10 col-sm-11 col-12  white-color margin-auto">
  <form class = "pad" action="employee.php?<?=(isset($_GET['edit']))?'edit='.$edit_id:'add=1';?>" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group col-12">
          <div class="row">
            <label for="first" class = "col-md-4 margin-auto">*FIRST NAME:</label>
            <input type="text" class = " col-md-8 form-control" name="first" id ="first" value="<?= $first1;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="last" class = "col-md-4 margin-auto">*LAST NAME:</label>
            <input type="text" class = " col-md-8 form-control" name="last" id ="last" value="<?= $last1;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="designation" class = "col-md-4 margin-auto">*DESIGNATION:</label>
            <input type="text" class = " col-md-8 form-control" name="designation" id ="designation" value="<?= $designation;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="contact" class = "col-md-4 margin-auto">*CONTACT:</label>
            <input type="number" class = " col-md-8 form-control" name="contact" id ="contact" value="<?=$contact;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="office" class = "col-md-4 margin-auto">*Office Name:</label>
            <select class="col-md-8 form-control cursor-pointer" id= "office" name="office">
              <option value="<?=(($office1 == '')? 'selected':'');?>"></option>
              <?php while ($office = mysqli_fetch_assoc($officeQuery)):?>
                <option value=" <?=$office['O_ID'];?>"<?=(($office1 == $office['O_ID'])?' selected':'');?>><?=$office['O_NAME'];?> </option>
              <?php endwhile?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="form-group ">
              <div class="row justify-space-around ">
                <a href="employee.php" class = "btn btn-default col-5 btn-custom ">Cancel</a>
                <input type="submit"  class = "btn btn-success col-5 " value="<?=(isset($_GET['edit']))?'EDIT':'ADD ';?> EMPLOYEE">
              </div>
            </div>
          </div>
        </div>
    </div>
  </form>
</div>
