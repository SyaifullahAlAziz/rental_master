<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}
$id_ulasan = $_POST['id_ulasan'];
$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];
$review = $_POST['review'];
$bintang= $_POST['bintang'];
$tanggal = date('Ymd');


$query = "INSERT INTO tb_ulasan(id_ulasan,id_barang,id_user,review,bintang) VALUES(NULL,'$id_barang','$id_user','$review','$bintang')";
$ad = mysqli_query($con, $query);

if ($ad) {
      mysqli_query($con, "INSERT INTO tb_log_activity(id_log_activity,id_user,tanggal,keterangan) VALUES(NULL,'$id_user','$tanggal','User Menambahkan Ulasan')");
    $res = new emp();	
    $res->message = "Sukses";
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


