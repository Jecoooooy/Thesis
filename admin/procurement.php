<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/thesis/core/init.php';
  if (!is_logged_in()) {
    login_error_redirect();
  }
  if ((!has_permission('procurement')) && (!has_permission('admin')))  {
    permission_error_redirect('index.php');
  }
  include 'include/head.php';
  $dbpath = '';

  //add product
  if (isset($_GET['delete'])) {
    $delete_id = sanitize($_GET['delete']);
    $db->query("DELETE FROM procurement WHERE PROC_ID = '$delete_id'");
    header('Location: procurement.php');
  }
  if (isset($_GET['add']) || isset($_GET['edit'])) {
// =========================================================================
function numberTowords($budget)
{
$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array(
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY",
4 => "FORTY",
5 => "FIFTY",
6 => "SIXTY",
7 => "SEVENTY",
8 => "EIGHTY",
9 => "NINETY"
);
$hundreds = array(
"HUNDRED",
"THOUSAND",
"MILLION",
"BILLION",
"TRILLION",
"QUARDRILLION"
); /*limit t quadrillion */
$budget = number_format($budget,2,".",",");
$num_arr = explode(".",$budget);
$wholenum = $num_arr[0];
$decnum = $num_arr[1];
$whole_arr = array_reverse(explode(",",$wholenum));
krsort($whole_arr,1);
$rettxt = "";
foreach($whole_arr as $key => $i){

while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){
/* echo "getting:".$i; */
$rettxt .= $ones[$i];
}elseif($i < 100){
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
}else{
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
}
if($key > 0){
$rettxt .= " ".$hundreds[$key]." ";
}
}
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}
extract($_POST);
if(isset($convert))
{
echo "<p align='center' style='color:blue'>".numberTowords("$budget")."</p>";
}


// ===========================================================================
    $procurementQuery = $db->query("SELECT * FROM procurement");
    $codeQuery = $db->query("SELECT * FROM project_reference ORDER BY PROJ_CODE ASC");
    $categoryQuery = $db->query("SELECT * FROM categories ORDER BY C_NAME ASC");
    $officeQuery = $db->query("SELECT * FROM office ORDER BY O_NAME ASC");
    $methodQuery = $db->query("SELECT * FROM method ORDER BY M_NAME ASC");
    $statusQuery = $db->query("SELECT * FROM stat ORDER BY STAT_NAME ASC");
    $code1 = ((isset($_POST['code']) && $_POST['code'] != '')?sanitize($_POST['code']):'');
    $category1 = ((isset($_POST['category']) && $_POST['category'] != '')?sanitize($_POST['category']):'');
    $date1 = ((isset($_POST['date']) && $_POST['date'] != '')?sanitize($_POST['date']):'');
    $date2 = ((isset($_POST['date2']) && $_POST['date2'] != '')?sanitize($_POST['date2']):'');
    $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $budget = ((isset($_POST['budget']) && $_POST['budget'] != '')?sanitize($_POST['budget']):'');

    $office1 = ((isset($_POST['office']) && $_POST['office'] != '')?sanitize($_POST['office']):'');
    $method1 = ((isset($_POST['method']) && $_POST['method'] != '')?sanitize($_POST['method']):'');
    $status1 = 2;


    //edit
    if(isset($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $procureResult = $db->query("SELECT * FROM procurement WHERE PROC_ID = '$edit_id'");
      $procure = mysqli_fetch_assoc($procureResult);
      $code1 = ((isset($_POST['code']) && $_POST['code'] != '')?sanitize($_POST['code']):$procure['PROJ_ID']);
      $category1 = ((isset($_POST['category']) && $_POST['category'] != '')?sanitize($_POST['category']):$procure['C_ID']);
      $date1 = ((isset($_POST['date']) && $_POST['date'] != '')?sanitize($_POST['date']):$procure['PROC_DATE']);
      $date2 = ((isset($_POST['date2']) && $_POST['date2'] != '')?sanitize($_POST['date2']):$procure['PROC_DATE_DEAD']);
      $title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$procure['PROC_TITLE']);
      $budget = ((isset($_POST['budget']) && $_POST['budget'] != '')?sanitize($_POST['budget']):$procure['PROC_BUDGET']);

      $office1 = ((isset($_POST['office']) && $_POST['office'] != '')?sanitize($_POST['office']):$procure['O_ID']);
      $method1 = ((isset($_POST['method']) && $_POST['method'] != '')?sanitize($_POST['method']):$procure['M_ID']);
      $status1 = ((isset($_POST['status']) && $_POST['status'] != '')?sanitize($_POST['status']):$procure['STAT_ID']);
    }
    if($_POST){
      $errors = array();
      $required = array('code','category','date','date2','title','budget','office','method');
      foreach($required as $field) {
        if($_POST[$field]==''){
          $errors[] = 'All Field with an Asterisk are required.';
          break;
        }
      }

      if(!empty($errors)){
        echo display_errors($errors);
      }
      else{
        $word = numberTowords("$budget");
        // echo " , ",$code1, ",",$category1, " ,", $title," , ", $budget," ,",$word,",",$date," , ",$office1," ,",$method1,"  , ",$status1;
        $insertsql = "INSERT	INTO procurement (PROJ_ID,C_ID,PROC_TITLE,PROC_BUDGET,PROC_WORD,PROC_DATE,PROC_DATE_DEAD,O_ID,M_ID,STAT_ID)
                      VALUES	($code1,$category1,'$title',$budget,'$word','$date1','$date2',$office1,$method1,$status1)";
        if(isset($_GET['edit'])) {
          // echo " , ",$code1, ",",$category1, " ,", $title," , ", $budget," ,",$word,",",$date1," , ",$office1," ,",$method1,"  , ",$status1;
          $insertsql = "UPDATE procurement SET PROJ_ID = $code1, C_ID = $category1,
          PROC_TITLE = '$title', PROC_BUDGET = $budget, PROC_WORD = '$word', PROC_DATE = '$date1',PROC_DATE_DEAD = '$date2', O_ID = $office1,
          M_ID = $method1, STAT_ID =$status1 WHERE PROC_ID = '$edit_id'";
        }
        $db->query($insertsql);
        header('Location: procurement.php');
      }
    }



?>
<div class="admin-wrapper ">
<!-- this code is navigation  -->
  <?php include 'include/navigation.php' ?>
<!-- this code is content  -->
  <?php include 'include/add-procurement-content.php' ?>
<!-- end of content -->
  <?php include 'include/contents/space.php'; ?>
</div>
</div>
<script>
  $(document).ready(function(){
    $('#sidebarCollapse').on('click',function(){
      $('#sidebar').toggleClass('active');
    });
  });
</script>
<?php
}
//main content for admin
  else{
    $sql  = "SELECT * FROM vprocurement";
    $result = $db->query($sql);
    ?>
    <?php
    //for status
    $db->query("UPDATE procurement SET STAT_ID = 3 WHERE STAT_ID = 2 AND PROC_DATE_DEAD < CURRENT_TIMESTAMP;");

    if (isset($_GET['stat'])) {
      $id = (int)$_GET['id'];
      $status = (int)$_GET['stat'];
      $statussql = "UPDATE procurement SET STAT_ID = 1 WHERE PROC_ID ='$id'";
      $db->query($statussql);
      header('Location: procurement.php');
    }
    else{
    }
    ?>
    <div class="admin-wrapper ">
      <!-- this code is navigation  -->
      <?php include 'include/navigation.php' ?>
      <!-- this code is content  -->
      <?php include 'include/procurement-content.php' ?>
      <!-- end of content -->
      <?php include 'include/contents/space.php'; ?>
    </div>
  </div>
<script>
  $(document).ready(function(){
    $('#sidebarCollapse').on('click',function(){
      $('#sidebar').toggleClass('active');
    });
  });
</script>
<?php
  }
  include 'include/footer.php';
  include 'include/script.php';
?>
