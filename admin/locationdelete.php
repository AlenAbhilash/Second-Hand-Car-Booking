
<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_GET["loc_id"]));
{
    $cid=$_GET["loc_id"];
    $query="delete from tbl_loc where loc_id=$cid";
    $result=$obj->query($query);
    if($result==1)
{
    echo "<script>alert('location details Deleted successfully');window.location='locationview.php'</script>";
}
else
{
    echo "<script>alert('Deletion Failed');window.location='locationview.php'</script>";
}

}



?>