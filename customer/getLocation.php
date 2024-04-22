<?php
	if(isset($_POST["dis_id"]))  
	{
		$dis_id = $_POST["dis_id"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbl_loc where dis_id=$dis_id";
        $obj=new dboperation(); 
        $result=$obj->query($sql);
?>
<label for="selectloc">Location</label> 
<select name="selectloc" id="selectloc" class="form-control">
<option value="0">--Select Location---</option>
<?php
while($r=mysqli_fetch_array($result))
{
?>

<option value="<?php echo $r["loc_id"];?>"><?php echo $r["loc_name"];?></option>
<?php
}
	}
?>
</select>