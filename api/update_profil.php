<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$id_user = $_POST['id_user'];
$nama_user = $_POST['nama_user'];
$alamat_user = $_POST['alamat_user'];
$email_user = $_POST['email_user'];
$telp_user = $_POST['telp_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$tanggal = date('Ymd');

$query = "UPDATE tb_user SET 
        nama_user = '$nama_user', 
        alamat_user = '$alamat_user',
        email_user = '$email_user',
        telp_user = '$telp_user',
        username = '$username',
        password = '$password'
        WHERE id_user = '$id_user'";
$ad = mysqli_query($con, $query);

if ($ad) {
     mysqli_query($con, "INSERT INTO tb_log_activity(id_log_activity,id_user,tanggal,keterangan) VALUES(NULL,'$id_user','$tanggal','User Mengupdate Profile')");
    $res = new emp();
    $res->message = "Sukses ";
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
