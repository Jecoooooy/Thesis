<?php

  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
$output = '';
if(isset($_POST["query"]))
{
 $search =mysqli_real_escape_string($db, $_POST["query"]);
 $query = "
 SELECT * FROM service
 WHERE S_NAME LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM service ORDER BY S_ID";
}
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <button type="button" class = "btn modal-button procure design des"onclick="modalservice('.$row['S_ID'].')" >
  <div class="row">
    <div class="col-12 ">
      <p class = "center bold jecjec1">'.$row['S_NAME'].'</p>
    </div>
  </div>
</button>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
