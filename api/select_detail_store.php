<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id_store = $_GET['id_store'];


$perintah = "SELECT a.*,  b.*, c.*  FROM tb_barang a
LEFT JOIN tb_user b ON a.id_user = b.id_user
LEFT JOIN tb_store c ON a.id_store = c.id_store
WHERE a.id_store='$id_store'";

$eksekusi = mysqli_query($con, $perintah);
$cek = mysqli_affected_rows($con);

if ($cek > 0) {
    $S = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS sewa FROM `tb_sewa_barang`
    LEFT JOIN `tb_barang` ON `tb_sewa_barang`.`id_barang`=`tb_barang`.`id_barang`
    WHERE `tb_barang`.`id_store`='$id_store'"));

    $response["status"] = 'sukses';
    $response["pesan"] = "Data tersedia";
    $response["sewa"] = $S['sewa'];
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
