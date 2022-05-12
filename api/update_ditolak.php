<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$id_sewa_barang = $_POST['id_sewa_barang'];

$query = "UPDATE tb_sewa_barang SET 
        id_status = '5'
        WHERE id_sewa_barang = '$id_sewa_barang'";
$ad = mysqli_query($con, $query);

if ($ad) {
    $res = new emp();
    $res->message = "Sukses ";
    $res->status = "sukses";
    die(json_encode($res));
} else {
    $res = new emp();
    $res->message = "Gagal !";
    $res->status = "gagal";
    die(json_encode($res));
}

mysqli_close($con);
?>
