<?php
header('Content-Type: application/json');
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $response = [];

    $cari_user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tb_user` WHERE `username` = '$username' AND `password` = '$password'"));


    if (!empty($cari_user)) {

        unset($cari_user['password']);
        $response["status"] = 1;
        $response["message"] = "Data tersedia";
        $response["data"] = $cari_user;
    } else {
        $response["status"] = 0;
        $response["message"] = "Data tidak tersedia";
    }
} else {
    $response = [];
    $response["status"] = 0;
    $response["message"] = "Not Found!!!";
}
mysqli_close($con);
echo json_encode($response);
?>