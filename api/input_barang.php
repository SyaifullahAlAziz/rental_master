<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}
$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];
$id_kategori = $_POST['id_kategori'];
$nama_barang = $_POST['nama_barang'];
$tarif_barang = $_POST['tarif_barang'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$gambar_barang = $_POST['gambar_barang'];
$tanggal = date('Ymd');


$random = random_word(10);
$path = "BRG" . $random . ".png";

$a = mysqli_fetch_array(mysqli_query($con, "SELECT `id_store` FROM `tb_store` ORDER BY `id_store` DESC LIMIT 1"));
$id_store = $a['id_store'];

$query = "INSERT INTO tb_barang(id_barang,id_user,id_kategori,id_store,nama_barang,tarif_barang,deskripsi,stok,gambar_barang) VALUES(NULL,'$id_user','$id_kategori','$id_store','$nama_barang','$tarif_barang','$deskripsi','$stok','$path')";
$ad = mysqli_query($con, $query);

if ($ad) {
    mysqli_query($con, "INSERT INTO tb_log_activity(id_log_activity,id_user,tanggal,keterangan) VALUES(NULL,'$id_user','$tanggal','User Menambahkan Barang')");
    file_put_contents("gambar/" . $path, base64_decode($gambar_barang));
    $res = new emp();
    $res->message = "Sukses";
    $res->status = "sukses";
    die(json_encode($res));
} else {
    $res = new emp();
    $res->message = "Gagal !.";
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
