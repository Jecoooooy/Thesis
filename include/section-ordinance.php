<?php
$sql = "SELECT * FROM ordinance ORDER BY author";
$ordi = $db->query($sql);
?>
<section id="latest-news">
  <div class="container">
    <div class="form-group">
     <div class="input-group">
      <input type="text" name="search_text" id="search_text2" placeholder="Search" class="form-control" />
     </div>
    </div>

    <div class="row">
      <div class="col-12 jecoy2">

        <div class = "row jecoy3">
          <div class = "col-lg-1 col-md-2 col-sm-3"></div>
          <div class="col-lg-7 col-md-6 col-sm-5 jecoy marg">
            <h6>TITLE</h6>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 marg">
            <h6 >AUTHOR</h6>
          </div>

          </div>

      </div>
    </div>
    <div class="row"id="result2">
    </div>

  </div>
</section>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"/thesis/search2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result2').html(data);
   }
  });
 }
 $('#search_text2').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
