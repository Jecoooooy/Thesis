<?php

  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
$output = '';
if(isset($_POST["query"]))
{
 $search =mysqli_real_escape_string($db, $_POST["query"]);
 $query = "
 SELECT * FROM vprocurement
   WHERE PROC_TITLE LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM vprocurement ORDER BY PROC_ID";
}
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result)){
    $output .=  '<button type="button" class = "btn modal-button procure design des"onclick="modalprocurement('.$row['PROC_ID'].')" >
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
            <p class = "center bold">'.$row['PROJ_CODE'].' '.$row['PROC_ID'].'-'.$row['C_NAME'].'</p>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-6 top-procure1 text-custom">
            <p class = " bold">'.$row['PROC_TITLE'].'</p>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 ">
              <p class = "center bold">'.$row['STAT_NAME'].'</p>
          </div>
        </div>
        </button>';
  }
   echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
