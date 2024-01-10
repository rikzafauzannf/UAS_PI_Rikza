<?php
include("config/connect.php");

if (isset($_POST['insert'])) {
    $username       = $_POST['username'];
    $namaLengkap    = $_POST['namaLengkap'];
    $password       = md5($_POST['password']);
    $level          = $_POST['level'];

    $query = mysqli_query($link, "INSERT INTO `tbl_user_rikza`(`username_rikza`, `password_rikza`, `nama_lengkap_rikza`, `level_rikza`) VALUES ('$username','$password','$namaLengkap','$level')");

    if (!$query) {
        die("error :" + mysqli_errno($link));
    } else {
        header("Location: http://localhost:8000/UAS_PI_Rikza/?role=admin");
    }
} elseif (isset($_POST['dataPengguna'])) {
    $nik    = $_POST['nik'];
    $nama   = $_POST['nama'];
    $noHP   = $_POST['noHP'];
    $alamat = $_POST['alamat'];

    $platNav = $_POST['plat'];

    $queryCek = mysqli_query($link, "SELECT * FROM tbl_pelanggan_rikza");
    $nikExists = false;

    while ($dataCek = mysqli_fetch_assoc($queryCek)) {
        if ($dataCek['nik_ktp_rikza'] == $nik) {
            $nikExists = true;
            break;
        }
    }

    if ($nikExists) {
        echo "Sudah ada data";
    } else {
        $queryAdd = mysqli_query($link, "INSERT INTO `tbl_pelanggan_rikza`(`nik_ktp_rikza`, `nama_rikza`, `no_hp_rikza`, `alamat_rikza`) VALUES ('$nik','$nama','$noHP','$alamat')");

        if (!$queryAdd) {
            die("Error: " . mysqli_error($link));
        } else {
            header("Location: http://localhost:8000/UAS_PI_Rikza/?role=user&rental=dataPelanggan&plat=" . $platNav);
        }
    }
} elseif (isset($_GET['crud']) && $_GET['crud'] == "deluser") {
    $id  = $_GET['idfxt'];
    $query = mysqli_query($link, "DELETE FROM `tbl_user_rikza` WHERE id_user_rikza = $id");

    if (!$query) {
        die("error :" + mysqli_errno($link));
    } else {
        header("Location: http://localhost:8000/UAS_PI_Rikza/?role=admin");
    }
}
