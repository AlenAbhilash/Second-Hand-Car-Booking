<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$customerid = $_SESSION['customerid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated profile details from the form
    $cust_name = $_POST["cust_name"];
    $email = $_POST["email"];
    $house = $_POST["house"];
    $pincode = $_POST["pincode"];
    $id_proof = $_POST["id"];

    // Handle image upload
    $uploadDirectory = "../upload/"; // Directory where the images will be stored
    $uploadedFile = $_FILES["img"]["tmp_name"];
    $imageName = $_FILES["img"]["name"];
    $imagePath = $uploadDirectory . $imageName;

    // Check if the file was uploaded successfully
    if (move_uploaded_file($uploadedFile, $imagePath)) {
        // Update the user's profile details and image in the database
        $sql = "UPDATE tbl_cust SET cust_name = '$cust_name', email = '$email', housename = '$house', pincode = '$pincode', id_proof = '$id_proof', imgc = '$imageName' WHERE log_id = '$customerid'";
        $obj->query($sql);

        // Redirect back to the profile page after updating
        header("Location: profile.php");
        exit();
    } else {
        // Handle the case where image upload fails
        echo "Image upload failed. Please try again.";
    }
}
?>
