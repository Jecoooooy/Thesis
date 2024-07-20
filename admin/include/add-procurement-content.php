<h4 class = "center "> <?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> PROCUREMENT</h4>
<div class="container-fluid col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12  white-color margin-auto">
  <form class = "pad" action="procurement.php?<?=(isset($_GET['edit']))?'edit='.$edit_id:'add=1';?>" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class = "center">PROJECT REFERENCE</h6>
        <div class="form-group col-12">
          <div class="row">
            <label for="code" class = "col-md-2 margin-auto">*PR CODE:</label>
            <select class="col-md-4 form-control cursor-pointer" id= "code" name="code">
              <option value="<?=(($code1 == '')? 'selected':'');?>"></option>
              <?php while ($code = mysqli_fetch_assoc($codeQuery)):?>
                <option value=" <?=$code['PROJ_ID'];?>"<?=(($code1 == $code['PROJ_ID'])?' selected':'');?>><?=$code['PROJ_CODE'];?> </option>
              <?php endwhile?>
            </select>
            <label for="category" class = "col-md-2 margin-auto">*CATEGORY:</label>
            <select class="col-md-4 form-control cursor-pointer" id= "category" name="category">
              <option value="<?=(($category1 == '')? 'selected':'');?>"></option>
              <?php while ($category = mysqli_fetch_assoc($categoryQuery)):?>
                <option value=" <?=$category['C_ID'];?>"<?=(($category1 == $category['C_ID'])?' selected':'');?>><?=$category['C_NAME'];?> </option>
              <?php endwhile?>
            </select>
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="date" class = "col-md-2 margin-auto">*date start:</label>
            <input type="date" class = " col-md-4 form-control" name="date" id ="date" value="<?= $date1;?>">
            <label for="date2" class = "col-md-2 margin-auto">*date deadline:</label>
            <input type="date" class = " col-md-4 form-control" name="date2" id ="date2" value="<?= $date2;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="title" class = "col-md-2 margin-auto">*Project Title:</label>
            <input type="text" class = " col-md-10 form-control" name="title" id ="title" value="<?= $title;?>">
          </div>
        </div>



        <div class="form-group col-12">
          <div class="row">
            <label for="budget" class = "col-md-2 margin-auto">*allocated budget:</label>
            <input type="number" class = " col-md-2 form-control" name="budget" id ="budget" value="<?= $budget;?>">
            
            <label for="office" class = "col-md-2 margin-auto">*Office Name:</label>
            <select class="col-md-2 form-control cursor-pointer" id= "office" name="office">
              <option value="<?=(($office1 == '')? 'selected':'');?>"></option>
              <?php while ($office = mysqli_fetch_assoc($officeQuery)):?>
                <option value=" <?=$office['O_ID'];?>"<?=(($office1 == $office['O_ID'])?' selected':'');?>><?=$office['O_NAME'];?> </option>
              <?php endwhile?>
            </select>
            <label for="method" class = "col-md-2 margin-auto">*Method:</label>
            <select class="col-md-2 form-control cursor-pointer" id= "method" name="method">
              <option value="<?=(($method1 == '')? 'selected':'');?>"></option>
              <?php while ($method = mysqli_fetch_assoc($methodQuery)):?>
                <option value=" <?=$method['M_ID'];?>"<?=(($method1 == $method['M_ID'])?' selected':'');?>><?=$method['M_NAME'];?> </option>
              <?php endwhile?>
            </select>

          </div>
        </div>


      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group ">
          <div class="row justify-space-around ">
            <a href="procurement.php" class = "btn btn-default col-5 btn-custom ">Cancel</a>
            <input type="submit"  class = "btn btn-success col-5 " value="<?=(isset($_GET['edit']))?'EDIT':'ADD ';?> PROCUREMENT">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
