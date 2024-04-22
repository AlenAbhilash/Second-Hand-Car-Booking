<?php
session_start();
include_once("../dboperation.php"); 
$obj = new dboperation(); 
$dep = $_POST["special_request"]; 
$vehid = $_POST["vehicleid"]; 
$customerid = $_SESSION['customerid'];
$reqdate = date('Y-m-d'); // Changed 'y/m/d' to 'Y-m-d'
 
$query = "select * from tbl_req where des='$dep'";
$result = $obj->query($query);
$row = mysqli_num_rows($result);  

if ($row == 0) {         
    // Added default values for 'remark' and 'status' fields 
    $query = "insert into tbl_req (cust_id, req_date, des, remark, test_date, status, vehicle_id) values ('$customerid', '$reqdate', '$dep', '', '', 'requested', '$vehid')";
    $result = $obj->query($query);

    if ($result == 1) {
        header("Location: ../customer/index.php"); // Corrected the path
        exit(); // Exit to prevent further execution
    } else {
        echo "<script>alert('Failed!')</script>";
    }
} else {
    echo "<script>alert('Duplicate exists....!');</script>";
}
?>
