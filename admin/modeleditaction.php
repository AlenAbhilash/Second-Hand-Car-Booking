<?php
require_once("../dboperation.php");
$obj = new dboperation();

$location_id=$_POST['model_id'];
$location=$_POST['txt_location'];

$sql = "UPDATE tbl_model set model_name='$location' WHERE model_id=$location_id";
$res = $obj->query($sql);

if ($res==1) {
    echo "<script> alert('model updated!'); window.location='modelview.php'; </script>";
} else {
    echo "<script> alert('Updation Failed'); window.location='modelview.php'; </script>";
}
 
?>