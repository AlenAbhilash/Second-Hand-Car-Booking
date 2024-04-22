 
<?php    
include 'excel_controller.php';
$clinic = new DBController();
$productResult = $clinic->runQuery("select * from tbl_cust f inner join tbl_dis d on f.dis_id=d.dis_id inner join tbl_loc l on f.loc_id=l.loc_id");
    $filename = "Export_customerexcel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            } 
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>



 
  
      
