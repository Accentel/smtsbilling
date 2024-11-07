<?php
session_start();
require 'vendor/autoload.php';

include 'dbconnection/connection.php';

// Define default values for image variables
$img1 = '';
$img2 = '';
$img3 = '';
$img4 = '';

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {

    $service_no = $_POST['service_no'];  //bill no           1 
    $po_no = $_POST['po_no'];            //Account no        2     
    $site_name = $_POST['site_name'];    //work Desc         3 
    $district = $_POST['district'];      //IFSC Code         4
    $indus_id = $_POST['indus_id'];      //Employee Name     5
    $req_ref = $_POST['req_ref'];        //Emp ID            6 
    $seeking_id = $_POST['seeking_id'];  //project           7 
    $state = $_POST['state'];            //Site Name         8
    $seeking_opt = $_POST['seeking_opt'];//site ID           9 
    $wcc_num = $_POST['wcc_num'];        //Appr raised by    10
    $wcc_rec_num = $_POST['wcc_rec_num'];//PO Value          11
    $total_amnt = $_POST['total_amnt'];  //Total amount      12 
    $type_work = $_POST['type_work'];    //District          13 
    $pcw = $_POST['pcw'];                //Remarks           14
    $mob = $_POST['mob'];                //Mobile Number     15
    $proj_name = $_POST['proj_name'];    //Project Name      16
    $net_amnt = $_POST['net_amnt'];      //Net Amount        17
    $bill_submit_date = $_POST['bill_submit_date'];//M Date  18      
    $pno = $_POST['pno'];                //Po No             19
    $ino = $_POST['ino'];                //Invoice No        20
    $inv = $_POST['inv'];                //Invoice value     21




    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $ses = isset($_SESSION['user']) ? $_SESSION['user'] : '';
    $t = mysqli_query($link, "SELECT * FROM employee WHERE user='$ses'") or die(mysqli_error($link));
    $tr = mysqli_fetch_array($t);
    $empemail = $tr['user'];    
    // Set the current date
    $date = date("Y-m-d");

    // debugging session 
    // echo "Fetched user ID : " . $empemail;


     // Image handling section with default values if not uploaded
     $destination = 'smtspic/'; // Set the destination folder
     $iname1 = isset($_FILES['img1']['name']) ? $_FILES['img1']['name'] : '';
     if ($iname1 != "") {
         $code = md5(rand());
         $iname1 = $code . $_FILES['img1']['name'];
         $tmp = $_FILES['img1']['tmp_name'];
         move_uploaded_file($tmp, $destination . $iname1);
     } else {
         $iname1 = $img1;
     }


     $iname2 = isset($_FILES['img2']['name']) ? $_FILES['img2']['name'] : '';
     if ($iname2 != "") {
         $code = md5(rand());
         $iname2 = $code . $_FILES['img2']['name'];
         $tmp = $_FILES['img2']['tmp_name'];
         move_uploaded_file($tmp, $destination . $iname2);
     } else {
         $iname2 = $img2;
     }


     $iname3 = isset($_FILES['img3']['name']) ? $_FILES['img3']['name'] : '';
     if ($iname3 != "") {
         $code = md5(rand());
         $iname3 = $code . $_FILES['img3']['name'];
         $tmp = $_FILES['img3']['tmp_name'];
         move_uploaded_file($tmp, $destination . $iname3);
     } else {
         $iname3 = $img3;
     }



     $iname4 = isset($_FILES['img4']['name']) ? $_FILES['img4']['name'] : '';
     if ($iname4 != "") {
         $code = md5(rand());
         $iname4 = $code . $_FILES['img4']['name'];
         $tmp = $_FILES['img4']['tmp_name'];
         move_uploaded_file($tmp, $destination . $iname4);
     } else {
         $iname4 = $img4;
     }

 

   
  // Check if the service_no is unique
  $stmt = $link->prepare("SELECT * FROM add_bill1 WHERE service_no = ?");
  $stmt->bind_param("s", $service_no);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      echo '<script type="text/javascript">alert("Error: Service number already exists. Please use a unique service number."); window.location.href = "bill1.php";</script>';
  } else {
      // Prepare the SQL statement with parameter placeholders for insertion
      $insertStmt = $link->prepare("INSERT INTO add_bill1 (date, service_no, po_no, site_name, district, indus_id, req_ref, seeking_id, state, seeking_opt, wcc_num, wcc_rec_num, total_amnt, user, type_work, pcw, bill_status, bill_submit_date, mob, proj_name, net_amnt, image_1, image_2, image_3, image_4, pno, ino, inv) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,? ,? ,?)");
                              
      // Check if the insertion statement is prepared successfully
      if (!$insertStmt) {
          die('Prepare failed: (' . $link->errno . ') ' . $link->error);
      }

      // Bind parameters for insertion
      $bill_status = 'Active'; // Assuming bill_status is set to 'Active' by default
    
         $insertStmt->bind_param("ssssssssssssssssssssssssssss", $date, $service_no, $po_no, $site_name, $district, $indus_id, $req_ref, $seeking_id, $state, $seeking_opt, $wcc_num, $wcc_rec_num, $total_amnt, $empemail, $type_work, $pcw, $bill_status, $bill_submit_date, $mob, $proj_name, $net_amnt, $iname1, $iname2, $iname3, $iname4, $pno, $ino, $inv);

      // Execute the insertion query
      if ($insertStmt->execute()) {
          echo '<script type="text/javascript">alert("New Bill created successfully"); window.location.href = "bill1.php";</script>';
      } else {
          echo '<script type="text/javascript">alert("Error: ' . $insertStmt->error . '"); window.location.href = "bill1.php";</script>';
      }

      $insertStmt->close();
  }

  $stmt->close();
  $link->close();
}


if (isset($_POST['update'])) {

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $service_no = $_POST['service_no'];
    $po_no = $_POST['po_no'];
    $site_name = $_POST['site_name'];
    $district = $_POST['district'];
    $indus_id = $_POST['indus_id'];
    $req_ref = $_POST['req_ref'];
    $seeking_id = $_POST['seeking_id'];
    $state = $_POST['state'];
    $seeking_opt = $_POST['seeking_opt'];
    $wcc_num = $_POST['wcc_num'];
    $wcc_rec_num = $_POST['wcc_rec_num'];
    $total_amnt = $_POST['total_amnt'];
    $type_work = $_POST['type_work'];
    $pcw = $_POST['pcw'];
    $mob = $_POST['mob'];
    $proj_name = $_POST['proj_name'];
    $net_amnt = $_POST['net_amnt'];
    $pno = $_POST['pno'];        
    $ino = $_POST['ino'];                
    $inv = $_POST['inv'];                

    // Check if the bill_status is 'Approved'
    $result = $link->query("SELECT bill_status FROM add_bill1 WHERE service_no = '$service_no'");
    $row = $result->fetch_assoc();
    $billStatus = $row['bill_status'];

    if ($billStatus === 'Approved' || $billStatus === 'Released') {
        echo '<script type="text/javascript">alert("Error: Bill has already been approved and cannot be updated."); window.location.href = "ebill_list.php";</script>';
    // } elseif ($billStatus === 'Rejected') {
    } elseif (strtoupper($billStatus) === 'REJECTED' || strtoupper($billStatus) === 'PENDING') {
        $ses = isset($_SESSION['user']) ? $_SESSION['user'] : '';
        $t = mysqli_query($link, "SELECT * FROM employee WHERE user='$ses'") or die(mysqli_error($link));
        $tr = mysqli_fetch_array($t);
        $empemail = $tr['user'];


        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $sql = "UPDATE add_bill1 SET po_no = '$po_no', site_name = '$site_name', district = '$district', indus_id = '$indus_id', req_ref = '$req_ref', seeking_id = '$seeking_id', state = '$state', seeking_opt = '$seeking_opt', wcc_num = '$wcc_num', wcc_rec_num = '$wcc_rec_num', total_amnt = '$total_amnt', user = '$empemail', type_work = '$type_work', pcw = '$pcw', mob = '$mob', proj_name = '$proj_name', net_amnt = '$net_amnt', pno = '$pno', ino = '$ino', inv = '$inv', bill_status = 'Active' WHERE service_no = '$service_no'";

        if ($link->query($sql) === true) {
            echo '<script type="text/javascript">alert("Bill updated successfully"); window.location.href = "ebill_list.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Error: ' . $sql . '<br>' . $link->error . '"); window.location.href = "ebill_list.php";</script>';
        }
    } else {
        $ses = isset($_SESSION['user']) ? $_SESSION['user'] : '';
        $t = mysqli_query($link, "SELECT * FROM employee WHERE user='$ses'") or die(mysqli_error($link));
        $tr = mysqli_fetch_array($t);
        $empemail = $tr['user'];

        ini_set('display_startup_errors', 1);
         error_reporting(E_ALL);

        $sql = "UPDATE add_bill1 SET po_no = '$po_no', site_name = '$site_name', district = '$district', indus_id = '$indus_id', req_ref = '$req_ref', seeking_id = '$seeking_id', state = '$state', seeking_opt = '$seeking_opt', wcc_num = '$wcc_num', wcc_rec_num = '$wcc_rec_num', total_amnt = '$total_amnt', user = '$empemail', type_work = '$type_work', pcw = '$pcw', mob = '$mob', proj_name = '$proj_name', net_amnt = '$net_amnt', pno = '$pno', ino = '$ino', inv = '$inv' WHERE service_no = '$service_no'";

        if ($link->query($sql) === true) {
            echo '<script type="text/javascript">alert("Bill updated successfully"); window.location.href = "ebill_list.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Error: ' . $sql . '<br>' . $link->error . '"); window.location.href = "ebill_list.php";</script>';
        }
    }
    $link->close();
}

if (isset($_POST['approve'])) {
    $service_no = $_POST['service_no']; // Assuming 'service_no' is still in the form
    $payment_doc_date = date("Y-m-d");
    $bill_status = $_POST['bill_status'];
    $pcw = $_POST['pcw'];
    $rem2 = $_POST['rem2'];
    $total_gst = $_POST['total_gst'];
    $ses = isset($_SESSION['user']) ? $_SESSION['user'] : '';
    $t = mysqli_query($link, "SELECT * FROM employee WHERE user='$ses'") or die(mysqli_error($link));
    $tr = mysqli_fetch_array($t);
    $empemail = $tr['user'];  

    // Update the data in the database
    $sql = "UPDATE add_bill1 SET payment_doc_date = '$payment_doc_date', bill_status = '$bill_status', pcw = '$pcw', rem2 = '$rem2', total_gst = '$total_gst', apuser = '$ses' WHERE service_no = '$service_no'";

    if ($link->query($sql) === true) {
        echo '<script type="text/javascript">alert("Bill updated successfully"); window.location.href = "apbill_list.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("Error: ' . $sql . '<br>' . $link->error . '"); window.location.href = "apbill_list.php";</script>';
    }
    $link->close();
}


if (isset($_POST['sup'])) {
    $service_no = $_POST['service_no']; // Assuming 'service_no' is still in the form
    $ackdt = date("Y-m-d");
    $bill_status = $_POST['bill_status'];
    $rem2 = $_POST['rem2'];
    // $total_gst = $_POST['total_gst'];
    $ses = isset($_SESSION['user']) ? $_SESSION['user'] : '';
    $t = mysqli_query($link, "SELECT * FROM employee WHERE user='$ses'") or die(mysqli_error($link));
    $tr = mysqli_fetch_array($t);
    $empemail = $tr['user'];  

    // Update the data in the database
    $sql = "UPDATE add_bill1 SET ackdt = '$ackdt', bill_status = '$bill_status', rem2 = '$rem2', ackno = '$ses' WHERE service_no = '$service_no'";

    if ($link->query($sql) === true) {
        echo '<script type="text/javascript">alert("Bill updated successfully"); window.location.href = "gabill_list.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("Error: ' . $sql . '<br>' . $link->error . '"); window.location.href = "gabill_list.php";</script>';
    }
    $link->close();
}



?>
