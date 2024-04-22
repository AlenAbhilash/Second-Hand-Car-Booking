<?php
session_start();
include("../dboperation.php");
$obj = new dboperation();

if (isset($_SESSION['log_id'])) {
    $log_id = $_SESSION['log_id'];

    $uname = $_POST["txtusername"];
    $pass = $_POST["txtpassword"];
    $newpwd = $_POST["txtnewpassword"];

    $sql = "SELECT * FROM tbl_login WHERE log_id = $log_id";
    $result = $obj->query($sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $display = mysqli_fetch_array($result);

        if ($pass === $display["log_password"]) {
            $newpwd = mysqli_real_escape_string($obj->con, $newpwd); // Access the database connection from the class.
            $sql1 = "UPDATE tbl_login SET log_password = '$newpwd' WHERE log_id = $log_id";
            $result1 = $obj->query($sql1);

            if ($result1) {
                echo "<script>alert('Password Changed Successfully....');window.location='../customer/index.php' </script>";
            } else {
                echo "<script>alert('Error updating password.');window.location='changepassword.php'</script>";
            }
        }
    }
}
?>
