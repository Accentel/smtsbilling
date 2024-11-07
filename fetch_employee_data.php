<?php
include('dbconnection/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['empID'])) {
    $empID = $_POST['empID'];

    $query = "SELECT `Employee Name`, `Mobile No`, `ACCOUNT NUMBER`, `IFSC CODE` FROM emp_bill WHERE `Emp code` = '$empID'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $employeeData = array(
            'employee_name' => $row['Employee Name'],
            'employee_number' => $row['Mobile No'],
            'account_number' => $row['ACCOUNT NUMBER'],
            'ifsc_code' => $row['IFSC CODE']
        );

        header('Content-Type: application/json');
        echo json_encode($employeeData);
        exit;
    } else {
        echo json_encode(array('error' => 'No data found'));
        exit;
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
    exit;
}
?>
