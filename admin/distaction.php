<?php
include_once("../dboperation.php");
$obj=new dboperation();
$districtname=$_POST["dis_name"]; 



$query="select * from tbl_dis where dis_name='$districtname'";
$result=$obj->query($query);
$row=mysqli_num_rows($result); 
if($row==0) 
{
    $query="insert into tbl_dis (dis_name)values('$districtname')";
         $result=$obj->query($query);
         if($result==1)
         {
          header("location:..\admin\locationview.php");
            
         }
         else
         {
           echo "<script>alert('Failed!') ;windows.location='districtreg.php'</script>";
         }
        }
        else
        {
         echo "<script>alert('Duplicate exists....!');</script>";
        }
        

?>