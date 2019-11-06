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
    $target = "../images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    add($namaBarang, $kategori, $harga, $kuantitas, $desk, $target, $image);
}

if(isset($_POST['btn_edit'])){
    header('Location:../edit_barang.php?id_produk='.$_POST['btn_edit']);
}

if(isset($_POST['btn_update_barang']))
{
    $namaBarang = $_POST['namaBarang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kuantitas = $_POST['kuantitas'];
    $desk = $_POST['deskripsi'];
    $idbarang = $_POST['btn_update_barang'];
    $target = "../images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
        
    update($namaBarang, $kategori, $harga, $kuantitas, $desk, $idbarang, $target, $image);
}

if(isset($_POST['button_delete']))
{
    delete($_POST["idbarang"]);
}

if(isset($_POST['btn_view']))
{
    header('Location:../detail_product.php?id_produk='.$_POST['btn_view']);
}
function add($namaBarang,$kategori,$harga,$kuantitas,$desk, $target, $image)
{
    global $mysqli;
    $sql = "INSERT INTO tProduk VALUE(null, '" . $namaBarang . "','" . $kategori . "','" . $harga . "','" . $kuantitas . "' ,'" . $desk . "','" . $image . "')";
    // $sql = "INSERT INTO tProduk (produk_nama, produk_kategori, produk_harga. produk_kuantitas, produk_deskripsi, produk_image) VALUES('$namaBarang', '$kategori', '$harga', '$kuantitas', '$desk', '$image')";
    if (mysqli_query($mysqli, $sql)) 
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
       header('Location:../index.php'); // balik ke list
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}

function update($namaBarang,$kategori,$harga,$kuantitas,$desk , $idbarang, $target, $image)
{
    global $mysqli;
    $sql = "UPDATE tProduk SET produk_nama ='" . $namaBarang . "', produk_kategori = '" . $kategori . "', produk_harga = '" . $harga . "', produk_kuantitas = '" . $kuantitas ."', produk_deskripsi = '" .$desk ."', produk_image = '" . $image ."' WHERE produk_id ='" . $idbarang . "'";
    if (mysqli_query($mysqli, $sql))
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        header('Location:../index.php'); // balik ke home or whatever ganti aja
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
        header("Location:../index.php"); //ganti ke mana aja
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}


?>