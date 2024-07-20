<?php ob_start();?>
<h4 class = "center "> <?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> SERVICES</h4>
<div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  white-color margin-auto">
  <form class = "pad" action="services.php?<?=(isset($_GET['edit']))?'edit='.$edit_id:'add=1';?>" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row">
          <div class="form-group col-md-6 col-sm-12">
              <label for="service" class = " margin-auto">*service:</label>
              <input type="text" class = "form-control" name="service" placeholder="Enter Service name" id ="service">

          </div>
          <div class="form-group col-md-6 col-sm-12">
              <label for="office" class = " margin-auto">*office:</label>
              <select class="form-control name_list cursor-pointer" id= "office" name="office">
                <option value="<?=(($office == '')? 'selected':'');?>">Select Office</option>
                <?php while ($office1 = mysqli_fetch_assoc($officeQuery)):?>
                  <option value=" <?=$office1['O_ID'];?>"<?=(($office == $office1['O_ID'])?' selected':'');?>><?=$office1['O_NAME'];?> </option>
                <?php endwhile?>
              </select>
          </div>
          <div class="form-group col-md-6 col-sm-12">
              <label for="employee" class = " margin-auto">*employee:</label>
              <select class="form-control name_list cursor-pointer" id= "employee" name="employee">
                <option value="<?=(($employee == '')? 'selected':'');?>">Select Employee</option>
                <?php while ($employee1 = mysqli_fetch_assoc($employeeQuery)):?>
                  <option value=" <?=$employee1['E_ID'];?>"<?=(($employee == $employee1['E_ID'])?' selected':'EMPLOYEE');?>><?=$employee1['E_NAME_FIRST'];?> <?=$employee1['E_NAME_LAST'];?></option>
                <?php endwhile?>
              </select>
          </div>
          <div class="form-group col-md-6 col-sm-12">
              <label for="fee" class = " margin-auto">*Service Fee:</label>
              <input type="number" class = "form-control" name="fee"placeholder="Enter Fee" id ="fee" >
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="form-group col-12">
            <div class="row">

              <div class="col-6">
              <div class="row">
                <div class=" col-sm-12">
                  <p>REQUUIREMENTS FOR NEW APPLICANT</p>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                      <tr>
                        <td><input type="text" name="new[]" placeholder="Enter Requirement" class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success pull-right">Add More</button></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6">
            <div class="row">
              <div class=" col-sm-12">
                <p>REQUUIREMENTS FOR OLD APPLICANT</p>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dynamic_field1">
                    <tr>
                      <td><input type="text" name="old[]" placeholder="Enter Requirement" class="form-control name_list" /></td>
                      <td><button type="button" name="add1" id="add1" class="btn btn-success pull-right">Add More</button></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            </div>

            </div>
          </div>
        </div>
      </div>
      <!-- -================================================================= -->
      <div class="col-12">
        <div class="row">
          <div class="form-group col-12">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <p>HOW TO AVAIL SERVICES:</p>
              </div>
              <div class=" col-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dynamic_field2">
                    <tr>
                      <td><textarea rows="5" class = "form-control name_list" name="applicant[]" id ="applicant" placeholder="Applicant/Client"></textarea></td>
                      <td><textarea rows="5" class = "form-control name_list" name="activity[]" id ="activity" placeholder="Administration Office Activity"></textarea></td>
                      <td><input type="number" name="num[]" placeholder="DURATION" class="form-control name_list" ></td>
                      <td><input type="type" name="person[]" placeholder="Employee" class="form-control name_list" ></td>
                      <td><button type="button" name="add2" id="add2" class="btn btn-success">Add More</button></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
      <div class="row">
        <div class="col-md-6 col-sm-12 ">
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group ">
            <div class="row justify-space-around ">
              <a href="services.php" class = "btn btn-default col-5 btn-custom ">Cancel</a>
              <input type="submit"  class = "btn btn-success col-5 " value="<?=(isset($_GET['edit']))?'EDIT':'ADD ';?> SERVICES">
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </form>
</div>
<?php echo ob_get_clean(); ?>
