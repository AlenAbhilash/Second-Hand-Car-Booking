<?php
session_start();
session_destroy();
header("location:../guestside/login.php");
?>
<?php
session_start();
if(!isset($_SESSION["login_id"]))
{
	header("location:../guestside/login.php");
}
?>