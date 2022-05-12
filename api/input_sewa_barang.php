<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}
$id_sewa_barang  = $_POST['id_sewa_barang'];
$id_user = $_POST['id_user'];
$id_barang = $_POST['id_barang'];
$banyak_sewa = $_POST['banyak_sewa'];
$tglAwal = $_POST['tglAwal'];
$tglAkhir = $_POST['tglAkhir'];
$alamat_penyewa = $_POST['alamat_penyewa'];
$jaminan = $_POST['jaminan'];
$jenis_transaksi = $_POST['jenis_transaksi'];
$jenis_pengiriman = $_POST['jenis_pengiriman'];
$total_harga = $_POST['total_harga'];
$tanggal = date('Ymd');

$random = random_word(10);
$path = "JMN_" . $random . ".png";


$query = "INSERT INTO tb_sewa_barang(id_sewa_barang	,id_user,id_barang,id_status,banyak_sewa,tanggal_awal,tanggal_akhir,alamat_penyewa,jaminan,jenis_transaksi,jenis_pengiriman,total_harga) VALUES(NULL,'$id_user','$id_barang','4','$banyak_sewa','$tglAwal','$tglAkhir','$alamat_penyewa','$path','$jenis_transaksi','$jenis_pengiriman','$total_harga')";
$ad = mysqli_query($con, $query);

if ($ad) {
      mysqli_query($con, "INSERT INTO tb_log_activity(id_log_activity,id_user,tanggal,keterangan) VALUES(NULL,'$id_user','$tanggal','User Memesan Barang Sewa')");
    file_put_contents("gambar/" . $path, base64_decode($jaminan));
    $res = new emp();
    $res->message = "Sukses";
    $res->status = "sukses";
    die(json_encode($res));
} else {
    $res = new emp();
    $res->message = "Gagal !.";
    $res->status = "gagal";
    $res->statsus = $banyak_sewa;
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
