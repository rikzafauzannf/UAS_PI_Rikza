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

$query = "INSERT INTO `tbl_rental_rikza` VALUES ('$notrx','$pelanggan','$noPlat','$tglRental','$jamRental',$harga,$lama,'$total')";
$queryRental = mysqli_query($link, $query);

if (!$queryRental) {
    die("error" . mysqli_errno($link));
} else {
    header("Location: ?role=user&rental=dataPelanggan&plat=$noPlat");
}
