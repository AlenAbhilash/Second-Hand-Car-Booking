<?php
session_start();

$username = $_POST["log_name"];
$password = $_POST["log_password"];
require_once("../dboperation.php");

$obj = new dboperation();
$sql = "SELECT * FROM tbl_login WHERE log_name='$username' AND log_password='$password'";
$res = $obj->query($sql);

if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_array($res);
    $_SESSION['log_id'] = $row['log_id'];

    if ($row["log_role"] == "admin") {
        header("Location: ../admin/index.php");
        exit();
    } elseif ($row["log_role"] == "Customer") {
        $_SESSION['customerid'] = $row['log_id']; // Assuming customer ID is stored in log_id
        echo "<script>alert('Login successful.')</script>";
        header("Location: ../customer/index.php");
        exit();
    }
}

// If the code reaches here, it means invalid username/password
echo "<script>alert('Invalid Username/Password!!'); window.location='login.php';</script>";
exit();
?>