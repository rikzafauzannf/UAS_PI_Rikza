<?php
session_start();
if ($_GET['role'] == "admin") {
    // admin
    include("page/admin/index.php");
} elseif ($_GET['role'] == "user") {
    // user
} elseif ($_GET['logic'] == "logic") {
    if ($_GET['login'] == "login") {
        include("./logic/login.php");
    } elseif ($_GET['crud'] == "adduser") {
        include("./logic/queryUser.php");
    }
} else {
    include("./page/auth/index.php");
}
