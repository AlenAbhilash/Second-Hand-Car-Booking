<?php
include_once("../dboperation.php");
$obj = new dboperation();
// if(isset($_POST["Submit"])) 
{
    $seldistrictid = $_POST["seldistrictid"];
    $locationname = $_POST["locationname"];
 

    $sql="select * from tbl_model where model_name='$locationname'";
    $res = $obj->query($sql);
    $rows = mysqli_num_rows($res);

    if($rows == 1)
    {
        echo "<script>alert('Already Exist');window.location='modelview.php' </script>";
    }
    else{
        $sql="INSERT INTO `tbl_model`(`model_name`, `comp_id`) VALUES ('$locationname','$seldistrictid')";
         $obj->query($sql);
         echo "<script>alert('Saved Successfully');window.location='modelview.php' </script>";
    }
}

?>