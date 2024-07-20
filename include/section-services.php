
<section id = "procurement">
  <div class="container">
    <div class="row justify-space-between">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
       <div class="form-group">
        <div class="input-group">
         <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
        </div>
       </div>
       </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 top-procure cxz ">
            <p class = "center bold">SERVICE NAME</p>
      </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 sidebar">
            <button class="category bg-black"onclick="openYear(0)" id="defaultOpen"> <h4>VIEW ALL SERVICES</h4></button>
            <?php $office  = "SELECT * FROM office";
            $result_office = $db->query($office);
            ?>

            <?php while($office1 = mysqli_fetch_assoc($result_office)): ?>
            <button class="category design" onclick="openYear('<?php echo $office1['O_ID']; ?>')" ><h5><?php echo $office1['O_NAME']; ?></h5></button>

            <?php endwhile; ?>
        </div>
        <?php $service  = "SELECT * FROM service";
        $result_service = $db->query($service);
        ?>
        <div id="0" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 year1 no_pad top-procure">
          <div id="result"></div>
        </div>


        <?php while($serviceid = mysqli_fetch_assoc($result_service)): ?>
        <div id="<?php echo $serviceid['O_ID']; ?>" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 year1 no_pad top-procure">
          <?php
          $oid = $serviceid['O_ID'];
           $service_query  = "SELECT * FROM service WHERE O_ID = '$oid' ORDER BY S_ID ASC";
          $result_procure_query = $db->query($service_query);?>


            <?php while($servicefinal = mysqli_fetch_assoc($result_procure_query)): ?>
            <button type="button" class = "btn modal-button procure design des"onclick="modalservice(<?= $servicefinal['S_ID'];?>)" >
            <div class="row">
              <div class="col-12 ">
                <p class = "center bold jecjec1"><?php echo $servicefinal['S_NAME'];  ?></p>
              </div>
            </div>
          </button>
            <?php endwhile; ?>



        </div>

        <?php endwhile; ?>
        </div>
    </div>
  </div>
</section>
<script>
function openYear(yrs) {
  var i;
  var x = document.getElementsByClassName("year1");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(yrs).style.display = "block";
}
</script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"/thesis/search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
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
