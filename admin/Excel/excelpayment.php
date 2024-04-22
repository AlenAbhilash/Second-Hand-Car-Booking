<?php
include 'excel_controller.php';

$clinic = new DBController(); 
$productResult = $clinic->runQuery("SELECT R.pay_id, C.cust_name, T.ve_name, x.status, R.pay_status, R.pay_date, R.pay_amount, (R.pay_amount * 0.05) AS admin_amount
    FROM tbl_payment R
    INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
    INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
    INNER JOIN tbl_req x ON R.req_id = x.req_id");

$filename = "Export_payment_report.xls"; // Change the filename to match your preference

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

$isPrintHeader = false;

if (!empty($productResult)) {
    foreach ($productResult as $row) {
        if (!$isPrintHeader) {
            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;
        }

        // Format date column in the desired Excel format (MM/DD/YYYY)
        $row['pay_date'] = date('m/d/Y', strtotime($row['pay_date']));

        echo implode("\t", array_values($row)) . "\n";
    }
}
exit();
?>
