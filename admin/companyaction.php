<?php
include_once("../dboperation.php");
$obj=new dboperation();

 

$compname=$_POST["comp_name"];



$query="select * from tbl_companyreg where comp_name='$compname'"; 
$result=$obj->query($query);
$row=mysqli_num_rows($result);
if($row==0)
{
    $query="insert into tbl_companyreg (comp_name)values('$compname')";
         $result=$obj->query($query);
         if($result==1)
         {
          
          header("location:..\admin\modelview.php");
            
         }
         else
         {
           echo "<script>alert('Failed!') ;windows.location='company.php'</script>";
         }
        }
        else
        {
         echo "<script>alert('Duplicate exists....!');</script>";
        }
        

?>






