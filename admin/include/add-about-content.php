<div class="container-fluid col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 margin-auto">
  <h4 class = "center">ABOUT US</h4>
  <div class="text-center pad  ">
    <form class="" action="about.php?edit" enctype="multipart/form-data" method="post">
      <div class="row">
        <div class="form-group col-6">
          <label for="name1" class = "float-left">*NAME:</label>
          <input type="text" name="name1" id="name1" class=" form-control " value="<?=$name1;?>">
        </div>
        <div class="form-group col-6">
          <?php if($saved_image != ''):?>
            <div class="saved-image center-image">
              <img src="<?=$saved_image;?>" class = "img-fluid " alt = "saved image"alt="">
            </div>
            <a href="about.php?delete_image=1&edit "class = "text-danger">delete image</a>
          <?php else: ?>
            <label for="image" class = " float-left">*IMAGE:</label>
            <input type="file" name="image" id="image" class="form-control cursor-pointer">
          <?php endif; ?>
        </div>
        <div class="form-group col-12">
          <label for="message" class = "float-left">*MAYOR'S:</label>
          <textarea rows="10" class = " col-md-12 form-control" name="message" id ="message" ><?=$message;?></textarea>
        </div>
        <div class="form-group col-12">
          <label for="history" class = "float-left">*HISTORY:</label>
          <textarea rows="10" class = "col-md-12 form-control" name="history" id ="history"><?=$history;?></textarea>
        </div>
      </div>
      <div class="float-right">
        <a href="about.php" class = "btn btn-default  ">Cancel</a>
        <input type="submit" name="add_submit" value="SUBMIT" class = "btn btn-success">
      </div>
    </form>
  </div>
</div>
<div class="" style="height:100px;"></div>
