<?php
include_once("../dboperation.php");
$obj=new dboperation();

 

$districtname=$_POST["bod_name"];



$query="select * from tbl_body where bod_name='$districtname'";
$result=$obj->query($query);
$row=mysqli_num_rows($result);
if($row==0) 
{
    $query="insert into tbl_body (bod_name)values('$districtname')";
         $result=$obj->query($query);
         if($result==1)
         {
            echo "<script>alert('Entered !') ;windows.location='body.php'</script>";
         }
         else
         {
           echo "<script>alert('Failed!') ;windows.location='body.php'</script>";
         }
        }
        else
        {
         echo "<script>alert('Duplicate exists....!');</script>";
        }
        

?>