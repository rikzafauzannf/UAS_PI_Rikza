<?php

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "rentalmobil_rikzafauzannf";

$link = mysqli_connect($host, $user, $pass, $db);


if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");

$baseUrl = "http:localhost:8000/UAS_PI_Rikza/";
