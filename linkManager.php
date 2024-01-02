<?php
session_start();
if ($_GET['role'] == "admin") {
    // admin
    include("page/admin/index.php");
} elseif ($_GET['role'] == "user") {
    // user
} elseif ($_GET['logic'] == "logic") { // logic
    if ($_GET['login'] == "login") { // login
        include("./logic/login.php");
    } elseif ($_GET['crud'] == "adduser") { // tambah user
        include("./logic/queryUser.php");
    } elseif ($_GET['crud'] == "deluser") { // delete user
        include("./logic/queryUser.php");
    } elseif ($_GET['crud'] == "addMobil") { // add mobil
        include("./logic/queryMobil.php");
    }
} else {
    include("./page/auth/index.php");
}
