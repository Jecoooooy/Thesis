<h4 class = "center "> <?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> ORDINANCE</h4>
<div class="container-fluid col-xl-8 col-lg-8 col-md-10 col-sm-12 col-12  white-color margin-auto">
  <form class = "pad" role="form" action="ordinance.php?<?=(isset($_GET['edit']))?'edit='.$edit_id:'add=1';?>" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class=" col-12">
        <div class="form-group col-12">
          <div class="row">
            <label for="author" class = "col-md-4 margin-auto">*AUTHOR:</label>
            <input type="text" class = " col-md-8 form-control" name="author" id ="author" value="<?= $author;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <label for="title" class = "col-md-4 margin-auto">*TITLE:</label>
            <input type="text" class = " col-md-8 form-control" name="title" id ="title" value="<?= $title;?>">
          </div>
        </div>
        <div class="form-group col-12">
          <div class="row">
            <?php if($pdf_file != ''):?>
              <div class="saved-image col-12">
                <a href="ordinance.php?delete_pdf=1&edit=<?=$edit_id;?> "class = "text-danger">delete file</a>
                <embed src="<?php echo $pdf_file; ?>" type="application/pdf" width="100%" height="450px">
            </iframe>
              </div>

            <?php else: ?>
              <label for="title" class = "col-md-4 margin-auto">*PDF File:</label>
              <input type="file"class=" form-control col-md-8" name="pdf_file" id="pdf_file" accept="application/pdf" value = "<?= $pdf_file;?>"/>
            <?php endif; ?>

          </div>
        </div>
      </div>


      <div class="col-12 pull-right">
        <div class="form-group ">
          <div class="row justify-space-around ">
            <a href="ordinance.php" class = "btn btn-default col-5 btn-custom ">Cancel</a>
            <input type="submit"  id="send"class = "btn btn-success col-5 " value="<?=(isset($_GET['edit']))?'EDIT':'ADD A NEW';?> ORDINANCE">
          </div>
        </div>
      </div>


    </div>
  </form>
</div>
