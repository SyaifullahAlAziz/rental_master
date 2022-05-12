<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id_user= $_GET['id_user'];


$perintah = "SELECT * FROM tb_user WHERE id_user='$id_user' ";

$eksekusi = mysqli_query($con, $perintah);
$cek = mysqli_affected_rows($con);

if ($cek > 0) {
    $response["status"] = 'sukses';
    $response["pesan"] = "Data tersedia";


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
