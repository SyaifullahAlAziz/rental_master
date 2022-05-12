<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];

$perintah = "SELECT *  FROM tb_ulasan WHERE id_barang = '$id_barang' AND id_user = '$id_user'";

$eksekusi = mysqli_query($con, $perintah);
$cek = mysqli_affected_rows($con);

if ($cek > 0) {
    $response["status"] = 'sukses';
    $response["pesan"] = "Data tersedia";

    $response["res"] = array();
    $F = array();
    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F[] = $ambil;
    }
    $response["res"] = $F;
} else {
    $response["status"] = 'gagal';
    $response["pesan"] = "Data tidak tersedia";
}

echo json_encode($response);
mysqli_close($con);
