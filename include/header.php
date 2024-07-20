<?php
$sql = "SELECT * FROM Menu";
$pquery = $db->query($sql);
?>
<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="images/gea.png" class =  alt="gea.png"> GEN. E. AGUINALDO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">☰</span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">

          <li class="nav-item active"><a href="index.php" class="nav-link active">Home</a></li>
          <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
          <?php $parent_id = $parent['P_ID']; ?>
          <div class="bar"></div>
          <li class="nav-item active"><a href="<?php echo $parent['P_Name']; ?>.php"onclick="pagename(<?= $parent['P_ID'];?>)" class="nav-link"><?php echo $parent['P_Name']; ?></a></li>


        <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
