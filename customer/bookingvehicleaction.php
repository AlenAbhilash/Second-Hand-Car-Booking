<?php
session_start();
include_once("../dboperation.php"); 
$obj = new dboperation();

// Use $_GET to get 'requestid' from the URL parameter
$request_id = $_GET['requestid'];

$paydate = date('Y-m-d');

// Use $_POST to get 'rate' from the form data
$amount = $_POST["rate"]; // Corrected input field name

$fnum = $_POST["fnum"];
$tnum = $_POST["tnum"];

// Use $_SESSION to get 'customerid' from the session
$customerid = $_SESSION['customerid'];

$vehicle_id = $_POST['vehicle_id'];

// Check for duplicate payment
$query = "select * from tbl_payment where pay_amount = '$amount'";
$result = $obj->query($query);
$row = mysqli_num_rows($result);

if ($row == 0) {
    // Added default values for 'remark' and 'status' fields
    $insertQuery = "INSERT INTO tbl_payment (req_id, pay_date, pay_amount, pay_status, fromaccount, toaccount, role, cust_id, vehicle_id) VALUES ('$request_id', '$paydate', '$amount', 'payment done', '$fnum', '$tnum', 'done', '$customerid', '$vehicle_id')";

    $insertResult = $obj->query($insertQuery);

    if ($insertResult == 1) {
        // Update the status in tbl_req table when pay_status is 'payment done' to 'booking completed'
        $updateQuery = "UPDATE tbl_req SET status = 'booking completed' WHERE req_id = '$request_id'";
        $updateResult = $obj->query($updateQuery);
        $updateQ = "UPDATE tbl_vehicle SET owner_status = 'sold out' WHERE vehicle_id = '$vehicle_id'";
        $updateR = $obj->query($updateQ);
        if ($updateResult && $updateR) { // Use && to check both updateResult and updateR
            echo "<script>alert('Payment Completed')</script>";
            header("Location: ../customer/paymenttable.php");
            exit();
        } else {
            echo "<script>alert('Failed to update status!')</script>";
        }
    } else {
        echo "<script>alert('Failed!')</script>";
    }
} else {
    echo "<script>alert('Duplicate exists....!');</script>";
}
?>
