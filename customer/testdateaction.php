<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation(); 
$requestid = $_POST['requestid'];
$text_date = $_POST["tdate"];
$details = $_POST["dep"];


// $query = "SELECT * FROM tbl_cust WHERE cust_id='$vehicleid'";
// $result = $obj->query($query);
 
// if ($result) {  
    
    $query = "UPDATE tbl_req SET test_date='$text_date', remark='$details',status='accepted'WHERE req_id='$requestid'";
    $update_result = $obj->query($query);

    if ($update_result) {
        echo "<script>alert('Text Date and Description updated successfully.')</script>";
        header("Location: ../customer/index.php");
        exit();
    } else {
        echo "<script>alert('Failed to update.')</script>";
      
        exit();
    }
// } else {
//     echo "<script>alert('cust with ID $vehicleid does not exist.')</script>";
    
//     exit();
// }
?>
