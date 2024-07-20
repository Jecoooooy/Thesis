<?php

  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
$output = '';
if(isset($_POST["query"]))
{
 $search =mysqli_real_escape_string($db, $_POST["query"]);
 $query = "
 SELECT * FROM ordinance
 WHERE author LIKE '%".$search."%'
 OR title LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM ordinance ORDER BY id";
}
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <div class="col-12 jecoy2">
    <button type="button" class = "btn modal-button ordi col-12"onclick="modalordinance('.$row['id'].')">
    <div class = "row jecoy3">
      <div class = "col-lg-1 col-md-2 col-sm-3"><img src="images/folder.png" class="img-fluid" alt="xample1.jpg"></div>
      <div class="col-lg-7 col-md-6 col-sm-5 jecoy marg">
        <p>'.$row['title'].'</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 marg">
        <p> '.$row['author'].'</p>
      </div>

      </div>
    </button>
  </div>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
