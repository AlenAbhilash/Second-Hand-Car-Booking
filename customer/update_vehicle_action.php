<?php
session_start();
require_once("../dboperation.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj = new dboperation();
    
    $vehicle_id = $_POST['vehicle_id'];
    $ve_name = $_POST['ve_name'];
    $rate = $_POST['rate'];
    $cur_km = $_POST['cur_km'];
    $owner_status = $_POST['owner_status'];
    $desp = $_POST['desp'];
    $man_date = $_POST['man_date']; // Additional field

    // Perform the update in the tbl_vehicle table
    $update_sql = "UPDATE tbl_vehicle SET ve_name = '$ve_name', rate = '$rate', cur_km = '$cur_km', owner_status = '$owner_status', desp = '$desp', man_date = '$man_date' WHERE vehicle_id = $vehicle_id";
    $obj->query($update_sql);

    // Redirect to the My Cars page after the update
    header("Location: mycars.php");
    exit();
} else {
    // Invalid request, redirect to home or appropriate page
    header("Location: index.php");
    exit();
}
?>
