<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];

 $sql="SELECT *  FROM emp_bill WHERE emp_code = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 // echo ":" . $row['SUPPL_NAME'];
  //echo ":" . $row['state'];
  
   //echo ":" . $row['city'];
   echo ":" . $row['Employee Name'];
   echo ":" . $row['Mobile No'];
      echo ":" . $row['ACCOUNT NUMBER'];
	  
      echo ":" . $row['IFSC CODE'];
   echo ":" . $row['IFSC CODE'];
   echo ":" . $row['IFSC CODE'];
  
//     echo ":" . $row['superwisor'];
// 	 echo ":" . $row['coordinator'];
  
//   echo ":" .trim($row['afm']);
//    echo ":" . $row['company_name'];
  //$d1= date("Y-m-d", strtotime($d));
	  //echo ":" . $d1;
  //echo "</tr>";
  }

?>     