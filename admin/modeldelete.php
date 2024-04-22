
<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_GET["model_id"]));
{
    $modelid=$_GET["model_id"];
    $query="delete from tbl_model where model_id=$modelid";
    $result=$obj->query($query);
    if($result==1)
{
    echo "<script>alert('location details Deleted successfully');window.location='modelview.php'</script>";
}
else
{
    echo "<script>alert('Deletion Failed');window.location='modelview.php'</script>";
}

}



?>