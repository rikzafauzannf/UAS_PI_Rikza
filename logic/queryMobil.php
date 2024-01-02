<?php
include("config/connect.php");

if (isset($_POST['insert'])) {
    $plat   = $_POST['noplat'];
    $mobil  = $_POST['mobil'];
    $brand  = $_POST['brand'];
    $type   = $_POST['transmisi'];

    $query = mysqli_query($link, "INSERT INTO `tbl_mobil_rikza`(`no_plat_rikza`, `nama_mobil_rikza`, `brand_mobil_rikza`, `tipe_transmisi_rikza`) VALUES ('$plat','$mobil','$brand','$type')");

    if (!$query) {
        die("error :" + mysqli_errno($link));
    } else {
        header("Location: http://localhost:8000/UAS_PI_Rikza/?role=admin");
    }
}
