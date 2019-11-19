<?php
include '../conn.php';

$un = $_POST["username"];
$pwd = $_POST["password"];

global $mysqli;
$sql = "SELECT * FROM tUser WHERE lower(user_uname)='$un' AND user_pword='$pwd'";
$result = mysqli_query($mysqli, $sql);
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
// $row = $result->num_rows;

if ($num_row >= 1)
{	
	echo "ok";
	session_start();
	$_SESSION["user_logged_in"] = true;
	$_SESSION['uname'] = $row['user_uname'];
	$_SESSION["jabatan"] = $row['user_jabatan'];
}
else{
	echo "no";
}

// else if($row['pass'] == null)
// {
// 	header("Location:../login.php");
// }
// else if ($row == 0)
// {
// 	header("Location:../login.php");
// }
mysqli_close($mysqli);
?>


