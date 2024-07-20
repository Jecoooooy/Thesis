<footer>
  <div class="container-fluid add">
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="row">
          <a href="#"><img src="images/gea.png" class = "logo" alt="gea.png"><h3>GEN. E. AGUINALDO</h3></a>
        </div>

      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 jec10">
          <p>The Municipal Government and the people of Gen. E. Aguinaldo welcome you to our peaceful town, the home of warm and friendly Bailenos.
          As you take the virtual tour around our 14 barangays, let this site help you with everything you need to know about our town.
         It is our profound pleasure to serve you and we look forward to having you as our guest.</p>
         <p style="font-weight: bold;margin:0;">HON. NELIA BENCITO ANGELES</p>
         <p style="font-weight: bold;margin:0;">Municipal Mayor</p>
        </div>
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
        <?php $brgy  = "SELECT * FROM place_location ORDER BY PLOC_BARANGAY ASC";
        $result = $db->query($brgy); ?>
        <div class="row">
        <?php while($brgys = mysqli_fetch_assoc($result)): ?>

            <div class="col-md-6 col-sm-12">
              <a href="#"> <?php echo $brgys['PLOC_BARANGAY']; ?></a>
            </div>


        <?php endwhile; ?>
        </div>
      </div>


    </div>
  </div>
  <div class="container-fluid footer-final text-center">
    <p>UNDERGRADUATE THESIS PROJECT OF JERICO B. BENCITO AND REYNALDO P. BICHAYDA Copyright <span id="CURRENT_YEAR"></span> All Rights Reserved.</p>
  </div>

</footer>
<a href="#top"><i class="fa fa-arrow-up top-btn"></i></a>
<script>
var d = new Date();
document.getElementById("CURRENT_YEAR").innerHTML = d.getFullYear();
</script>
