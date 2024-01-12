<?php
include("config/connect.php");


$notrx          = $_POST['noTRX'];
$pelanggan      = $_POST['pelanggan'];
$noPlat         = $_POST['noPlat'];
$tglRental      = $_POST['tglRental'];
$jamRental      = $_POST['JamRental'];
$harga          = $_POST['harga'];
$lama           = $_POST['lama'];
$total          = $_POST['total'];

// $array = ["trx" => $notrx, "pelanggan" => $pelanggan, "plat" => $noPlat, "tglRental" => $tglRental, "jam" => $jamRental, "harga" => $harga, "lama" => $lama, "total" => $total];
// var_dump($array);


$query = "INSERT INTO `tbl_rental_rikza` VALUES ('$notrx','$pelanggan','$noPlat','$tglRental','$jamRental','$harga','$lama','$total')";
$queryRental = mysqli_query($link, $query);

if (!$queryRental) {
    die("error" . mysqli_errno($link));
} else {
    header("Location: http://localhost:8000/UAS_PI_Rikza/?role=user&rental=dataPelanggan&plat=$noPlat");
}
