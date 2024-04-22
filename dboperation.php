<?php
class dboperation
{
public $con,$res;
function __construct()
{
$this->con=mysqli_connect("localhost","root","","secondhandcar");
// Check connection
if (!$this->con)
{
die("Connection failed: " . mysqli_connect_error());
}
}
public function query($sql)
{
//$this->connect();
$this->res=mysqli_query($this->con,$sql);
return $this->res;
}
}
?> 




 