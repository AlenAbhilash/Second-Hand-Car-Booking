<?php
session_start();

if (isset($_GET['req_id'])) {
    $req_id = $_GET['req_id'];

    require_once("../dboperation.php");
    $obj = new dboperation();

    // Update the status to "Rejected" in the tbl_req table
    $sql = "UPDATE tbl_req SET status = 'Rejected' WHERE req_id = $req_id";
    $obj->query($sql);

    // Redirect back to the page where you came from
    header("Location:Location: ../customer/bookedcart.php"); // Replace "previous_page.php" with the actual page you want to redirect to
    exit();
}
?>
