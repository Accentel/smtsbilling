<!DOCTYPE html>
<html>
<head>
    <title>Employee Data</title>
</head>
<body>
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

    // Check if form is submitted
    if (isset($_POST["searchBtn"])) {
        $empCode = $_POST["empCode"];

        // SQL query to search for employee by empCode
        $sql = "SELECT * FROM emp_bill WHERE `Emp code` = '$empCode'";
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
        } else {
            echo "No results found for '$empCode'";
        }
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
</body>
</html>
