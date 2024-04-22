<?php
include_once("../dboperation.php");
$obj = new dboperation();
// if(isset($_POST["Submit"]))
{
    $seldistrictid = $_POST["seldistrictid"]; 
    $locationname = $_POST["locationname"];
 

    $sql="select * from tbl_loc where loc_name='$locationname'";
    $res = $obj->query($sql);
    $rows = mysqli_num_rows($res);

    if($rows == 1)
    {
        echo "<script>alert('Already Exist');window.location='locationview.php' </script>";
    }
    else{
        $sql="INSERT INTO `tbl_loc`(`loc_name`, `dis_id`) VALUES ('$locationname','$seldistrictid')";
         $obj->query($sql);
         echo "<script>alert('Saved Successfully');window.location='locationview.php' </script>";
    }
}

?>