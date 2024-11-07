<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
//if($_SESSION['user'])
//{
$name=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php';
//include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
        strong {
        color: red;
    }

    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            animation: fadeIn 1s ease-in-out;
        }

        .box {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            animation: slideInUp 1s ease-in-out;
        }

        .box-header {
            background-color: #5bc0de;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .box-title {
            margin: 0;
            font-size: 1.5em;
        }

        .box-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .form-group:hover {
            transform: scale(1.05);
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
        }

        input[type="date"],
        button {
            padding: 10px;
            font-size: 16px;
        }

        button {
            background-color: #5bc0de;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #31b0d5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(20px);
            }

            to {
                transform: translateY(0);
            }
        }

    </style>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="dashboard.php">Home</a>
                            </li>

                            <li>
                                <a href="date_excel.php">Bill Status Tracker</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                           Bill Status Report Excel Sheet

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title"> Bill Status Report Excel</h3>
								</div>
                               
                                <h2>Employee Data</h2>

<form method="post">
    <label for="empCode">Enter Employee Code:</label>
    <input type="text" id="empCode" name="empCode" required>
    <button type="submit" name="searchBtn">Search</button>
</form>

<?php
// Establish connection to your database
$servername = "localhost"; // Change this to your database server name
$username = "a16673ai_payamath"; // Change this to your database username
$password = "Payamath@2016"; // Change this to your database password
$dbname = "a16673ai_smtsbill"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$limit = 30; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Check if form is submitted
if (isset($_POST["searchBtn"])) {
    $empCode = $_POST["empCode"];

}

$searchCondition = $search ? "WHERE `Emp code` = '$search'" : "";
    $resultCountQuery = "SELECT COUNT(*) AS total FROM emp_bill $searchCondition";
    $resultCount = $conn->query($resultCountQuery);
    $rowCount = $resultCount->fetch_assoc()['total'];

    $totalPages = ceil($rowCount / $limit);

    $sql = "SELECT * FROM emp_bill $searchCondition LIMIT $start, $limit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display employee data in a table
        echo "<h2>Employee Details</h2>";
        echo "<form method='post'>";
        echo "<table border='1'>
            <tr>
                <th>Emp Code</th>
                <th>Employee Name</th>
                <th>Mobile No</th>
                <th>ACCOUNT HOLDER NAME</th>
                <th>ACCOUNT NUMBER</th>
                <th>Bank</th>
                <th>IFSC CODE</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><input type='text' name='emp_code' value='" . $row['Emp code'] . "' readonly></td>";
            echo "<td><input type='text' name='employee_name' value='" . $row['Employee Name'] . "'></td>";
            echo "<td><input type='text' name='mobile_no' value='" . $row['Mobile No'] . "'></td>";
            echo "<td><input type='text' name='account_holder' value='" . $row['ACCOUNT HOLDER NAME'] . "'></td>";
            echo "<td><input type='text' name='account_number' value='" . $row['ACCOUNT NUMBER'] . "'></td>";
            echo "<td><input type='text' name='bank' value='" . $row['Bank'] . "'></td>";
            echo "<td><input type='text' name='ifsc_code' value='" . $row['IFSC CODE'] . "'></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<button type='submit' name='updateBtn'>Update</button>";
        echo "</form>";
        echo "<div>";
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
        }
        echo "</div>";
    } else {
        echo "No results found for '$search'";
    }


// Check if update button is clicked
if (isset($_POST["updateBtn"])) {
    // Retrieve form data
    $empCode = $_POST["emp_code"];
    $employeeName = $_POST["employee_name"];
    $mobileNo = $_POST["mobile_no"];
    $accountHolder = $_POST["account_holder"];
    $accountNumber = $_POST["account_number"];
    $bank = $_POST["bank"];
    $ifscCode = $_POST["ifsc_code"];

    // SQL query to update employee data
    $updateQuery = "UPDATE emp_bill SET 
        `Employee Name`='$employeeName', 
        `Mobile No`='$mobileNo', 
        `ACCOUNT HOLDER NAME`='$accountHolder', 
        `ACCOUNT NUMBER`='$accountNumber', 
        `Bank`='$bank', 
        `IFSC CODE`='$ifscCode' 
        WHERE `Emp code`='$empCode'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {
                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                        });
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
<?php 



?>