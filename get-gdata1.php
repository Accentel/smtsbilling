<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];

 $sql="SELECT *  FROM grefferences WHERE req_ref = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 // echo ":" . $row['SUPPL_NAME'];
  //echo ":" . $row['state'];
  
   //echo ":" . $row['city'];
   echo ":" . $row['site_name'];
   echo ":" . $row['indus_id'];
   echo ":" . $row['seeking_opt'];
   echo ":" . $row['po_num'];
   echo ":" .trim($row['comp_date']);
  //$d1= date("Y-m-d", strtotime($d));
	  //echo ":" . $d1;
  //echo "</tr>";
  }

?>     