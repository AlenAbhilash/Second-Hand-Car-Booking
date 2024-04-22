<?php
include 'excel_controller.php';

$clinic = new DBController(); 
$productResult = $clinic->runQuery("SELECT v.*, c.comp_name, m.model_name, f.fuel_name, b.bod_name, d.dis_name
    FROM tbl_vehicle v
    INNER JOIN tbl_companyreg c ON v.comp_id = c.comp_id
    INNER JOIN tbl_model m ON v.model_id = m.model_id
    INNER JOIN tbl_fuel f ON v.fuel_id = f.fuel_id
    INNER JOIN tbl_body b ON v.bod_id = b.bod_id
    INNER JOIN tbl_dis d ON v.dis_id = d.dis_id");

$filename = "Export_vehicleexcel.xls"; 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

$isPrintHeader = false;

if (!empty($productResult)) {
    foreach ($productResult as $row) {
        if (!$isPrintHeader) {
            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;
        }

        // Format date columns in the desired Excel format (MM/DD/YYYY)
        $row['man_date'] = date('m/d/Y', strtotime($row['man_date']));
        $row['post_date'] = date('m/d/Y', strtotime($row['post_date']));

        echo implode("\t", array_values($row)) . "\n";
    }
}
exit();
?>
