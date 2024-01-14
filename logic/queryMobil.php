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
        header("Location: ?role=admin");
    }
} elseif (isset($_POST['edit'])) {
    $idPlat = $_POST['idPlat'];
    $plat   = $_POST['noplat'];
    $mobil  = $_POST['mobil'];
    $brand  = $_POST['brand'];
    $type   = $_POST['transmisi'];

    $queryedit = mysqli_query($link, "UPDATE `tbl_mobil_rikza` SET `no_plat_rikza` = '$plat', `nama_mobil_rikza` = '$mobil', `brand_mobil_rikza` = '$brand', `tipe_transmisi_rikza` = '$type' WHERE `no_plat_rikza` = '$idPlat'");

    if (!$queryedit) {
        die("error :" . mysqli_errno($link));
    } else {
        header("Location: ?role=admin");
        exit();
    }
} elseif (isset($_GET['crud']) && $_GET['crud'] == "deleteMobil") {
    $idmbx = $_GET['idmbx'];
    $queryDel = mysqli_query($link, "DELETE FROM `tbl_mobil_rikza` WHERE no_plat_rikza = '$idmbx' ");

    if (!$query) {
        die("error :" + mysqli_errno($link));
    } else {
        header("Location: ?role=admin");
    }
}
