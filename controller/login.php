<?php
include '../conn.php';

$un = $_POST["username"];
$pwd = $_POST["password"];

global $mysqli;
$sql = "SELECT * FROM tUser WHERE lower(user_uname)='$un' AND user_pword='$pwd'";
$result = mysqli_query($mysqli, $sql);
$row = $result->num_rows;

if ($row == 1)
{	
	session_start();
	$_SESSION["user_logged_in"] = true;
	$_SESSION["uname"] = $un;

	while($row = $result->fetch_assoc()) 
	{
		$_SESSION['uname'] = $row['user_uname'];
		$_SESSION["jabatan"] = $row['user_jabatan'];
	}
	header("Location:../register.php");
}

else if($row['pass'] == null)
{
	header("Location:../login.php");
}
else if ($row == 0)
{
	header("Location:../login.php");
}
mysqli_close($mysqli);
?>


