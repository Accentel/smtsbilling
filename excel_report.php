<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$link = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_smtsbill") or die("unable to connect to the database");
session_start();

$name = $_SESSION['user'];

if (isset($_POST['filter'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $billStatus = $_POST['bill_status']; // Assuming you've added a select dropdown named 'bill_status' in your form
}

// Use a switch or if-else to handle different cases based on $billStatus
if ($billStatus === 'Active' || $billStatus === 'Rejected' || $billStatus === 'Approved' || $billStatus === 'Released' || $billStatus === 'Pending') {
    $sql = "SELECT * FROM add_bill1 WHERE date BETWEEN '$fromdate' AND '$todate' AND bill_status = '$billStatus' ORDER BY service_no DESC";
} else {
    // If 'All' is selected or no specific status is selected, fetch all data
    $sql = "SELECT * FROM add_bill1 WHERE date BETWEEN '$fromdate' AND '$todate' ORDER BY service_no DESC";
}

// Rest of your code remains the same for fetching data and exporting to Excel


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// ... rest of your code to fetch data and populate the Excel file remains the same
$sheet->setCellValue('A1', 'Service No');
$sheet->setCellValue('B1', 'Employee ID');
$sheet->setCellValue('C1', 'Employee Name');
$sheet->setCellValue('D1', 'Mobile Number');
$sheet->setCellValue('E1', 'Bank A/C number');
$sheet->setCellValue('F1', 'IFSC Code');
$sheet->setCellValue('G1', 'Date');
$sheet->setCellValue('H1', 'Project');
$sheet->setCellValue('I1', 'Project Name');
$sheet->setCellValue('J1', 'Site ID');
$sheet->setCellValue('K1', 'Site Name');
$sheet->setCellValue('L1', 'District Name');
$sheet->setCellValue('M1', 'Work Description');
$sheet->setCellValue('N1', 'Mail Date');
$sheet->setCellValue('O1', 'Approval Date');
$sheet->setCellValue('P1', 'Requested Amount');
$sheet->setCellValue('Q1', 'Appoval raised by');
$sheet->setCellValue('R1', 'PO Value');
$sheet->setCellValue('S1', 'Amount Approved');
$sheet->setCellValue('T1', 'Approval 1');
$sheet->setCellValue('U1', 'Approval 2');
$sheet->setCellValue('V1', 'Payment');
$sheet->setCellValue('W1', 'Released Date');
$sheet->setCellValue('X1', 'Remark 1');
$sheet->setCellValue('Y1', 'Po Number');
$sheet->setCellValue('Z1', 'Invoice Number');
$sheet->setCellValue('AA1', 'Invoive Value');
$sheet->setCellValue('AB1', 'Remarks 2');
$sheet->setCellValue('AC1', 'Net Amount');
$sheet->setCellValue('AD1', 'Net Profit');

error_reporting(E_ALL);
ini_set('display_errors', 1);



$sheet->getColumnDimension('A')->setWidth(15);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('K')->setWidth(15);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(15);
$sheet->getColumnDimension('N')->setWidth(15);
$sheet->getColumnDimension('O')->setWidth(15);
$sheet->getColumnDimension('P')->setWidth(15);
$sheet->getColumnDimension('Q')->setWidth(15);
$sheet->getColumnDimension('R')->setWidth(15);
$sheet->getColumnDimension('R')->setWidth(15);
$sheet->getColumnDimension('T')->setWidth(15);
$sheet->getColumnDimension('U')->setWidth(15);
$sheet->getColumnDimension('V')->setWidth(15);
$sheet->getColumnDimension('W')->setWidth(15);
$sheet->getColumnDimension('X')->setWidth(15);
$sheet->getColumnDimension('Y')->setWidth(15);
$sheet->getColumnDimension('Z')->setWidth(15);
$sheet->getColumnDimension('AA')->setWidth(15);
$sheet->getColumnDimension('AB')->setWidth(15);
$sheet->getColumnDimension('AC')->setWidth(15);
$sheet->getColumnDimension('AD')->setWidth(15);
// ... add more columns and their widths as needed

// Set header row styles
$headerStyle = [
    'font' => [
        'bold' => true,
        'color' => ['rgb' => 'FFFFFF'], // White text color
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => ['rgb' => '87CEEB'], // Sky blue cell color
    ],
];

$sheet->getStyle('A1:AD1')->applyFromArray($headerStyle); // Apply style to header


$result = mysqli_query($link, $sql) or die(mysqli_error($link));

$rowCount = 2;

while ($row = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $rowCount, $row['service_no']);
    $sheet->setCellValue('B' . $rowCount, $row['req_ref']);
    $sheet->setCellValue('C' . $rowCount, $row['indus_id']);
    $sheet->setCellValue('D' . $rowCount, $row['mob']);
    $sheet->setCellValue('E' . $rowCount, $row['po_no']);
    $sheet->setCellValue('F' . $rowCount, $row['district']);
    $sheet->setCellValue('G' . $rowCount, $row['date']);
    $sheet->setCellValue('H' . $rowCount, $row['seeking_id']);
    $sheet->setCellValue('I' . $rowCount, $row['proj_name']);
    $sheet->setCellValue('J' . $rowCount, $row['seeking_opt']);
    $sheet->setCellValue('K' . $rowCount, $row['state']);
    $sheet->setCellValue('L' . $rowCount, $row['type_work']);
    $sheet->setCellValue('M' . $rowCount, $row['site_name']);
    $sheet->setCellValue('N' . $rowCount, $row['bill_submit_date']);
    $sheet->setCellValue('O' . $rowCount, $row['payment_doc_date']);
    $sheet->setCellValue('P' . $rowCount, $row['total_amnt']);
    $sheet->setCellValue('Q' . $rowCount, $row['wcc_num']);
    $sheet->setCellValue('R' . $rowCount, $row['wcc_rec_num']);
    $sheet->setCellValue('S' . $rowCount, $row['total_gst']);
    $sheet->setCellValue('T' . $rowCount, $row['apuser']);
    $sheet->setCellValue('U' . $rowCount, $row['ackno']);
    $sheet->setCellValue('V' . $rowCount, $row['total_gst']);
    $sheet->setCellValue('W' . $rowCount, $row['ackdt']);
    $sheet->setCellValue('X' . $rowCount, $row['pcw']);
    $sheet->setCellValue('Y' . $rowCount, $row['pno']);
    $sheet->setCellValue('Z' . $rowCount, $row['ino']);
    $sheet->setCellValue('AA' . $rowCount, $row['inv']);
    $sheet->setCellValue('AB' . $rowCount, $row['rem2']);
    $sheet->setCellValue('AC' . $rowCount, $row['net_amnt']);
    $net_amnt = floatval($row['net_amnt']);
    $total_gst = floatval($row['total_gst']);
    $ad_value = $net_amnt - $total_gst;

    // Set the calculated value in column AD
    $sheet->setCellValue('AD' . $rowCount, $ad_value);
    $rowCount++;
}
// Generate the Excel file
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Bulk Bill.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
