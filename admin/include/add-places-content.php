<h4 class = "center "> <?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> PLACE</h4>
<div class="container-fluid col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12  white-color margin-auto">
  <form class = "pad" action="places.php?<?=(isset($_GET['edit']))?'edit='.$edit_id:'add=1';?>" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group col-12">
          <div class="row">
            <label for="title" class = "col-md-4 margin-auto">*TITLE:</label>
            <input type="text" class = " col-md-8 form-control" name="title" id ="title" value="<?= $title;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="description" class = "col-md-4 ">*DESCRIPTION:</label>
            <textarea rows="10" class = " col-md-8 form-control" name="description" id ="description" ><?=$description;?></textarea>
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="location" class = "col-md-4 margin-auto">*LOCATION:</label>
            <select class="col-md-8 form-control cursor-pointer" id= "location" name="location">
              <option value="<?=(($location == '')? 'selected':'');?>"></option>
              <?php while ($brgy = mysqli_fetch_assoc($brgyQuery)):?>
                <option value=" <?=$brgy['PLOC_ID'];?>"<?=(($location == $brgy['PLOC_ID'])?' selected':'');?>><?=$brgy['PLOC_BARANGAY'];?> </option>
              <?php endwhile?>
            </select>
          </div>
        </div>


        </div>
        <div class="row">

        </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group col-12">

            <?php if($saved_image != ''):?>
              <div class="saved-image center-image">
                <img src="<?=$saved_image;?>" class = "img-fluid " alt = "saved image"alt="">
              </div>
              <a href="places.php?delete_image=1&edit=<?=$edit_id;?> "class = "text-danger">delete image</a>
            <?php else: ?>
              <label for="image" class = "col-md-4 margin-auto">*IMAGE:</label>
              <input type="file" name="image" id="image" class=" col-md-8 form-control cursor-pointer">
            <?php endif; ?>

        </div>
      </div>
      <?php if (isset($_GET['add'])): ?>


      <div class="col-12" style = "padding-bottom:30px;">

          <div class="form group col-12">
            <div class="row">
              <label for="embed1" class = "col-md-4 margin-auto">*Enter google map embed code:</label>
              <input type="text" class = " col-md-8 form-control" name="embed1" id ="embed1" value="<?= $embed1;?>">
            </div>
          </div>
      </div>
      <?php endif; ?>


      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group ">
          <div class="row justify-space-around ">
            <a href="places.php" class = "btn btn-default col-5 btn-custom ">Cancel</a>
            <input type="submit"  class = "btn btn-success col-5 " value="<?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> PLACE">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
