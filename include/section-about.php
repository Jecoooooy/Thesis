<section id= "About">
  <div class="container">
    <?php
    $asd = 1;
    $About = $db->query("SELECT * FROM about WHERE id = '$asd'");

     ?>
     <div class="clearfix clearfix-pad">
     </div>
     <div class="container">

       <div class="row">

         <?php while($about1 = mysqli_fetch_assoc($About)): ?>
           <div class="col-md-4 col-sm-12 jec20 img-thumbnail">
             <div class="row">
               <img src="<?= $about1['mayor_image'] ?>" class = "img-fluid" alt="">
               <h4 class="bold jec14">Hon. <?= $about1['mayor'] ?></h4>
             </div>
           </div>
         <div class=" col-md-8 col-sm-12">
           <div class="row">
             <div class="col-12">

               <h4 class = "center bold jec13">MESSAGE</h4>
               <p class="jec12"> <?= nl2br($about1['mayor_message'],false); ?></p>
             </div>

           </div>

         </div>

         <div class=" col-12">
           <h2 class="center bold jec13">HISTORY</h2>
           <p class="history jec12"> <?= nl2br($about1['history'],false); ?></p>
         </div>
         <?php endwhile; ?>
       </div>

  </div>
</div>

</section>
