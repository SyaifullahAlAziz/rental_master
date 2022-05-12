<?php
require_once('koneksi.php');
header('Content-Type: application/json');


$perintah = "SELECT * FROM tb_kategori";

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
   $response["status"] = 'Gagal';
    $response["pesan"] = "Data Tak tersedia";

}
echo json_encode($response);
mysqli_close($con);
?>