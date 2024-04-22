<?php 
session_start(); 
$username=$_POST["log_name"];
$password=$_POST["log_password"]; 
require_once("../dboperation.php");
$obj=new dboperation();
$sql="select * from tbl_login where log_name='$username' and log_password='$password'";
$res=$obj->query($sql);
if(mysqli_num_rows($res)==1)
{
$row=mysqli_fetch_array($res);  
$_SESSION['customerid']=$row['log_id']; 
if($row["log_role"]=="admin")
{  
header("location:..\admin\index.php"); 
}    
else {
    // Username or password is incorrect
    echo '<script>alert("Incorrect username or password!"); window.location.href = "login.php";</script>';
}

}
$sql="select * from tbl_login where log_name='$username' and log_password='$password'";
$res=$obj->query($sql);
if(mysqli_num_rows($res)==1)
{
$row=mysqli_fetch_array($res);
$_SESSION['log_id']=$row['log_id'];
if($row["log_role"]=="Customer")
{ 
    echo "<script>alert('Registration successful.')</script>";
    header("Location: ../customer/index.php");
} 
else {
    // Username or password is incorrect
    echo '<script>alert("Incorrect username or password!"); window.location.href = "login.php";</script>';
}
}
?> 