<?php
include '../conn.php';
include '../checksession.php';

if(isset($_POST['btn_insert_barang']))
{
    $namaBarang = $_POST['namaBarang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kuantitas = $_POST['kuantitas'];
    $desk = $_POST['deskripsi'];

    add($namaBarang, $kategori, $harga, $kuantitas, $desk);
}

if(isset($_POST['btnUpdate']))
{
    $namaBarang = $_POST['namaBarang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kuantitas = $_POST['kuantitas'];
    $desk = $_POST['deskripsi'];
    $idbarang = $_POST['idbarang'];
        
    update($namaBarang, $kategori, $harga, $kuantitas, $deks);
}

if(isset($_POST['button_delete']))
{
    delete($_POST["idbarang"]);
}

if(isset($_POST['btn_view']))
{
    header('Location:../detail_product.php?id_produk='.$_POST['btn_view']);
}
function add($namaBarang,$kategori,$harga,$kuantitas,$deks)
{
    global $mysqli;
    $sql = "INSERT INTO tProduk VALUE(null, '" . $namaBarang . "','" . $kategori . "','" . $harga . "','" . $kuantitas . "' ,'" . $deks . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
       header('Location:../register.php'); // balik ke list
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}

function update($namaBarang,$kategori,$harga,$kuantitas,$deks , $idbarang)
{
    global $mysqli;
    $sql = "UPDATE tProduk SET produk_nama ='" . $name . "', produk_kategori = '" . $pwd . "', produk_harga = '" . $pos . "', produk_kuantitas = '" . $idgrj ."', produk_deskripsi = '" .$desk ."' WHERE produk_id ='" . $idbarang . "'";
    if (mysqli_query($mysqli, $sql))
    {
        header('Location:../register.php'); // balik ke home or whatever ganti aja
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function delete($id)
{
    global $mysqli;
    $sql = "DELETE FROM tProduk WHERE produk_id='" . $id . "'";
    if (mysqli_query($mysqli, $sql)) 
    {
        // echo "Record deleted successfully <a href=\"../list_gereja.php\">back to list user</a>";
        header("Location:../register.php"); //ganti ke mana aja
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}


?>