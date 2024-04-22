<?php
include_once("../dboperation.php");
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

$obj = new dboperation(); 

// Retrieve form data
$name = $_POST["cust_name"];
$email = $_POST["email"];
$phone = $_POST["contact"];
$house = $_POST["housename"];
$dis = $_POST["seldistrictid"];
$loc = $_POST["selectloc"];
$pin = $_POST["pincode"];
$id = $_POST["id_proof"];
$username = $_POST["log_name"];
$password = $_POST["log_password"];
$cust_date =date('Y-m-d');
$imag1 = ""; // Initialize the variable to store the image file name
$uploadFolder = "../upload/";

$imag1 = $_FILES["img1"]["name"];
$tempPath1 = $_FILES["img1"]["tmp_name"];
move_uploaded_file($tempPath1, $uploadFolder . $imag1);

$sql = "SELECT * FROM tbl_login WHERE log_name='$username'";
$res = $obj->query($sql);
$rows = mysqli_num_rows($res);

if ($rows == 1) {
    echo "<script>alert('Username already exists')</script>";
} else {
    $sql = "INSERT INTO tbl_login (log_name, log_password, log_role, log_status) VALUES ('$username', '$password', 'Customer', 'Notconfirmed')";
    $res = $obj->query($sql);

    if ($res == 1) {
        $loginid = mysqli_insert_id($obj->con);

        $sql = "INSERT INTO tbl_cust (cust_name, email, contact, housename, dis_id, loc_id, pincode, imgc, id_proof, log_id, log_password,reg_date) VALUES ('$name', '$email', '$phone', '$house', '$dis', '$loc', '$pin', '$imag1', '$id', '$loginid', '$password','$cust_date')";
        $result = $obj->query($sql);

        if ($result == 1) {
            // Registration successful
            require 'phpmailerreg.php'; // Include PHP mailer for sending email

            // Send registration confirmation email
            $emailSent = sendRegistrationEmail($username, $password, $email);

            if ($emailSent) {
                echo "<script>alert('Registration successful. Email sent.')</script>";
                header("Location: ../guestside/login.php");
                exit();
            } else {
                echo "<script>alert('Registration successful. Failed to send email.')</script>";
                header("Location: ../guestside/login.php");
                exit();
            }
        } else {
            // Failed to register
            $s = "DELETE FROM tbl_login WHERE log_id='$loginid'";
            $res2 = $obj->query($s);
            echo "<script>alert('Failed to register.')</script>";
        }
    }
}
?>
