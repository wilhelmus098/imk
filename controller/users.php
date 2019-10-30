<?php
include '../conn.php';
include '../checksession.php';

if(isset($_POST['btn_register']))
{
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $pos = $_POST['jabatan'];

    addUser($uname, $pass, $pos);
}

// ---------------------------------------------------------
// METHOD
// ---------------------------------------------------------
function addUser($uname,$pwd,$pos)
{
    global $mysqli;
    $sql = "INSERT INTO tuser VALUE('" . $uname . "','" . $pwd . "','" . $pos . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
       header('Location:../register.php');
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>