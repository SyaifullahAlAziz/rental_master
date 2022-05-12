<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id_barang= $_GET['id_barang'];


$perintah = "SELECT a.*,  b.*, c.*  FROM tb_barang a
		LEFT JOIN tb_store b ON a.id_store = b.id_store
        LEFT JOIN tb_user c ON a.id_user = c.id_user
		WHERE a.id_barang='$id_barang' ";

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
