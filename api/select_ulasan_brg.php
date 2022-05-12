<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id_barang = $_GET['id_barang'];

$perintah = "SELECT * FROM tb_ulasan 
LEFT JOIN `tb_user` ON `tb_ulasan`.`id_user`=`tb_user`.`id_user`
WHERE id_barang = '$id_barang'";

$eksekusi = mysqli_query($con, $perintah);
$cek = mysqli_affected_rows($con);

if ($cek > 0) {
    $response["status"] = 'sukses';
    $response["pesan"] = "Data tersedia";

    $F = array();
    $rat = 0;
    $jml = 0;
    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F[] = $ambil;
        $jml = $jml + 1;
        $rat += $ambil->bintang;
    }
    $response["rate"] = round($rat / $jml, 1);
    $response["res"] = array();
    $response["res"] = $F;
} else {
    $response["rate"] = 0;
    $response["status"] = 'gagal';
    $response["pesan"] = "Data tidak tersedia";
}

echo json_encode($response);
mysqli_close($con);
