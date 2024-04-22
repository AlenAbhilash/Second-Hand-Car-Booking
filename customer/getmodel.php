<?php
	if(isset($_POST["comp_id"])) 
	{
		$comp_id = $_POST["comp_id"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbl_model where comp_id=$comp_id";
        $obj=new dboperation(); 
        $result=$obj->query($sql);
?>
<label for="selectmodel">model</label> 
<select name="selectmodel" id="selectmodel" class="form-control">
<option value="0">--Select Model---</option>
<?php
while($r=mysqli_fetch_array($result))
{
?>

<option value="<?php echo $r["model_id"];?>"><?php echo $r["model_name"];?></option>
<?php
}
	}
?>
</select>