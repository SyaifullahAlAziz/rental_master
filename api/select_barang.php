<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id_user= $_GET['id_user'];


$perintah = "SELECT a.*,  b.*  FROM tb_barang a
        LEFT JOIN tb_user b ON a.id_user = b.id_user
        WHERE a.id_user='$id_user'";

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

?>