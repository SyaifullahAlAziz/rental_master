<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$nama_user = $_POST['nama_user'];
$alamat_user = $_POST['alamat_user'];
$email_user = $_POST['email_user'];
$telp_user = $_POST['telp_user'];
$username = $_POST['username'];
$password = $_POST['password'];



$query = "INSERT INTO tb_user(nama_user,alamat_user,email_user,telp_user,username,password) VALUES('$nama_user','$alamat_user','$email_user','$telp_user','$username','$password')";

$ad = mysqli_query($con, $query);
//  mysqli_query($con, "INSERT INTO tb_log_activity(id_log_activity,id_user,tanggal,keterangan) VALUES(NULL,'$id_user','$tanggal','User Melakukan Registrasi')");
if ($ad) {
    $res = new emp();
    $res->message = "Sukses Input";
    $res->status = "sukses";
    die(json_encode($res));
} else {
    $res = new emp();
    $res->message = "Gagal Input";
    $res->status = "gagal";
    die(json_encode($res));
}

mysqli_close($con);
