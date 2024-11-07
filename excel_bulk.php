<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill List</title>

<style>
    body {
        cursor: pointer; /* Change the cursor to pointer */
        margin: 0;
        /* overflow: hidden; */
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    .container {
        position: relative;
        z-index: 1;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: whitesmoke;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
        animation: shower 5s;
    }
    #digital-clock {
            font-size: 40px; /* Adjust the font size as needed */
            color: black;
            position: fixed;
            bottom: 80px; /* Adjust the vertical position */
            right:20px; /* Adjust the horizontal position */
        }
        .card {
    background-color: lightsteelblue;
    border: 1px solid #d2d6de;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 800px; /* Changed max-width to specify units */
    width: 120%; /* Adjust the width as needed */
    margin: auto;
    animation: fadeInAnimation ease 1s;
    animation-fill-mode: both;
    margin-top: 20px;
    opacity: 0;
    transform: translateY(-20px);
    animation-delay: 0.5s; /* Removed duplicated animation property */
    animation-iteration-count: 1;
}



        @keyframes fadeInBackground {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInAnimation {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }
        body {
            background-image: url('bill.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
</style>
</head>

<body>




    <div class="container">
    <div class="card">  
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start()
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
// require 'vendor/autoload.php';
// use PhpOffice\PhpSpreadsheet\IOFactory;
require_once __DIR__ . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
// session_start()
include 'dbconnection/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$name=$_SESSION['user'];

if (isset($_POST['submit'])) {
    $uploadFilePath = 'upload/' . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $spreadsheet = IOFactory::load($uploadFilePath);
    $worksheet = $spreadsheet->getActiveSheet();

    foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        $data = [];
        foreach ($cellIterator as $cell) {
            $data[] = $cell->getValue();
        }

        // Assuming the structure of the Excel file has columns corresponding to the table structure
        $service_no = $data[0] ?? '';
        $req_ref = $data[1] ?? '';
        $indus_id = $data[2] ?? '';
        $mob = $data[3] ?? '';
        $po_no = $data[4] ?? '';
        $district = $data[5] ?? '';
        $seeking_id = $data[6] ?? '';
        $proj_name = $data[7] ?? '';
        $seeking_opt = $data[8] ?? '';
        $state = $data[9] ?? '';
        $type_work = $data[10] ?? '';
        $site_name = $data[11] ?? '';
        $total_amnt = $data[12] ?? '';
        $wcc_num = $data[13] ?? '';
        $wcc_rec_num = $data[14] ?? '';
        $pcw  = $data[15] ?? '';
        $net_amnt  = $data[16] ?? '';
        $pno  = $data[17] ?? '';
        $ino  = $data[18] ?? '';
        $inv  = $data[19] ?? '';


        $ses = isset($_SESSION['user']) ? $_SESSION['user'] : '';
            $t = mysqli_query($link, "SELECT * FROM employee WHERE user='$ses'") or die(mysqli_error($link));
            $tr = mysqli_fetch_array($t);
            $empemail = $tr['user'];
        // Add the remaining column mappings here based on the Excel structure and table structure

        // Set the current date
        $currentDate = date("Y-m-d");

// Check if the record already exists in the database and the bill_status is Active, Rejected, or empty
$result = $link->query("SELECT * FROM add_bill1 WHERE service_no = '$service_no' AND (bill_status = 'Active' OR bill_status = 'Rejected' OR bill_status = 'Pending'  OR bill_status = '')");

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $billStatus = $data['bill_status'];

    // if (empty($billStatus) || strtoupper($billStatus) != 'APPROVED') {
        if (empty($billStatus) || strtoupper($billStatus) != 'APPROVED' || strtoupper($billStatus) != 'RELEASED') {
        $stmt = $link->prepare("UPDATE add_bill1 SET date = ?, req_ref = ?, indus_id = ?, po_no = ?, district = ?, seeking_id = ?, seeking_opt = ?, state = ?, site_name = ?, total_amnt = ?, wcc_num = ?, wcc_rec_num = ?, pcw = ?, type_work = ?, user = ?, net_amnt = ?, pno = ?, ino = ?, inv = ? WHERE service_no = ?");
        $stmt->bind_param("ssssssssssssssssssss", $currentDate, $req_ref, $indus_id, $po_no, $district, $seeking_id, $seeking_opt, $state, $site_name, $total_amnt, $wcc_num, $wcc_rec_num, $pcw, $type_work, $empemail, $net_amnt, $pno, $ino, $inv, $service_no);

        if ($stmt->execute()) {
            echo "<p style='color: black;'>Bill updated successfully for Bill number: $service_no</p>";
        } else {
            echo "<p style='color: red;'>Error updating record: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        // If the record exists but the bill is already approved, notify the user
        echo "<p style='color: orange;'>Bill is already Approved for : $service_no</p>";
    }
} else {
    // If the record does not exist, insert a new record into the database with bill_status as Active
    $stmt = $link->prepare("INSERT INTO add_bill1 (date, service_no, req_ref, indus_id, po_no, district, seeking_id, seeking_opt, state, site_name, total_amnt, wcc_num, wcc_rec_num, pcw, type_work, user, net_amnt, pno, ino, inv, bill_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Active')");
    $stmt->bind_param("ssssssssssssssssssss", $currentDate, $service_no, $req_ref, $indus_id, $po_no, $district, $seeking_id, $seeking_opt, $state, $site_name, $total_amnt, $wcc_num, $wcc_rec_num, $pcw, $type_work, $empemail, $net_amnt, $pno, $ino, $inv);

    if ($stmt->execute()) {
        echo "<p style='color: purple;'>New Bill Raised successfully for Bill number: $service_no</p>";
    } else {
        echo "<p style='color: red;'>Bill is already approved for Bill number: " . $stmt->error . "</p>";
    }
    $stmt->close();

    
    
}

    
   }

   $link->close();
}
 else {
echo "Session not found.";
}
?>
<a href="ebill_list.php" class="button">BILL LIST</a>


    </div>
    <div id="digital-clock"></div>

<!-- No particle animation script here -->
<script>
    // Digital Clock
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Add leading zeros if needed
        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        var timeString = hours + ":" + minutes + ":" + seconds;
        document.getElementById("digital-clock").textContent = timeString;

        // Update every 1 second
        setTimeout(updateClock, 1000);
    }

    // Initial call to start the clock
    updateClock();
</script>
</div>
</body>

</html>





