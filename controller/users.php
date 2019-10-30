<?php
include '../conn.php';
include '../checksession.php';

if(isset($_POST['btn_register']))
{
    $id = $_POST['id'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $pos = $_POST['jabatan'];

    addUser($uname, $pass, $pos);

}

if(isset($_POST['btnUpdate']))
{
    $uname = $_POST['uname'];
    $pass = $_POST['password1'];

    editUser($uname, $pass);
    
}

// ---------------------------------------------------------
// METHOD
// ---------------------------------------------------------
function addUser($uname,$pwd,$pos)
{
    global $mysqli;
    $sql = "INSERT INTO tUser VALUE(null, '" . $uname . "','" . $pwd . "','" . $pos . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
        echo "<script type='text/javascript'>alert('register succeed');</script>";
       header('Location:../register.php');
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}

function editUser($uname, $pwd)
{
    global $mysqli;
    $sql = "UPDATE tUser SET user_pword = '" . $pwd . "' WHERE user_uname = '" . $uname . "' ";
    if (mysqli_query($mysqli, $sql))
    {
        echo "berhasil mengubah password!";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}
?>