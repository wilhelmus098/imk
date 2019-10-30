<?php

$srvName = "sql172.main-hosting.eu"; //SERVER ADDRESS OR IP SERVER
$srvUser = "u947864388_imk"; // USER ID TO DATABASE
$srvPWD = "087886002060"; //PWD TO ACCESS DATABASE
$dbName = "u947864388_imk"; //DATABASE NAME

$mysqli = mysqli_connect($srvName,$srvUser,$srvPWD,$dbName);

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
    
  }
 ?>