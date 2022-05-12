<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$id_sewa_barang = $_POST['id_sewa_barang'];
$id_status = $_POST['id_status'];

$query = "UPDATE tb_sewa_barang SET 
        id_status = '$id_status'
        WHERE id_sewa_barang = '$id_sewa_barang'";
$ad = mysqli_query($con, $query);

if ($ad) {
    if ($id_status == 2) {
        $cek = mysqli_query($con, "SELECT * FROM `tb_sewa_barang` WHERE `id_sewa_barang`='$id_sewa_barang'");
        $x = mysqli_fetch_array($cek);
        $idbrg = $x['id_barang'];
        $stkSewa = $x['banyak_sewa'];

        $brg = mysqli_query($con, "SELECT * FROM `tb_barang` WHERE `id_barang`='$idbrg'");
        $y = mysqli_fetch_array($brg);
        $stkAwal = $y['stok'];

        $stk = $stkAwal + $stkSewa;
        $as = mysqli_query($con, "UPDATE `tb_barang` SET `stok` = '$stk' WHERE `id_barang` = '$idbrg'");
        if ($as) {
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
    } else {
        $res = new emp();
        $res->message = "Sukses ";
        $res->status = "sukses";
        die(json_encode($res));
    }
} else {
    $res = new emp();
    $res->message = "Gagal !";
    $res->status = "gagal";
    die(json_encode($res));
}

mysqli_close($con);
