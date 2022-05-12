<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$key = $_GET['key'];


$perintah = "SELECT a.*, b.*, c.* FROM tb_barang a 
LEFT JOIN tb_user b ON a.id_user = b.id_user 
LEFT JOIN tb_store c ON a.id_store = c.id_store 
WHERE a.nama_barang LIKE '%$key%'";

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
