<?php
// FOR ONLINE USE
$srvName = "sql172.main-hosting.eu"; //SERVER ADDRESS OR IP SERVER
$srvUser = "u947864388_imk"; // USER ID TO DATABASE
$srvPWD = "087886002060"; //PWD TO ACCESS DATABASE
$dbName = "u947864388_imk"; //DATABASE NAME
//


// FOR OFFLINE USE
// $srvName = "localhost"; //SERVER ADDRESS OR IP SERVER
// $srvUser = "root"; // USER ID TO DATABASE
// $srvPWD = ""; //PWD TO ACCESS DATABASE
// $dbName = "imk"; //DATABASE NAME

$mysqli = mysqli_connect($srvName,$srvUser,$srvPWD,$dbName);

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
    
  }
 ?>