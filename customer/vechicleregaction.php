<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();

// Assuming proper validation and sanitation of input data is done here. 
$ve_name = $_POST["ve"];  
$company_id = $_POST["selectcomp"];
$model_id = $_POST["selectmodel"];
$body_id = $_POST["selectbody"]; 
$fuel_id = $_POST["selectfuel"]; 
$price = $_POST["vech"]; 
$posted_date =date('Y-m-d');
$manufacturing_date = $_POST["mdate"];
$owner_details = $_POST["ownerD"]; 
$current_kilometer = $_POST["kilo"];
$district_id = $_POST["seldistrictid"]; 
$location_id = $_POST["selectloc"];
$vehicle_details = $_POST["vd"];
$customerid = $_SESSION['customerid'];
 
// Initialize variables for image names
$imag1 = $_FILES["img1"]["name"];
$imag2 = $_FILES["img2"]["name"];
$imag3 = $_FILES["img3"]["name"];

// Get temporary file paths
$tempPath1 = $_FILES["img1"]["tmp_name"];
$tempPath2 = $_FILES["img2"]["tmp_name"];
$tempPath3 = $_FILES["img3"]["tmp_name"];

// Destination folder path 
$uploadFolder = "../upload/"; 

// Move uploaded files to the destination folder
move_uploaded_file($tempPath1, $uploadFolder . $imag1);
move_uploaded_file($tempPath2, $uploadFolder . $imag2);
move_uploaded_file($tempPath3, $uploadFolder . $imag3);

$query = "select * from tbl_vechicle where comp_id='$company_id'";
$result = $obj->query($query);

// If you want to uncomment the following lines, make sure to add proper logic 
// $row = mysqli_num_rows($result);
// if($row == 0) {
$query = "insert into tbl_vehicle(comp_id, model_id, bod_id, fuel_id, rate, post_date, man_date, owner_status, cur_km, dis_id, loc_id, desp, img1, img2, img3,ve_name,cust_id) values ('$company_id', '$model_id', '$body_id', '$fuel_id', '$price', '$posted_date', '$manufacturing_date', '$owner_details', '$current_kilometer', '$district_id', '$location_id', '$vehicle_details', '$imag1', '$imag2', '$imag3','$ve_name','$customerid')";
$result = $obj->query($query);

if ($result == 1) {
    echo "<script>alert('Registration successful.')</script>";
    header("Location: ../customer/vechicleview.php");
    exit();
} else {
    echo "<script>alert('Registration unsuccessful.')</script>";
    header("Location: ../customer/vechiclereg.php");
    exit();
}
// }
?>
