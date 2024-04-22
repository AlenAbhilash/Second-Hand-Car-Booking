<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>CLINIC MANAGEMENT</title>
    </head>
   <body style="background-image:url(../Guest/images/account-bg.jpg)">
<form action="" method="POST">
<div class="logo">
              <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
                 </div>
      <div class="container" style="width:120%;margin-bottom: 5%;padding-top:0%" >
      <div class="col-md-12" style="box-shadow: 2px 2px 15px #1b93e1; border-radius:0px; top: 14px; margin-left:37px;background-color:white">
      <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;padding-top:2%">DATEWISE Customer Registered</h2>
      <br>
       <div class="row">
    <div class="col-md-3" style="text-align:right">
          <label>From date:</label>
        </div>
    <div class="col-md-6">
          <input type="date" class="form-control" name="fromdate" style="width:500px;" required >
          </td>
        </div>
  </div>
      <br>
      <div class="row">
    <div class="col-md-3" style="text-align:right">
          <label>To date:</label>
        </div>
    <div class="col-md-6">
          <input type="date" class="form-control" name="todate"  style="width:500px;">
          </td>
        </div>
  </div>
      <br>
      <div class="row">
    <input type="submit" name="btnsubmit" value="Submit"  class="btn btn-primary" style="margin-left:63%;margin-bottom:2%">
  </div>

  <br>
  </form> 
  <form action="" method="POST">
    <?php

if(isset($_POST["btnsubmit"]))
{
	$fromdate=$_POST["fromdate"];
	$todate=$_POST["todate"]; 
	$_SESSION['fdate']=$fromdate;
	$_SESSION['tdate']=$todate;
	
	
	$s=1;
	?>

	 <div class="col-md-12" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:50px;margin-top:-15px;background-color:white">
 <br>
           <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">DATEWISE POSTED REPORT</h2>
           <br>
       
      <div class="row">
          <div class="col-md-3" style="text-align:right">
          <label>From date:</label>
        </div>
    <div class="col-md-6">
          <input type="text" class="form-control" name="fromdate" readonly value="<?php echo $fromdate ?>" style="width:500px;">
          </td>
        </div>
  </div>
  <br>
    <div class="row">
    <div class="col-md-3" style="text-align:right">
          <label>To date:</label>
        </div>
    <div class="col-md-6">
          <input type="text" class="form-control" name="todate" readonly value="<?php echo $todate ?>" style="width:500px;">
          </td>
        </div>
  </div>
  <br>
  <div style="padding-bottom:4%">
      <table class="table table-hover" style="border: 2px solid #adaaaa;margin-left:4px; box-shadow: 3px 3px 11px #777777; padding-bottom:content;background-color:white">
      
      <th>SI.NO</th>
                    <th>Customer Name</th>
                    <th>District name</th>
                    <th>location name</th>
                    <th>email</th>
                    <th>contact</th>
                    <th>Registered Date</th>
    
    
    <?php


$sql = "SELECT v.*, m.*, f.*
        FROM tbl_cust v
        INNER JOIN tbl_loc m ON v.loc_id = m.loc_id
        INNER JOIN tbl_dis f ON m.dis_id = f.dis_id
        WHERE v.reg_date >= '$fromdate' AND v.reg_date <= '$todate'
        GROUP BY v.cust_id";



$result = $obj->query($sql);
while ($display = mysqli_fetch_array($result)) 
	{
    echo "<tr>";
    echo"<td>".$s++."</td>";
    echo "<td>".$display["cust_name"]."</td>";
    echo "<td>".$display["dis_name"]."</td>";
    echo "<td>".$display["loc_name"]."</td>";
    echo "<td>".$display["email"]."</td>";
    echo "<td>".$display["contact"]."</td>";
    echo "<td>".$display["reg_date"]."</td>";
    echo "</tr>";

  }
echo "</table>";;
}

?>
    </form>
</div>
  </div>
      </div>
      </div>
      </div>

</body>
    </html>
    <?php
include("footer.php");
?>
	</div>
