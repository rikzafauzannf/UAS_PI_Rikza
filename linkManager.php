<?php
if (isset($_GET['role']) && $_GET['role'] == "admin") {
    // admin
    include("page/admin/index.php");
} elseif (isset($_GET['role']) && $_GET['role'] == "user") {
    // user
    if (isset($_GET['rental']) && $_GET['rental'] == "dataPelanggan") {
        include("./page/public/rentalStep1.php");
    } else {
        include("page/public/index.php");
    }
} elseif (isset($_GET['logic']) && $_GET['logic'] == "logic") { // logic
    if (isset($_GET['login']) && $_GET['login'] == "login") { // login
        include("./logic/login.php");
    } elseif (isset($_GET['logout']) && $_GET['logout'] == "logout") {
        include("./logic/logout.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "adduser") { // tambah user
        include("./logic/queryUser.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "deluser") { // delete user
        include("./logic/queryUser.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "addPenyewa") { // add penyewa
        include("./logic/queryUser.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "addMobil") { // add mobil
        include("./logic/queryMobil.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "editMobil") { // add mobil
        include("./logic/queryMobil.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "deleteMobil") { // delete mobil
        include("./logic/queryMobil.php");
    } elseif (isset($_GET['crud']) && $_GET['crud'] == "Rental") { // add mobil
        include("./logic/queryRental.php");
    }
} elseif (isset($_GET['out']) && $_GET['out'] == "trueOut") {
    include("./page/auth/index.php");
} else {
    include("./page/auth/index.php");
}
