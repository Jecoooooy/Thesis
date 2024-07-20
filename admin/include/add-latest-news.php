<h4 class = "center "> <?=(isset($_GET['edit']))?'EDIT':'ADD ';?> LATEST NEWS </h4>
<div class="container-fluid col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12  white-color margin-auto">
  <form class = "pad" action="latest-news.php?<?=(isset($_GET['edit']))?'edit='.$edit_id:'add=1';?>" method="POST" enctype="multipart/form-data">
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
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group col-12">
          <div class="row center-image">
            <?php if($saved_image != ''):?>
              <div class="saved-image center-image">
                <img src="<?=$saved_image;?>" class = "img-fluid " alt = "saved image"alt="">
              </div>
              <a href="latest-news.php?delete_image=1&edit=<?=$edit_id;?> "class = "text-danger">delete image</a>
            <?php else: ?>
              <label for="image" class = "col-md-4 margin-auto">*IMAGE:</label>
              <input type="file" name="image" id="image" class=" col-md-8 form-control cursor-pointer">
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group ">
          <div class="row justify-space-around ">
            <a href="latest-news.php" class = "btn btn-default col-5 btn-custom ">Cancel</a>
            <input type="submit"  class = "btn btn-success col-5 " value="<?=(isset($_GET['edit']))?'EDIT':'ADD ';?> LATEST NEWS">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
