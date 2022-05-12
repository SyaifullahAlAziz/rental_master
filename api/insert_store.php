<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}
$id_store = $_POST['id_store'];
$id_user = $_POST['id_user'];
$nama_store = $_POST['nama_store'];
$alamat_store= $_POST['alamat_store'];
$telp_store = $_POST['telp_store'];
$wa_store = $_POST['wa_store'];
$ig_store = $_POST['ig_store'];
$gambar_store = $_POST['gambar_store'];
$tanggal = date('Ymd');

$random = random_word(10);
$path = "STR_" . $random . ".png";


$query = "INSERT INTO tb_store(id_store,id_user,nama_store,alamat_store,telp_store,wa_store,ig_store,gambar_store) VALUES(NULL,'$id_user','$nama_store','$alamat_store','$telp_store','$wa_store','$ig_store','$path')";
$ad = mysqli_query($con, $query);

if ($ad) {

      mysqli_query($con, "INSERT INTO tb_log_activity(id_log_activity,id_user,tanggal,keterangan) VALUES(NULL,'$id_user','$tanggal','User Menambah Store')");
    file_put_contents("gambar/" . $path, base64_decode($gambar_store));
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


function random_word($id = 10)
{
    $pool = '1234567890abcdefghijkmnpqrstuvwxyz';

    $word = '';
    for ($i = 0; $i < $id; $i++) {
        $word .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
    }
    return $word;
}

mysqli_close($con);
