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
} elseif (isset($_GET['crud']) && $_GET['crud'] == "deluser") {
    $id  = $_GET['idfxt'];
    $query = mysqli_query($link, "DELETE FROM `tbl_user_rikza` WHERE id_user_rikza = $id");

    if (!$query) {
        die("error :" + mysqli_errno($link));
    } else {
        header("Location: http://localhost:8000/UAS_PI_Rikza/?role=admin");
    }
}
